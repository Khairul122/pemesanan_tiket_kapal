<?php
session_start();
include 'koneksi.php';

if (isset($_POST['upload'])) {
    // Ambil dan validasi kode_tiket
    $kode_tiket = mysqli_real_escape_string($koneksi, $_POST['kode_tiket']);
    
    if (empty($kode_tiket)) {
        echo "<script>alert('Kode tiket tidak boleh kosong.');window.location='index.php?p=pesanan-saya';</script>";
        exit();
    }

    // Validasi apakah kode_tiket ada di database
    $check_query = "SELECT id_pesan FROM pesan WHERE kode_tiket = ?";
    $stmt = $koneksi->prepare($check_query);
    $stmt->bind_param("s", $kode_tiket);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows === 0) {
        echo "<script>alert('Kode tiket tidak valid.');window.location='index.php?p=pesanan-saya';</script>";
        exit();
    }

    // Validasi file upload
    if (!isset($_FILES['bukti']) || $_FILES['bukti']['error'] !== UPLOAD_ERR_OK) {
        echo "<script>alert('Error pada upload file.');window.location='index.php?p=pesanan-saya';</script>";
        exit();
    }

    $file = $_FILES['bukti'];
    $direktori = "upload/bukti/";
    
    // Validasi tipe file menggunakan finfo
    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $file_type = $finfo->file($file['tmp_name']);
    $allowed_types = [
        'image/jpeg' => 'jpg',
        'image/png' => 'png',
        'application/pdf' => 'pdf'
    ];

    if (!array_key_exists($file_type, $allowed_types)) {
        echo "<script>alert('Format file tidak diizinkan. Hanya JPEG, PNG, atau PDF.');window.location='index.php?p=pesanan-saya';</script>";
        exit();
    }

    // Validasi ukuran file (max 2MB)
    $max_size = 2 * 1024 * 1024;
    if ($file['size'] > $max_size) {
        echo "<script>alert('Ukuran file terlalu besar (maksimal 2MB).');window.location='index.php?p=pesanan-saya';</script>";
        exit();
    }

    // Buat nama file berdasarkan kode_tiket
    $extension = $allowed_types[$file_type];
    $nama_file_baru = $kode_tiket . '_' . date('Ymd_His') . '.' . $extension;

    // Buat direktori jika belum ada
    if (!file_exists($direktori)) {
        if (!mkdir($direktori, 0755, true)) {
            echo "<script>alert('Gagal membuat direktori upload.');window.location='index.php?p=pesanan-saya';</script>";
            exit();
        }
    }

    $upload_path = $direktori . $nama_file_baru;

    // Hapus file lama jika ada
    $query_old_file = "SELECT bukti FROM pesan WHERE kode_tiket = ?";
    $stmt = $koneksi->prepare($query_old_file);
    $stmt->bind_param("s", $kode_tiket);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($row = $result->fetch_assoc()) {
        $old_file = $direktori . $row['bukti'];
        if (!empty($row['bukti']) && file_exists($old_file)) {
            unlink($old_file);
        }
    }

    // Upload file baru
    if (!move_uploaded_file($file['tmp_name'], $upload_path)) {
        echo "<script>alert('Gagal mengupload file.');window.location='index.php?p=pesanan-saya';</script>";
        exit();
    }

    // Update database
    $update_query = "UPDATE pesan SET bukti = ?, status = '2' WHERE kode_tiket = ?";
    $stmt = $koneksi->prepare($update_query);
    $stmt->bind_param("ss", $nama_file_baru, $kode_tiket);

    if ($stmt->execute()) {
        echo "<script>alert('Bukti pembayaran berhasil diupload.');window.location='index.php?p=pesanan-saya';</script>";
    } else {
        // Jika update database gagal, hapus file yang sudah diupload
        unlink($upload_path);
        echo "<script>alert('Gagal memperbarui database.');window.location='index.php?p=pesanan-saya';</script>";
    }

    $stmt->close();
}
?>

<!-- Start of wrapper section -->
<section class="wrapper">
    <section class="page_head">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="page_title">
                        <h2>Pesan Tiket Saya</h2>
                    </div>
                    <nav id="breadcrumbs">
                        <ul>
                            <li>You are here:</li>
                            <li><a href="index.php">Home</a></li>
                            <li>Pesan saya</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <section class="content contact">
        <div class="container">
            <div class="row sub_content">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="dividerHeading">
                        <h4><span>Data pesanan Saya</span></h4>
                    </div>

                    <?php
                    // Array untuk melacak kode_tiket yang sudah muncul
                    $shown_tickets = array();
                    ?>

                    <table id="example1" class="table table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Tiket</th>
                                <th>Nama Penumpang</th>
                                <th>Nomor Kursi</th>
                                <th>Kategori Tiket</th>
                                <th>Tujuan</th>
                                <th>Tanggal Berangkat</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $id = $_SESSION['us'];
                            $no = 0;

                            $sql2 = mysqli_query($koneksi, "SELECT tujuan.nama_tujuan, kursi.nok, tiket.hrg_tiket_dewasa, 
                                        tiket.jam_berangkat, tiket.kode_tiket, pesan.* 
                                        FROM tiket, tujuan, kursi, pesan 
                                        WHERE tujuan.kode_tujuan = tiket.id_tujuan 
                                        AND kursi.idk = pesan.idk 
                                        AND pesan.kode_tiket = tiket.kode_tiket 
                                        AND kode_member = '$id'");

                            while ($q = mysqli_fetch_array($sql2)) {
                                $sq3 = mysqli_query($koneksi, "SELECT * FROM confirm_pembayaran WHERE id_member = '$id'");
                                $q2 = mysqli_fetch_array($sq3);

                                $no++;
                                $tobay = $q2['total_bayar'];
                                if ($q['status'] == "1") {
                                    $stt = "<b>Menunggu Total pembayaran.</b>";
                                } else if ($q['status'] == "2") {
                                    $stt = "<b>Menunggu Pembayaran.</b>";
                                } else {
                                    $stt = "<b>LUNAS</b>";
                                }
                            ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $q['kode_tiket']; ?></td>
                                    <td><?php echo $q['nm_penumpang']; ?></td>
                                    <td><?php echo $q['nok']; ?></td>
                                    <td><?php echo $q['ktgr_tiket']; ?></td>
                                    <td><?php echo $q['nama_tujuan']; ?></td>
                                    <td><?php echo date('d M Y', strtotime($q['tgl_berangkat'])); ?>, Jam <?php echo date('H:i', strtotime($q['jam_berangkat'])); ?></td>
                                    <td><?php echo $stt; ?></td>
                                    <td>
                                        <?php if (($q['status'] == "1" || $q['status'] == "2") && !in_array($q['kode_tiket'], $shown_tickets)) { 
                                            // Tambahkan kode_tiket ke array shown_tickets
                                            $shown_tickets[] = $q['kode_tiket'];
                                        ?>
                                            <button type="button" class="btn btn-primary btn-sm" onclick="setKodeTicket('<?php echo $q['kode_tiket']; ?>')" data-toggle="modal" data-target="#uploadModal">
                                                <i class="fa fa-upload"></i> Upload Bukti
                                            </button>
                                        <?php } else if ($stt == "<b>LUNAS</b>") { ?>
                                            <a href="pages/cetak-pesanan-saya.php?id=<?php echo $q['id_pesan']; ?>" class="btn btn-warning btn-sm">
                                                <i class="fa fa-print"></i> Cetak
                                            </a>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php } ?>
                            <tr>
                                <td colspan="7"></td>
                                <td><b>TOTAL</b></td>
                                <td colspan="2" style="font-size: 20px;"><b>Rp <?php echo number_format($tobay, 0, ".", "."); ?></b></td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="alert alert-info alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <strong>Silahkan lakukan transfer atau kirim lewat rekening bank kami dibawah ini dan pastikan mengirim dengan nomor rekening yang benar serta total bayar sesuai dengan yang ada diatas sampai 3 digit terakhir.</strong>
                    </div>

                    <blockquote class='default' style="font-size: 16px;">
                        <i class="fa fa-credit-card"></i> Bank BRI</b>
                        <hr style="border: 1px solid #727CB6;">
                        <h2>04939284723</h2>
                    </blockquote>
                </div>
            </div>
        </div>
    </section>
</section>

<!-- Single Modal for Upload -->
<div class="modal fade" id="uploadModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Upload Bukti Pembayaran</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="index.php?p=pesanan-saya" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Upload Bukti Transfer</label>
                        <input type="file" name="bukti" class="form-control" accept=".jpeg,.jpg,.png,.pdf" required>
                        <input type="hidden" name="kode_tiket" id="kodeTicketInput">
                        <small class="form-text text-muted">Format yang diizinkan: JPEG, PNG, PDF (Maks. 2MB)</small>
                    </div>
                    <div class="form-group text-right">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" name="upload" class="btn btn-primary">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
function setKodeTicket(kodeTicket) {
    document.getElementById('kodeTicketInput').value = kodeTicket;
}
</script>
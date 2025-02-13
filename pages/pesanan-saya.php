<?php include 'upload.php'; ?>

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
        $tobay = 0; // Inisialisasi total bayar
        $all_lunas = true; // Variabel untuk mengecek apakah semua tiket sudah lunas
        
        // Ambil data tiket dan informasi lainnya
        $sql2 = mysqli_query($koneksi, "SELECT tujuan.nama_tujuan, kursi.nok, tiket.hrg_tiket_dewasa, 
                    tiket.jam_berangkat, tiket.kode_tiket, pesan.* 
                    FROM pesan
                    JOIN tiket ON pesan.kode_tiket = tiket.kode_tiket
                    JOIN tujuan ON tiket.id_tujuan = tujuan.kode_tujuan
                    JOIN kursi ON pesan.idk = kursi.idk
                    WHERE pesan.kode_member = '$id'");

        // Debug jika query error
        if (!$sql2) {
            die("Error SQL2: " . mysqli_error($koneksi));
        }

        // Ambil total pembayaran user dari `confirm_pembayaran`
        $sq3 = mysqli_query($koneksi, "SELECT SUM(total_bayar) AS total FROM confirm_pembayaran WHERE id_member = '$id'");
        if (!$sq3) {
            die("Error SQL3: " . mysqli_error($koneksi));
        }
        $q2 = mysqli_fetch_array($sq3);
        $tobay = isset($q2['total']) ? $q2['total'] : 0;

        // Jika total pembayaran masih 0, hitung dari harga tiket
        if ($tobay == 0) {
            $sql_total = mysqli_query($koneksi, "SELECT SUM(tiket.hrg_tiket_dewasa) AS total 
                                                 FROM pesan
                                                 JOIN tiket ON pesan.kode_tiket = tiket.kode_tiket
                                                 WHERE pesan.kode_member = '$id'");
            if (!$sql_total) {
                die("Error SQL Total: " . mysqli_error($koneksi));
            }
            $row_total = mysqli_fetch_array($sql_total);
            $tobay = isset($row_total['total']) ? $row_total['total'] : 0;
        }

        // Untuk mencegah tombol upload ganda pada tiket yang sama
        $shown_tickets = [];

        while ($q = mysqli_fetch_array($sql2)) {
            $no++;

            // Tentukan status pembayaran
            if ($q['status'] == "1") {
                $stt = "<b>Menunggu Total pembayaran.</b>";
                $all_lunas = false;
            } elseif ($q['status'] == "2") {
                $stt = "<b>Menunggu Pembayaran.</b>";
                $all_lunas = false;
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
                    <?php 
                    if (($q['status'] == "1" || $q['status'] == "2") && !in_array($q['kode_tiket'], $shown_tickets)) { 
                        $shown_tickets[] = $q['kode_tiket'];
                    ?>
                        <button type="button" class="btn btn-primary btn-sm" onclick="setKodeTicket('<?php echo $q['kode_tiket']; ?>')" data-toggle="modal" data-target="#uploadModal">
                            <i class="fa fa-upload"></i> Upload Bukti
                        </button>
                    <?php 
                    } else if ($q['status'] == "3") { 
                    ?>
                        <a href="pages/cetak-pesanan-saya.php?id=<?php echo $q['id_pesan']; ?>" class="btn btn-warning btn-sm">
                            <i class="fa fa-print"></i> Cetak
                        </a>
                    <?php 
                    } 
                    ?>
                </td>
            </tr>
        <?php 
        } 

        // Jika semua tiket sudah lunas, set total pembayaran menjadi 0
        if ($all_lunas) {
            $tobay = 0;
        }
        ?>
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
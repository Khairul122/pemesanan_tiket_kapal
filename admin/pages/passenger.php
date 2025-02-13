<?php
include '../../config/koneksi.php';
?>

<section class="content-header">
    <h1>Penumpang</h1>
    <ol class="breadcrumb">
        <li><a href="home.php">Home</a></li>
        <li class="active">Penumpang</li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Daftar Penumpang</h3>
                    <form method="GET" action="" class="form-inline">
                        <input type="hidden" name="p" value="passenger">
                        <div class="row">
                            <div class="col-md-4">
                                <select name="kode_kapal" id="kode_kapal" class="form-control">
                                    <option value="">-- Semua Kapal --</option>
                                    <?php
                                    $kapal_query = "SELECT DISTINCT kode_kapal, nama_kapal FROM kapal ORDER BY nama_kapal";
                                    $kapal_result = mysqli_query($koneksi, $kapal_query);
                                    while ($kapal = mysqli_fetch_assoc($kapal_result)) {
                                        $selected = (!empty($_GET['kode_kapal']) && $_GET['kode_kapal'] == $kapal['kode_kapal']) ? "selected" : "";
                                        echo "<option value='{$kapal['kode_kapal']}' $selected>{$kapal['nama_kapal']} ({$kapal['kode_kapal']})</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary mt-2">Filter</button>
                                <a href="home.php?p=passenger" class="btn btn-warning mt-2">Reset</a>
                                <a href="pages/cetak-laporan-passenger.php" class="btn btn-success mt-2">Cetak Semua</a>
                                <?php if (!empty($_GET['kode_kapal'])) : ?>
                                    <a href="pages/cetak-laporan-passenger.php?kode_kapal=<?= $_GET['kode_kapal'] ?>" target="_blank" class="btn btn-info mt-2">Cetak Berdasarkan Kapal</a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="box-body">
                    <div style="overflow-y: auto; height: 400px;">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>ID Pemesanan</th>
                                    <th>Kode Tiket</th>
                                    <th>Nama Penumpang</th>
                                    <th>Kategori Tiket</th>
                                    <th>Umur</th>
                                    <th>Nomor Kursi</th>
                                    <th>Kode Kapal</th>
                                    <th>Nama Kapal</th>
                                    <th>Tanggal Keberangkatan</th>
                                    <th>Tujuan</th>
                                    <th>Nomor HP</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $whereClause = "";
                                if (isset($_GET['kode_kapal']) && !empty($_GET['kode_kapal'])) {
                                    $kode_kapal = mysqli_real_escape_string($koneksi, $_GET['kode_kapal']);
                                    $whereClause = "WHERE kp.kode_kapal = '$kode_kapal'";
                                }

                                $query = "SELECT 
                                p.id_pesan, 
                                p.kode_tiket, 
                                p.nm_penumpang, 
                                p.ktgr_tiket, 
                                TIMESTAMPDIFF(YEAR, p.umur, CURDATE()) AS umur_sekarang, 
                                k.nok, 
                                kp.kode_kapal,
                                kp.nama_kapal, 
                                p.tgl_berangkat, 
                                t.nama_tujuan, 
                                p.nohp, 
                                CASE 
                                    WHEN p.status = '1' THEN 'Belum Bayar' 
                                    WHEN p.status = '2' THEN 'Sudah Bayar' 
                                    ELSE 'Selesai' 
                                END AS status
                              FROM pesan p
                              LEFT JOIN kursi k ON p.idk = k.idk
                              LEFT JOIN tiket tk ON p.kode_tiket = tk.kode_tiket
                              LEFT JOIN kapal kp ON tk.id_kapal = kp.kode_kapal
                              LEFT JOIN tujuan t ON tk.id_tujuan = t.kode_tujuan
                              $whereClause
                              ORDER BY p.tgl_berangkat DESC";

                                $result = mysqli_query($koneksi, $query);
                                $no = 1;
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>";
                                    echo "<td>" . $no++ . "</td>";
                                    echo "<td>" . $row['id_pesan'] . "</td>";
                                    echo "<td>" . $row['kode_tiket'] . "</td>";
                                    echo "<td>" . $row['nm_penumpang'] . "</td>";
                                    echo "<td>" . $row['ktgr_tiket'] . "</td>";
                                    echo "<td>" . $row['umur_sekarang'] . "</td>";
                                    echo "<td>" . $row['nok'] . "</td>";
                                    echo "<td>" . $row['kode_kapal'] . "</td>";
                                    echo "<td>" . $row['nama_kapal'] . "</td>";
                                    echo "<td>" . $row['tgl_berangkat'] . "</td>";
                                    echo "<td>" . $row['nama_tujuan'] . "</td>";
                                    echo "<td>" . $row['nohp'] . "</td>";
                                    echo "<td>" . $row['status'] . "</td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Penumpang Kapal</h3>
                    <a href="pages/cetak-laporan-jum-passenger.php" target="_blank" class="btn btn-success" style="float: right;">Cetak Semua Data</a>
                </div>
                <div class="box-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Kapal</th>
                                <th>Nama Kapal</th>
                                <th>Jumlah Penumpang</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $count_query = "SELECT kp.kode_kapal, kp.nama_kapal, COUNT(p.id_pesan) AS jumlah_penumpang 
                                FROM pesan p
                                LEFT JOIN tiket tk ON p.kode_tiket = tk.kode_tiket
                                LEFT JOIN kapal kp ON tk.id_kapal = kp.kode_kapal
                                GROUP BY kp.kode_kapal
                                ORDER BY jumlah_penumpang DESC";
                            $count_result = mysqli_query($koneksi, $count_query);
                            $no = 1;
                            while ($row = mysqli_fetch_assoc($count_result)) {
                                echo "<tr>";
                                echo "<td>" . $no++ . "</td>";
                                echo "<td>" . $row['kode_kapal'] . "</td>";
                                echo "<td>" . $row['nama_kapal'] . "</td>";
                                echo "<td>" . $row['jumlah_penumpang'] . "</td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>


        </div>
    </div>
</section>

<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        if (!$.fn.DataTable.isDataTable('#example1')) {
            $('#example1').DataTable({
                "scrollY": "400px",
                "scrollCollapse": true,
                "paging": true
            });
        }
    });

    document.addEventListener("DOMContentLoaded", function() {
        let url = new URL(window.location.href);
        if (url.searchParams.has("kode_kapal")) {
            url.searchParams.delete("kode_kapal");
            let newUrl = url.origin + url.pathname + "?p=passenger";
            window.history.replaceState({}, document.title, newUrl);
        }
    });
</script>
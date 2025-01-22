<?php
error_reporting(0);
include '../../config/koneksi.php';

// Initialize filter variables
$cari1 = "";
$cari2 = "";
$cari3 = "";
$bln = "";
$thn = "";
$tgl = "";

// Handle date filter
if (isset($_POST['tgl']) && !empty($_POST['tgl'])) {
    $cari3 = " AND DAY(tanggal)='$_POST[tgl]'";
    $tgl = $_POST['tgl'];
}

// Handle month filter
if (isset($_POST['bln']) && !empty($_POST['bln']) && $_POST['bln'] != '-Bulan-') {
    $cari1 = " AND MONTH(tanggal)='$_POST[bln]'";
    $bln = $_POST['bln'];
}

// Handle year filter
if (isset($_POST['thn']) && !empty($_POST['thn']) && $_POST['thn'] != '-Tahun-') {
    $cari2 = " AND YEAR(tanggal)='$_POST[thn]'";
    $thn = $_POST['thn'];
}
?>

<section class="content-header">
    <h1>Keberangkatan</h1>
    <ol class="breadcrumb">
        <li><a href="home.php">Home</a></li>
        <li class="active">Keberangkatan</li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <form id="form1" name="form1" method="post" action="">
                <div class="box">
                    <div class="box-header">
                        <div class="col-md-3">
                            <h3 class="box-title">Laporan Tiket</h3>
                        </div>
                        
                        <!-- Date filter -->
                        <div class="col-md-2">
                            <select name="tgl" class="form-control" onchange="this.form.submit();">
                                <option value="">-Tanggal-</option>
                                <?php
                                for ($i = 1; $i <= 31; $i++) {
                                    $selected = ($tgl == $i) ? 'selected' : '';
                                    echo "<option value='$i' $selected>$i</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <!-- Month filter -->
                        <div class="col-md-3">
                            <select name="bln" class="form-control" onchange="this.form.submit();">
                                <option value="">-Bulan-</option>
                                <?php
                                $bulan = array(
                                    1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
                                    'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
                                );
                                foreach ($bulan as $key => $value) {
                                    $selected = ($bln == $key) ? 'selected' : '';
                                    echo "<option value='$key' $selected>$value</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <!-- Year filter -->
                        <div class="col-md-2">
                            <select name="thn" class="form-control" onchange="this.form.submit();">
                                <option value="">-Tahun-</option>
                                <?php
                                $currentYear = date("Y");
                                $startYear = 2010;
                                for ($year = $startYear; $year <= $currentYear; $year++) {
                                    $selected = ($thn == $year) ? 'selected' : '';
                                    echo "<option value='$year' $selected>$year</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="col-md-2">
                            <a href="pages/cetak-lap-keberangkatan.php?tgl=<?php echo $tgl; ?>&bln=<?php echo $bln; ?>&thn=<?php echo $thn; ?>" 
                               class="btn btn-info"><i class="fa fa-print"></i> Cetak</a>
                        </div>
                    </div>

                    <div class="box-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Tiket</th>
                                    <th>Tanggal Berangkat</th>
                                    <th>Jam Berangkat</th>
                                    <th>Rute(Asal-Tujuan)</th>
                                    <th>Kapal</th>
                                    <th>Nahkoda</th>
                                    <th>Jumlah Penumpang</th>
                                    <th>Surat izin</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 0;
                                $sql = mysqli_query($koneksi, "SELECT tiket.id_nahkoda, tiket.jam_berangkat, 
                                tiket.id_kapal, tiket.id_tujuan, nahkoda.nama_nah, tujuan.nama_tujuan,
                                tujuan.pelabuhan_asal, kapal.nama_kapal, berangkat.* 
                                FROM tiket 
                                JOIN nahkoda ON nahkoda.kode_nah = tiket.id_nahkoda
                                JOIN tujuan ON tujuan.kode_tujuan = tiket.id_tujuan 
                                JOIN kapal ON kapal.kode_kapal = tiket.id_kapal 
                                JOIN berangkat ON tiket.kode_tiket = berangkat.id_tiket 
                                WHERE 1=1 $cari1 $cari2 $cari3 
                                ORDER BY berangkat.tanggal DESC");


                                while ($q = mysqli_fetch_array($sql)) {
                                    $no++;
                                ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $q['id_tiket']; ?></td>
                                        <td><?php echo date('d-m-Y', strtotime($q['tanggal'])); ?></td>
                                        <td><?php echo date('H:i', strtotime($q['jam_berangkat'])); ?></td>
                                        <td><?php echo $q['id_tujuan'] . ' / ' . $q['nama_tujuan'] . ' - ' . $q['pelabuhan_asal']; ?></td>
                                        <td><?php echo $q['id_kapal'] . ' / ' . $q['nama_kapal']; ?></td>
                                        <td><?php echo $q['id_nahkoda'] . ' / ' . $q['nama_nah']; ?></td>
                                        <td><?php echo $q['jml_penumpang']; ?></td>
                                        <td><?php echo $q['no_surat_izin']; ?></td>
                                        <td><?php echo ($q['status'] == 'P') ? 'Pergi' : 'Balik'; ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
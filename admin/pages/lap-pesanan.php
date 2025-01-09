<?php
error_reporting(0);
include '../../config/koneksi.php';

if(isset($_POST['tgl'])) {
    $cari0 = " AND DAY(tgl_berangkat)='$_POST[tgl]'";
    $tgl = $_POST['tgl'];
} else {
    $cari0 = "";
    $tgl = "";
}

if(isset($_POST['bln'])) { 
    $cari1 = " AND month(tgl_berangkat)='$_POST[bln]'";
    $bln = $_POST['bln'];
} else {
    $cari1 = "";
    $bln = "";
}

if(isset($_POST['thn'])) {
    $cari2 = " AND year(tgl_berangkat)='$_POST[thn]'";
    $thn = $_POST['thn'];
} else {
    $cari2 = "";
    $thn = "";
}
?>

<section class="content-header">
    <h1>Laporan</h1>
    <ol class="breadcrumb">
        <li><a href="home.php"> Home</a></li>
        <li class="active">Pesanan</li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <form id="form1" name="form1" method="post" action="">
                <div class="box">
                    <div class="box-header">
                        <div class="col-md-2"><h3 class="box-title">Laporan Pesanan</h3></div>
                        <div class="col-md-2">
                            <select name="tgl" id="select" class="form-control" onchange="this.form.submit();">
                                <option value="">-Tanggal-</option>
                                <?php
                                $current_date = date('d');
                                for($i=1; $i<=31; $i++) {
                                    echo "<option value='$i'";
                                    if($tgl==$i || (!$tgl && $i==$current_date)) echo " selected";
                                    echo ">$i</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select name="bln" id="select" class="form-control" onchange="this.form.submit();">
                                <option>-Bulan-</option>
                                <?php
                                $bulan = array(
                                    1=>'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
                                    'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
                                );
                                $current_month = date('n');
                                foreach($bulan as $i => $nama_bulan) {
                                    echo "<option value='$i'";
                                    if($bln==$i || (!$bln && $i==$current_month)) echo " selected";
                                    echo ">$nama_bulan</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <select name="thn" id="select" class="form-control" onchange="this.form.submit();">
                                <option>-Tahun-</option>
                                <?php
                                $current_year = date('Y');
                                $start_year = 2013;
                                for($i=$start_year; $i<=$current_year; $i++) {
                                    echo "<option value='$i'";
                                    if($thn==$i || (!$thn && $i==$current_year)) echo " selected";
                                    echo ">$i</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <a href="pages/cetak-lap-pesanan.php?thn=<?php echo $thn; ?>&bln=<?php echo $bln; ?>&tgl=<?php echo $tgl; ?>" class="btn btn-info"><i class="fa fa-print"></i> Cetak</a>
                    </div>

                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Kode</th>
                                    <th>Nama penumpang</th>
                                    <th>Nomor kursi</th>
                                    <th>Tujuan</th>
                                    <th>Tanggal Berangkat</th>
                                    <th>Telepon</th>
                                    <th>Email</th>
                                    <th>Kode Member</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include '../../config/koneksi.php';
                                $sql = mysqli_query($koneksi,"SELECT tujuan.nama_tujuan,kursi.nok,tiket.jam_berangkat,tiket.kode_tiket,pesan.* FROM tiket,tujuan,kursi,pesan WHERE tujuan.kode_tujuan=tiket.id_tujuan and kursi.idk=pesan.idk and pesan.kode_tiket=tiket.kode_tiket and pesan.status=3 $cari0 $cari1 $cari2");
                                while($q = mysqli_fetch_array($sql)) {
                                ?>
                                <tr>
                                    <td><?php echo $q['id_pesan']; ?></td>
                                    <td><?php echo $q['nm_penumpang']; ?></td>
                                    <td><?php echo $q['nok']; ?></td>
                                    <td><?php echo $q['nama_tujuan']; ?></td>
                                    <td><?php echo date('d-m-Y',strtotime($q['tgl_berangkat'])); ?>, Jam <?php echo date('H:i',strtotime($q['jam_berangkat'])); ?></td>
                                    <td><?php echo $q['nohp']; ?></td>
                                    <td><?php echo $q['email']; ?></td>
                                    <td><?php echo $q['kode_member']; ?></td>
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
<?php
error_reporting(0);
include '../../config/koneksi.php';

if(isset($_POST['tgl'])) {
    $cari0 = " WHERE DAY(tgl_daf)='$_POST[tgl]'";
    $tgl = $_POST['tgl'];
} else {
    $cari0 = "";
    $tgl = "";
}

if(isset($_POST['bln'])) { 
    $cari1 = empty($cari0) ? " WHERE month(tgl_daf)='$_POST[bln]'" : " AND month(tgl_daf)='$_POST[bln]'";
    $bln = $_POST['bln'];
} else {
    $cari1 = "";
    $bln = "";
}

if(isset($_POST['thn'])) {
    $cari2 = empty($cari0) && empty($cari1) ? " WHERE year(tgl_daf)='$_POST[thn]'" : " AND year(tgl_daf)='$_POST[thn]'";
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
        <li class="active">member</li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <form id="form1" name="form1" method="post" action="">
                <div class="box">
                    <div class="box-header">
                        <div class="col-md-2"><h3 class="box-title">Laporan member</h3></div>
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
                        <a href="pages/cetak-lap-penumpang.php?thn=<?php echo $thn; ?>&bln=<?php echo $bln; ?>&tgl=<?php echo $tgl; ?>" class="btn btn-info"><i class="fa fa-print"></i> Cetak</a>
                    </div>

                    <div class="box-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nomor Identitas</th>
                                    <th>Nama member</th>
                                    <th>Email</th>
                                    <th>Nomor Telepon</th>
                                    <th>Alamat</th>
                                    <th>Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no=0;
                                $sql=mysqli_query($koneksi,"SELECT * FROM member $cari0 $cari1 $cari2");
                                while($q=mysqli_fetch_array($sql)){
                                    $no++;
                                ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $q['p_no_identitas']; ?></td>
                                    <td><?php echo $q['p_nama']; ?></td>
                                    <td><?php echo $q['email']; ?></td>
                                    <td><?php echo $q['p_nohp']; ?></td>
                                    <td><?php echo $q['p_alamat']; ?></td>
                                    <td><?php echo $q['tgl_daf']; ?></td>
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
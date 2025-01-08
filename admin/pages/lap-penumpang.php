 <?php
error_reporting(0);
include '../../config/koneksi.php';

if(isset($_POST['bln'])) { 
$cari1=" WHERE month(tgl_daf)='$_POST[bln]'";
$bln=$_POST['bln'];
}else { $cari1=""; $bln="";}

if(isset($_POST['thn'])) { $cari2=" AND year(tgl_daf)='$_POST[thn]'";
$thn=$_POST['thn'];
}else { $cari2=""; $thn="";}

?>
  <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Laporan
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="home.php"> Home</a></li>
            <li class="active">member</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
  <!-- Main row -->
          <div class="row">
            <div class="col-xs-12">
          <form id="form1" name="form1" method="post" action="">
              <div class="box">
                <div class="box-header">
                  <div class="col-md-3"><h3 class="box-title">Laporan member</h3></div>
                  <div class="col-md-3">
                   <select name="bln" id="select" class="form-control" onchange="this.form.submit();">
                        <option>-Bulan-</option>
                        <option value="1" <?php if ($bln==1) echo "selected"; else echo ""; ?>>Januari</option>
                        <option value="2" <?php if ($bln==2) echo "selected"; else echo ""; ?>>Februari</option>
                        <option value="3" <?php if ($bln==3) echo "selected"; else echo ""; ?>>Maret</option>
                        <option value="4" <?php if ($bln==4) echo "selected"; else echo ""; ?>>April</option>
                        <option value="5" <?php if ($bln==5) echo "selected"; else echo ""; ?>>Mei</option>
                        <option value="6" <?php if ($bln==6) echo "selected"; else echo ""; ?>>Juni</option>
                        <option value="7" <?php if ($bln==7) echo "selected"; else echo ""; ?>>Juli</option>
                        <option value="8" <?php if ($bln==8) echo "selected"; else echo ""; ?>>Agustus</option>
                        <option value="9" <?php if ($bln==9) echo "selected"; else echo ""; ?>>Sepember</option>
                        <option value="10" <?php if ($bln==10) echo "selected"; else echo ""; ?>>Oktober</option>
                        <option value="11" <?php if ($bln==11) echo "selected"; else echo ""; ?>>November</option>
                        <option value="12" <?php if ($bln==12) echo "selected"; else echo ""; ?>>Desember</option>
                      </select></div>
                     <div class="col-md-2">
                      <select name="thn" id="select" class="form-control" onchange="this.form.submit();">
                      <option>-Tahun-</option>
                        <option value="2013" <?php if ($thn==2013) echo "selected"; else echo ""; ?>>2013</option>
                        <option value="2014" <?php if ($thn==2014) echo "selected"; else echo ""; ?>>2014</option>
                        <option value="2015" <?php if ($thn==2015) echo "selected"; else echo ""; ?>>2015</option>
                        <option value="2016" <?php if ($thn==2016) echo "selected"; else echo ""; ?>>2016</option>
                        <option value="2017" <?php if ($thn==2017) echo "selected"; else echo ""; ?>>2017</option>
                      </select></div>
  <a href="pages/cetak-lap-penumpang.php?thn=<?php echo $thn; ?> && bln=<?php echo $bln; ?>" class="btn btn-info"><i class="fa fa-print"></i> Cetak</a>
                  
                </div><!-- /.box-header -->
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
                    $sql=mysqli_query($koneksi,"SELECT * FROM member $cari1 $cari2");
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
                     <tbody>
                    
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
              </form>
            </div><!-- /.col -->
          </div><!-- /.row -->

     </section><!-- /.content -->
 <?php
error_reporting(0);
include '../../config/koneksi.php';

if(isset($_POST['bln'])) { 
$cari1=" AND month(tgl_b)='$_POST[bln]'";
$bln=$_POST['bln'];
}else { $cari1=""; $bln="";}

if(isset($_POST['thn'])) { $cari2=" AND year(tgl_b)='$_POST[thn]'";
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
            <li class="active">Tiket</li>
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
                  <div class="col-md-3"><h3 class="box-title">Laporan Tiket</h3></div>
                
  <a href="pages/cetak-lap-tiket.php" class="btn btn-info"><i class="fa fa-print"></i> Cetak</a>
                 
                </div><!-- /.box-header -->
                <div class="box-body">
                    
                 <table id="example1" class="table table-bordered table-striped">
                      
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Kode Tiket</th>
                        <th>Jumlah Tiket Dewasa</th>
                        <th>Jumlah Tiket Anak</th>
                        <th>Harga Tiket Dewasa</th>
                        <th>Harga Tiket Anak</th>
                        <th>Tujuan</th>
                        <th>Kapal</th>
                        <th>Nahkoda</th>
                      </tr>
                    </thead>
                   
                    <tbody>
                     <?php
                    include '../../config/koneksi.php';
                      $no=0;
                    $sql=mysqli_query($koneksi,"SELECT tujuan.nama_tujuan,kapal.nama_kapal,nahkoda.nama_nah,tiket. * FROM tiket,nahkoda,tujuan,kapal WHERE tujuan.kode_tujuan=tiket.id_tujuan and kapal.kode_kapal=tiket.id_kapal and nahkoda.kode_nah=tiket.id_nahkoda");
                      while($q=mysqli_fetch_array($sql)){
                        $no++;

                     ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $q['kode_tiket']; ?></td>
                        <td><?php echo $q['jml_tiket_dewasa']; ?></td>
                        <td><?php echo $q['jml_tiket_ank2']; ?></td>
                        <td><?php echo $q['hrg_tiket_dewasa']; ?></td>
                        <td><?php echo $q['hrg_tiket_ank2']; ?></td>
                        <td><?php echo $q['id_tujuan'].'/'.$q['nama_tujuan']; ?></td>
                        <td><?php echo $q['id_kapal'].'/'.$q['nama_kapal']; ?></td>
                        <td><?php echo $q['id_nahkoda'].'/'.$q['nama_nah']; ?></td>
                       
                        </tr>
                      <?php } ?>
                     <tbody>
                    
                  </table>                </div><!-- /.box-body -->
              </div><!-- /.box -->
              </form>
            </div><!-- /.col -->
          </div><!-- /.row -->

     </section><!-- /.content -->
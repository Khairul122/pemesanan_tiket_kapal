 <?php
error_reporting(0);
include '../../config/koneksi.php';

?>
  <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Laporan
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="home.php"> Home</a></li>
            <li class="active">Nahkoda</li>
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
                  <h3 class="box-title">Laporan Nahkoda</h3>
               
                  <a href="pages/cetak-lap-nahkoda.php" class="btn btn-info"><i class="fa fa-print"></i> Cetak semua</a> 
                </div><!-- /.box-header -->
                <div class="box-body">
                    
                  <table class="table table-bordered table-striped"> 
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Kode Nahkoda</th>
                        <th>Nama Nahkoda</th>
                        <th>Nomor Telepon</th>
                        <th>Alamat</th>
                        <th>Umur</th>
                      </tr>
                    </thead>
                   
                    <tbody>
                     <?php
                      $no=0;
                    $sql=mysqli_query($koneksi,"SELECT * FROM nahkoda");
                      while($q=mysqli_fetch_array($sql)){
                        $no++;

                     ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $q['kode_nah']; ?></td>
                        <td><?php echo $q['nama_nah']; ?></td>
                        <td><?php echo $q['nohp']; ?></td>
                        <td><?php echo $q['alm']; ?></td>
                        <td><?php echo $q['umur']; ?></td>
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
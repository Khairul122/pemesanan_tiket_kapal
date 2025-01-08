  <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Keberangkatan
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="home.php"> Home</a></li>
            <li class="active">Tambah keberangkatan</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
  <!-- Main row -->
          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Form keberangkatan</h3>
                 
                </div><!-- /.box-header -->
                <div class="box-body">
                 <?php 
                            include './config/koneksi.php';

                            $auto="001";
                                  $read=mysqli_query($koneksi,"select right(id_berangkat,3) from berangkat order by id_berangkat desc");
                                  if ($rec=mysqli_fetch_array($read)){
                                  $auto=$rec[0]+1;
                                  if ($auto<100) $auto="0".$auto;
                                  if ($auto<10) $auto="0".$auto;
                                  }
                                  $_POST['id']="IB-K".$auto;

                            if(isset($_POST['b1'])){

                            if(empty($_POST['idt']) or empty($_POST['ns']) or empty($_POST['jmlp']) or empty($_POST['tglb'])){

                            echo '<div class="alert alert-warning alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Error!</strong> Data tidak boleh ada yang kosong.
                                  </div>';

                            }else{
                                $sql=mysqli_query($koneksi,"INSERT INTO berangkat values ('$_POST[id]','$_POST[idt]','$_POST[ns]','$_POST[jmlp]','$_POST[tglb]','P')");


                                 echo '<div class="alert alert-success alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Sukses!</strong> Keberangkatan berhasil ditambah.
                                  </div>';
                            }
                            }
                            ?>
                     <form id="contactForm" action="" method="post">
                     <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                     <label>ID Keberangkatan</label>
                                        <input type="text" name="id" class="form-control" maxlength="100" value="<?php echo $_POST['id']; ?>" readonly>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-lg-12 ">
                                    <label>Tiket Berangkat</label>
                                       <select name="idt" id="select" class="form-control">
                                        <option value="">-Tiket Yang berangkat-</option>
                                        <?php  

                                        $sql=mysqli_query($koneksi,"SELECT tujuan.nama_tujuan,tujuan.kode_tujuan,kapal.nama_kapal,tiket. * FROM tiket,tujuan,kapal WHERE kapal.kode_kapal=tiket.id_kapal and tujuan.kode_tujuan=tiket.id_tujuan");
                                            while($q=mysqli_fetch_array($sql)){

                                                   ?>
                                        <option value="<?php echo $q['kode_tiket']; ?>"><?php echo $q['kode_tiket'].' / '.$q['nama_tujuan'] .' / '.$q['nama_kapal'].' / '.$q['tgl_b']; ?></option>
                                        <?php } ?>
                                      </select>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-lg-12 ">
                                    <label>Nomor surat izin</label>
                                       <input type="text" name="ns" class="form-control" maxlength="100" value="" placeholder="Nomor surat izin">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-6">
                                     <label>Jumlah member</label>
                                        <input type="text" name="jmlp" class="form-control" maxlength="100" value="" placeholder="Jumlah member">
                                    </div>
                                     <div class="col-lg-6 ">
                                    <label>Tanggal Berangkat</label>
                                         <div class="input-group date" id="datepicker">
                                          <input type="text" name="tglb" class="form-control" placeholder="Tanggal Berangkat">
                                           <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                          </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                      
                           <div class="row">
                                <div class="col-md-6">
                                    <input type="submit" name="b1" data-loading-text="Loading..." class="btn btn-primary" value="Tambah Keberangkatan">
                               
                          
                                
                                    <a href="home.php?p=keberangkatan" class="btn btn-success"> Kembali </a>
                                </div>
                            </div>
                        </form>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

     </section><!-- /.content -->

     <script src="../assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <!-- Bootstrap 3.3.5 -->
    <script src="../assets/js/bootstrap.min.js"></script>
     <!-- DataTables -->
     
     
     <script src="../assets/js/jQuery.js"></script>
            <script src="../assets/js/moment.js"></script>

     <script src="../assets/js/bootstrap-datetimepicker.min.js"></script>
     <script type="text/javascript">
      $(function () {
        
        $('#datepicker').datetimepicker({
                                  
          format: 'YYYY-MM-DD HH:mm',
        });
       
      });
    </script>
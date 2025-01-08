

  <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Tiket
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="home.php"> Home</a></li>
            <li class="active">Tambah Tiket</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
  <!-- Main row -->
          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Form Tiket</h3>
                 
                </div><!-- /.box-header -->
                <div class="box-body">
                 <?php 
                            include './config/koneksi.php';

                             $auto="001";
                                  $read=mysqli_query($koneksi,"select right(kode_tiket,3) from tiket order by kode_tiket desc");
                                  if ($rec=mysqli_fetch_array($read)){
                                  $auto=$rec[0]+1;
                                  if ($auto<100) $auto="0".$auto;
                                  if ($auto<10) $auto="0".$auto;
                                  }
                                  $_POST['id']="KTKB-T".$auto;

                            if(isset($_POST['b1'])){

                            if(empty($_POST['kd']) or empty($_POST['tj']) or empty($_POST['kp']) or empty($_POST['nh']) or empty($_POST['hrga']) or empty($_POST['hrgd']) or empty($_POST['jmla']) or empty($_POST['jmld'])or empty($_POST['tb']) or empty($_POST['ttb'])){

                            echo '<div class="alert alert-warning alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Error!</strong> Data tidak boleh ada yang kosong.
                                  </div>';

                            }else{
                                $sql=mysqli_query($koneksi,"INSERT INTO tiket values ('$_POST[kd]','$_POST[jmld]','$_POST[jmla]','$_POST[tj]','$_POST[kp]','$_POST[nh]','$_POST[hrga]','$_POST[hrgd]','$_POST[tb]','$_POST[ttb]')");
                                

                                 echo '<div class="alert alert-success alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Sukses!</strong> Tiket berhasil ditambah.
                                  </div>';
                            }
                            }
                            ?>
                     <form id="contactForm" action="" method="post">
                             <div class="row">
                                <div class="form-group">
                                    <div class="col-md-6">
                                     <label>Kode Tiket</label>
                                        <input type="text" name="kd" class="form-control" maxlength="100" value="<?php echo $_POST[id]; ?>" placeholder="Kode tiket" readonly>
                                    </div>
                                      <div class="col-lg-6 ">
                                    <label>Tujuan</label>
                                       <select name="tj" id="select" class="form-control">
                                        <option value="">-Tujuan-</option>
                                        <?php  

                                        $sql=mysqli_query($koneksi,"SELECT * FROM tujuan");
                                            while($q=mysqli_fetch_array($sql)){

                                                   ?>
                                        <option value="<?php echo $q['kode_tujuan']; ?>"><?php echo $q['nama_tujuan']; ?></option>
                                        <?php } ?>
                                      </select>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group">
                                   <div class="col-lg-6 ">
                                    <label>Nahkoda</label>
                                       <select name="nh" id="select" class="form-control">
                                        <option value="">-Nahkoda-</option>
                                        <?php  

                                        $sql=mysqli_query($koneksi,"SELECT * FROM nahkoda");
                                            while($q=mysqli_fetch_array($sql)){

                                                   ?>
                                        <option value="<?php echo $q['kode_nah']; ?>"><?php echo $q['nama_nah']; ?></option>
                                        <?php } ?>
                                      </select>
                                    </div>
                                    <div class="col-lg-6 ">
                                    <label>Kapal</label>
                                       <select name="kp" id="select" class="form-control">
                                        <option value="">-Kapal-</option>
                                        <?php  

                                        $sql=mysqli_query($koneksi,"SELECT * FROM kapal");
                                            while($q=mysqli_fetch_array($sql)){

                                                   ?>
                                        <option value="<?php echo $q['kode_kapal']; ?>"><?php echo $q['nama_kapal']; ?></option>
                                        <?php } ?>
                                      </select>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group">
                                   
                                    <div class="col-lg-6 ">
                                   <label>Jumlah Tiket Dewasa</label>
                                        <input type="text" name="jmld" class="form-control" maxlength="100" value="" placeholder="Jumlah Tiket Dewasa">
                                    </div>
                                     <div class="col-md-6">
                                     <label>Harga Tiket Dewasa</label>
                                        <input type="text" name="hrgd" class="form-control" maxlength="100" value="" placeholder="Tiket Dewasa">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-lg-6 ">
                                    <label>Jumlah Tiket Anak-anak</label>
                                     <input type="text" name="jmla" class="form-control" maxlength="100" value="" placeholder="Jumlah Tiket anak">
                                    </div>
                                    <div class="col-lg-6 ">
                                   <label>Harga Tiket Anak-anak</label>
                                        <input type="text" name="hrga" class="form-control" maxlength="100" value="" placeholder="Tiket Anak">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group">
                                   
                                </div>
                            </div>
                           <br>
                           <div class="row">
                                <div class="form-group">
                                    <div class="col-lg-6 ">
                                    <label>Jam Berangkat</label>
                                         <div class="input-group date">
                                          <input type="text" name="tb" class="form-control" placeholder="Jam Berangkat" id="datepicker">
                                           <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                          </div>
                                    </div>
                                   
                                    <div class="col-lg-6 ">
                                   <label>Jam Tiba</label>
                                       <div class="input-group date">
                                          <input type="text" name="ttb" class="form-control" placeholder="Jam Tiba" id="datepicker2">
                                           <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                          </div>
                                    </div>
                                </div>
                            </div>

                            <br>
                           <div class="row">
                                <div class="col-md-12">
                                    <input type="submit" name="b1" data-loading-text="Loading..." class="btn btn-primary" value="Tambah tiket">
                                     <a href="home.php?p=tiket" class="btn btn-success"> Kembali </a>
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
                                  
          format: 'HH:mm',
        });
        
        $('#datepicker2').datetimepicker({
           format: 'HH:mm',
        });
      });
    </script>
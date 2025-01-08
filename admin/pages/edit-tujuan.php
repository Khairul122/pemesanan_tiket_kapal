  <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Tujuan
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="home.php"> Home</a></li>
            <li class="active">Edit Tujuan</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
  <!-- Main row -->
          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Form Tujuan</h3>
                 
                </div><!-- /.box-header -->
                <div class="box-body">
                 <?php 
                            include './config/koneksi.php';

                            if(isset($_POST['b1'])){

                                
                            if(empty($_POST['nm']) or empty($_POST['lm'])){

                            echo '<div class="alert alert-warning alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Error!</strong> Data tidak boleh ada yang kosong.
                                  </div>';

                            }else{
                                 $sql=mysqli_query($koneksi,"UPDATE tujuan SET nama_tujuan='$_POST[nm]',lama_tujuan='$_POST[lm]' WHERE kode_tujuan='$_POST[kd]'");
                                

                                 echo '<div class="alert alert-success alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Sukses!</strong> Tujuan berhasil diedit.
                                  </div>';
                            }
                            }
                            ?>
                     <form id="contactForm" action="" method="post">
                      <?php  
                                     
                      $id=$_GET['id'];
                      $sqps=mysqli_query($koneksi,"SELECT * FROM tujuan where kode_tujuan='$id'");
                      $ps=mysqli_fetch_array($sqps);

                      ?>
                     <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                     <label>Kode Tujuan</label>
                                        <input type="text" name="kd" class="form-control" maxlength="100" value="<?php echo $_GET['id']; ?>" placeholder="Kode Tujuan" readonly>
                                    </div>
                                     
                                </div>
                            </div>
                            <br>
                             <div class="row">
                                <div class="form-group">
                                    <div class="col-md-6">
                                     <label>Nama Tujuan</label>
                                        <input type="text" name="nm" class="form-control" maxlength="100" value="<?php echo $ps['nama_tujuan']; ?>" placeholder="Nama Tujuan">
                                    </div>
                                      <div class="col-lg-6 ">
                                        <label>Lama Tujuan</label>
                                        <input type="text" name="lm" class="form-control" maxlength="100" value="<?php echo $ps['lama_tujuan']; ?>" placeholder="Lama tujuan">
                                    </div>
                                </div>
                            </div>
                            <br>
                           
                              <br>
                           <div class="row">
                                <div class="col-md-12">
                                    <input type="submit" name="b1" data-loading-text="Loading..." class="btn btn-primary" value="Edit Tujuan">
                                     <a href="home.php?p=tujuan" class="btn btn-success"> Kembali </a>
                                </div>
                            </div>
                        </form>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

     </section><!-- /.content -->
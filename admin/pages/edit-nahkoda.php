  <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Nahkoda
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="home.php"> Home</a></li>
            <li class="active">Edit Nahkoda</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
  <!-- Main row -->
          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Form Nahkoda</h3>
                 
                </div><!-- /.box-header -->
                <div class="box-body">
                 <?php 
                            include './config/koneksi.php';

                            if(isset($_POST['b1'])){

                                
                            if(empty($_POST['id']) or empty($_POST['nm']) or empty($_POST['hp']) or empty($_POST['alm']) or empty($_POST['umr'])){

                            echo '<div class="alert alert-warning alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Error!</strong> Data tidak boleh ada yang kosong.
                                  </div>';

                            }else{
                               $sql=mysqli_query($koneksi,"UPDATE nahkoda SET nama_nah='$_POST[nm]',nohp='$_POST[hp]',alm='$_POST[alm]',umur='$_POST[umr]' WHERE kode_nah='$_POST[id]'");
                                

                                 echo '<div class="alert alert-success alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Sukses!</strong> Nahkoda berhasil diedit.
                                  </div>';
                            }
                            }
                            ?>
                     <form id="contactForm" action="" method="post">
                      <?php  
                                     
                      $id=$_GET['id'];
                      $sqps=mysqli_query($koneksi,"SELECT * FROM nahkoda where kode_nah='$id'");
                      $ps=mysqli_fetch_array($sqps);

                      ?>
                       <div class="row">
                                <div class="form-group">
                                    <div class="col-md-6">
                                     <label>Kode Nahkoda</label>
                                        <input type="text" name="id" class="form-control" maxlength="100" value="<?php echo $_GET['id']; ?>" placeholder="Kode Nahkoda" readonly>
                                    </div>
                                    <div class="col-md-6">
                                     <label>Nama Nahkoda</label>
                                        <input type="text" name="nm" class="form-control" maxlength="100" value="<?php echo $ps['nama_nah']; ?>" placeholder="Nama Nahkoda">
                                    </div>
                                </div>
                            </div>
                            <br>
                             <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                     <label>Nomor Handphone</label>
                                        <input type="text" name="hp" class="form-control" maxlength="100" value="<?php echo $ps['nohp']; ?>" placeholder="Nomor telepon">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-lg-12 ">
                                   <label>Alamat</label>
                                       <textarea class="form-control" name="alm" rows="5" cols="50" data-msg-required="Please enter your alamat." maxlength="5000" placeholder="Alamat"><?php echo $ps['alm']; ?></textarea>
                                    </div>
                                
                                </div>
                            </div>
                             <div class="row">
                                <div class="form-group">
                                    <div class="col-lg-12 ">
                                        <label>Umur</label>
                                        <input type="text" name="umr" class="form-control" maxlength="100" value="<?php echo $ps['umur']; ?>" placeholder="Umur">
                                    </div>
                                
                                </div>
                            </div>
                              <br>
                           <div class="row">
                                <div class="col-md-12">
                                    <input type="submit" name="b1" data-loading-text="Loading..." class="btn btn-primary" value="Edit Nahkoda">
                                     <a href="home.php?p=nahkoda" class="btn btn-success"> Kembali </a>
                                </div>
                            </div>
                        </form>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

     </section><!-- /.content -->
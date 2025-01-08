  <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Kapal
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="home.php"> Home</a></li>
            <li class="active">Edit Kapal</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
  <!-- Main row -->
          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Form Kapal</h3>
                 
                </div><!-- /.box-header -->
                <div class="box-body">
                 <?php 
                            include './config/koneksi.php';

                            if(isset($_POST['b1'])){

                                
                            if(empty($_POST['id']) or empty($_POST['nm']) or empty($_POST['thr']) or empty($_POST['ik'])){

                            echo '<div class="alert alert-warning alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Error!</strong> Data tidak boleh ada yang kosong.
                                  </div>';

                            }else{

                               $tmpf=$_FILES['ftb']['tmp_name'];
                              $nmf=$_FILES['ftb']['name'];

                              if(empty($nmf)){
                                $ft=$_POST['ftl'];
                              }
                              else{
                              move_uploaded_file($tmpf,"../assets/images/kapal/".$nmf);
                              $ft=$nmf;
                            }

                             

                             $sql=mysqli_query($koneksi,"UPDATE kapal SET nama_kapal='$_POST[nm]',rakit_kapal='$_POST[thr]',izin_kapal='$_POST[ik]',ft_kapal='$ft' WHERE kode_kapal='$_POST[id]'");
                                
                                 

                                 echo '<div class="alert alert-success alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Sukses!</strong> Kapal berhasil diedit.
                                  </div>';
                            }
                            }
                            ?>
                     <form action="" method="post" enctype="multipart/form-data">
                      <?php  
                                     
                      $id=$_GET['id'];
                      $sqps=mysqli_query($koneksi,"SELECT * FROM kapal where kode_kapal='$id'");
                      $ps=mysqli_fetch_array($sqps);

                      ?>
                             <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                     <label>Kode Kapal</label>
                                        <input type="text" name="id" class="form-control" maxlength="100" value="<?php echo $_GET['id']; ?>" placeholder="Kode Kapal" readonly>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-lg-6 ">
                                        <label>Nama Kapal</label>
                                        <input type="text" name="nm" class="form-control" maxlength="100" value="<?php echo $ps['nama_kapal']; ?>" placeholder="Nama Kapal">
                                    </div>
                                    <div class="col-lg-6 ">
                                      <label>TH Rakitan</label>
                                        <input type="text" name="thr" class="form-control" maxlength="100" value="<?php echo $ps['rakit_kapal']; ?>" placeholder="Tahun Rakitan">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group"> 
                                  <div class="col-lg-12 ">
                                       <label>Izin Kapal</label>
                                        <input type="text" name="ik" class="form-control" maxlength="100" value="<?php echo $ps['izin_kapal']; ?>" placeholder="Izin Kapal">
                                    </div>
                                  </div>
                              </div>
                            <br>
                             <div class="row">
                                <div class="form-group"> 
                                  <div class="col-lg-12 ">
                                       <label>Foto Kapal</label>
                                        <input type="hidden" name="ftl" class="form-control" maxlength="100" value="<?php echo $ps['ft_kapal']; ?>">
                                        <div class="foto-kapal"><img src="../assets/images/kapal/<?php echo $ps['ft_kapal']; ?>" style="max-width: 150px;max-width: 250px; margin-bottom: 10px;" class="img-thumbnail"></div>
                                        
                                         <input type="file" name="ftb" class="form-control" maxlength="100" value="" placeholder="Input file Foto">
                                    </div>
                                  </div>
                              </div>
                              <br>
                           <div class="row">
                                <div class="col-md-12">
                                    <input type="submit" name="b1" data-loading-text="Loading..." class="btn btn-primary" value="Edit Kapal">
                                     <a href="home.php?p=kapal" class="btn btn-success"> Kembali </a>
                                </div>
                            </div>
                        </form>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

     </section><!-- /.content -->
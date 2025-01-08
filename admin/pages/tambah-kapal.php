  <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Kapal
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="home.php"> Home</a></li>
            <li class="active">Tambah Kapal</li>
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

                            $auto="001";
                                  $read=mysqli_query($koneksi,"select right(kode_kapal,3) from kapal order by kode_kapal desc");
                                  if ($rec=mysqli_fetch_array($read)){
                                  $auto=$rec[0]+1;
                                  if ($auto<100) $auto="0".$auto;
                                  if ($auto<10) $auto="0".$auto;
                                  }
                                  $_POST['id']="KK-A".$auto;

                            if(isset($_POST['b1'])){


                                
                            if(empty($_POST['id']) or empty($_POST['nm']) or empty($_POST['thr']) or empty($_POST['ik'])){

                            echo '<div class="alert alert-warning alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Error!</strong> Data tidak boleh ada yang kosong.
                                  </div>';

                            }else{

                              $tmpf=$_FILES['ft']['tmp_name'];
                              $nmf=$_FILES['ft']['name'];
                              move_uploaded_file($tmpf,"../assets/images/kapal/".$nmf);

                                $sql4d=mysqli_query($koneksi,"INSERT INTO kapal values ('$_POST[id]','$_POST[nm]','$_POST[thr]','$_POST[ik]','$_POST[jk]','$nmf')");
                                

                                 echo '<div class="alert alert-success alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Sukses!</strong> Kapal berhasil ditambah.
                                  </div>';
                            }
                            }
                            ?>
                     <form id="contactForm" action="" method="post" enctype="multipart/form-data">
                             <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                     <label>Kode Kapal</label>
                                        <input type="text" name="id" class="form-control" maxlength="100" value="<?php echo $_POST[id]; ?>" placeholder="Kode Kapal" readonly>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-lg-6 ">
                                        <label>Nama Kapal</label>
                                        <input type="text" name="nm" class="form-control" maxlength="100" value="" placeholder="Nama Kapal">
                                    </div>
                                    <div class="col-lg-6 ">
                                      <label>TH Rakitan</label>
                                        <input type="text" name="thr" class="form-control" maxlength="100" value="" placeholder="Tahun Rakitan">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group"> 
                                  <div class="col-lg-6 ">
                                       <label>IZIN KAPAL</label>
                                        <input type="text" name="ik" class="form-control" maxlength="100" value="" placeholder="Izin Kapal">
                                    </div>
                                  
                                  <div class="col-lg-6 ">
                                       <label>Jumlah Kursi</label>
                                        <input type="text" name="jk" class="form-control" maxlength="100" value="" placeholder="Jumlah Kursi">
                                    </div>
                                 </div>
                              </div>
                            <br>
                             <div class="row">
                                <div class="form-group"> 
                                  <div class="col-lg-12 ">
                                       <label>FOTO KAPAL</label>
                                        <input type="file" name="ft" class="form-control" maxlength="100" value="" placeholder="INPUT FILE FOTO">
                                    </div>
                                  </div>
                              </div>
                              <br>
                           <div class="row">
                                <div class="col-md-12">
                                    <input type="submit" name="b1" data-loading-text="Loading..." class="btn btn-primary" value="Tambah Kapal">
                                     <a href="home.php?p=kapal" class="btn btn-success"> Kembali </a>
                                </div>
                            </div>
                        </form>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

     </section><!-- /.content -->
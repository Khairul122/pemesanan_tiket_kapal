  <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Kursi
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="home.php"> Home</a></li>
            <li class="active">Edit Kursi</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
  <!-- Main row -->
          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Form Kursi</h3>
                 
                </div><!-- /.box-header -->
                <div class="box-body">
                 <?php 
                            include './config/koneksi.php';

                            if(isset($_POST['b1'])){

                                
                            if(empty($_POST['idk']) or empty($_POST['nk'])){

                            echo '<div class="alert alert-warning alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Error!</strong> Data tidak boleh ada yang kosong.
                                  </div>';

                            }else{
                                 $sql=mysqli_query($koneksi,"UPDATE kursi SET nok='$_POST[nk]',id_kapal='$_POST[idk]' WHERE idk='$_POST[kd]'");
                                

                                 echo '<div class="alert alert-success alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Sukses!</strong> Kursi berhasil diedit.
                                  </div>';
                            }
                            }
                            ?>
                     <form id="contactForm" action="" method="post">
                      <?php  
                                     
                      $id=$_GET['id'];
                      $sqps=mysqli_query($koneksi,"SELECT * FROM kursi where idk='$id'");
                      $ps=mysqli_fetch_array($sqps);
                      $idk=$ps['id_kapal'];

                      ?>
                     <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                     <label>ID Kursi</label>
                                        <input type="text" name="kd" class="form-control" maxlength="100" value="<?php echo $_GET['id']; ?>" placeholder="Kode Kursi" readonly>
                                    </div>
                                     
                                </div>
                            </div>
                            <br>
                             <div class="row">
                                <div class="form-group">
                                    <div class="col-lg-6 ">
                                    <label>Kapal</label>
                                       <select name="idk" id="select" class="form-control">
                                        <?php  

                                        $sql=mysqli_query($koneksi,"SELECT * FROM kapal");
                                            while($q=mysqli_fetch_array($sql)){

                                                   ?>
                                        <option value="<?php echo $q['kode_kapal']; ?>" <?php if ($idk==$q['kode_kapal']) echo "selected"; else echo ""; ?>><?php echo $q['nama_kapal']; ?></option>
                                        <?php } ?>
                                      </select>
                                    </div>
                                      <div class="col-lg-6 ">
                                        <label>Nomor Kursi</label>
                                        <input type="text" name="nk" class="form-control" maxlength="100" value="<?php echo $ps['nok']; ?>" placeholder="Nomor Kursi">
                                    </div>
                                </div>
                            </div>
                            <br>
                           
                              <br>
                           <div class="row">
                                <div class="col-md-12">
                                    <input type="submit" name="b1" data-loading-text="Loading..." class="btn btn-primary" value="Edit Kursi">
                                     <a href="home.php?p=kursi" class="btn btn-success"> Kembali </a>
                                </div>
                            </div>
                        </form>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

     </section><!-- /.content -->
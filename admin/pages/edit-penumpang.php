  <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            member
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="home.php"> Home</a></li>
            <li class="active">Edit peumpang</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
  <!-- Main row -->
          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Form member</h3>
                 
                </div><!-- /.box-header -->
                <div class="box-body">
                 <?php 
                            include './config/koneksi.php';

                            if(isset($_POST['b1'])){

                                
                            if(empty($_POST['id']) or empty($_POST['nm']) or empty($_POST['umr']) or empty($_POST['hp']) or empty($_POST['alm']) or empty($_POST['user']) or empty($_POST['pas'])){

                            echo '<div class="alert alert-warning alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Error!</strong> Data tidak boleh ada yang kosong.
                                  </div>';

                            }else{
                               $sql=mysqli_query($koneksi,"UPDATE member SET p_nama='$_POST[nm]',email='$_POST[umr]',p_nohp='$_POST[hp]',p_alamat='$_POST[alm]',user='$_POST[user]',pass='$_POST[pas]',tgl_daf=NOW() WHERE p_no_identitas='$_POST[id]'");
                                

                                 echo '<div class="alert alert-success alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Sukses!</strong> member berhasil diedit.
                                  </div>';
                            }
                            }
                            ?>
                     <form id="contactForm" action="" method="post">
                      <?php  
                                     
                      $id=$_GET['id'];
                      $sqps=mysqli_query($koneksi,"SELECT * FROM member where p_no_identitas='$id'");
                      $ps=mysqli_fetch_array($sqps);

                      ?>
                             <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                     <label>Nomor Identitas</label>
                                        <input type="text" name="id" class="form-control" maxlength="100" value="<?php echo $_GET['id']; ?>" placeholder="No Identitas" readonly>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-lg-6 ">
                                        <label>Nama Lengkap</label>
                                        <input type="text" name="nm" class="form-control" maxlength="100" value="<?php echo $ps['p_nama']; ?>" placeholder="Nama Lengkap">
                                    </div>
                                    <div class="col-lg-6 ">
                                      <label>Email</label>
                                        <input type="text" name="umr" class="form-control" maxlength="100" value="<?php echo $ps['email']; ?>" placeholder="Email">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group"> 
                                  <div class="col-lg-12 ">
                                       <label>Nomor Telepon</label>
                                        <input type="text" name="hp" class="form-control" maxlength="100" value="<?php echo $ps['p_nohp']; ?>" placeholder="Nomor Handphone">
                                    </div>
                                    </div>
                                    </div>
                                    <br>
                            <div class="row">
                                <div class="form-group">
                                   
                                    <div class="col-lg-12 ">
                                   <label>Alamat</label>
                                       <textarea class="form-control" name="alm" rows="5" cols="50" data-msg-required="Please enter your alamat." maxlength="5000" placeholder="Alamat"><?php echo $ps['p_alamat']; ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <br>
                         
                           <div class="row">
                                <div class="form-group">
                                    <div class="col-lg-6 ">
                                    <label>Username</label>
                                        <input type="text" name="user" class="form-control" maxlength="100" value="<?php echo $ps['user']; ?>" placeholder="Username">
                                    </div>
                                   
                                    <div class="col-lg-6 ">
                                   <label>Password</label>
                                        <input type="text" name="pas" class="form-control" maxlength="100" value="<?php echo $ps['pass']; ?>" placeholder="Password">
                                    </div>
                                </div>
                            </div>
                            <br>
                           <div class="row">
                                <div class="col-md-12">
                                    <input type="submit" name="b1" data-loading-text="Loading..." class="btn btn-primary" value="Edit member">
                                     <a href="home.php?p=penumpang" class="btn btn-success"> Kembali </a>
                                </div>
                            </div>
                        </form>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

     </section><!-- /.content -->
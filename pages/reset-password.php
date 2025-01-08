
<!--start wrapper-->
    <section class="wrapper">
        <section class="page_head">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="page_title">
                            <h2>Ganti Password</h2>
                           
                        </div>
                        <nav id="breadcrumbs">
                            <ul>
                                <li>You are here:</li>
                                <li><a href="index.php">Home</a></li>
                                <li>Ganti Password</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <section class="content contact">
            <div class="container">
                <div class="row sub_content">
                    <div class="col-lg-8 col-md-8 col-md-offset-2">
                    <div class="lupa-password">
                        <div class="dividerHeading">
                            <h4><span>Ganti Password</span></h4>
                        </div>
                         <?php 
                            include './config/koneksi.php';

                            if(isset($_POST['b1'])){

                                $id=$_GET['id'];
                                
                            if(empty($id) or empty($_POST['user']) or empty($_POST['pass'])){

                            echo '<div class="alert alert-warning alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Error!</strong> Data masih kosong, atau terjadi kesalahan.
                                  </div>';

                            }else{
                            $pass=md5($_POST['pass']);

                                $sql=mysqli_query($koneksi,"UPDATE member SET user='$_POST[user]',pass='$pass' WHERE p_no_identitas='$id'");

                                if($sql){
                                    echo '<div class="alert alert-success alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Sukses!</strong> Password berhasil dirubah, Silahkan login dengan password baru.
                                  </div>';

                                  

                                }else{
                                    echo '<div class="alert alert-danger alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Error!</strong> Password gagal dirubah.
                                  </div>'; 
                                }
                            }
                            }
                            ?>
                        <form id="contactForm" action="" method="post">
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-lg-12 ">
                                    <label>Username Baru</label>
                                        <input type="text" id="name" name="user" class="form-control" maxlength="100" data-msg-required="Please enter your Username." value="" placeholder="Username" >
                                    </div>
                                   
                                </div>
                            </div>
                               <div class="row">
                                <div class="form-group">
                                    <div class="col-lg-12 ">
                                    <label>Password Baru</label>
                                        <input type="Password" id="name" name="pass" class="form-control" maxlength="100" data-msg-required="Please enter your Password." value="" placeholder="Password" >
                                    </div>
                                   
                                </div>
                            </div>
                          
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="submit" name="b1" data-loading-text="Loading..." class="btn btn-default btn-lg" value="Ganti Password">
                                </div>
                            </div>
                        </form>
                        <br>
                        <p>
                    </div>
                    </div>
                    
                </div>
            </div>
        </section>
    </section>
    <!--end wrapper-->
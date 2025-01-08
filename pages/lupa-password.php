
<!--start wrapper-->
    <section class="wrapper">
        <section class="page_head">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="page_title">
                            <h2>Lupa Password</h2>
                           
                        </div>
                        <nav id="breadcrumbs">
                            <ul>
                                <li>You are here:</li>
                                <li><a href="index.php">Home</a></li>
                                <li>Lupa Password</li>
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
                       
                            <h4><span>Lupa Password</span></h4>
                        </div>
                         <?php 
                            include './config/koneksi.php';

                            if(isset($_POST['b1'])){

                                $sql=mysqli_query($koneksi,"SELECT * FROM member where email='$_POST[email]'");
                                $q=mysqli_fetch_array($sql);
                                $cek=mysqli_num_rows($sql);
                                
                            if(empty($_POST['email'])){

                            echo '<div class="alert alert-warning alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Error!</strong> Email masih kosong.
                                  </div>';
                            }else if(empty($cek)){

                                echo '<div class="alert alert-warning alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Error!</strong> Email anda tidak terdaftar.
                                  </div>';

                            }else{
                                  require_once('library/PHPMailerAutoload.php'); //menginclude librari phpmailer
                                    $mail             = new PHPMailer();
                                    $body             = 
                                    "<body style='margin: 10px;'>
                                    <div style='width: 640px; font-family: Helvetica, sans-serif; font-size: 13px; padding:10px; line-height:150%; border:#eaeaea solid 10px;'>
                                    <br>
                                    <strong>Silahkan klik url konfirmasi untuk mengganti password anda</strong><br>
                                    <b>URL Konfirmasi : </b>http://localhost/pemesanan_tiket_kapal/index.php?p=reset-password&id=".$q['p_no_identitas']."<br>
                                    <br>
                                    </div>
                                    </body>";
                                    
                                    $mail->IsSMTP();  // menggunakan SMTP
                                    //$mail->SMTPDebug  = 1;   // mengaktifkan debug SMTP
                                
                                    $mail->SMTPAuth   = true;   // mengaktifkan Autentifikasi SMTP
                                    $mail->Host   = 'mail.smtp2go.com'; // host sesuaikan dengan hosting mail anda
                                    $mail->Port       = 2525;  // post gunakan port 25
                                    $mail->Username   = "sarlina"; // username email akun
                                    $mail->Password   = "170p317123";        // password akun
                                
                                    $mail->SetFrom('Esarlina2309@gmail.com', 'Hello');
                                
                                    $mail->Subject    = "Reset Password Tiket Kapal";
                                    $mail->MsgHTML($body);
                                
                                    $address = $_POST['email']; //email tujuan
                                    $mail->AddAddress($address, "Hello ".$q['p_nama']);
                                
                                    if(!$mail->Send()) {

                                         echo '<div class="alert alert-warning alert-dismissible fade in" role="alert">
                                                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                              <span aria-hidden="true">×</span></button>
                                                              <strong>Error!</strong> Gagal mengirim Link konfirmasi, cobalah beberapa saat lagi.
                                                              </div>';
                                        
                                    } else {
                                         echo '<div class="alert alert-success alert-dismissible fade in" role="alert">
                                                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                              <span aria-hidden="true">×</span></button>
                                                              <strong>Sukses!</strong> Berhasil mengirim link konfirmasi, silahkan buka email anda untuk konfimasi reset password.
                                                              </div>';
                                    }
        
                            }
                            }
                            ?>
                        <form id="contactForm" action="" method="post">
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-lg-12 ">
                                    <label>Email anda</label>
                                        <input type="email" id="name" name="email" class="form-control" maxlength="100" data-msg-required="Please enter your EMail." value="" placeholder="Email" >
                                    </div>
                                   
                                </div>
                            </div>
                          
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="submit" name="b1" data-loading-text="Loading..." class="btn btn-default btn-lg" value="Kirim Konfirmasi">
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
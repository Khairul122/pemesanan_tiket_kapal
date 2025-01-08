<!--start wrapper-->
    <section class="wrapper">
        <section class="page_head">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="page_title">
                            <h2>Kontak</h2>
                           
                        </div>
                        <nav id="breadcrumbs">
                            <ul>
                                <li>You are here:</li>
                                <li><a href="index.php">Home</a></li>
                                <li>Kontak</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <section class="content contact">
            <div class="container">
                <div class="row sub_content">
                    <div class="col-lg-8 col-md-8 col-sm-8">
                        <div class="dividerHeading">
                            <h4><span>Kirim pesan</span></h4>
                        </div>
                        <p>Jika anda ada keluhan atau saran untuk kami silahkan anda kirim pesan dibawah ini.</p>
                            
                         <?php 
                            include './config/koneksi.php';

                            if(isset($_POST['b1'])){

                                $auto="001";
                                  $read=mysqli_query($koneksi,"select right(idi,3) from inbox order by idi desc");
                                  if ($rec=mysqli_fetch_array($read)){
                                  $auto=$rec[0]+1;
                                  if ($auto<100) $auto="0".$auto;
                                  if ($auto<10) $auto="0".$auto;
                                  }
                                  $_POST['id']="PI".$auto;
                                
                            if(empty($_POST['nm']) or empty($_POST['sub']) or empty($_POST['isi'])){

                            echo '<div class="alert alert-warning alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Error!</strong> Data tidak boleh ada yang kosong.
                                  </div>';

                            }else{
                                $sql=mysqli_query($koneksi,"INSERT INTO inbox values ('$_POST[id]','$_POST[nm]','$_POST[sub]','$_POST[isi]',NOW())");
                                
                           echo '<div class="alert alert-success alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Sukses!</strong> Pesan anda berhasil di kirim.
                                  </div>';
                               
                            }
                            }
                            ?>
                        <form id="contactForm" action="" method="post">
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-lg-12 ">
                                        <input type="text" id="name" name="nm" class="form-control" maxlength="100" data-msg-required="Please enter your name." value="" placeholder="Nama lengkap" >
                                    </div>
                                
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="text" id="subject" name="sub" class="form-control" maxlength="100" data-msg-required="Please enter the subject." value="" placeholder="Subjek pesan">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <textarea id="message" class="form-control" name="isi" rows="6" cols="50" data-msg-required="Please enter your message." maxlength="5000" placeholder="Pesan"></textarea>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="submit" name="b1" data-loading-text="Loading..." class="btn btn-default btn-lg" value="Kirim pesan">
                                </div>
                            </div>
                        </form>
                    </div>
                    
                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <div class="sidebar">
                            <div class="widget_info">
                                <div class="dividerHeading">
                                    <h4><span>Kontak kami</span></h4>
                                    </div>
                                <p>Anda dapat mengunjungi atau menghubungi kami melalui kontak dibawah ini.</p>
                                <ul class="widget_info_contact">
                                    <li><i class="fa fa-map-marker"></i> <p><strong>Address</strong>: Padang</p></li>
                                    <li><i class="fa fa-user"></i> <p><strong>Phone</strong>:(+91) 9000-12345</p></li>
                                    <li><i class="fa fa-envelope"></i> <p><strong>Email</strong>: <a href="#">mail@example.com</a></p></li>
                                    <li><i class="fa fa-globe"></i> <p><strong>Web</strong>: <a href="#" data-placement="bottom" data-toggle="tooltip" title="www.example.com">www.example.com</a></p></li>
                                </ul>
                                
                            </div>
                            
                            <div class="widget_social">
                                <div class="dividerHeading">
                                    <h4><span>Sosial Media</span></h4>
                                </div>
                                <ul class="widget_social">
                                    <li><a class="fb" href="#." data-placement="bottom" data-toggle="tooltip" title="Facbook"><i class="fa fa-facebook"></i></a></li>
                                    <li><a class="twtr" href="#." data-placement="bottom" data-toggle="tooltip" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                                    <li><a class="gmail" href="#." data-placement="bottom" data-toggle="tooltip" title="Google"><i class="fa fa-google-plus"></i></a></li>
                                   
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>
    </section>
    <!--end wrapper-->
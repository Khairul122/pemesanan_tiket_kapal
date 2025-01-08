 <?php session_start();
    error_reporting(0); ?>
 <!DOCTYPE html>
 <!--[if IE 8 ]><html class="ie ie8" class="no-js" lang="en"> <![endif]-->
 <!--[if (gte IE 9)|!(IE)]><!-->
 <html class="no-js" lang="en"> <!--<![endif]-->

 <head>
     <meta http-equiv="content-type" content="text/html; charset=UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
     <link rel="shortcut icon" href="./assets/images/icon.png" />
     <title>PT.ANUGRAH SEJAHTERA MAS</title>
     <meta name="description" content="">

     <!-- CSS FILES -->
     <link rel="stylesheet" href="./assets/css/bootstrap.min.css" />
     <link rel="stylesheet" href="./assets/css/bootstrap-datetimepicker.min.css" />
     <link rel="stylesheet" href="./assets/css/style.css">
     <link rel="stylesheet" type="text/css" href="./assets/css/style.css" media="screen" data-name="skins">
     <link rel="stylesheet" href="./assets/css/layout/wide.css" data-name="layout">

     <link rel="stylesheet" href="./assets/css/fractionslider.css" />
     <link rel="stylesheet" href="./assets/css/style-fraction.css" />
     <link rel="stylesheet" href="./assets/css/animate.css" />

     <link rel="stylesheet" type="text/css" href="./assets/css/switcher.css" media="screen" />
     <script src="./assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
     <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
     <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
     <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
 </head>

 <body>
     <!--Start Header-->
     <header id="header">
         <div id="top-bar">
             <div class="container">
                 <div class="row">
                     <div class="col-sm-3">
                         <div id="logo">
                             <h1><a href="index.html"><img src="./assets/images/logo.png" alt="Everest" /></a></h1>
                         </div>
                     </div>
                     <div class="col-sm-9 top-info">
                         <ul>
                             <li><a href="" class="my-tweet"><i class="fa fa-twitter"></i></a></li>
                             <li><a href="" class="my-facebook"><i class="fa fa-facebook"></i></a></li>
                             <li><a href="" class="my-google"><i class="fa fa-google-plus"></i></a></li>
                         </ul>
                         <span class="hidden-xs"><i class="fa fa-phone"></i>Phone: (123) 456-7890</span>
                         <span class="hidden-xs"><i class="fa fa-envelope"></i>Email: mail@example.com</span>
                     </div>
                 </div>
             </div>
         </div>
         <div class="pixel-header">
             <img src="./assets/images/page_header.jpg" alt="" />
         </div>

         <!-- Navigation
================================================== -->
         <div class="navbar navbar-default navbar-static-top container" role="navigation">
             <div class="row">
                 <span class="nav-caption"></span>
                 <div class="navbar-header">
                     <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                         <span class="sr-only">Toggle navigation</span>
                         <span class="icon-bar"></span>
                         <span class="icon-bar"></span>
                         <span class="icon-bar"></span>
                     </button>
                 </div>
                 <div class="navbar-collapse collapse">
                     <ul class="nav navbar-nav">
                         <li><a href="index.php">Home</a></li>
                         <li><a href="index.php?p=kapal">Kapal</a></li>
                         <li><a href="index.php?p=cara">Cara pesan</a></li>
                         <li><a href="index.php?p=tentang">Tentang</a></li>
                         <li><a href="index.php?p=kontak">kontak</a></li>
                     </ul>
                     <ul class="nav navbar-nav navbar-right">
                         <?php


                            include './config/koneksi.php';

                            if (empty(@$_SESSION['us'])) {

                                echo '
                         <li><a href="#modal-index" data-toggle="modal" data-target="#modal-index" id="0" class="login">Login</a></li>
                          <li><a href="index.php?p=daftar">Daftar</a></li>';
                            } else {
                                $id = $_SESSION['us'];
                                $query4 = mysqli_query($koneksi, "SELECT * FROM member WHERE p_no_identitas='$id'");
                                $q = mysqli_fetch_array($query4);
                                echo '
                                <li class="dropdown profil">
                                    <a href="#" class="dropdown-toggle a-profil" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    
                                    <img class="img-profil" src="./assets/images/users/default.png"/>
                                    
                                      <span>' . $q['p_nama'] . '</span></a>
                                      <ul class="dropdown-menu">
                                        <li><a href="#"><i class="fa fa-user"></i> Profil</a></li>
                                        <li><a href="index.php?p=pesanan-saya"><i class="fa fa-shopping-cart"></i> Pesanan Saya</a></li>
                                        <li><a href="./logout/logout-pen.php"><i class="fa fa-power-off"></i> Logout</a></li>
                                     </ul>
                                </li>';
                            }
                            ?>
                     </ul>
                 </div>
             </div><!--/.row -->
         </div><!--/.container -->
     </header>
     <!--End Header-->
     <div class="container">
         <div class="modal fade" id="modal-index" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
             <div class="modal-dialog" role="document">
                 <div class="modal-content modal-login">
                     <div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                         <h4 class="modal-title" id="myModalLabel" style="color: #727CB6;">Login</h4>
                     </div>
                     <form action="login/login.php" method="post">
                         <div class="modal-body">

                             <div class="form-group">
                                 <label for="exampleInputEmail1">Username</label>
                                 <input type="text" name="user" class="form-control" id="exampleInputEmail1" placeholder="Username">
                             </div>
                             <div class="form-group">
                                 <label for="exampleInputPassword1">Password</label>
                                 <input type="password" name="pass" class="form-control" id="exampleInputPassword1" placeholder="Password">
                             </div>
                         </div>
                         <div class="modal-footer">
                             <button type="submit" class="btn btn-default btn-lg btn-login" id="login" data-loading-text="Loading...">Login</button>
                             <a href="index.php?p=lupa-password" class="lp">Lupa password ?</a>

                         </div>
                     </form>
                 </div>
             </div>
         </div>
     </div>
     <div class="container">
         <div class="modal fade" id="modal-pesan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
             <div class="modal-dialog" role="document">
                 <div class="modal-content modal-login">
                     <div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                         <h4 class="modal-title" id="myModalLabel" style="color: #727CB6;">Pesan Tiket</h4>
                     </div>
                     <form action="pages/proses_pesan.php" id="form1" name="form1" method="post">
                         <div class="modal-body">

                         </div>
                         <div class="modal-footer">
                             <button type="submit" class="btn btn-default btn-lg btn-login" id="login" data-loading-text="Loading...">Pesan</button>

                         </div>
                     </form>
                 </div>
             </div>
         </div>
     </div>

     <?php
        $page_dir = 'pages';
        if (!empty($_GET['p'])) {
            $page = scandir($page_dir, 0);
            unset($page[0], $page[1]);
            $p = $_GET['p'];
            if (in_array($p . '.php', $page)) {
                include($page_dir . '/' . $p . '.php');
            } else {
                echo 'Halaman tidak ditemukan!';
            }
        } else {
            include($page_dir . '/welcome.php');
        }
        ?>

     <!--start footer-->
     <footer class="footer">
         <div class="container">
             <div class="row">

                 <div class="col-sm-3 col-md-3 col-lg-3">
                     <div class="widget_title">
                         <h4><span>Tujuan</span></h4>
                     </div>
                     <div class="widget_content">
                         <ul class="links">
                             <?php
                                include './config/koneksi.php';

                                $sql = mysqli_query($koneksi, "SELECT * FROM tujuan limit 4");
                                while ($q = mysqli_fetch_array($sql)) {

                                ?>
                                 <li><a href="#"><?php echo $q['nama_tujuan'] ?><span>Lama perjalan : <?php echo $q['lama_tujuan'] ?></span></a></li>
                             <?php } ?>
                         </ul>
                     </div>
                 </div>
                 <div class="col-sm-3 col-md-3 col-lg-3">
                     <div class="widget_title">
                         <h4><span>Kapal</span></h4>

                     </div>
                     <div class="widget_content">
                         <ul class="links">
                             <?php
                                include './config/koneksi.php';

                                $sql1 = mysqli_query($koneksi, "SELECT * FROM kapal limit 4");
                                while ($q1 = mysqli_fetch_array($sql1)) {

                                ?>
                                 <li><a href="#"><?php echo $q1['nama_kapal']; ?><span>Izin : <?php echo $q1['izin_kapal']; ?></span></a></li>
                             <?php } ?>
                         </ul>
                     </div>
                     <div class="widget_content">
                         <div class="tweet_go"></div>
                     </div>
                 </div>
                 <div class="col-sm-3 col-md-3 col-lg-3">
                     <div class="widget_title">
                         <h4><span>Nahkoda</span></h4>
                     </div>
                     <div class="widget_content">
                         <ul class="links">
                             <?php
                                include './config/koneksi.php';

                                $sql2 = mysqli_query($koneksi, "SELECT * FROM nahkoda limit 4");
                                while ($q2 = mysqli_fetch_array($sql2)) {

                                ?>
                                 <li><a href="#"><?php echo $q2['nama_nah']; ?><span>Kontak : <?php echo $q2['nohp']; ?></span></a></li>
                             <?php } ?>
                         </ul>
                     </div>
                 </div>
                 <div class="col-sm-3 col-md-3 col-lg-3">
                     <div class="widget_title">
                         <h4><span>Tentang</span></h4>
                     </div>
                     <div class="widget_content">
                         <p>Anda dapat mengunjungi atau pun menghubungi kami melalui alamat dan kontak kami dibawah ini.</p>
                         <ul class="contact-details-alt">
                             <li><i class="fa fa-map-marker"></i>
                                 <p><strong>Address</strong>: Padang</p>
                             </li>
                             <li><i class="fa fa-user"></i>
                                 <p><strong>Phone</strong>:(+91) 9000-12345</p>
                             </li>
                             <li><i class="fa fa-envelope"></i>
                                 <p><strong>Email</strong>: <a href="#">mail@example.com</a></p>
                             </li>
                         </ul>
                     </div>
                 </div>
             </div>
         </div>
     </footer>
     <!--end footer-->

     <section class="footer_bottom">
         <div class="container">
             <div class="row">
                 <div class="col-sm-6">
                     <p class="copyright">&copy; Copyright 2017 INTI PHP</p>
                 </div>

                 <div class="col-sm-6 ">
                     <div class="footer_social">
                         <ul class="footbot_social">
                             <li><a class="fb" href="#." data-placement="top" data-toggle="tooltip" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                             <li><a class="twtr" href="#." data-placement="top" data-toggle="tooltip" title="Twitter"><i class="fa fa-twitter"></i></a></li>

                         </ul>
                     </div>
                 </div>
             </div>
         </div>
     </section>

     <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
     <!-- Bootstrap 3.3.5 -->
     <script src="./assets/js/bootstrap.min.js"></script>
     <!-- DataTables -->


     <script src="./assets/js/jQuery.js"></script>
     <script src="./assets/js/moment.js"></script>

     <script src="./assets/js/bootstrap-datetimepicker.min.js"></script>
     <script type="text/javascript">
         $(function() {

             $('#datepickercari').datetimepicker({

                 format: 'DD-MM-YYYY',
                 minDate: "<?php echo date('Y-m-d'); ?>",
             });
             $('#datepickerumur').datetimepicker({

                 format: 'YYYY-MM-DD',
                 defaultDate: '1950-01-01',


             });


         });
     </script>
     <script type="text/javascript" src="./assets/js/jquery-nopen.js"></script>
     <script src="./assets/js/bootstrap.min.js"></script>
     <script src="./assets/js/jquery.easing.1.3.js"></script>
     <script src="./assets/js/retina-1.1.0.min.js"></script>
     <script type="text/javascript" src="./assets/js/jquery.cookie.js"></script> <!-- jQuery cookie -->

     <script src="./assets/js/jquery.fractionslider.js" type="text/javascript" charset="utf-8"></script>
     <script type="text/javascript" src="./assets/js/jquery.smartmenus.min.js"></script>
     <script type="text/javascript" src="./assets/js/jquery.smartmenus.bootstrap.min.js"></script>
     <script type="text/javascript" src="./assets/js/jquery.jcarousel.js"></script>
     <script type="text/javascript" src="./assets/js/jflickrfeed.js"></script>
     <script type="text/javascript" src="./assets/js/jquery.magnific-popup.min.js"></script>
     <script type="text/javascript" src="./assets/js/jquery.isotope.min.js"></script>
     <script type="text/javascript" src="./assets/js/swipe.js"></script>

     <script type="text/javascript" src="./assets/js/wow.min.js"></script>

     <script src="./assets/js/main.js"></script>

     <!-- Start Style Switcher -->
     <div class="switcher"></div>
     <!-- End Style Switcher -->
     <script>
         $(window).load(function() {
             $('.slider').fractionSlider({
                 'fullWidth': true,
                 'controls': true,
                 'responsive': true,
                 'dimensions': "1920,450",
                 'timeout': 5000,
                 'increase': true,
                 'pauseOnHover': true,
                 'slideEndAnimation': false,
                 'autoChange': true
             });
         });
         // WOW Animation
         new WOW().init();
     </script>
 </body>

 </html>
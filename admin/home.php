<?php
error_reporting(0);
session_start();

if(empty($_SESSION['ad'])){
     echo "<script>
          location.replace('../index.php')</script>";
  } else{
    $id=$_SESSION['ad'];
  }
?>
<!DOCTYPE html>

<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PT.ANUGRAH SEJAHTERA MAS</title>
    <link rel="shortcut icon" href="../assets/images/icon.png"/>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../assets/plugins/font awesome/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../assets/plugins/font awesome/ionicons.min.css">
     <!-- DataTables -->
    <link rel="stylesheet" href="../assets/plugins/datatables/dataTables.bootstrap.css">

    <link rel="stylesheet" href="../assets/css/bootstrap-datetimepicker.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../assets/plugins/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../assets/plugins/dist/css/skins/_all-skins.min.css">
   
  </head>
  
  <body class="hold-transition skin-blue sidebar-mini">
    
    <div class="wrapper">
          <div class="logo">
            <img src="../assets/images/logo.png" alt="" style="width: 280px;height: 50px;padding: 0px 0px 0px 0px;margin:0px 0px 0px 45px">
        </div>
      <header class="main-header">
        <!-- Logo -->
        <a href="#" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>Adm</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Admin</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
     
              <!-- User Account: style can be found in dropdown.less -->
                       <?php 
                         include '../config/koneksi.php';
                         
                         

                                 $query4=mysqli_query($koneksi,"SELECT * FROM admin WHERE id='$id'");
                                $q=mysqli_fetch_array($query4);
                               
                                ?>
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="../assets/images/users/default.png" class="user-image" alt="User Image">
                  <span class="hidden-xs"><?php echo $q['nama']; ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="../assets/images/users/default.png" class="img-circle" alt="User Image">
                    <p>
                      <?php echo $q['nama']; ?>
                      <small>Admin</small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <li class="user-body">
                 
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                        <a href="#" class="btn btn-default btn-flat"><i class="fa fa-user"> Profil</i></a>
                    </div>
                    <div class="pull-right">
                        <a href="../logout/logout-adm.php" class="btn btn-default btn-flat"><i class="fa fa-sign-out"> Keluar</i></a>
                    </div>
                  </li>
                </ul>
              </li>

              <!-- Control Sidebar Toggle Button -->
              <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar" style="margin-top: 60px;">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar" style="">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="../assets/images/users/default.png" class="img-rounded" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo $q['nama']; ?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">Menu</li>
            <li class="treeview">
              <a href="home.php?p=beranda">
                <i class="glyphicon glyphicon-th-large"></i> <span>Beranda</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
            </li>
            <li class="treeview">
              <a href="home.php?p=inbox">
                <i class="fa fa-inbox"></i> <span>Kontak masuk</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
            </li>
             <li class="treeview">
              <a href="home.php?p=keberangkatan">
                <i class="fa fa-anchor"></i> <span>Keberangkatan</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-edit"></i>
                <span>Pesanan</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
              <li><a href="home.php?p=belum-konfirm"><i class="fa fa-circle-o"></i> Belum konfirmasi</a></li>
                <li><a href="home.php?p=menunggu-pembayaran"><i class="fa fa-circle-o"></i> Menunggu pembayaran</a></li>
                <li><a href="home.php?p=sudah-konfirm"><i class="fa fa-circle-o"></i> Sudah Lunas</a></li>
              </ul>
            </li>
           
            <li class="treeview">
              <a href="#">
                <i class="fa fa-table"></i>
                <span> Data Tabel</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
               <li><a href="home.php?p=tiket"><i class="fa fa-circle-o"></i> Tiket</a></li>
                <li><a href="home.php?p=penumpang"><i class="fa fa-circle-o"></i> Member</a></li>
                <li><a href="home.php?p=kapal"><i class="fa fa-circle-o"></i> Kapal</a></li>
                <li><a href="home.php?p=kursi"><i class="fa fa-circle-o"></i> Kursi</a></li>
                <li><a href="home.php?p=tujuan"><i class="fa fa-circle-o"></i> Tujuan</a></li>
                <li><a href="home.php?p=nahkoda"><i class="fa fa-circle-o"></i> Nahkoda</a></li>
                <li><a href="home.php?p=bagasi"><i class="fa fa-circle-o"></i> Bagasi</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Laporan</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="home.php?p=lap-pesanan"><i class="fa fa-circle-o"></i> Pemesanan</a></li>
                 <li><a href="home.php?p=lap-keberangkatan"><i class="fa fa-circle-o"></i> Keberangkatan</a></li>
                <li><a href="home.php?p=lap-tiket"><i class="fa fa-circle-o"></i> Tiket</a></li>
                <li><a href="home.php?p=lap-penumpang"><i class="fa fa-circle-o"></i> Member</a></li>
                <li><a href="home.php?p=lap-kapal"><i class="fa fa-circle-o"></i> Kapal</a></li>
                <li><a href="home.php?p=lap-nahkoda"><i class="fa fa-circle-o"></i> Nahkoda</a></li>
                <li><a href="home.php?p=lap-tujuan"><i class="fa fa-circle-o"></i> Tujuan</a></li>
              </ul>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <?php
                            $page_dir='pages';
                            if(!empty($_GET['p'])){
                                $page=scandir($page_dir,0);
                                unset($page[0],$page[1]);
                                $p=$_GET['p'];
                                if(in_array($p.'.php',$page)){
                                    include($page_dir.'/'.$p.'.php');
                                }
                                else{
                                    echo 'Halaman tidak ditemukan!';
                                }
                            }
                            else{
                                 include ($page_dir.'/beranda.php');
                            }
                            ?>
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b></b> 
        </div>
        <strong>INTI PHP &copy; <?php echo date('Y'); ?></strong>
      </footer>

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark" style="top:50px;">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
         
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
          <!-- Home tab content -->
          <div class="tab-pane" id="control-sidebar-home-tab">
          </div>
        </div>
      </aside><!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
  
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="../assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
     <script src="../assets/js/jquery-nopen.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <!-- Bootstrap 3.3.5 -->
    <script src="../assets/js/bootstrap.min.js"></script>
     <!-- DataTables -->

     <script src="../assets/js/bootstrap-datetimepicker.min.js"></script>

    <script src="../assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../assets/plugins/datatables/dataTables.bootstrap.min.js"></script>

    <!-- Slimscroll -->
    <script src="../assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../assets/plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../assets/plugins/dist/js/app.min.js"></script>
  
    <!-- AdminLTE for demo purposes -->
    <script src="../assets/plugins/dist/js/demo.js"></script>

    <script>
      $(function () {
        $("#example1").DataTable({
          "language": {
            "url": "http://cdn.datatables.net/plug-ins/1.10.9/i18n/Indonesian.json",
            "sEmptyTable": "Tidak ada data di database",
            "sProcessing":   "Sedang memproses...",
    "sLengthMenu":   "Tampilkan _MENU_ entri",
    "sZeroRecords":  "Tidak ditemukan data yang sesuai",
    "sInfo":         "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
    "sInfoEmpty":    "Menampilkan 0 sampai 0 dari 0 entri",
    "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
    "sInfoPostFix":  "",
    "sSearch":       "Cari:",
    "sUrl":          "",
    "oPaginate": {
        "sFirst":    "Pertama",
        "sPrevious": "Sebelumnya",
        "sNext":     "Selanjutnya",
        "sLast":     "Terakhir"
    }
        }
        });
        $('#example2').DataTable({
             
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>

  </body>
</html>

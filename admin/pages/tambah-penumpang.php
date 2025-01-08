  <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            member
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="home.php"> Home</a></li>
            <li class="active">Tambah peumpang</li>
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

                               $date = date( 'ddmmyyyy' ); // Tahun
                                        $tgl = substr( $date ,0,2 );//mengambil tgl
                                        $bln = substr( $date ,4,2 ); //mengambil bulan
                                        $thn = substr( $date ,8,2 );//mengambil tahun
                                        $tglkode=$tgl."".$bln."".$thn; 
                                        $t='PL';

                                        // mengambil data dari database untuk pengecekan no
                                        $get_data = mysqli_query($koneksi,"SELECT * FROM member");
                                        // Check
                                        $check = mysqli_num_rows ( $get_data ); // untuk mengecek apakah di table barang "no/ kode" sudah ada atau belum
                                        $kd = ''; // mendefinisikan variable kd ( $kd ) dengan value null/ kosong. Hal ini sangatlah penting jika pada suatu kondisi tertentu nilai variable blm d
                                        if ( empty( $check ) ) { // Jk kode blm ada maka
                                        $kd = 1 ; // kode dimulai dr 1
                                        } else { // jk sudah ada maka
                                        $kd = $check + 1 ; // kode sebelumnya ditambah 1.
                                        }
                                        $id=$t.$tglkode.$kd;

                                
                            if(empty($_POST['nm']) or empty($_POST['email']) or empty($_POST['hp']) or empty($_POST['alm']) or empty($_POST['user']) or empty($_POST['pas'])){

                            echo '<div class="alert alert-warning alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Error!</strong> Data tidak boleh ada yang kosong.
                                  </div>';

                            }else{

                                $sql=mysqli_query($koneksi,"INSERT INTO member values('$id','$_POST[user]','$_POST[pas]','$_POST[nm]','$_POST[email]','$_POST[hp]','$_POST[alm]','2','N',NOW())");
                                

                                 echo '<div class="alert alert-success alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Sukses!</strong> member berhasil ditambah.
                                  </div>';
                            }
                            }
                            ?>
                     <form id="contactForm" action="" method="post">

                            <div class="row">
                                <div class="form-group">
                                    <div class="col-lg-6 ">
                                        <label>Nama Lengkap</label>
                                        <input type="text" name="nm" class="form-control" maxlength="100" value="" placeholder="Nama Lengkap">
                                    </div>
                                    <div class="col-lg-6 ">
                                     <label>Nomor Telepon</label>
                                        <input type="text" name="hp" class="form-control" maxlength="100" value="" placeholder="Nomor Handphone">
                                     
                                </div>
                            </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group"> 
                                  <div class="col-lg-12 ">
                                       <label>Email</label>
                                        <input type="text" name="email" class="form-control" maxlength="100" value="" placeholder="Email">
                                    </div>
                                    </div>
                                    </div>
                                    <br>
                            <div class="row">
                                <div class="form-group">
                                   
                                    <div class="col-lg-12 ">
                                   <label>Alamat</label>
                                       <textarea class="form-control" name="alm" rows="5" cols="50" data-msg-required="Please enter your alamat." maxlength="5000" placeholder="Alamat"></textarea>
                                    </div>
                                </div>
                            </div>
                         <br>
                           <div class="row">
                                <div class="form-group">
                                    <div class="col-lg-6 ">
                                    <label>Username</label>
                                        <input type="text" name="user" class="form-control" maxlength="100" value="" placeholder="Username">
                                    </div>
                                   
                                    <div class="col-lg-6 ">
                                   <label>Password</label>
                                        <input type="text" name="pas" class="form-control" maxlength="100" value="" placeholder="Password">
                                    </div>
                                </div>
                            </div>
                            <br>
                           <div class="row">
                                <div class="col-md-12">
                                    <input type="submit" name="b1" data-loading-text="Loading..." class="btn btn-primary" value="Tambah member">
                                     <a href="home.php?p=penumpang" class="btn btn-success"> Kembali </a>
                                </div>
                            </div>
                        </form>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

     </section><!-- /.content -->
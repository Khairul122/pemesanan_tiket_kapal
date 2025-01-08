<!--start wrapper-->
    <section class="wrapper">
        <section class="page_head">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="page_title">
                            <h2>Mendaftar</h2>
                           
                        </div>
                        <nav id="breadcrumbs">
                            <ul>
                                <li>You are here:</li>
                                <li><a href="index.php">Home</a></li>
                                <li>Daftar</li>
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
                            <h4><span>Daftar</span></h4>
                        </div>
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
                                        $get_data = mysqli_query ($koneksi,"SELECT * FROM member");
                                        // Check
                                        $check = mysqli_num_rows ( $get_data ); // untuk mengecek apakah di table barang "no/ kode" sudah ada atau belum
                                        $kd = ''; // mendefinisikan variable kd ( $kd ) dengan value null/ kosong. Hal ini sangatlah penting jika pada suatu kondisi tertentu nilai variable blm d
                                        if ( empty( $check ) ) { // Jk kode blm ada maka
                                        $kd = 1 ; // kode dimulai dr 1
                                        } else { // jk sudah ada maka
                                        $kd = $check + 1 ; // kode sebelumnya ditambah 1.
                                        }
                                        $id=$t.$tglkode.$kd;

                                        $pas=md5($_POST['pas']);

                                        $cup=mysqli_query($koneksi,"SELECT * FROM member WHERE user='$_POST[user]' OR pass='$pas'");
                                        $hup=mysqli_num_rows($cup);

                                        $ce=mysqli_query($koneksi,"SELECT * FROM member WHERE email='$_POST[umr]'");
                                        $hce=mysqli_num_rows($ce);


                            if(empty($_POST['nm']) or empty($_POST['hp']) or empty($_POST['umr']) or empty($_POST['alm']) or empty($_POST['user']) or empty($_POST['pas'])){

                            echo '<div class="alert alert-warning alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Error!</strong> Data tidak boleh ada yang kosong.
                                  </div>';
                            }
                            else if($hce > 0){

                            echo '<div class="alert alert-warning alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Error!</strong> Email sudah digunakan,silahkan masukan email lain.
                                  </div>';

                            }
                            else if($hup > 0){

                            echo '<div class="alert alert-warning alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Error!</strong> Isikan username atau password lain.
                                  </div>';

                            }else{

                                

                                $sql=mysqli_query($koneksi,"INSERT INTO member values ('$id','$_POST[user]','$pas','$_POST[nm]','$_POST[umr]','$_POST[hp]','$_POST[alm]','2','Y',NOW())");
                            
            				
            						if(!$sql) {
            							 echo '<div class="alert alert-warning alert-dismissible fade in" role="alert">
            												  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            												  <span aria-hidden="true">×</span></button>
            												  <strong>Error!</strong> Pendaftaran gagal.
            												  </div>';
            							
            						} else {
            							 echo '<div class="alert alert-success alert-dismissible fade in" role="alert">
            												  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            												  <span aria-hidden="true">×</span></button>
            												  <strong>Sukses!</strong> Pendaftaran anda berhasil, silahkan login.
            												  </div>';
            						}
		
                            }
                            }
                            ?>
                        <form id="contactForm" action="" method="post">
                            <div class="row">
                                <div class="form-group">
                                   
                                    <div class="col-lg-6 ">
                                        <input type="text" id="name" name="nm" class="form-control" maxlength="100" data-msg-required="Please enter your Nama." value="" placeholder="Nama lengkap" >
                                    </div>
                                     <div class="col-md-6">
                                        <input type="text" id="hp" name="hp" class="form-control" maxlength="100" data-msg-required="Please enter the nomor telepon." value="" placeholder="Nomor Telepon">
                                    </div>
                                
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                   
                                     <div class="col-md-12">
                                        <input type="email" id="umr" name="umr" class="form-control" maxlength="100" data-msg-required="Please enter the email." value="" placeholder="Email">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <textarea id="alm" class="form-control" name="alm" rows="5" cols="50" data-msg-required="Please enter your alamat." maxlength="5000" placeholder="Alamat"></textarea>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <input type="text" id="user" name="user" class="form-control" maxlength="100" data-msg-required="Please enter the username." value="" placeholder="Username">
                                    </div>
                                     <div class="col-md-6">
                                        <input type="password" id="pas" name="pas" class="form-control" maxlength="100" data-msg-required="Please enter the password." value="" placeholder="Password">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="submit" name="b1" data-loading-text="Loading..." class="btn btn-default btn-lg" value="Daftar">
                                </div>
                            </div>
                        </form>
                    </div>
                    
                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <div class="sidebar">
                            <div class="widget_info">
                                <div class="dividerHeading">
                                    <h4><span>Petunjuk Pendaftaran</span></h4>
                                    </div>
                                <p><i class="fa fa-angle-double-right"></i> Isilah data anda dengan lengkap sesuai dengan data diri anda yang sebenarnya.</p><br>
                                 <p><i class="fa fa-angle-double-right"></i> Ini menyangkut keselamatan dan data diri anda nantinya,jika terjadi sesuatu yang tidak diinginkan.</p><br>
                                <p><i class="fa fa-angle-double-right"></i> Setelah anda mendaftar anda akan bisa langsung untuk memesan tiket.</p><br>
                                <p><i class="fa fa-angle-double-right"></i> Jika data anda tidak sesuai dengan yang sebenarnya maka kami tidak akan memproses pemesanan anda.</p><br>
                                 <p><i class="fa fa-angle-double-right"></i> Untuk informasi lebih lanjut silahkan anda hubungi kami lelalui kontak kami,atau anda juga dapat mengunjungi kami melalui alamat kami ,Terimakasih.</p>
                                
                               
                            </div>
                            
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>
    </section>
    <!--end wrapper-->
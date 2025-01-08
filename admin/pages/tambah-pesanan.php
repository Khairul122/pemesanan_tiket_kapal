
  <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Pesanan
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="home.php"> Home</a></li>
            <li class="active">Tambah pesanan</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
  <!-- Main row -->
          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Form Pesanan</h3>
                 
                </div><!-- /.box-header -->
                <div class="box-body">
                 <?php 
                            include './config/koneksi.php';

                            if(isset($_POST['tk'])) { 
                              $sql3=mysqli_query($koneksi,"SELECT * FROM tiket WHERE kode_tiket='$_POST[tk]'");
                              $qk=mysqli_fetch_array($sql3);
                              $idkp=$qk['id_kapal'];
                              $idtk=$_POST['tk'];
                              }else { $idkp=""; $idtk="0";}

                            $auto="001";
                                  $read=mysqli_query($koneksi,"select right(id_pesan,3) from pesan order by id_pesan desc");
                                  if ($rec=mysqli_fetch_array($read)){
                                  $auto=$rec[0]+1;
                                  if ($auto<100) $auto="0".$auto;
                                  if ($auto<10) $auto="0".$auto;
                                  }
                                  $_POST['id']="PS-T".$auto;

                            if(isset($_POST['b1'])){

                            if(empty($_POST['tk']) or empty($_POST['jb']) or empty($_POST['idu'])){

                            echo '<div class="alert alert-warning alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Error!</strong> Data tidak boleh ada yang kosong.
                                  </div>';

                            }else{
                                $sql=mysqli_query($koneksi,"INSERT INTO pesan values ('$_POST[id]','$_POST[idu]','$_POST[tk]','$_POST[idk]','$_POST[jb]',NOW(),'','Y')");

                                  $sql=mysqli_query($koneksi,"UPDATE tiket SET sisa=(sisa-'$_POST[jb]') WHERE kode_tiket='$_POST[tk]'");

                                 echo '<div class="alert alert-success alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Sukses!</strong> Pesanan berhasil ditambah.
                                  </div>';
                            }
                            }
                            ?>
                     <form id="contactForm" action="" method="post">
                     <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                     <label>ID Pesan</label>
                                        <input type="text" name="id" class="form-control" maxlength="100" value="<?php echo $_POST['id']; ?>" placeholder="ID Pesan" readonly>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-lg-12 ">
                                    <label>Tiket</label>
                                       <select name="tk" id="select" class="form-control" onchange="this.form.submit();">
                                        <option value="0"<?php if ($idtk==0) echo "selected"; else echo ""; ?>>-Tiket tujuan-</option>
                                        <?php  

                                        $sql=mysqli_query($koneksi,"SELECT tujuan.nama_tujuan,tujuan.kode_tujuan,tiket. * FROM tiket,tujuan WHERE tujuan.kode_tujuan=tiket.id_tujuan");
                                            while($q=mysqli_fetch_array($sql)){

                                                   ?>
                                        <option value="<?php echo $q['kode_tiket']; ?>"<?php if ($idtk==$q['kode_tiket']) echo "selected"; else echo ""; ?>><?php echo $q['kode_tiket'].' / '.$q['nama_tujuan'].' / '.$q['tgl_b']; ?></option>
                                        <?php } ?>
                                      </select>
                                    </div>
                                </div>
                            </div>
                            <br>
                              <div class="row">
                                <div class="form-group">
                                    <div class="col-lg-6 ">
                                    <label>Kursi</label>
                                       <select name="idk" id="select" class="form-control">
                                        <option value="">-Nomor Kursi-</option>
                                        <?php  

                                        $sql=mysqli_query($koneksi,"SELECT * FROM kursi WHERE NOT EXISTS(SELECT * FROM pesan WHERE kursi.idk=pesan.idk and pesan.kode_tiket='$idtk') and id_kapal='$idkp'");
                                            while($q=mysqli_fetch_array($sql)){

                                                   ?>
                                        <option value="<?php echo $q['idk']; ?>"><?php echo $q['nok']; ?></option>
                                        <?php } ?>
                                      </select>
                                    </div>
                                     <div class="col-lg-6 ">
                                    <label>Pemesan</label>
                                       <select name="idu" id="select" class="form-control">
                                        <option value="">-Pemesan-</option>
                                        <?php  

                                        $sql=mysqli_query($koneksi,"SELECT * FROM member");
                                            while($q=mysqli_fetch_array($sql)){

                                                   ?>
                                        <option value="<?php echo $q['p_no_identitas']; ?>"><?php echo $q['p_nama']; ?></option>
                                        <?php } ?>
                                      </select>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                     <label>Jumlah beli</label>
                                        <input type="text" id="jb" name="jb" class="form-control" maxlength="100" value="" placeholder="Jumlah pesanan">
                                    </div>
                                </div>
                            </div>
                           <br>
                           <div class="row">
                                <div class="col-md-6">
                                    <input type="submit" name="b1" data-loading-text="Loading..." class="btn btn-primary" value="Tambah pesanan">
                               
                          
                                
                                    <a href="home.php?p=sudah-konfirm" class="btn btn-success"> Kembali </a>
                                </div>
                            </div>
                        </form>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

     </section><!-- /.content -->
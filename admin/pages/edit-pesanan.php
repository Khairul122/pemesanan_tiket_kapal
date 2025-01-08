  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Pesanan
    </h1>
    <ol class="breadcrumb">
      <li><a href="home.php"> Home</a></li>
      <li class="active">Edit pesanan</li>
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
            include '../../config/koneksi.php';

            $id = $_GET['id'];
            $sqps1 = mysqli_query($koneksi, "SELECT * FROM pesan where id_pesan='$id'");
            $ps1 = mysqli_fetch_array($sqps1);
            $jbs = $ps1['jml_p'];

            if (isset($_POST['b1'])) {
              if (empty($_POST['tk']) or empty($_POST['jb']) or empty($_POST['idu'])) {
                echo '<div class="alert alert-warning alert-dismissible fade in" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">×</span></button>
                          <strong>Error!</strong> Data tidak boleh ada yang kosong.
                          </div>';
              } else {
                $sql = mysqli_query($koneksi, "UPDATE pesan SET kode_member='$_POST[idu]',kode_tiket='$_POST[tk]',jml_p='$_POST[jb]',tanggal_pesan=NOW() WHERE id_pesan='$_POST[id]'");

                $sql = mysqli_query($koneksi, "UPDATE tiket SET sisa=(sisa + '$jbs'-'$_POST[jb]') WHERE kode_tiket='$_POST[tk]'");

                echo '<div class="alert alert-success alert-dismissible fade in" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">×</span></button>
                          <strong>Sukses!</strong> Pesanan berhasil diedit.
                          </div>';
              }
            }
            ?>
            <form id="contactForm" action="" method="post">
              <?php
              $id = $_GET['id'];
              $sqps = mysqli_query($koneksi, "SELECT * FROM pesan where id_pesan='$id'");
              $ps = mysqli_fetch_array($sqps);
              $idt = $ps['kode_tiket'];
              $idu = $ps['kode_member'];
              $idk = $ps['idk'];
              ?>
              <div class="row">
                <div class="form-group">
                  <div class="col-lg-12 ">
                    <label>ID Pesanan</label>
                    <input type="text" name="id" class="form-control" maxlength="100" value="<?php echo $_GET['id']; ?>" placeholder="Id pesan" readonly>
                  </div>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="form-group">
                  <div class="col-lg-12 ">
                    <label>Tiket</label>
                    <select name="tk" id="select" class="form-control">
                      <?php
                      $sql = mysqli_query($koneksi, "SELECT tujuan.nama_tujuan,tiket. * FROM tiket,tujuan WHERE tujuan.kode_tujuan=tiket.id_tujuan");
                      while ($q = mysqli_fetch_array($sql)) {
                      ?>
                        <option value="<?php echo $q['kode_tiket']; ?>" <?php if ($idt == $q['kode_tiket']) echo "selected";
                                                                        else echo ""; ?>><?php echo $q['kode_tiket'] . ' / ' . $q['nama_tujuan'] . ' / ' . $q['tgl_b']; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="form-group">
                  <div class="col-lg-12 ">
                    <label>Pemesan</label>
                    <select name="idu" id="select" class="form-control">
                      <?php
                      $sql = mysqli_query($koneksi, "SELECT * FROM member");
                      while ($q = mysqli_fetch_array($sql)) {
                      ?>
                        <option value="<?php echo $q['p_no_identitas']; ?>" <?php if ($idu == $q['p_no_identitas']) echo "selected";
                                                                            else echo ""; ?>><?php echo $q['p_nama']; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
              </div>
              <br>

              <div class="row">
                <div class="col-md-6">
                  <input type="submit" name="b1" data-loading-text="Loading..." class="btn btn-primary" value="Edit pesanan">
                  <a href="home.php?p=sudah-konfirm" class="btn btn-success"> Kembali </a>
                </div>
              </div>
            </form>

            <!-- Form untuk Menampilkan Gambar Bukti Pembayaran -->
            <div class="row" style="margin-top: 20px;">
              <div class="form-group">
                <div class="col-lg-12">
                  <label>Bukti Pembayaran</label>
                  <?php
                  // Mendapatkan data bukti pembayaran dari database
                  $sqBukti = mysqli_query($koneksi, "SELECT bukti FROM pesan WHERE id_pesan='$id'");
                  $dataBukti = mysqli_fetch_array($sqBukti);
                  $buktiUrl = !empty($dataBukti['bukti']) ? "../upload/bukti/" . $dataBukti['bukti'] : "upload/default.png";
                  ?>
                  <div>
                    <img src="<?php echo $buktiUrl; ?>" alt="Bukti Pembayaran" style="width: 300px; height: auto; margin-top: 10px; border: 1px solid #ddd; border-radius: 5px;">
                  </div>
                </div>
              </div>
            </div>
          </div><!-- /.box-body -->
        </div><!-- /.box -->
      </div><!-- /.col -->
    </div><!-- /.row -->
  </section><!-- /.content -->

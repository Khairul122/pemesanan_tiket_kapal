<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>Tujuan</h1>
  <ol class="breadcrumb">
    <li><a href="home.php">Home</a></li>
    <li class="active">Tambah Tujuan</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <!-- Main row -->
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Form Tujuan</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
          <?php
          include './config/koneksi.php';

          $auto = "001";
          $read = mysqli_query($koneksi, "SELECT right(kode_tujuan,3) FROM tujuan ORDER BY kode_tujuan DESC");
          if ($rec = mysqli_fetch_array($read)) {
            $auto = $rec[0] + 1;
            if ($auto < 100) $auto = "0" . $auto;
            if ($auto < 10) $auto = "0" . $auto;
          }
          $_POST['id'] = "IT-B" . $auto;

          if (isset($_POST['b1'])) {
            if (empty($_POST['nm']) or empty($_POST['lm']) or empty($_POST['pelabuhan_asal'])) {
              echo '<div class="alert alert-warning alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                  <strong>Error!</strong> Data tidak boleh ada yang kosong.
              </div>';
            } else {
              $sql = "INSERT INTO tujuan (kode_tujuan, nama_tujuan, lama_tujuan, pelabuhan_asal) VALUES ('" . $_POST['id'] . "', '" . $_POST['nm'] . "', '" . $_POST['lm'] . "', '" . $_POST['pelabuhan_asal'] . "')";
              if (mysqli_query($koneksi, $sql)) {
                echo '<div class="alert alert-success alert-dismissible" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                      <strong>Sukses!</strong> Tujuan berhasil ditambah.
                  </div>';
              } else {
                echo '<div class="alert alert-danger alert-dismissible" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                      <strong>Error!</strong> Gagal menambahkan tujuan: ' . mysqli_error($koneksi) .
                  '</div>';
              }
            }
          }
          ?>
          <form id="contactForm" action="" method="post">
            <div class="row">
              <div class="form-group">
                <div class="col-md-12">
                  <label>ID Tujuan</label>
                  <input type="text" name="id" class="form-control" maxlength="100" value="<?php echo isset($_POST['id']) ? $_POST['id'] : ''; ?>" placeholder="ID Tujuan" readonly>
                </div>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="form-group">
                <div class="col-md-6">
                  <label>Nama Tujuan</label>
                  <input type="text" name="nm" class="form-control" maxlength="100" placeholder="Nama Tujuan">
                </div>
                <div class="col-lg-6">
                  <label>Lama Tujuan</label>
                  <input type="text" name="lm" class="form-control" maxlength="100" placeholder="Lama Tujuan">
                </div>
              </div>
            </div>
            <br>
            <!-- Additional form for Pelabuhan Asal -->
            <div class="row">
              <div class="form-group">
                <div class="col-md-6">
                  <label>Pelabuhan Asal</label>
                  <input type="text" name="pelabuhan_asal" class="form-control" maxlength="100" placeholder="Pelabuhan Asal">
                </div>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-md-12">
                <input type="submit" name="b1" class="btn btn-primary" value="Tambah Tujuan">
                <a href="home.php?p=tujuan" class="btn btn-success">Kembali</a>
              </div>
            </div>
          </form>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!-- /.col -->
  </div><!-- /.row -->
</section><!-- /.content -->
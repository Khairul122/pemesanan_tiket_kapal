  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Pesanan

    </h1>
    <ol class="breadcrumb">
      <li><a href="home.php"> Home</a></li>
      <li class="active">Menunggu Pembayaran</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Main row -->
    <div class="row">
      <div class="col-xs-12">

        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Pesanan Menunggu Pembayaran</h3>
          </div><!-- /.box-header -->
          <div class="box-body">

            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Kode Member</th>
                  <th>Nama Member</th>
                  <th>Jumlah Pesan</th>
                  <th>Total Bayar</th>
                  <th>Telepon</th>
                  <th>Email</th>
                  <th>Bukti Pembayaran</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                include '../../config/koneksi.php';

                $sql = mysqli_query($koneksi, "SELECT member.p_nama, member.p_no_identitas, pesan.*, pesan.bukti FROM member, tiket, pesan WHERE member.p_no_identitas=pesan.kode_member AND tiket.kode_tiket=pesan.kode_tiket AND pesan.status=2 GROUP BY member.p_no_identitas");

                while ($q = mysqli_fetch_array($sql)) {
                  $idm = $q['kode_member'];
                  $sql2 = mysqli_query($koneksi, "SELECT confirm_pembayaran.total_bayar, member.p_nama, member.p_no_identitas, pesan.*, pesan.bukti FROM member, pesan, confirm_pembayaran WHERE member.p_no_identitas=pesan.kode_member AND pesan.kode_member='$idm' AND pesan.kode_member=confirm_pembayaran.id_member AND pesan.status=2");
                  $jmlt = mysqli_num_rows($sql2);
                  $q2 = mysqli_fetch_array($sql2);
                  $hasil = $q2['total_bayar'];

                  // Mendapatkan URL gambar
                  $buktiUrl = !empty($q['bukti']) ? "../upload/bukti/" . $q['bukti'] : "upload/default.png";
                ?>
                  <tr>
                    <td><?php echo $q['p_no_identitas']; ?></td>
                    <td><?php echo $q['p_nama']; ?></td>
                    <td><?php echo $jmlt; ?> Tiket</td>
                    <td><b>Rp <?php echo number_format($hasil, 0, ".", "."); ?></b></td>
                    <td><?php echo $q['nohp']; ?></td>
                    <td><?php echo $q['email']; ?></td>
                    <td>
                      <img src="<?php echo $buktiUrl; ?>" alt="Bukti Pembayaran" style="width: 100px; height: auto;">
                    </td>
                    <td>
                      <a href="pages/konfirm-lunas.php?id=<?php echo $q['p_no_identitas']; ?>" class="btn btn-success" data-placement="bottom" data-toggle="tooltip" title="Lunas"> Lunas</a>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>

          </div><!-- /.box-body -->
        </div><!-- /.box -->
      </div><!-- /.col -->
    </div><!-- /.row -->

  </section><!-- /.content -->
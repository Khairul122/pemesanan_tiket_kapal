<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Pesanan
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="home.php"> Home</a></li>
            <li class="active">Belum konfirmasi</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
  <!-- Main row -->
          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Pesanan belum konfirmasi</h3>  
                </div><!-- /.box-header -->
                <div class="box-body">
                    
                    <table id="example1" class="table table-bordered table-striped">
                      
                    <thead>
                      <tr>
                        <th>Kode Member</th>
                        <th>Nama Member</th>
                        <th>Jumlah Pesan</th>
                        <th>Gol Kendaraan</th>
                        <th>Total Bayar</th>
                        <th>Telepon</th>
                        <th>Email</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                   
                    <tbody>
                    <?php
                    include '../../config/koneksi.php';

                     $sql=mysqli_query($koneksi,"SELECT member.p_nama,member.p_no_identitas,tiket.hrg_tiket_dewasa,tiket.hrg_tiket_ank2,pesan. * FROM member,tiket,pesan WHERE member.p_no_identitas=pesan.kode_member and tiket.kode_tiket=pesan.kode_tiket and pesan.status=1 GROUP BY pesan.kode_member");



                      while($q=mysqli_fetch_array($sql)){
                        $kdmb=$q['p_no_identitas'];

                        $idm=$q['kode_member'];

                        $id_golongan=$q['id_golongan'];

                        $golget=mysqli_query($koneksi,"SELECT * FROM golongan_kendaraan WHERE id_golongan='$id_golongan'");
                        $rg=mysqli_fetch_array($golget);
                        $nm_gol = $rg['nm_golongan'];
                        $hrg_gol = $rg['tarif_golongan'];

                        $sql2=mysqli_query($koneksi,"SELECT * FROM pesan WHERE ktgr_tiket='Dewasa' and kode_member='$kdmb'  and pesan.status=1");
                         $jmltd=mysqli_num_rows($sql2);

                        
                         $sql3=mysqli_query($koneksi,"SELECT * FROM pesan WHERE ktgr_tiket='Anak' and kode_member='$kdmb' and pesan.status=1");
                         $jmlta=mysqli_num_rows($sql3);

                         $hargad=$q['hrg_tiket_dewasa'];

                         $hargaa=$q['hrg_tiket_ank2'];

                         $ttd=$jmltd*$hargad;

                         $tta=$jmlta*$hargaa;

                        $total=$tta+$ttd+$hrg_gol;

                        $jmlpt=$jmlta+$jmltd;

                        $code=Rand(111,999);
                        $hasil=$total+$code;

                     ?>
                 
                      <tr>
                        <td><?php echo $q['p_no_identitas']; ?></td>
                        <td><?php echo $q['p_nama']; ?></td>
                        <td><?php echo $jmlpt; ?> Tiket</td>
                        <td><?php echo $nm_gol; ?></td>
                        <td><b>Rp <?php echo number_format($hasil,0,".","."); ?></b></td>
                        <td><?php echo $q['nohp']; ?></td>
                        <td><?php echo $q['email']; ?></td>
                        <td><a href="pages/konfirm.php?id=<?php echo $q['p_no_identitas']; ?> && total=<?php echo $hasil; ?>" class="btn btn-success" data-placement="bottom" data-toggle="tooltip" title="konfirmasi"><i class="fa fa-check"></i></a></td>
                        </tr>
                      <?php } ?>
                     <tbody>
                    
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

     </section><!-- /.content -->
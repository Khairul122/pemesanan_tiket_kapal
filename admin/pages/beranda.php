<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Beranda
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="home.php"> Home</a></li>
            <li class="active">Beranda</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3></h3>
                  <p>Pesanan Baru</p>
                </div>
                <div class="icon">
                  <i class="fa fa-envelope"></i>
                </div>
                <a href="home.php?p=belum-konfirm" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3></h3>
                  <p>Member</p>
                </div>
                <div class="icon">
                  <i class="fa fa-users"></i>
                </div>
                <a href="home.php?p=penumpang" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3></h3>
                  <p>Kapal</p>
                </div>
                <div class="icon">
                  <i class="fa fa-ship"></i>
                </div>
                <a href="home.php?p=kapal" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3></h3>
                  <p>Nahkoda</p>
                </div>
                <div class="icon">
                  <i class="fa fa-user-secret"></i>
                </div>
                <a href="home.php?p=nahkoda" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
          </div><!-- /.row -->
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

                   $sql2=mysqli_query($koneksi,"SELECT * FROM pesan WHERE ktgr_tiket='Dewasa' and kode_member='$kdmb' and pesan.status=1");
                         $jmltd=mysqli_num_rows($sql2);

                        
                         $sql3=mysqli_query($koneksi,"SELECT * FROM pesan WHERE ktgr_tiket='Anak' and kode_member='$kdmb' and pesan.status=1");
                         $jmlta=mysqli_num_rows($sql3);

                         $sql4=mysqli_query($koneksi,"SELECT bagasi.harga FROM pesan,bagasi WHERE pesan.bagasi=bagasi.id_bagasi and bagasi.id_bagasi='IBG-002' and pesan.status=1");
                         $jmlb1=mysqli_num_rows($sql4);
                         $abc1=mysqli_fetch_array($sql4);

                         $sql5=mysqli_query($koneksi,"SELECT bagasi.harga FROM pesan,bagasi WHERE pesan.bagasi=bagasi.id_bagasi and bagasi.id_bagasi='IBG-003' and pesan.status=1");
                         $jmlb2=mysqli_num_rows($sql5);
                         $abc2=mysqli_fetch_array($sql5);

                         $hjmlb1=$jmlb1*$abc1['harga'];

                         $hjmlb2=$jmlb2*$abc2['harga'];

                         $hargad=$q['hrg_tiket_dewasa'];

                         $hargaa=$q['hrg_tiket_ank2'];

                         $ttd=$jmltd*$hargad;

                         $tta=$jmlta*$hargaa;

                        $total=$tta+$ttd;

                        $jmlpt=$jmlta+$jmltd;


                        $code=Rand(111,999);
                        $hasil=$total+$code+$hjmlb1+$hjmlb2;

                     ?>
                 
                      <tr>
                        <td><?php echo $q['p_no_identitas']; ?></td>
                        <td><?php echo $q['p_nama']; ?></td>
                        <td><?php echo $jmlpt; ?> Tiket</td>
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
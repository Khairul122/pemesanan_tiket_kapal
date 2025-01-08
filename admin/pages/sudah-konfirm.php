  <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Pesanan
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="home.php"> Home</a></li>
            <li class="active">Sudah konfirmasi</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
  <!-- Main row -->
          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Pesanan sudah konfirmasi</h3>
                  <!-- <a href="home.php?p=tambah-pesanan" class="btn btn-primary"><i class="fa fa-plus"></i>Tambah</a>   -->
                </div><!-- /.box-header -->
                <div class="box-body">
                    
                  <table id="example1" class="table table-bordered table-striped">
                      
                    <thead>
                      <tr>
                        <th>Kode</th>
                        <th>Nama penumpang</th>
                        <th>Nomor kursi</th>
                        <th>Tujuan</th>
                        <th>Tanggal Berangkat</th>
                        <th>Telepon</th>
                        <th>Email</th>
                        <th>Kode Member</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                   
                    <tbody>
                     <?php
                    include '../../config/koneksi.php';

                     $sql=mysqli_query($koneksi,"SELECT tujuan.nama_tujuan,kursi.nok,tiket.jam_berangkat,tiket.kode_tiket,pesan. * FROM tiket,tujuan,kursi,pesan WHERE tujuan.kode_tujuan=tiket.id_tujuan and kursi.idk=pesan.idk and pesan.kode_tiket=tiket.kode_tiket and pesan.status=3");
                      while($q=mysqli_fetch_array($sql)){

                     ?>
                      <tr>
                        <td><?php echo $q['id_pesan']; ?></td>
                        <td><?php echo $q['nm_penumpang']; ?></td>
                        <td><?php echo $q['nok']; ?></td>
                        <td><?php echo $q['nama_tujuan']; ?></td>
                        <td><?php echo date('d-m-Y',strtotime($q['tgl_berangkat'])); ?>, Jam <?php echo date('h:m',strtotime($q['jam_berangkat'])); ?></td>
                        <td><?php echo $q['nohp']; ?></td>
                        <td><?php echo $q['email']; ?></td>
                        <td><?php echo $q['kode_member']; ?></td>
                        <td><p><a href="home.php?p=edit-pesanan&id=<?php echo $q['id_pesan']; ?>" class="btn btn-warning e_pesan" data-placement="bottom" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a><p>
                        <a href="./pages/delete-pesanan.php?id=<?php echo $q['id_pesan']; ?>" class="btn btn-danger" data-placement="bottom" data-toggle="tooltip" title="Hapus"><i class="fa fa-trash"></i></a>
                         </p></td>
                        </tr>
                      <?php } ?>
                     <tbody>
                    
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

     </section><!-- /.content -->
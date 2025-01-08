  <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Tiket
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="home.php"> Home</a></li>
            <li class="active">Tiket</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
  <!-- Main row -->
          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Tiket</h3>
                  <a href="home.php?p=tambah-tiket" class="btn btn-primary"><i class="fa fa-plus"></i>Tambah</a>  
                </div><!-- /.box-header -->
                <div class="box-body">
                    
                  <table id="example1" class="table table-bordered table-striped">
                      
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Kode Tiket</th>
                        <th>Jumlah Tiket Dewasa</th>
                        <th>Jumlah Tiket Anak</th>
                        <th>Harga Tiket Dewasa</th>
                        <th>Harga Tiket Anak</th>
                        <th>Tujuan</th>
                        <th>Kapal</th>
                        <th>Nahkoda</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                   
                    <tbody>
                     <?php
                    include '../../config/koneksi.php';
                      $no=0;
                    $sql=mysqli_query($koneksi,"SELECT tujuan.nama_tujuan,kapal.nama_kapal,nahkoda.nama_nah,tiket. * FROM tiket,nahkoda,tujuan,kapal WHERE tujuan.kode_tujuan=tiket.id_tujuan and kapal.kode_kapal=tiket.id_kapal and nahkoda.kode_nah=tiket.id_nahkoda");
                      while($q=mysqli_fetch_array($sql)){
                        $no++;

                     ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $q['kode_tiket']; ?></td>
                        <td><?php echo $q['jml_tiket_dewasa']; ?></td>
                        <td><?php echo $q['jml_tiket_ank2']; ?></td>
                        <td><?php echo $q['hrg_tiket_dewasa']; ?></td>
                        <td><?php echo $q['hrg_tiket_ank2']; ?></td>
                        <td><?php echo $q['id_tujuan'].'/'.$q['nama_tujuan']; ?></td>
                        <td><?php echo $q['id_kapal'].'/'.$q['nama_kapal']; ?></td>
                        <td><?php echo $q['id_nahkoda'].'/'.$q['nama_nah']; ?></td>
                        <td><p><a href="home.php?p=edit-tiket&id=<?php echo $q['kode_tiket']; ?>" class="btn btn-warning" data-placement="bottom" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a>
                        </p><p><a href="./pages/delete-tiket.php?id=<?php echo $q['kode_tiket']; ?>" class="btn btn-danger" data-placement="bottom" data-toggle="tooltip" title="Hapus"><i class="fa fa-trash"></i></a></p>
                       </td>
                        </tr>
                      <?php } ?>
                     <tbody>
                    
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

     </section><!-- /.content -->
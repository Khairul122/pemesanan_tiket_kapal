  <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Keberangkatan
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="home.php"> Home</a></li>
            <li class="active">Keberangkatan</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
  <!-- Main row -->
          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Keberangkatan</h3>
                  <a href="home.php?p=tambah-keberangkatan" class="btn btn-primary"><i class="fa fa-plus"></i>Tambah</a>  
                </div><!-- /.box-header -->
                <div class="box-body">
                    
                  <table id="example1" class="table table-bordered table-striped">
                      
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Kode Tiket</th>
                        <th>Tanggal Berangkat</th>
                        <th>Jam Berangkat</th>
                        <th>Tujuan</th>
                        <th>Kapal</th>
                        <th>Nahkoda</th>
                        <th>Jumlah member</th>
                        <th>Surat izin</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                   
                    <tbody>
                     <?php
                    include '../../config/koneksi.php';
                      $no=0;
                    $sql=mysqli_query($koneksi,"SELECT tiket.id_nahkoda,tiket.id_kapal,tiket.id_tujuan,nahkoda.nama_nah,tujuan.nama_tujuan,kapal.nama_kapal,berangkat. * FROM tiket,nahkoda,tujuan,kapal,berangkat WHERE tujuan.kode_tujuan=tiket.id_tujuan and kapal.kode_kapal=tiket.id_kapal and nahkoda.kode_nah=tiket.id_nahkoda and tiket.kode_tiket=berangkat.id_tiket");
                      while($q=mysqli_fetch_array($sql)){
                        $no++;

                     ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $q['id_tiket']; ?></td>
                        <td><?php echo date('d-m-Y',strtotime($q['tanggal'])); ?></td>
                        <td><?php echo date('H:i',strtotime($q['tanggal'])); ?></td>
                        <td><?php echo $q['id_tujuan'].' / '.$q['nama_tujuan']; ?></td>
                        <td><?php echo $q['id_kapal'].' / '.$q['nama_kapal']; ?></td>
                        <td><?php echo $q['id_nahkoda'].' / '.$q['nama_nah']; ?></td>
                        <td><?php echo $q['jml_penumpang']; ?></td>
                        <td><?php echo $q['no_surat_izin']; ?></td>
                        <td><p><a href="home.php?p=edit-keberangkatan&id=<?php echo $q['id_berangkat']; ?>" class="btn btn-warning" data-placement="bottom" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a>
                        </p><p><a href="./pages/delete-keberangkatan.php?id=<?php echo $q['id_berangkat']; ?>" class="btn btn-danger" data-placement="bottom" data-toggle="tooltip" title="Hapus"><i class="fa fa-trash"></i></a></p>
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
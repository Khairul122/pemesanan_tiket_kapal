  <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Bagasi
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="home.php"> Home</a></li>
            <li class="active">Bagasi</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
  <!-- Main row -->
          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Bagasi</h3>
                 
                </div><!-- /.box-header -->
                <div class="box-body">
                    
                  <table id="example1" class="table table-bordered table-striped">
                      
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Kode Bagasi</th>
                        <th>Jumlah Bagasi</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                   
                    <tbody>
                     <?php
                    include '../../config/koneksi.php';
                      $no=0;
                    $sql=mysqli_query($koneksi,"SELECT * FROM bagasi");
                      while($q=mysqli_fetch_array($sql)){
                        $no++;

                     ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $q['id_bagasi']; ?></td>
                        <td><?php echo $q['jml_bagasi']; ?></td>
                        <td><?php echo $q['harga']; ?></td>
                        <td><p><a href="home.php?p=edit-bagasi&id=<?php echo $q['id_bagasi']; ?>" class="btn btn-warning" data-placement="bottom" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a>
                        <a href="./pages/delete-bagasi.php?id=<?php echo $q['id_bagasi']; ?>" class="btn btn-danger" data-placement="bottom" data-toggle="tooltip" title="Hapus"><i class="fa fa-trash"></i></a></p>
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
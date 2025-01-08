  <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Nahkoda
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="home.php"> Home</a></li>
            <li class="active">Nahkoda</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
  <!-- Main row -->
          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Nahkoda</h3>
                  <a href="home.php?p=tambah-nahkoda" class="btn btn-primary"><i class="fa fa-plus"></i>Tambah</a>  
                </div><!-- /.box-header -->
                <div class="box-body">
                    
                  <table id="example1" class="table table-bordered table-striped">
                      
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Kode Nahkoda</th>
                        <th>Nama Nahkoda</th>
                        <th>Nomor Telepon</th>
                        <th>Alamat</th>
                        <th>Umur</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                   
                    <tbody>
                     <?php
                    include '../../config/koneksi.php';
                      $no=0;
                    $sql=mysqli_query($koneksi,"SELECT * FROM nahkoda");
                      while($q=mysqli_fetch_array($sql)){
                        $no++;

                     ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $q['kode_nah']; ?></td>
                        <td><?php echo $q['nama_nah']; ?></td>
                        <td><?php echo $q['nohp']; ?></td>
                        <td><?php echo $q['alm']; ?></td>
                        <td><?php echo $q['umur']; ?></td>
                        <td><p><a href="home.php?p=edit-nahkoda&id=<?php echo $q['kode_nah']; ?>" class="btn btn-warning" data-placement="bottom" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a>
                        <a href="./pages/delete-nahkoda.php?id=<?php echo $q['kode_nah']; ?>" class="btn btn-danger" data-placement="bottom" data-toggle="tooltip" title="Hapus"><i class="fa fa-trash"></i></a></p>
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
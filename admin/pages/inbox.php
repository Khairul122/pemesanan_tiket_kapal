  <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Inbok
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="home.php"> Home</a></li>
            <li class="active">Inbox</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
  <!-- Main row -->
          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Inbox</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    
                  <table id="example1" class="table table-bordered table-striped">
                      
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>ID</th>
                        <th>Nama pemesan</th>
                        <th>Subjek Pesan</th>
                        <th>Isi Pesan</th>
                        <th>Tanggal Dikirim</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                   
                    <tbody>
                     <?php
                    include '../../config/koneksi.php';
                      $no=0;
                    $sql=mysqli_query($koneksi,"SELECT * FROM inbox");
                      while($q=mysqli_fetch_array($sql)){
                        $no++;

                     ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $q['idi']; ?></td>
                        <td><?php echo $q['nm']; ?></td>
                        <td><?php echo $q['sub']; ?></td>
                        <td><?php echo $q['isi']; ?></td>
                        <td><?php echo $q['tgl']; ?></td>
                        <td>
                        <a href="./pages/delete-inbox.php?id=<?php echo $q['idi']; ?>" class="btn btn-danger" data-placement="bottom" data-toggle="tooltip" title="Hapus"><i class="fa fa-trash"></i></a></p>
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
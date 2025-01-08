  <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            member
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="home.php"> Home</a></li>
            <li class="active">member</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
  <!-- Main row -->
          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">member</h3>
                  <a href="home.php?p=tambah-penumpang" class="btn btn-primary"><i class="fa fa-plus"></i>Tambah</a>  
                </div><!-- /.box-header -->
                <div class="box-body">
                    
                  <table id="example1" class="table table-bordered table-striped">
                      
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nomor Identitas</th>
                        <th>Nama Lengkap</th>
                        <th>Email</th>
                        <th>Nomor HP</th>
                        <th>ALamat</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                   
                    <tbody>
                     <?php
                    include '../../config/koneksi.php';
                      $no=0;
                    $sql=mysqli_query($koneksi,"SELECT * FROM member");
                      while($q=mysqli_fetch_array($sql)){
                        $no++;

                     ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $q['p_no_identitas']; ?></td>
                        <td><?php echo $q['p_nama']; ?></td>
                        <td><?php echo $q['email']; ?></td>
                        <td><?php echo $q['p_nohp']; ?></td>
                        <td><?php echo $q['p_alamat']; ?></td>
                        <td><p>
                        <?php
                        if($q['confirm']=='N'){
                         echo'<a href="./pages/confirm-member.php?id='.$q['p_no_identitas'].'" class="btn btn-success" data-placement="bottom" data-toggle="tooltip" title="Konfirmasi"><i class="fa fa-check"></i></a>';
                       }else{
                        echo"";
                      }
                         ?>
                      
                        <a href="home.php?p=edit-penumpang&id=<?php echo $q['p_no_identitas']; ?>" class="btn btn-warning" data-placement="bottom" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a>
                        <a href="./pages/delete-penumpang.php?id=<?php echo $q['p_no_identitas']; ?>" class="btn btn-danger" data-placement="bottom" data-toggle="tooltip" title="Hapus"><i class="fa fa-trash"></i></a>
                        </p>
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
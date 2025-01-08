
                 <?php 
                            include './config/koneksi.php';

                              $id=$_GET['id'];

                              $cek=mysqli_query($koneksi,"SELECT * From member WHERE p_no_identitas='$id' And confirm='C'");

                              $hasilcek = mysqli_num_rows ( $cek); 

                              if(empty($hasilcek)){

                                 echo '<script> alert("Maaf akun anda belum di konfirmasi oleh admin.");</script>';

                                echo "<meta http-equiv=refresh content=0;url=index.php>";
                              
                           }else{
                             $sql=mysqli_query($koneksi,"UPDATE member SET confirm='Y' WHERE p_no_identitas='$id'");
                           }


            if(!$sql) {
               echo '<script> alert("Akun anda gagal diVerifikasi.");</script>';

               echo "<meta http-equiv=refresh content=0;url=index.php>";
              
            } else {
              echo '<script> alert("Akun anda berhasil dikonfirmasi, Silahkan login dengan akun tersebut.");</script>';

              echo "<meta http-equiv=refresh content=0;url=index.php>";
            }

                          
                          
                            ?>
                   
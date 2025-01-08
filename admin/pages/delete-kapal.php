<?php 

include '../../config/koneksi.php';
$id=$_GET['id'];
$qgmb= mysqli_query($koneksi,"SELECT * FROM kapal WHERE kode_kapal='$id'");
    $cek=mysqli_fetch_array($qgmb);
   $ft=$cek['ft_kapal'];

 $sql=mysqli_query($koneksi,"DELETE FROM kapal WHERE kode_kapal='$id'");

 unlink("../../assets/images/kapal/".$ft);

 echo '<script> alert("Kapal berhasil dihapus."); javascript:history.back(); </script>';

  

?>
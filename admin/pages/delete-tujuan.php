<?php 

include '../../config/koneksi.php';
$id=$_GET['id'];

 $sql=mysqli_query($koneksi,"DELETE FROM tujuan WHERE kode_tujuan='$id'");

 echo '<script> alert("Tujuan berhasil dihapus."); javascript:history.back(); </script>';

  

?>
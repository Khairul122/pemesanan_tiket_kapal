<?php 

include '../../config/koneksi.php';
$id=$_GET['id'];

 $sql=mysqli_query($koneksi,"DELETE FROM nahkoda WHERE kode_nah='$id'");

 echo '<script> alert("Nahkoda berhasil dihapus."); javascript:history.back(); </script>';

  

?>
<?php 

include '../../config/koneksi.php';
$id=$_GET['id'];

 $sql=mysqli_query($koneksi,"DELETE FROM bagasi WHERE id_bagasi='$id'");

 echo '<script> alert("Bagasi berhasil dihapus."); javascript:history.back(); </script>';

  

?>
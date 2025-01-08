<?php 

include '../../config/koneksi.php';
$id=$_GET['id'];

 $sql=mysqli_query($koneksi,"DELETE FROM inbox WHERE idi='$id'");

 echo '<script> alert("Pesan berhasil dihapus."); javascript:history.back(); </script>';

  

?>
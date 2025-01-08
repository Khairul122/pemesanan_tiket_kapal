<?php 

include '../../config/koneksi.php';
$id=$_GET['id'];

 $sql=mysqli_query($koneksi,"DELETE FROM kursi WHERE idk='$id'");

 echo '<script> alert("Kursi berhasil dihapus."); javascript:history.back(); </script>';

  

?>
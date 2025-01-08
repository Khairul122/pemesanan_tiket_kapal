<?php 

include '../../config/koneksi.php';
$id=$_GET['id'];

 $sql=mysqli_query($koneksi,"DELETE FROM berangkat WHERE id_berangkat='$id'");

 echo '<script> alert("Keberangkatan berhasil dihapus."); javascript:history.back(); </script>';

  

?>
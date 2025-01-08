<?php 

include '../../config/koneksi.php';
$id=$_GET['id'];

 $sql=mysqli_query($koneksi,"DELETE FROM tiket WHERE kode_tiket='$id'");

 echo '<script> alert("Tiket berhasil dihapus."); javascript:history.back(); </script>';

  

?>
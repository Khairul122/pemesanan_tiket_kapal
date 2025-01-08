<?php 

include '../../config/koneksi.php';
$id=$_GET['id'];

 $sql=mysqli_query($koneksi,"DELETE FROM pesan WHERE id_pesan='$id'");

 echo '<script> alert("Pesanan berhasil dihapus."); javascript:history.back(); </script>';

  

?>
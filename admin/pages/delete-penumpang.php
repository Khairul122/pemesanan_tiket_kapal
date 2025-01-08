<?php 

include '../../config/koneksi.php';
$id=$_GET['id'];

 $sql=mysqli_query($koneksi,"DELETE FROM member WHERE p_no_identitas='$id'");

 echo '<script> alert("Penumpang berhasil dihapus."); javascript:history.back(); </script>';

  

?>
<?php 

include '../../config/koneksi.php';
$id=$_GET['id'];

$sql=mysqli_query($koneksi,"DELETE FROM confirm_pembayaran WHERE id_member='$id'");

 $sql=mysqli_query($koneksi,"UPDATE pesan SET status='3' WHERE kode_member='$id' ");

 echo '<script> alert("Pesanan berhasil dikonfirmasi lunas."); javascript:history.back(); </script>';

  

?>
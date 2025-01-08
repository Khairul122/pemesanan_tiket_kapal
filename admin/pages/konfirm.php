<?php 

include '../../config/koneksi.php';
$id=$_GET['id'];

$total=$_GET['total'];


             // menambahkan jam di php
if(function_exists('date_default_timezone_set')) date_default_timezone_set('Asia/Jakarta');
$tglp=date('Y-m-d h:i:s');
$date = date_create($tglp);
date_add($date, date_interval_create_from_date_string('3 hours'));
$tglj=date_format($date, 'Y-m-d h:i:s');


$sql=mysqli_query($koneksi,"INSERT INTO confirm_pembayaran VALUES ('','$id','$total','$tglp','$tglj')");

 $sql=mysqli_query($koneksi,"UPDATE pesan SET status='2' WHERE kode_member='$id' ");

 echo '<script> alert("Pesanan berhasil dikonfirmasi."); javascript:history.back(); </script>';

  

?>
<?php ob_start(); ?>
<style type="text/css">
  table {
    border-collapse: collapse;
    padding-left: 3px;

}

table, th, td {
    border: 1px solid black;
}
th, td {
    padding: 8px;
    text-align: left;
   
}
h3{
  margin-bottom: 1px;
  margin-top: 1px;
}
p{
  margin-bottom: 1px;
  margin-top: 1px;
}
</style>
<body style="font-size: 12px;">

<h3 style="text-align: center; font-size: 16px;">BUKTI PEMESANAN TIKET</h3>
<h3 style="text-align: center; font-size: 13px;">PT.ANUGRAH SEJAHTERA MAS</h3>
<p style="text-align: center;">Jl.Alamat lengkap perusahaan</p>
<p style="text-align: center;">mentawaifast@gmail.comn | +62 751 893489 </p>

<hr>
                     <?php

include "../config/koneksi.php";

 $nmbulan = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

$id=$_GET['id'];

		$sql1=mysqli_query($koneksi,"SELECT tujuan.nama_tujuan,kursi.nok,tiket.kode_tiket,tiket.jam_berangkat,pesan. * FROM tiket,tujuan,kursi,pesan WHERE tujuan.kode_tujuan=tiket.id_tujuan and kursi.idk=pesan.idk and pesan.kode_tiket=tiket.kode_tiket and id_pesan='$id'");	 	
		$no=0;
	$tampil1 = mysqli_fetch_array($sql1);


  //tanggal lahir
  $birthDt = new DateTime($tampil1['umur']);
  //tanggal hari ini
  $today = new DateTime('today');
  //tahun
  $y = $today->diff($birthDt)->y;
  // //bulan
  // $m = $today->diff($birthDt)->m;
  // //hari
  // $d = $today->diff($birthDt)->d;
 

?>
<p style="padding-left: 100px;">Nama : <b><?php echo $tampil1['nm_penumpang']; ?></b></p>
<p style="padding-left: 100px;">Umur : <b><?php echo $y; ?> th</b></p>
<p style="padding-left: 100px; padding-bottom: 5px;">Nomor kursi : <b><?php echo $tampil1['nok']; ?></b></p>
<table class="table table-hover">
                      
                      <tr>
                        <th width="80">ID PESANAN</th>
                        <th width="100">KATEGORI</th>
                        <th width="100">TUJUAN</th>
                        <th width="100">TANGGAL BERANGKAT</th>
                        <th width="80">JAM BERANGKAT</th>
                        <th width="80">STATUS</th>
                      </tr>
                     <?php



$id=$_GET['id'];

		$sql=mysqli_query($koneksi,"SELECT tujuan.nama_tujuan,kursi.nok,tiket.kode_tiket,tiket.jam_berangkat,pesan. * FROM tiket,tujuan,kursi,pesan WHERE tujuan.kode_tujuan=tiket.id_tujuan and kursi.idk=pesan.idk and pesan.kode_tiket=tiket.kode_tiket and id_pesan='$id'");	 	
		$no=0;
		while($tampil = mysqli_fetch_array($sql)) {

?>
                    	<tr>
                        <td width="80"><?php echo $tampil['id_pesan']; ?> </td>
                        <td width="100"><?php echo $tampil['ktgr_tiket']; ?> </td>
                        <td width="100"><?php echo $tampil['nama_tujuan']; ?> </td>
                        <td width="100"><?php echo date('d F Y',strtotime($tampil['tgl_berangkat'])); ?> </td>
                        <td width="80"><?php echo date('H:i',strtotime($tampil['jam_berangkat'])); ?></td>
                        <td width="80">LUNAS</td>

                       </tr>
                       <?php } ?>
                    </table>
                      <br>
                      <?php
                      $id=$_GET['id'];

		$sql2=mysqli_query($koneksi,"SELECT tujuan.nama_tujuan,kursi.nok,tiket.kode_tiket,tiket.jam_berangkat,pesan. * FROM tiket,tujuan,kursi,pesan WHERE tujuan.kode_tujuan=tiket.id_tujuan and kursi.idk=pesan.idk and pesan.kode_tiket=tiket.kode_tiket and id_pesan='$id'");	 	
		$no=0;
	$tampil2 = mysqli_fetch_array($sql2);

?>
<i>* Sarat dan ketentuan berlaku untuk tiket ini.</i>
<p><i>* Diharapkan checkin satu jam sebelum jam keberangkatan.</i></p>
<p style="text-align: right; margin-top: 10px; margin-right: 9px;"> Padang, <?php echo date('d'); ?> <?php echo $nmbulan[(int) date('m') - 1]; ?> <?php echo date('Y'); ?> </p>
<br>
<br>
<br>
<p style="text-align: right; margin-top: 5px; margin-right: 9px;"><b><?php echo $tampil1['nm_penumpang']; ?></b></p>
             
                    </body>
                    <?php
$html =ob_get_contents();
ob_end_clean();
        
require_once('html2pdf/html2pdf.class.php');
$pdf = new HTML2PDF('P','A4','en');
$pdf->WriteHTML($html);
$pdf->Output('Bukti_pemesanan.pdf', 'D');
?>
                  


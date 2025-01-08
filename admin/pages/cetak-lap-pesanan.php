<?php ob_start(); ?>
<html>
<style type="text/css">
	table {
    border-collapse: collapse;
    padding-left: 6px;

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
<head>
	<title>Cetak PDF</title>
</head>
<body style="font-size: 12px;">
	<?php 

 $nmbulan = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

$bln=$_GET['bln'];
$thn=$_GET['thn'];

	?>
<h3 style="text-align: center; font-size: 16px">LAPORAN PEMESANAN TIKET</h3>
<h3 style="text-align: center; font-size: 13px;">PT.ANUGERA SEJAHTERA MAS</h3>
<p style="text-align: center;">Jl. Alamat lengkap</p>
<p style="text-align: center;">Alamat-email@gmail.com / Hp:0821233123123 / Pin:b3jk343</p>
<hr>
<p style="text-align: center; margin-bottom: 5px;"> Periode : <?php if(!$bln=="") echo $nmbulan[(int) $bln - 1]; ?> <?php if(!$thn=="") echo $thn; ?> </p>
<table border="0" width="50%">
<tr>
	<th width='10'>NO</th>
	<th width='50'>ID PESANAN</th>
	<th width='100'>NAMA PENUMPANG</th>
	<th width='55'>UMUR</th>
	<th width='55'>KATEGORI</th>
	<th width='30'>NOMOR KURSI</th>
	<th width='100'>TUJUAN</th>
	<th width='60'>TAGGGAL BERANGKAT</th>

</tr>
<?php
// Load file koneksi.php
include "../../config/koneksi.php";


$sql = mysqli_query($koneksi,"SELECT tujuan.nama_tujuan,kursi.nok,tiket.jam_berangkat,tiket.kode_tiket,pesan. * FROM tiket,tujuan,kursi,pesan WHERE tujuan.kode_tujuan=tiket.id_tujuan and kursi.idk=pesan.idk and pesan.kode_tiket=tiket.kode_tiket and pesan.status=3 and month(tanggal_pesan)='$bln' and year(tanggal_pesan)='$thn'"); // Eksekusi/Jalankan query dari variabel $query
$row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql
 
if($row > 0){ // Jika jumlah data lebih dari 0 (Berarti jika data ada)

 

		$no=0;$tot=0;
    while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
    	$no++;

    	$birthDt = new DateTime($data['umur']);
  //tanggal hari ini
  $today = new DateTime('today');
  //tahun
  $y = $today->diff($birthDt)->y;
			
							
        echo "<tr>";
        echo "<td  width='10'>".$no."</td>";
        echo "<td  width='50'>".$data['id_pesan']."</td>";
        echo "<td width='100'>".$data['nm_penumpang']."</td>";
        echo "<td  width='30'>".$y."</td>";
         echo "<td  width='30'>".$data['ktgr_tiket']."</td>";
        echo "<td  width='30'>".$data['nok']."</td>";
        echo "<td  width='100'>".$data['nama_tujuan']."</td>";
        echo "<td  width='40'>".date('d F Y',strtotime($data['tgl_berangkat']))."</td>";

        echo "</tr>";
    }
}else{ // Jika data tidak ada
    echo "<tr><td colspan='8'>Data tidak ada</td></tr>";
}

?>
</table>
<br>
<p style="text-align: right; margin-top: 10px; margin-right: 9px;"> Padang, <?php echo date('d'); ?> <?php echo $nmbulan[(int) date('m') - 1]; ?> <?php echo date('Y'); ?> </p>
<br>
<br>
<br>
<p style="text-align: right; margin-top: 5px; margin-right: 9px;"><b>Pimpinan</b></p>
</body>
</html>
<?php
$html =ob_get_contents();
ob_end_clean();
        
require_once('html2pdf/html2pdf.class.php');
$pdf = new HTML2PDF('P','A4','en');
$pdf->WriteHTML($html);
$pdf->Output('laporan_pemesanan.pdf', 'D');
?>

<?php ob_start(); ?>
<html>
<style type="text/css">
	table {
    border-collapse: collapse;
    padding-left: 5px;

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
<body style="font-size: 10px;">
	<?php 

 $nmbulan = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");


	?>
<h3 style="text-align: center; font-size: 16px">LAPORAN DATA TIKET</h3>
<h3 style="text-align: center; font-size: 13px;">PT.ANUGERA SEJAHTERA MAS</h3>
<p style="text-align: center;">Jl. Alamat lengkap</p>
<p style="text-align: center;">Alamat-email@gmail.com / Hp:0821233123123 / Pin:b3jk343</p>
<hr>
<p style="text-align: center; margin-bottom: 5px;"> Periode : Semua </p>
<table border="0" width="50%">
<tr>


	<th width='5'>NO</th>
	<th width='40'>KODE TIKET</th>
	<th width='20'>JUMLAH DEWASA</th>
	<th width='50'>HARGA DEWASA</th>
	<th width='20'>JUMLAH ANAK2</th>
	<th width='50'>HARGA ANAK2</th>
	<th width='80'>TUJUAN</th>
	<th width='80'>NAHKODA</th>
	<th width='80'>KAPAL</th>

</tr>
<?php
// Load file koneksi.php
include "../../config/koneksi.php";


$sql = mysqli_query($koneksi,"SELECT tujuan.nama_tujuan,kapal.nama_kapal,nahkoda.nama_nah,tiket. * FROM tiket,nahkoda,tujuan,kapal WHERE tujuan.kode_tujuan=tiket.id_tujuan and kapal.kode_kapal=tiket.id_kapal and nahkoda.kode_nah=tiket.id_nahkoda"); // Eksekusi/Jalankan query dari variabel $query
$row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql
 
if($row > 0){ // Jika jumlah data lebih dari 0 (Berarti jika data ada)

 

		$no=0;$tot=0;
    while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
    	$no++;


        echo "<tr>";
        echo "<td  width='5'>".$no."</td>";
        echo "<td  width='40'>".$data['kode_tiket']."</td>";
        echo "<td width='20'>".$data['jml_tiket_dewasa']."</td>";
         echo "<td width='40'>".$data['hrg_tiket_dewasa']."</td>";
        echo "<td  width='20'>".$data['jml_tiket_ank2']."</td>";
         echo "<td  width='40'>".$data['hrg_tiket_ank2']."</td>";
          echo "<td  width='80'>".$data['id_tujuan'].'/'.$data['nama_tujuan']."</td>";
        echo "<td  width='80'>".$data['id_nahkoda'].'/'.$data['nama_nah']."</td>";
        echo "<td  width='80'>".$data['id_kapal'].'/'.$data['nama_kapal']."</td>";
        echo "</tr>";
    }
}else{ // Jika data tidak ada
    echo "<tr><td colspan='9'>Data tidak ada</td></tr>";
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
$pdf->Output('laporan_tiket.pdf', 'D');
?>



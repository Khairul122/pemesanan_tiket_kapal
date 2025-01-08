<?php ob_start(); ?>
<html>
<style type="text/css">
	table {
    border-collapse: collapse;
    padding-left: 8px;

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


	?>
<h3 style="text-align: center; font-size: 16px">LAPORAN DATA NAHKODA</h3>
<h3 style="text-align: center; font-size: 13px;">PT.ANUGERA SEJAHTERA MAS</h3>
<p style="text-align: center;">Jl. Alamat lengkap</p>
<p style="text-align: center;">Alamat-email@gmail.com / Hp:0821233123123 / Pin:b3jk343</p>
<hr>
<p style="text-align: center; margin-bottom: 5px;"> Periode : Semua </p>
<table border="0" width="50%">
<tr>


	<th width='20'>NO</th>
	<th width='100'>KODE NAHKODA</th>
	<th width='100'>NAMA NAHKODA</th>
	<th width='80'>UMUR</th>
	<th width='100'>NOMOR TELEPON</th>
	<th width='132'>ALAMAT</th>


</tr>
<?php
// Load file koneksi.php
include "../../config/koneksi.php";


$sql = mysqli_query($koneksi,"SELECT * FROM nahkoda"); // Eksekusi/Jalankan query dari variabel $query
$row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql
 
if($row > 0){ // Jika jumlah data lebih dari 0 (Berarti jika data ada)

 

		$no=0;$tot=0;
    while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
    	$no++;

        echo "<tr>";
        echo "<td  width='20'>".$no."</td>";
        echo "<td  width='100'>".$data['kode_nah']."</td>";
        echo "<td width='100'>".$data['nama_nah']."</td>";
        echo "<td width='80'>".$data['umur']."</td>";
        echo "<td width='100'>".$data['nohp']."</td>";
        echo "<td width='132'>".$data['alm']."</td>";

        echo "</tr>";
    }
}else{ // Jika data tidak ada
    echo "<tr><td colspan='6'>Data tidak ada</td></tr>";
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
$pdf->Output('laporan_nahkoda.pdf', 'D');
?>


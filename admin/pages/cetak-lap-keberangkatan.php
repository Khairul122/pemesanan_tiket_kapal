<?php ob_start(); ?>
<html>
<style type="text/css">
	table {
		border-collapse: collapse;
		padding-left: 5px;
	}

	table,
	th,
	td {
		border: 1px solid black;
	}

	th,
	td {
		padding: 8px;
		text-align: left;
	}

	h3 {
		margin-bottom: 1px;
		margin-top: 1px;
	}

	p {
		margin-bottom: 1px;
		margin-top: 1px;
	}

	body {
		font-size: 8px;
	}
</style>

<head>
	<title>Cetak PDF</title>
</head>

<body>
	<?php

	$nmbulan = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

	$bln = isset($_GET['bln']) ? $_GET['bln'] : "";
	$thn = isset($_GET['thn']) ? $_GET['thn'] : "";
	$tgl = isset($_GET['tgl']) ? $_GET['tgl'] : "";

	$filter = "";
	if ($tgl) {
		$filter = "AND DATE(tanggal) = '$thn-$bln-$tgl'";
	} elseif ($bln && $thn) {
		$filter = "AND MONTH(tanggal) = '$bln' AND YEAR(tanggal) = '$thn'";
	} elseif ($thn) {
		$filter = "AND YEAR(tanggal) = '$thn'";
	}
	?>
	<h3 style="text-align: center; font-size: 13px;">PT.ANUGERA SEJAHTERA MAS</h3>
	<p style="text-align: center;">Jln. Nipah No. 1B, Kelurahan Berok Nipah, Kecamatan Padang Barat, Kota Padang</p>
	<p style="text-align: center;">mentawaifast@gmail.comn | +62 751 893489 </p>
	<hr>
	<h3 style="text-align: center; font-size: 16px">LAPORAN KEBERANGKATAN</h3>
	<p style="text-align: center; margin-bottom: 5px;"> Periode : <?php
																	if ($tgl) {
																		echo $tgl . " " . $nmbulan[(int)$bln - 1] . " " . $thn;
																	} elseif ($bln && $thn) {
																		echo $nmbulan[(int)$bln - 1] . " " . $thn;
																	} elseif ($thn) {
																		echo $thn;
																	}
																	?> </p>
	<table border="0" width="100%">
		<tr>
			<th width='5'>NO</th>
			<th width='40'>KODE TIKET</th>
			<th width='40'>TANGGAL</th>
			<th width='20'>JAM</th>
			<th width='60'>TUJUAN</th>
			<th width='60'>KAPAL</th>
			<th width='60'>NAHKODA</th>
			<th width='70'>JUMLAH PENUMPANG</th>
			<th width='60'>SURAT IZIN</th>
			<th width='30'>STATUS</th>
		</tr>
		<?php
		// Load file koneksi.php
		include "../../config/koneksi.php";

		$sql = mysqli_query($koneksi, "SELECT tiket.id_nahkoda, tiket.id_kapal, tiket.id_tujuan, nahkoda.nama_nah, tujuan.nama_tujuan, kapal.nama_kapal, berangkat.* FROM tiket 
    JOIN nahkoda ON nahkoda.kode_nah = tiket.id_nahkoda
    JOIN tujuan ON tujuan.kode_tujuan = tiket.id_tujuan
    JOIN kapal ON kapal.kode_kapal = tiket.id_kapal
    JOIN berangkat ON tiket.kode_tiket = berangkat.id_tiket
    WHERE 1=1 $filter");

		$row = mysqli_num_rows($sql);

		if ($row > 0) {
			$no = 0;
			while ($data = mysqli_fetch_array($sql)) {
				$no++;
				$stt = ($data['status'] == "P") ? "Pergi" : "Balik";

				echo "<tr>";
				echo "<td>" . $no . "</td>";
				echo "<td>" . $data['id_tiket'] . "</td>";
				echo "<td>" . date('d F Y', strtotime($data['tanggal'])) . "</td>";
				echo "<td>" . date('H:i', strtotime($data['tanggal'])) . "</td>";
				echo "<td>" . $data['nama_tujuan'] . "</td>";
				echo "<td>" . $data['nama_kapal'] . "</td>";
				echo "<td>" . $data['nama_nah'] . "</td>";
				echo "<td>" . $data['jml_penumpang'] . "</td>";
				echo "<td>" . $data['no_surat_izin'] . "</td>";
				echo "<td>" . $stt . "</td>";
				echo "</tr>";
			}
		} else {
			echo "<tr><td colspan='10'>Data tidak ada</td></tr>";
		}
		?>
	</table>
	<br>
	<p style="text-align: right; margin-top: 10px; margin-right: 9px;"> Padang, <?php echo date('d'); ?> <?php echo $nmbulan[(int)date('m') - 1]; ?> <?php echo date('Y'); ?> </p>
	<br>
	<br>
	<br>
	<p style="text-align: right; margin-top: 5px; margin-right: 9px;"><b>Pimpinan</b></p>
</body>

</html>
<?php
$html = ob_get_contents();
ob_end_clean();

require_once('html2pdf/html2pdf.class.php');
$pdf = new HTML2PDF('L', 'A4', 'en'); // Set orientation to Landscape
$pdf->WriteHTML($html);
$pdf->Output('laporan_keberangkatan.pdf', 'D');
?>
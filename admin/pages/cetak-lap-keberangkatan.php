<?php 
ob_start();
$tgl = isset($_GET['tgl']) ? (int)$_GET['tgl'] : '';
$bln = isset($_GET['bln']) ? (int)$_GET['bln'] : '';
$thn = isset($_GET['thn']) ? (int)$_GET['thn'] : '';
$nmbulan = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Keberangkatan</title>
    <style>
        @page { size: landscape; }
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            font-size: 9pt;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }
        .header .report-title {
            font-size: 16pt;
            font-weight: bold;
        }
        .header .company-info {
            text-align: right;
            font-size: 9pt;
            line-height: 1.5;
        }
        .periode {
            text-align: center;
            font-size: 12pt;
            margin: 20px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            table-layout: fixed;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
            word-wrap: break-word;
        }
        th {
            background-color: #f0f0f0;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .total-row {
            font-weight: bold;
            background-color: #f0f0f0;
        }
        .signature {
            margin-top: 40px;
            text-align: center;
            width: 200px;
            float: right;
        }
        .signature-line {
            margin-top: 50px;
            border-top: 1px solid #000;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="report-title">LAPORAN KEBERANGKATAN</div>
        <div class="company-info">
            PT. ANUGERA SEJAHTERA MAS<br>
            Jl. Alamat lengkap<br>
            Alamat-email@gmail.com / Hp: 0821233123123 / Pin: b3jk343
        </div>
    </div>
    <hr style="border: 1px solid #000;">

    <div class="periode">
        Periode: 
        <?php 
        $periode = array();
        if ($tgl) $periode[] = $tgl;
        if ($bln) $periode[] = $nmbulan[$bln - 1];
        if ($thn) $periode[] = $thn;
        echo implode(' ', $periode);
        ?>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Tiket</th>
                <th>Tanggal</th>
                <th>Jam</th>
                <th>Tujuan</th>
                <th>Kapal</th>
                <th>Nahkoda</th>
                <th>Jumlah Penumpang</th>
                <th>Surat Izin</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include "../../config/koneksi.php";

            $where = array();
            if ($tgl) $where[] = "DAY(berangkat.tanggal)='$tgl'";
            if ($bln) $where[] = "MONTH(berangkat.tanggal)='$bln'";
            if ($thn) $where[] = "YEAR(berangkat.tanggal)='$thn'";

            $whereClause = !empty($where) ? "AND " . implode(" AND ", $where) : "";

            $sql = mysqli_query($koneksi, "
                SELECT 
                    tiket.id_nahkoda,
                    tiket.jam_berangkat,
                    tiket.id_kapal,
                    tiket.id_tujuan,
                    nahkoda.nama_nah,
                    tujuan.nama_tujuan,
                    kapal.nama_kapal,
                    berangkat.* 
                FROM tiket
                JOIN nahkoda ON nahkoda.kode_nah = tiket.id_nahkoda
                JOIN tujuan ON tujuan.kode_tujuan = tiket.id_tujuan 
                JOIN kapal ON kapal.kode_kapal = tiket.id_kapal 
                JOIN berangkat ON tiket.kode_tiket = berangkat.id_tiket 
                WHERE 1=1 $whereClause
                ORDER BY berangkat.tanggal DESC
            ");

            if (mysqli_num_rows($sql) > 0) {
                $no = 0;
                $total_penumpang = 0;
                while ($data = mysqli_fetch_array($sql)) {
                    $no++;
                    $total_penumpang += $data['jml_penumpang'];
                    echo "<tr>
                        <td>{$no}</td>
                        <td>" . htmlspecialchars($data['id_tiket']) . "</td>
                        <td>" . date('d-m-Y', strtotime($data['tanggal'])) . "</td>
                        <td>" . date('H:i', strtotime($data['jam_berangkat'])) . "</td>
                        <td>" . htmlspecialchars($data['id_tujuan'] . '/' . $data['nama_tujuan']) . "</td>
                        <td>" . htmlspecialchars($data['id_kapal'] . '/' . $data['nama_kapal']) . "</td>
                        <td>" . htmlspecialchars($data['id_nahkoda'] . '/' . $data['nama_nah']) . "</td>
                        <td>{$data['jml_penumpang']}</td>
                        <td>" . htmlspecialchars($data['no_surat_izin']) . "</td>
                        <td>" . ($data['status'] == 'P' ? 'Pergi' : 'Balik') . "</td>
                    </tr>";
                }
                echo "<tr class='total-row'>
                        <td colspan='7'>Total Penumpang</td>
                        <td colspan='3'>{$total_penumpang}</td>
                    </tr>";
            } else {
                echo "<tr><td colspan='10'>Data tidak tersedia</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <div class="signature">
        Padang, <?php echo date('d') . ' ' . $nmbulan[(int)date('m') - 1] . ' ' . date('Y'); ?>
        <div class="signature-line"></div>
        <strong>Pimpinan</strong>
    </div>
</body>
</html>
<?php
$html = ob_get_clean();

// Simpan file HTML ke dalam PDF di folder "output"
require_once('html2pdf/html2pdf.class.php');
$pdf = new HTML2PDF('L', 'A4', 'en');
$pdf->WriteHTML($html);
$pdfPath = 'output/laporan_keberangkatan.pdf';
$pdf->Output($pdfPath, 'F'); // Simpan PDF ke file

// Tampilkan tombol unduh
echo "<div style='text-align: center; margin-top: 20px;'>
    <a href='$pdfPath' class='btn btn-primary' style='text-decoration: none; padding: 10px 20px; background-color: #007bff; color: #fff; border-radius: 5px;'>Unduh Laporan PDF</a>
</div>";
?>

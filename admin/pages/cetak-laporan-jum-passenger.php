<?php
ob_start();
include "../../config/koneksi.php";

$nmbulan = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];

$query = "SELECT kp.kode_kapal, kp.nama_kapal, COUNT(p.id_pesan) AS jumlah_penumpang 
          FROM pesan p
          LEFT JOIN tiket tk ON p.kode_tiket = tk.kode_tiket
          LEFT JOIN kapal kp ON tk.id_kapal = kp.kode_kapal
          GROUP BY kp.kode_kapal
          ORDER BY jumlah_penumpang DESC";

$result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Laporan Jumlah Penumpang</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
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

        h3,
        p {
            margin: 1px 0;
            text-align: center;
        }

        .right-align {
            text-align: right;
            margin-top: 10px;
            margin-right: 9px;
        }
    </style>
</head>

<body style="font-size: 11px;">
    <h3 style="font-size: 13px;">PT. ANUGERA SEJAHTERA MAS</h3>
    <p>Jln. Nipah No. 1B, Kelurahan Berok Nipah, Kecamatan Padang Barat, Kota Padang</p>
    <p>mentawaifast@gmail.com | +62 751 893489</p>
    <hr>
    <h3 style="font-size: 16px;">LAPORAN JUMLAH PENUMPANG KAPAL</h3>

    <table align="center" style="margin-top: 30px;">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Kapal</th>
                <th>Nama Kapal</th>
                <th>Jumlah Penumpang</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $no++ . "</td>";
                echo "<td>" . $row['kode_kapal'] . "</td>";
                echo "<td>" . $row['nama_kapal'] . "</td>";
                echo "<td>" . $row['jumlah_penumpang'] . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

    <p class="right-align">Padang, <?= date('d') . ' ' . $nmbulan[(int) date('m') - 1] . ' ' . date('Y'); ?></p>
    <br><br><br>
    <p class="right-align"><b>Pimpinan</b></p>
</body>

</html>

<?php
$html = ob_get_clean();
require_once('html2pdf/html2pdf.class.php');
$pdf = new HTML2PDF('P', 'A4', 'en');
$pdf->WriteHTML($html);
$pdf->Output('laporan_jumlah_penumpang.pdf', 'D');
?>
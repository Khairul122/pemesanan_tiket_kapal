<?php
ob_start();
include "../../config/koneksi.php";

$nmbulan = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
$kode_kapal = isset($_GET['kode_kapal']) ? $_GET['kode_kapal'] : '';

$whereClause = "";
if (!empty($kode_kapal)) {
    $whereClause = "WHERE kp.kode_kapal = '$kode_kapal'";
}

$query = "SELECT 
            p.id_pesan, 
            p.kode_tiket, 
            p.nm_penumpang, 
            p.ktgr_tiket, 
            TIMESTAMPDIFF(YEAR, p.umur, CURDATE()) AS umur_sekarang, 
            k.nok, 
            kp.kode_kapal,
            kp.nama_kapal, 
            p.tgl_berangkat, 
            t.nama_tujuan, 
            p.nohp, 
            CASE 
                WHEN p.status = '1' THEN 'Belum Bayar' 
                WHEN p.status = '2' THEN 'Sudah Bayar' 
                ELSE 'Selesai' 
            END AS status
          FROM pesan p
          LEFT JOIN kursi k ON p.idk = k.idk
          LEFT JOIN tiket tk ON p.kode_tiket = tk.kode_tiket
          LEFT JOIN kapal kp ON tk.id_kapal = kp.kode_kapal
          LEFT JOIN tujuan t ON tk.id_tujuan = t.kode_tujuan
          $whereClause
          ORDER BY p.tgl_berangkat DESC";

$result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Laporan Penumpang</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        h3, p {
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
    <h3 style="font-size: 16px">LAPORAN DATA PENUMPANG</h3>
    <p><?= !empty($kode_kapal) ? "Kode Kapal: $kode_kapal" : "Semua Kapal" ?></p>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>ID Pemesanan</th>
                <th>Kode Tiket</th>
                <th>Nama Penumpang</th>
                <th>Kategori Tiket</th>
                <th>Umur</th>
                <th>Nomor Kursi</th>
                <th>Kode Kapal</th>
                <th>Nama Kapal</th>
                <th>Tanggal Keberangkatan</th>
                <th>Tujuan</th>
                <th>Nomor HP</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $no++ . "</td>";
                echo "<td>" . $row['id_pesan'] . "</td>";
                echo "<td>" . $row['kode_tiket'] . "</td>";
                echo "<td>" . $row['nm_penumpang'] . "</td>";
                echo "<td>" . $row['ktgr_tiket'] . "</td>";
                echo "<td>" . $row['umur_sekarang'] . "</td>";
                echo "<td>" . $row['nok'] . "</td>";
                echo "<td>" . $row['kode_kapal'] . "</td>";
                echo "<td>" . $row['nama_kapal'] . "</td>";
                echo "<td>" . $row['tgl_berangkat'] . "</td>";
                echo "<td>" . $row['nama_tujuan'] . "</td>";
                echo "<td>" . $row['nohp'] . "</td>";
                echo "<td>" . $row['status'] . "</td>";
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
$pdf = new HTML2PDF('L', 'A4', 'en');
$pdf->WriteHTML($html);
$pdf->Output('laporan_penumpang.pdf', 'D');
?>

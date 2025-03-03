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
</style>

<head>
    <title>Cetak PDF</title>
</head>

<body style="font-size: 12px;">
    <?php

    $nmbulan = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");


    ?>
  
    <h3 style="text-align: center; font-size: 13px;">PT.ANUGERA SEJAHTERA MAS</h3>
    <p style="text-align: center;">Jln. Nipah No. 1B, Kelurahan Berok Nipah, Kecamatan Padang Barat, Kota Padang</p>
    <p style="text-align: center;">mentawaifast@gmail.comn | +62 751 893489 </p>
    <hr>
    <h3 style="text-align: center; font-size: 16px">LAPORAN DATA KAPAL</h3>
    <p style="text-align: center; margin-bottom: 5px;"> Periode : Semua </p>
    <table border="0" width="50%">
        <tr>


            <th width='20'>NO</th>
            <th width='100'>KODE KAPAL</th>
            <th width='150'>NAMA KAPAL</th>
            <th width='150'>TH RAKITAN</th>
            <th width='150'>IZIN KAPAL</th>

        </tr>
        <?php
        // Load file koneksi.php
        include "../../config/koneksi.php";


        $sql = mysqli_query($koneksi, "SELECT * FROM kapal"); // Eksekusi/Jalankan query dari variabel $query
        $row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql

        if ($row > 0) { // Jika jumlah data lebih dari 0 (Berarti jika data ada)



            $no = 0;
            $tot = 0;
            while ($data = mysqli_fetch_array($sql)) { // Ambil semua data dari hasil eksekusi $sql
                $no++;


                echo "<tr>";
                echo "<td  width='20'>" . $no . "</td>";
                echo "<td  width='100'>" . $data['kode_kapal'] . "</td>";
                echo "<td width='150'>" . $data['nama_kapal'] . "</td>";
                echo "<td width='150'>" . $data['rakit_kapal'] . "</td>";
                echo "<td width='150'>" . $data['izin_kapal'] . "</td>";

                echo "</tr>";
            }
        } else { // Jika data tidak ada
            echo "<tr><td colspan='5'>Data tidak ada</td></tr>";
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
$html = ob_get_contents();
ob_end_clean();

require_once('html2pdf/html2pdf.class.php');
$pdf = new HTML2PDF('P', 'A4', 'en');
$pdf->WriteHTML($html);
$pdf->Output('laporan_kapal.pdf', 'D');
?>
<?php
session_start();
include 'config/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_member = $_POST['id_member'];
    $id_pesan = $_POST['id_pesan'];
    
    // Validasi apakah pesanan memang milik member tersebut
    $cek_pesanan = mysqli_query($koneksi, "SELECT * FROM pesan WHERE id_pesan='$id_pesan' AND kode_member='$id_member'");
    if (mysqli_num_rows($cek_pesanan) == 0) {
        echo "<script>
                alert('Data pesanan tidak ditemukan!');
                window.location.href = 'pesan-saya.php';
              </script>";
        exit;
    }

    // Konfigurasi upload
    $target_dir = "upload/bukti/";
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }
    
    $file_extension = strtolower(pathinfo($_FILES["bukti_pembayaran"]["name"], PATHINFO_EXTENSION));
    $new_filename = "BUKTI_" . $id_pesan . "_" . date("YmdHis") . "." . $file_extension;
    $target_file = $target_dir . $new_filename;
    
    // Validasi file
    $allowed_types = array('jpg', 'jpeg', 'png');
    $max_size = 2 * 1024 * 1024; // 2MB
    
    if (!in_array($file_extension, $allowed_types)) {
        echo "<script>
                alert('Maaf, hanya file JPG, JPEG, dan PNG yang diperbolehkan!');
                window.location.href = 'pesan-saya.php';
              </script>";
        exit;
    }
    
    if ($_FILES["bukti_pembayaran"]["size"] > $max_size) {
        echo "<script>
                alert('Ukuran file terlalu besar! Maksimal 2MB');
                window.location.href = 'pesan-saya.php';
              </script>";
        exit;
    }
    
    // Proses upload dan update database
    if (move_uploaded_file($_FILES["bukti_pembayaran"]["tmp_name"], $target_file)) {
        // Update status pesanan
        $update_query = "UPDATE pesan SET 
                        status = '3',
                        bukti_bayar = '$new_filename',
                        tgl_bayar = NOW()
                        WHERE id_pesan = '$id_pesan' AND kode_member = '$id_member'";
        
        if (mysqli_query($koneksi, $update_query)) {
            echo "<script>
                    alert('Bukti pembayaran berhasil diupload!');
                    window.location.href = 'pesan-saya.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Gagal mengupdate data pesanan!');
                    window.location.href = 'pesan-saya.php';
                  </script>";
        }
    } else {
        echo "<script>
                alert('Gagal mengupload file!');
                window.location.href = 'pesan-saya.php';
              </script>";
    }
}
?>
<?php
session_start();
include 'koneksi.php';

if (isset($_POST['upload'])) {
    $kode_tiket = mysqli_real_escape_string($koneksi, $_POST['kode_tiket']);
    
    if (empty($kode_tiket)) {
        echo "<script>alert('Kode tiket tidak boleh kosong.');window.location='index.php?p=pesanan-saya';</script>";
        exit();
    }

    $check_query = "SELECT id_pesan FROM pesan WHERE kode_tiket = ?";
    $stmt = $koneksi->prepare($check_query);
    $stmt->bind_param("s", $kode_tiket);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows === 0) {
        echo "<script>alert('Kode tiket tidak valid.');window.location='index.php?p=pesanan-saya';</script>";
        exit();
    }

    if (!isset($_FILES['bukti']) || $_FILES['bukti']['error'] !== UPLOAD_ERR_OK) {
        echo "<script>alert('Error pada upload file.');window.location='index.php?p=pesanan-saya';</script>";
        exit();
    }

    $file = $_FILES['bukti'];
    $direktori = "upload/bukti/";
    
    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $file_type = $finfo->file($file['tmp_name']);
    $allowed_types = [
        'image/jpeg' => 'jpg',
        'image/png' => 'png',
        'application/pdf' => 'pdf'
    ];

    if (!array_key_exists($file_type, $allowed_types)) {
        echo "<script>alert('Format file tidak diizinkan. Hanya JPEG, PNG, atau PDF.');window.location='index.php?p=pesanan-saya';</script>";
        exit();
    }

    $max_size = 2 * 1024 * 1024;
    if ($file['size'] > $max_size) {
        echo "<script>alert('Ukuran file terlalu besar (maksimal 2MB).');window.location='index.php?p=pesanan-saya';</script>";
        exit();
    }

    $extension = $allowed_types[$file_type];
    $nama_file_baru = $kode_tiket . '_' . date('Ymd_His') . '.' . $extension;

    if (!file_exists($direktori)) {
        if (!mkdir($direktori, 0755, true)) {
            echo "<script>alert('Gagal membuat direktori upload.');window.location='index.php?p=pesanan-saya';</script>";
            exit();
        }
    }

    $upload_path = $direktori . $nama_file_baru;

    $query_old_file = "SELECT bukti FROM pesan WHERE kode_tiket = ?";
    $stmt = $koneksi->prepare($query_old_file);
    $stmt->bind_param("s", $kode_tiket);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($row = $result->fetch_assoc()) {
        $old_file = $direktori . $row['bukti'];
        if (!empty($row['bukti']) && file_exists($old_file)) {
            unlink($old_file);
        }
    }

    if (!move_uploaded_file($file['tmp_name'], $upload_path)) {
        echo "<script>alert('Gagal mengupload file.');window.location='index.php?p=pesanan-saya';</script>";
        exit();
    }

    $update_query = "UPDATE pesan SET bukti = ?, status = '2' WHERE kode_tiket = ?";
    $stmt = $koneksi->prepare($update_query);
    $stmt->bind_param("ss", $nama_file_baru, $kode_tiket);

    if ($stmt->execute()) {
        echo "<script>alert('Bukti pembayaran berhasil diupload.');window.location='index.php?p=pesanan-saya';</script>";
    } else {
        unlink($upload_path);
        echo "<script>alert('Gagal memperbarui database.');window.location='index.php?p=pesanan-saya';</script>";
    }

    $stmt->close();
}
?>
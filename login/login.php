<?php
@session_start();
include "../config/koneksi.php";

// Ambil data dari form login
$user = mysqli_real_escape_string($koneksi, $_POST['user']);
$pas1 = mysqli_real_escape_string($koneksi, $_POST['pass']);

// Enkripsi password menggunakan MD5
$pass = md5($pas1);

// Query untuk login pada tabel admin dan member
$login_admin = mysqli_query($koneksi, "SELECT * FROM admin WHERE user='$user' AND pass='$pass'");
$login_member = mysqli_query($koneksi, "SELECT * FROM member WHERE user='$user' AND pass='$pass' AND confirm='Y'");

// Periksa apakah ada data yang ditemukan
if (mysqli_num_rows($login_admin) > 0) {
    // Jika ditemukan di tabel admin
    $r = mysqli_fetch_array($login_admin);
    $level = $r['lev'];

    // Simpan sesi berdasarkan level
    if ($level == 1) {
        $_SESSION['ad'] = $r['id'];
        echo "<script>alert('Selamat datang, Admin!');</script>";
        header("location:../admin/home.php");
        exit();
    } elseif ($level == 2) {
        $_SESSION['ad'] = $r['id'];
        echo "<script>alert('Selamat datang, Pimpinan!');</script>";
        header("location:../admin/home.php");
        exit();
    }elseif ($level == 3) {
        $_SESSION['ad'] = $r['id'];
        echo "<script>alert('Selamat datang, Pimpinan!');</script>";
        header("location:../admin/home.php");
        exit();
    }elseif ($level == 4) {
        $_SESSION['ad'] = $r['id'];
        echo "<script>alert('Selamat datang, Operator!');</script>";
        header("location:../admin/home.php");
        exit();
    }
} elseif (mysqli_num_rows($login_member) > 0) {
    // Jika ditemukan di tabel member
    $r = mysqli_fetch_array($login_member);
    $_SESSION['us'] = $r['p_no_identitas'];
    echo "<script>alert('Selamat datang, Member!');</script>";
    header("location:../admin/home.php");
    exit();
} else {
    // Jika username atau password salah
    echo "<script>alert('Username atau password salah.!');</script>";
    echo "<meta http-equiv=refresh content=0;url=../index.php>";
    exit();
}
?>

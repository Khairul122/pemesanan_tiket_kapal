<?php
@session_start();
include "../config/koneksi.php";
 
$user = $_POST['user'];
$pas1 = $_POST['pass'];

$pass=md5($pas1);

$login = mysqli_query($koneksi,"SELECT * FROM member WHERE user='$user' AND pass='$pass' and confirm='Y'");
if (empty(mysqli_num_rows($login))){
 $login = mysqli_query($koneksi,"SELECT * FROM admin WHERE user='$user' AND pass='$pass'");
}

$ketemu= mysqli_num_rows($login);
$r = mysqli_fetch_array($login);

$level=$r['lev'];
 
// Apabila username dan password ditemukan
if ($ketemu > 0 and $level==1){
    
 @$_SESSION['ad'] = $r['id'];
 
 header("location:../admin/home.php");
}
else if ($ketemu > 0 and $level==2){
    
 @$_SESSION['us'] = $r['p_no_identitas'];

 header("location:../index.php");
}
else{
 echo "
 <script>
 alert('Username atau password salah.!');
 </script>
 ";
 echo "<meta http-equiv=refresh content=0;url=../index.php>";
}

?>

                 <?php 
                            include '../../config/koneksi.php';

                              $id=$_GET['id'];

                             $query=mysqli_query($koneksi,"SELECT * FROM member where p_no_identitas='$id'");
                               $q=mysqli_fetch_array($query);

                              
            // require_once('library/PHPMailerAutoload.php'); //menginclude librari phpmailer
            // $mail             = new PHPMailer();
            // $body             = 
            // "<body style='margin: 10px;'>
            // <div style='width: 640px; font-family: Helvetica, sans-serif; font-size: 13px; padding:10px; line-height:150%; border:#eaeaea solid 10px;'>
            // <br>
            // <strong>Terima Kasih Telah Mendaftar</strong><br>
            // <b>Nama Anda : </b>".$q['p_nama']."<br>
            // <b>Email : </b>".$q['email']."<br>
            // <b>URL Konfirmasi Akun : </b>http://localhost/pemesanan_tiket_kapal/index.php?p=konfirmasi-akun&id=".$q['p_no_identitas']."<br>
            // <br>
            // </div>
            // </body>";
            
            // $mail->IsSMTP();  // menggunakan SMTP
            // //$mail->SMTPDebug  = 1;   // mengaktifkan debug SMTP
        
            // $mail->SMTPAuth   = true;   // mengaktifkan Autentifikasi SMTP
            // $mail->Host   = 'mail.smtp2go.com'; // host sesuaikan dengan hosting mail anda
            // $mail->Port       = 2525;  // post gunakan port 25
            // $mail->Username   = "sarlina"; // username email akun
            // $mail->Password   = "170p317123";        // password akun
        
            // $mail->SetFrom('Esarlina2309@gmail.com', 'Hello');
        
            // $mail->Subject    = "Konfirmasi Akun Tiket Kapal";
            // $mail->MsgHTML($body);
        
            // $address = $q['email']; //email tujuan
            // $mail->AddAddress($address, "Hello ".$q['p_nama']);
        
            if(!$query) {
               echo '<script> alert("Member Gagal dikonfirmasi, Pastikan koneksi internet anda aktif."); javascript:history.back(); </script>';
              
            } else {
                 $sql=mysqli_query($koneksi,"UPDATE member SET confirm='C' WHERE p_no_identitas='$id'");
              echo '<script> alert("Member Berhasil dikonfirmasi."); javascript:history.back(); </script>';;
            }

                          
                          
                            ?>
                   
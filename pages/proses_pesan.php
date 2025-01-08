<?php 
                            include '../config/koneksi.php';

                         
                         session_start();
                         error_reporting(0);

                         if($_SESSION['us']==""){
                          echo "
                             <script>
                             alert('Anda Harus Login terlebih dahulu.!');
                             javascript:history.back();
                             </script>
                             ";
                              }else{

                                if($_GET['jlmp']==1){
                                  
                                 $auto1="1";
                                  $read1=mysqli_query($koneksi,"select right(id_pesan,1) from pesan order by id_pesan desc");
                                  if ($rec1=mysqli_fetch_array($read1)){
                                  $auto1=$rec1[0]+1;
                                  }
                                  $idp1="PS-T".$auto1; 
                               
                                  $idt=$_GET['idt'];
                                  $tglb=date('Y-m-d',strtotime($_GET['tgl']));
                                  $idu=$_SESSION['us'];
                                
                                  $nml1=$_GET['nml1'];
                                  $idk1=$_GET['nk1'];
                                  $kt1=$_GET['kt1'];
                                  $bg1=$_GET['bg1'];
                                  $id_golongan1=$_GET['id_golongan'];
                                  $no_kendaraan1=$_GET['no_kendaraan'];

                                  $umr1=$_GET['thn1']."-".$_GET['bln1']."-".$_GET['tgl1'];


                                  $email=$_GET['email'];
                                  $nohp=$_GET['nohp'];
                                  $tglp=date('Y-m-d h:i:s');
                                 

                                    if(empty($nml1) or empty($umr1) or empty($idk1) or empty($kt1) or empty($email) or empty($nohp)){
                                    echo "
                             <script>
                             alert('Data masih belum lengkap.!');
                             javascript:history.back();
                             </script>
                             ";
                                  }else{

                                $sql=mysqli_query($koneksi,"INSERT INTO `pesan`(`id_pesan`, `kode_member`, `kode_tiket`, `tgl_berangkat`, `ktgr_tiket`, `nm_penumpang`, `umur`, `idk`,`bagasi`, `nohp`, `email`, `tanggal_pesan`, `status`, `id_golongan`, `no_kendaraan`) VALUES ('$idp1','$idu','$idt','$tglb','$kt1','$nml1','$umr1','$idk1','$bg1','$nohp','$email','$tglp','1','$id_golongan1','$no_kendaraan1')");
                          
                                 
                         echo "
                             <script>
                             alert('Anda berhasil memesan tiket, silahkan lakukan pembayaran sesuai dengan total bayar.!');
                           
                             </script>
                             ";

                            echo "<meta http-equiv=refresh content=0;url=index.php?p=pesanan-saya>";
                          }
                            }
                                
                                if($_GET['jlmp']==2){

                                 $auto1="1";
                                  $read1=mysqli_query($koneksi,"select right(id_pesan,1) from pesan order by id_pesan desc");
                                  if ($rec1=mysqli_fetch_array($read1)){
                                  $auto1=$rec1[0]+1;
                                  }
                                  $idp1="PS-T".$auto1; 
                                  $auto2=$auto1+1;
                                  $idp2="PS-T".$auto2; 
 

                                  $idt=$_GET['idt'];
                                  $tglb=date('Y-m-d',strtotime($_GET['tgl']));
                                  $idu=$_SESSION['us'];

                                  $nml1=$_GET['nml1'];
                                  $idk1=$_GET['nk1'];
                                  $kt1=$_GET['kt1'];
                                  $bg1=$_GET['bg1'];
$umr1=$_GET['thn1']."-".$_GET['bln1']."-".$_GET['tgl1'];

                                  $nml2=$_GET['nml2'];
                                  $idk2=$_GET['nk2'];
                                  $kt2=$_GET['kt2'];
                                  $bg2=$_GET['bg2'];
$umr2=$_GET['thn2']."-".$_GET['bln2']."-".$_GET['tgl2'];

                                  $email=$_GET['email'];
                                  $nohp=$_GET['nohp'];
                                  $tglp=date('Y-m-d h:i:s');
                                

                                  if(empty($nml1) or empty($umr1)  or empty($umr2) or empty($idk1) or empty($kt1) or empty($nml2) or empty($idk2) or empty($kt2) or empty($email) or empty($nohp)){
                                    echo "
                             <script>
                             alert('Data masih belum lengkap.!');
                             javascript:history.back();
                             </script>
                             ";

                           }else if($idk1==$idk2){
                                    echo "
                             <script>
                             alert('Nomor Kursi tidak boleh ada yang sama.!');
                             javascript:history.back();
                             </script>
                             ";
                                  }else{

                                $sql=mysqli_query($koneksi,"INSERT INTO `pesan`(`id_pesan`, `kode_member`, `kode_tiket`, `tgl_berangkat`, `ktgr_tiket`, `nm_penumpang`, `umur`, `idk`,`bagasi`, `nohp`, `email`, `tanggal_pesan`, `status`, `id_golongan`, `no_kendaraan`) VALUES ('$idp1','$idu','$idt','$tglb','$kt1','$nml1','$umr1','$idk1','$bg1','$nohp','$email','$tglp','1','$id_golongan1','$no_kendaraan1'),('$idp2','$idu','$idt','$tglb','$kt2','$nml2','$umr2','$idk2','$bg2','$nohp','$email','$tglp','1','$id_golongan1','$no_kendaraan1')");
                          
                                 
                         echo "
                             <script>
                             alert('Anda berhasil memesan tiket, silahkan lakukan pembayaran sesuai dengan total bayar.!');
                           
                             </script>
                             ";

                            echo "<meta http-equiv=refresh content=0;url=index.php?p=pesanan-saya>";
                          }
                          }

                              if($_GET['jlmp']==3){

                                 $auto1="1";
                                  $read1=mysqli_query($koneksi,"select right(id_pesan,1) from pesan order by id_pesan desc");
                                  if ($rec1=mysqli_fetch_array($read1)){
                                  $auto1=$rec1[0]+1;
                                  }
                                  $idp1="PS-T".$auto1; 
                                  $auto2=$auto1+1;
                                  $auto3=$auto2+1;
                                  $idp2="PS-T".$auto2; 
                                  $idp3="PS-T".$auto3; 
 

                                  $idt=$_GET['idt'];
                                  $tglb=date('Y-m-d',strtotime($_GET['tgl']));
                                  $idu=$_SESSION['us'];

                                  $nml1=$_GET['nml1'];
                                  $idk1=$_GET['nk1'];
                                  $kt1=$_GET['kt1'];
                                  $bg1=$_GET['bg1'];
$umr1=$_GET['thn1']."-".$_GET['bln1']."-".$_GET['tgl1'];

                                  $nml2=$_GET['nml2'];
                                  $idk2=$_GET['nk2'];
                                  $kt2=$_GET['kt2'];
                                  $bg2=$_GET['bg2'];
$umr2=$_GET['thn2']."-".$_GET['bln2']."-".$_GET['tgl2'];

                                  $nml3=$_GET['nml3'];
                                  $idk3=$_GET['nk3'];
                                  $kt3=$_GET['kt3'];
                                  $bg3=$_GET['bg3'];
$umr3=$_GET['thn3']."-".$_GET['bln3']."-".$_GET['tgl3'];

                                  $email=$_GET['email'];
                                  $nohp=$_GET['nohp'];
                                  $tglp=date('Y-m-d h:i:s');
                                 

                                       if(empty($nml1) or empty($idk1) or empty($umr1) or empty($umr2) or empty($umr3) or empty($kt1) or empty($nml2) or empty($idk2) or empty($kt2) or empty($nml3) or empty($idk3) or empty($kt3)or empty($email) or empty($nohp)){
                                    echo "
                             <script>
                             alert('Data masih belum lengkap.!');
                             javascript:history.back();
                             </script>
                             ";
                              }else if($idk1==$idk2 or $idk1==$idk3 or $idk2==$idk3){
                                    echo "
                             <script>
                             alert('Nomor Kursi tidak boleh ada yang sama.!');
                             javascript:history.back();
                             </script>
                             ";
                                  }else{

                                  $sql=mysqli_query($koneksi,"INSERT INTO `pesan`(`id_pesan`, `kode_member`, `kode_tiket`, `tgl_berangkat`, `ktgr_tiket`, `nm_penumpang`, `umur`, `idk`,`bagasi`, `nohp`, `email`, `tanggal_pesan`, `status`, `id_golongan`, `no_kendaraan`) VALUES ('$idp1','$idu','$idt','$tglb','$kt1','$nml1','$umr1','$idk1','$bg1','$nohp','$email','$tglp','1','$id_golongan1','$no_kendaraan1'),('$idp2','$idu','$idt','$tglb','$kt2','$nml2','$umr2','$idk2','$bg2','$nohp','$email','$tglp','1','$id_golongan1','$no_kendaraan1'),('$idp3','$idu','$idt','$tglb','$kt3','$nml3','$umr3','$idk3','$bg3','$nohp','$email','$tglp','1','$id_golongan1','$no_kendaraan1')");
                          
                                 
                         echo "
                             <script>
                             alert('Anda berhasil memesan tiket, silahkan lakukan pembayaran sesuai dengan total bayar.!');
                           
                             </script>
                             ";

                            echo "<meta http-equiv=refresh content=0;url=index.php?p=pesanan-saya>";
                          }
                          }
                            if($_GET['jlmp']==4){

                                 $auto1="1";
                                  $read1=mysqli_query($koneksi,"select right(id_pesan,1) from pesan order by id_pesan desc");
                                  if ($rec1=mysqli_fetch_array($read1)){
                                  $auto1=$rec1[0]+1;
                                  }
                                  $idp1="PS-T".$auto1; 
                                  $auto2=$auto1+1;
                                  $auto3=$auto2+1;
                                  $auto4=$auto3+1;
                                  $idp2="PS-T".$auto2; 
                                  $idp3="PS-T".$auto3;
                                  $idp4="PS-T".$auto4;  
 

                                  $idt=$_GET['idt'];
                                  $tglb=date('Y-m-d',strtotime($_GET['tgl']));
                                  $idu=$_SESSION['us'];

                                  $nml1=$_GET['nml1'];
                                  $idk1=$_GET['nk1'];
                                  $kt1=$_GET['kt1'];
                                  $bg1=$_GET['bg1'];
$umr1=$_GET['thn1']."-".$_GET['bln1']."-".$_GET['tgl1'];

                                  $nml2=$_GET['nml2'];
                                  $idk2=$_GET['nk2'];
                                  $kt2=$_GET['kt2'];
                                   $bg2=$_GET['bg2'];
$umr2=$_GET['thn2']."-".$_GET['bln2']."-".$_GET['tgl2'];

                                  $nml3=$_GET['nml3'];
                                  $idk3=$_GET['nk3'];
                                  $kt3=$_GET['kt3'];
                                   $bg3=$_GET['bg3'];
$umr3=$_GET['thn3']."-".$_GET['bln3']."-".$_GET['tgl3'];

                                   $nml4=$_GET['nml4'];
                                  $idk4=$_GET['nk4'];
                                  $kt4=$_GET['kt4'];
                                   $bg4=$_GET['bg4'];
$umr4=$_GET['thn4']."-".$_GET['bln4']."-".$_GET['tgl4'];

                                  $email=$_GET['email'];
                                  $nohp=$_GET['nohp'];
                                  $tglp=date('Y-m-d h:i:s');
                               

                                      if(empty($nml1) or empty($idk1) or empty($umr1) or empty($umr2) or empty($umr3) or empty($umr4) or empty($kt1) or empty($nml2) or empty($idk2) or empty($kt2) or empty($nml3) or empty($idk3) or empty($kt3) or empty($nml4) or empty($idk4) or empty($kt4) or empty($email) or empty($nohp)){
                                    echo "
                             <script>
                             alert('Data masih belum lengkap.!');
                             javascript:history.back();
                             </script>
                             ";

                              }else if($idk1==$idk2 or $idk1==$idk3 or $idk1==$idk4 or $idk2==$idk3 or $idk2==$idk4 or $idk3==$idk4){
                                    echo "
                             <script>
                             alert('Nomor Kursi tidak boleh ada yang sama.!');
                             javascript:history.back();
                             </script>
                             ";
                                  
                                  }else{

                                  $sql=mysqli_query($koneksi,"INSERT INTO `pesan`(`id_pesan`, `kode_member`, `kode_tiket`, `tgl_berangkat`, `ktgr_tiket`, `nm_penumpang`, `umur`, `idk`,`bagasi`, `nohp`, `email`, `tanggal_pesan`, `status`, `id_golongan`, `no_kendaraan`) VALUES ('$idp1','$idu','$idt','$tglb','$kt1','$nml1','$umr1','$idk1','$bg1','$nohp','$email','$tglp','1','$id_golongan1','$no_kendaraan1'),('$idp2','$idu','$idt','$tglb','$kt2','$nml2','$umr2','$idk2','$bg2','$nohp','$email','$tglp','1','$id_golongan1','$no_kendaraan1'),('$idp3','$idu','$idt','$tglb','$kt3','$nml3','$umr3','$idk3','$bg3','$nohp','$email','$tglp','1','$id_golongan1','$no_kendaraan1'),('$idp4','$idu','$idt','$tglb','$kt4','$nml4','$umr4','$idk4','$bg4','$nohp','$email','$tglp','1','$id_golongan1','$no_kendaraan1')");
                          
                                 
                         echo "
                             <script>
                             alert('Anda berhasil memesan tiket, silahkan lakukan pembayaran sesuai dengan total bayar.!');
                           
                             </script>
                             ";

                            echo "<meta http-equiv=refresh content=0;url=index.php?p=pesanan-saya>";
                          }
                        }

                          if($_GET['jlmp']==5){

                                 $auto1="1";
                                  $read1=mysqli_query($koneksi,"select right(id_pesan,1) from pesan order by id_pesan desc");
                                  if ($rec1=mysqli_fetch_array($read1)){
                                  $auto1=$rec1[0]+1;
                                  }
                                  $idp1="PS-T".$auto1; 
                                  $auto2=$auto1+1;
                                  $auto3=$auto2+1;
                                  $auto4=$auto3+1;
                                  $auto5=$auto4+1;
                                  $idp2="PS-T".$auto2; 
                                  $idp3="PS-T".$auto3;
                                  $idp4="PS-T".$auto4; 
                                  $idp5="PS-T".$auto5;  
 

                                  $idt=$_GET['idt'];
                                  $tglb=date('Y-m-d',strtotime($_GET['tgl']));
                                  $idu=$_SESSION['us'];

                                  $nml1=$_GET['nml1'];
                                  $idk1=$_GET['nk1'];
                                  $kt1=$_GET['kt1'];
                                  $bg1=$_GET['bg1'];
$umr1=$_GET['thn1']."-".$_GET['bln1']."-".$_GET['tgl1'];


                                  $nml2=$_GET['nml2'];
                                  $idk2=$_GET['nk2'];
                                  $kt2=$_GET['kt2'];
                                  $bg2=$_GET['bg2'];
$umr2=$_GET['thn2']."-".$_GET['bln2']."-".$_GET['tgl2'];

                                  $nml3=$_GET['nml3'];
                                  $idk3=$_GET['nk3'];
                                  $kt3=$_GET['kt3'];
                                  $bg3=$_GET['bg3'];
$umr3=$_GET['thn3']."-".$_GET['bln3']."-".$_GET['tgl3'];

                                   $nml4=$_GET['nml4'];
                                  $idk4=$_GET['nk4'];
                                  $kt4=$_GET['kt4'];
                                  $bg4=$_GET['bg4'];
$umr4=$_GET['thn4']."-".$_GET['bln4']."-".$_GET['tgl4'];

                                   $nml5=$_GET['nml5'];
                                  $idk5=$_GET['nk5'];
                                  $kt5=$_GET['kt5'];
                                  $bg5=$_GET['bg5'];
$umr5=$_GET['thn5']."-".$_GET['bln5']."-".$_GET['tgl5'];

                                  $email=$_GET['email'];
                                  $nohp=$_GET['nohp'];
                                  $tglp=date('Y-m-d h:i:s');
                               

                                      if(empty($nml1) or empty($idk1) or empty($kt1) or empty($umr1) or empty($umr2) or empty($umr3) or empty($umr4) or empty($umr5) or empty($nml2) or empty($idk2) or empty($kt2) or empty($nml3) or empty($idk3) or empty($kt3) or empty($nml4) or empty($idk4) or empty($kt4) or empty($nml5) or empty($idk5) or empty($kt5) or empty($email) or empty($nohp)){
                                    echo "
                             <script>
                             alert('Data masih belum lengkap.!');
                             javascript:history.back();
                             </script>
                             ";
                                   }else if($idk1==$idk2 or $idk1==$idk3 or $idk1==$idk4 or $idk1==$idk5 or $idk2==$idk3 or $idk2==$idk4 or $idk2==$idk5 or $idk3==$idk4 or $idk3==$idk5){
                                    echo "
                             <script>
                             alert('Nomor Kursi tidak boleh ada yang sama.!');
                             javascript:history.back();
                             </script>
                             ";
                                  
                                  }else{

                                  $sql=mysqli_query($koneksi,"INSERT INTO `pesan`(`id_pesan`, `kode_member`, `kode_tiket`, `tgl_berangkat`, `ktgr_tiket`, `nm_penumpang`, `umur`, `idk`,`bagasi`, `nohp`, `email`, `tanggal_pesan`, `status`, `id_golongan`, `no_kendaraan`) VALUES ('$idp1','$idu','$idt','$tglb','$kt1','$nml1','$umr1','$idk1','$bg1','$nohp','$email','$tglp','1','$id_golongan1','$no_kendaraan1'),('$idp2','$idu','$idt','$tglb','$kt2','$nml2','$umr2','$idk2','$bg2','$nohp','$email','$tglp','1','$id_golongan1','$no_kendaraan1'),('$idp3','$idu','$idt','$tglb','$kt3','$nml3','$umr3','$umr1','$idk3','$bg3','$nohp','$email','$tglp','1','$id_golongan1','$no_kendaraan1'),('$idp4','$idu','$idt','$tglb','$kt4','$nml4','$umr4','$idk4','$bg4','$nohp','$email','$tglp','1','$id_golongan1','$no_kendaraan1'),('$idp5','$idu','$idt','$tglb','$kt5','$nml5','$umr5','$idk5','$bg5','$nohp','$email','$tglp','1','$id_golongan1','$no_kendaraan1')");
                          
                                 
                         echo "
                             <script>
                             alert('Anda berhasil memesan tiket, silahkan lakukan pembayaran sesuai dengan total bayar.!');
                           
                             </script>
                             ";

                            echo "<meta http-equiv=refresh content=0;url=index.php?p=pesanan-saya>";
                          }
                            }
                            if($_GET['jlmp']==6){

                                 $auto1="1";
                                  $read1=mysqli_query($koneksi,"select right(id_pesan,1) from pesan order by id_pesan desc");
                                  if ($rec1=mysqli_fetch_array($read1)){
                                  $auto1=$rec1[0]+1;
                                  }
                                  $idp1="PS-T".$auto1; 
                                  $auto2=$auto1+1;
                                  $auto3=$auto2+1;
                                  $auto4=$auto3+1;
                                  $auto5=$auto4+1;
                                  $auto6=$auto5+1;
                                  $idp2="PS-T".$auto2; 
                                  $idp3="PS-T".$auto3;
                                  $idp4="PS-T".$auto4; 
                                  $idp5="PS-T".$auto5;
                                  $idp6="PS-T".$auto6;  
 

                                  $idt=$_GET['idt'];
                                  $tglb=date('Y-m-d',strtotime($_GET['tgl']));
                                  $idu=$_SESSION['us'];

                                  $nml1=$_GET['nml1'];
                                  $idk1=$_GET['nk1'];
                                  $kt1=$_GET['kt1'];
                                  $bg1=$_GET['bg1'];
$umr1=$_GET['thn1']."-".$_GET['bln1']."-".$_GET['tgl1'];

                                  $nml2=$_GET['nml2'];
                                  $idk2=$_GET['nk2'];
                                  $kt2=$_GET['kt2'];
                                  $bg2=$_GET['bg2'];
$umr2=$_GET['thn2']."-".$_GET['bln2']."-".$_GET['tgl2'];

                                  $nml3=$_GET['nml3'];
                                  $idk3=$_GET['nk3'];
                                  $kt3=$_GET['kt3'];
                                  $bg3=$_GET['bg3'];
$umr3=$_GET['thn3']."-".$_GET['bln3']."-".$_GET['tgl3'];

                                   $nml4=$_GET['nml4'];
                                  $idk4=$_GET['nk4'];
                                  $kt4=$_GET['kt4'];
                                  $bg4=$_GET['bg4'];
$umr4=$_GET['thn4']."-".$_GET['bln4']."-".$_GET['tgl4'];

                                   $nml5=$_GET['nml5'];
                                  $idk5=$_GET['nk5'];
                                  $kt5=$_GET['kt5'];
                                  $bg5=$_GET['bg5'];
$umr5=$_GET['thn5']."-".$_GET['bln5']."-".$_GET['tgl5'];

                                  $nml6=$_GET['nml6'];
                                  $idk6=$_GET['nk6'];
                                  $kt6=$_GET['kt6'];
                                  $bg6=$_GET['bg6'];
$umr6=$_GET['thn6']."-".$_GET['bln6']."-".$_GET['tgl6'];

                                  $email=$_GET['email'];
                                  $nohp=$_GET['nohp'];
                                  $tglp=date('Y-m-d h:i:s');
                               

                                      if(empty($nml1) or empty($idk1) or empty($kt1) or empty($nml2) or empty($umr1) or empty($umr2) or empty($umr3) or empty($umr4) or empty($umr5) or empty($umr6) or empty($idk2) or empty($kt2) or empty($nml3) or empty($idk3) or empty($kt3) or empty($nml4) or empty($idk4) or empty($kt4) or empty($nml5) or empty($idk5) or empty($kt5) or empty($nml6) or empty($idk6) or empty($kt6) or empty($email) or empty($nohp)){
                                    echo "
                             <script>
                             alert('Data masih belum lengkap.!');
                             javascript:history.back();
                             </script>
                             ";
                                   }else if($idk1==$idk2 or $idk1==$idk3 or $idk1==$idk4 or $idk1==$idk5 or $idk2==$idk3 or $idk2==$idk4 or $idk2==$idk5 or $idk3==$idk4 or $idk3==$idk5 or $idk1==$idk6 or $idk2==$idk6 or $idk3==$idk6 or $idk4==$idk6 or $idk5==$idk6){
                                    echo "
                             <script>
                             alert('Nomor Kursi tidak boleh ada yang sama.!');
                             javascript:history.back();
                             </script>
                             ";
                                  
                                  }else{

                                  $sql=mysqli_query($koneksi,"INSERT INTO `pesan`(`id_pesan`, `kode_member`, `kode_tiket`, `tgl_berangkat`, `ktgr_tiket`, `nm_penumpang`, `umur`, `idk`,`bagasi`, `nohp`, `email`, `tanggal_pesan`, `status`, `id_golongan`, `no_kendaraan`) VALUES ('$idp1','$idu','$idt','$tglb','$kt1','$nml1','$umr1','$idk1','$bg1','$nohp','$email','$tglp','1','$id_golongan1','$no_kendaraan1'),('$idp2','$idu','$idt','$tglb','$kt2','$nml2','$umr2','$idk2','$bg2','$nohp','$email','$tglp','1','$id_golongan1','$no_kendaraan1'),('$idp3','$idu','$idt','$tglb','$kt3','$nml3','$umr3','$idk3','$bg3','$nohp','$email','$tglp','1','$id_golongan1','$no_kendaraan1'),('$idp4','$idu','$idt','$tglb','$kt4','$nml4','$umr4','$idk4','$bg4','$nohp','$email','$tglp','1','$id_golongan1','$no_kendaraan1'),('$idp5','$idu','$idt','$tglb','$kt5','$nml5','$umr5','$idk5','$bg5','$nohp','$email','$tglp','1','$id_golongan1','$no_kendaraan1'),('$idp6','$idu','$idt','$tglb','$kt6','$nml6','$umr6','$idk6','$bg6','$nohp','$email','$tglp','1','$id_golongan1','$no_kendaraan1')");
                          
                                 
                         echo "
                             <script>
                             alert('Anda berhasil memesan tiket, silahkan lakukan pembayaran sesuai dengan total bayar.!');
                           
                             </script>
                             ";

                            echo "<meta http-equiv=refresh content=0;url=index.php?p=pesanan-saya>";
                          }
                            }
                             if($_GET['jlmp']==7){

                                 $auto1="1";
                                  $read1=mysqli_query($koneksi,"select right(id_pesan,1) from pesan order by id_pesan desc");
                                  if ($rec1=mysqli_fetch_array($read1)){
                                  $auto1=$rec1[0]+1;
                                  }
                                  $idp1="PS-T".$auto1; 
                                  $auto2=$auto1+1;
                                  $auto3=$auto2+1;
                                  $auto4=$auto3+1;
                                  $auto5=$auto4+1;
                                  $auto6=$auto5+1;
                                  $auto7=$auto6+1;
                                  $idp2="PS-T".$auto2; 
                                  $idp3="PS-T".$auto3;
                                  $idp4="PS-T".$auto4; 
                                  $idp5="PS-T".$auto5;
                                  $idp6="PS-T".$auto6;
                                  $idp7="PS-T".$auto7;   
 

                                  $idt=$_GET['idt'];
                                  $tglb=date('Y-m-d',strtotime($_GET['tgl']));
                                  $idu=$_SESSION['us'];

                                  $nml1=$_GET['nml1'];
                                  $idk1=$_GET['nk1'];
                                  $kt1=$_GET['kt1'];
                                  $bg1=$_GET['bg1'];
$umr1=$_GET['thn1']."-".$_GET['bln1']."-".$_GET['tgl1'];

                                  $nml2=$_GET['nml2'];
                                  $idk2=$_GET['nk2'];
                                  $kt2=$_GET['kt2'];
                                  $bg2=$_GET['bg2'];
$umr2=$_GET['thn2']."-".$_GET['bln2']."-".$_GET['tgl2'];

                                  $nml3=$_GET['nml3'];
                                  $idk3=$_GET['nk3'];
                                  $kt3=$_GET['kt3'];
                                  $bg3=$_GET['bg3'];
$umr3=$_GET['thn3']."-".$_GET['bln3']."-".$_GET['tgl3'];

                                   $nml4=$_GET['nml4'];
                                  $idk4=$_GET['nk4'];
                                  $kt4=$_GET['kt4'];
                                  $bg4=$_GET['bg4'];
$umr4=$_GET['thn4']."-".$_GET['bln4']."-".$_GET['tgl4'];

                                   $nml5=$_GET['nml5'];
                                  $idk5=$_GET['nk5'];
                                  $kt5=$_GET['kt5'];
                                  $bg5=$_GET['bg5'];
$umr5=$_GET['thn5']."-".$_GET['bln5']."-".$_GET['tgl5'];

                                  $nml6=$_GET['nml6'];
                                  $idk6=$_GET['nk6'];
                                  $kt6=$_GET['kt6'];
                                  $bg6=$_GET['bg6'];
$umr6=$_GET['thn6']."-".$_GET['bln6']."-".$_GET['tgl6'];

                                  $nml7=$_GET['nml7'];
                                  $idk7=$_GET['nk7'];
                                  $kt7=$_GET['kt7'];
                                  $bg7=$_GET['bg7'];
$umr7=$_GET['thn7']."-".$_GET['bln7']."-".$_GET['tgl7'];

                                  $email=$_GET['email'];
                                  $nohp=$_GET['nohp'];
                                  $tglp=date('Y-m-d h:i:s');
                               

                                      if(empty($nml1) or empty($idk1) or empty($kt1) or empty($nml2) or empty($umr1) or empty($umr2) or empty($umr3) or empty($umr4) or empty($umr5) or empty($umr6) or empty($umr7) or empty($idk2) or empty($kt2) or empty($nml3) or empty($idk3) or empty($kt3) or empty($nml4) or empty($idk4) or empty($kt4) or empty($nml5) or empty($idk5) or empty($kt5) or empty($nml6) or empty($idk6) or empty($kt6) or empty($nml7) or empty($idk7) or empty($kt7)  or empty($email) or empty($nohp)){
                                    echo "
                             <script>
                             alert('Data masih belum lengkap.!');
                             javascript:history.back();
                             </script>
                             ";
                                   }else if($idk1==$idk2 or $idk1==$idk3 or $idk1==$idk4 or $idk1==$idk5 or $idk2==$idk3 or $idk2==$idk4 or $idk2==$idk5 or $idk3==$idk4 or $idk3==$idk5 or $idk1==$idk6 or $idk2==$idk6 or $idk3==$idk6 or $idk4==$idk6 or $idk5==$idk6 or $idk1==$idk7 or $idk2==$idk7 or $idk3==$idk7 or $idk4==$idk7 or $idk5==$idk7 or $idk6==$idk7){
                                    echo "
                             <script>
                             alert('Nomor Kursi tidak boleh ada yang sama.!');
                             javascript:history.back();
                             </script>
                             ";
                                  
                                  }else{

                                  $sql=mysqli_query($koneksi,"INSERT INTO `pesan`(`id_pesan`, `kode_member`, `kode_tiket`, `tgl_berangkat`, `ktgr_tiket`, `nm_penumpang`, `umur`, `idk`,`bagasi`,`nohp`, `email`, `tanggal_pesan`, `status`, `id_golongan`, `no_kendaraan`) VALUES ('$idp1','$idu','$idt','$tglb','$kt1','$nml1','$umr1','$idk1','$bg1','$nohp','$email','$tglp','1','$id_golongan1','$no_kendaraan1'),('$idp2','$idu','$idt','$tglb','$kt2','$nml2','$umr2','$idk2','$bg2','$nohp','$email','$tglp','1','$id_golongan1','$no_kendaraan1'),('$idp3','$idu','$idt','$tglb','$kt3','$nml3','$umr3','$idk3','$bg3','$nohp','$email','$tglp','1','$id_golongan1','$no_kendaraan1'),('$idp4','$idu','$idt','$tglb','$kt4','$nml4','$umr4','$idk4','$bg4','$nohp','$email','$tglp','1','$id_golongan1','$no_kendaraan1'),('$idp5','$idu','$idt','$tglb','$kt5','$nml5','$umr5','$idk5','$bg5','$nohp','$email','$tglp','1','$id_golongan1','$no_kendaraan1'),('$idp6','$idu','$idt','$tglb','$kt6','$nml6','$umr6','$idk6','$bg6','$nohp','$email','$tglp','1','$id_golongan1','$no_kendaraan1'),('$idp7','$idu','$idt','$tglb','$kt7','$nml7','$umr7','$idk7','$bg7','$nohp','$email','$tglp','1','$id_golongan1','$no_kendaraan1')");
                          
                                 
                         echo "
                             <script>
                             alert('Anda berhasil memesan tiket, silahkan lakukan pembayaran sesuai dengan total bayar.!');
                           
                             </script>
                             ";

                            echo "<meta http-equiv=refresh content=0;url=index.php?p=pesanan-saya>";
                          }
                            }
                            if($_GET['jlmp']==8){

                                 $auto1="1";
                                  $read1=mysqli_query($koneksi,"select right(id_pesan,1) from pesan order by id_pesan desc");
                                  if ($rec1=mysqli_fetch_array($read1)){
                                  $auto1=$rec1[0]+1;
                                  }
                                  $idp1="PS-T".$auto1; 
                                  $auto2=$auto1+1;
                                  $auto3=$auto2+1;
                                  $auto4=$auto3+1;
                                  $auto5=$auto4+1;
                                  $auto6=$auto5+1;
                                  $auto7=$auto6+1;
                                  $auto8=$auto7+1;
                                  $idp2="PS-T".$auto2; 
                                  $idp3="PS-T".$auto3;
                                  $idp4="PS-T".$auto4; 
                                  $idp5="PS-T".$auto5;
                                  $idp6="PS-T".$auto6;
                                  $idp7="PS-T".$auto7;
                                  $idp8="PS-T".$auto8;    
 

                                  $idt=$_GET['idt'];
                                  $tglb=date('Y-m-d',strtotime($_GET['tgl']));
                                  $idu=$_SESSION['us'];

                                  $nml1=$_GET['nml1'];
                                  $idk1=$_GET['nk1'];
                                  $kt1=$_GET['kt1'];
                                  $bg1=$_GET['bg1'];
$umr1=$_GET['thn1']."-".$_GET['bln1']."-".$_GET['tgl1'];

                                  $nml2=$_GET['nml2'];
                                  $idk2=$_GET['nk2'];
                                  $kt2=$_GET['kt2'];
                                  $bg2=$_GET['bg2'];
$umr2=$_GET['thn2']."-".$_GET['bln2']."-".$_GET['tgl2'];

                                  $nml3=$_GET['nml3'];
                                  $idk3=$_GET['nk3'];
                                  $kt3=$_GET['kt3'];
                                  $bg3=$_GET['bg3'];
$umr3=$_GET['thn3']."-".$_GET['bln3']."-".$_GET['tgl3'];

                                   $nml4=$_GET['nml4'];
                                  $idk4=$_GET['nk4'];
                                  $kt4=$_GET['kt4'];
                                  $bg4=$_GET['bg4'];
$umr4=$_GET['thn4']."-".$_GET['bln4']."-".$_GET['tgl4'];

                                   $nml5=$_GET['nml5'];
                                  $idk5=$_GET['nk5'];
                                  $kt5=$_GET['kt5'];
                                  $bg5=$_GET['bg5'];
$umr5=$_GET['thn5']."-".$_GET['bln5']."-".$_GET['tgl5'];

                                  $nml6=$_GET['nml6'];
                                  $idk6=$_GET['nk6'];
                                  $kt6=$_GET['kt6'];
                                  $bg6=$_GET['bg6'];
$umr6=$_GET['thn6']."-".$_GET['bln6']."-".$_GET['tgl6'];

                                  $nml7=$_GET['nml7'];
                                  $idk7=$_GET['nk7'];
                                  $kt7=$_GET['kt7'];
                                  $bg7=$_GET['bg7'];
$umr7=$_GET['thn7']."-".$_GET['bln7']."-".$_GET['tgl7'];

                                  $nml8=$_GET['nml8'];
                                  $idk8=$_GET['nk8'];
                                  $kt8=$_GET['kt8'];
                                  $bg8=$_GET['bg8'];
$umr8=$_GET['thn8']."-".$_GET['bln8']."-".$_GET['tgl8'];


                                  $email=$_GET['email'];
                                  $nohp=$_GET['nohp'];
                                  $tglp=date('Y-m-d h:i:s');
                               

                                      if(empty($nml1) or empty($idk1) or empty($kt1) or empty($nml2) or empty($idk2) or empty($kt2) or empty($nml3) or empty($umr1) or empty($umr2) or empty($umr3) or empty($umr4) or empty($umr5) or empty($umr6) or empty($umr7) or empty($umr8) or empty($idk3) or empty($kt3) or empty($nml4) or empty($idk4) or empty($kt4) or empty($nml5) or empty($idk5) or empty($kt5) or empty($nml6) or empty($idk6) or empty($kt6) or empty($nml7) or empty($idk7) or empty($kt7)  or empty($nml8) or empty($idk8) or empty($kt8) or empty($email) or empty($nohp)){
                                    echo "
                             <script>
                             alert('Data masih belum lengkap.!');
                             javascript:history.back();
                             </script>
                             ";
                                     }else if($idk1==$idk2 or $idk1==$idk3 or $idk1==$idk4 or $idk1==$idk5 or $idk2==$idk3 or $idk2==$idk4 or $idk2==$idk5 or $idk3==$idk4 or $idk3==$idk5 or $idk1==$idk6 or $idk2==$idk6 or $idk3==$idk6 or $idk4==$idk6 or $idk5==$idk6 or $idk1==$idk7 or $idk2==$idk7 or $idk3==$idk7 or $idk4==$idk7 or $idk5==$idk7 or $idk6==$idk7 or $idk1==$idk8 or $idk2==$idk8 or $idk3==$idk8 or $idk4==$idk8 or $idk5==$idk8 or $idk6==$idk7 or $idk7==$idk8){
                                    echo "
                             <script>
                             alert('Nomor Kursi tidak boleh ada yang sama.!');
                             javascript:history.back();
                             </script>
                             ";
                                  
                                  }else{

                                  $sql=mysqli_query($koneksi,"INSERT INTO `pesan`(`id_pesan`, `kode_member`, `kode_tiket`, `tgl_berangkat`, `ktgr_tiket`, `nm_penumpang`, `umur`, `idk`,`bagasi`,`nohp`, `email`, `tanggal_pesan`, `status`, `id_golongan`, `no_kendaraan`) VALUES ('$idp1','$idu','$idt','$tglb','$kt1','$nml1','$umr1','$idk1','$bg1','$nohp','$email','$tglp','1','$id_golongan1','$no_kendaraan1'),('$idp2','$idu','$idt','$tglb','$kt2','$nml2','$umr2','$idk2','$bg2','$nohp','$email','$tglp','1','$id_golongan1','$no_kendaraan1'),('$idp3','$idu','$idt','$tglb','$kt3','$nml3','$umr3','$idk3','$bg3','$nohp','$email','$tglp','1','$id_golongan1','$no_kendaraan1'),('$idp4','$idu','$idt','$tglb','$kt4','$nml4','$umr4','$idk4','$bg4','$nohp','$email','$tglp','1','$id_golongan1','$no_kendaraan1'),('$idp5','$idu','$idt','$tglb','$kt5','$nml5','$umr5','$idk5','$bg5','$nohp','$email','$tglp','1','$id_golongan1','$no_kendaraan1'),('$idp6','$idu','$idt','$tglb','$kt6','$nml6','$umr6','$idk6','$bg6','$nohp','$email','$tglp','1','$id_golongan1','$no_kendaraan1'),('$idp7','$idu','$idt','$tglb','$kt7','$nml7','$umr7','$idk7','$bg7','$nohp','$email','$tglp','1','$id_golongan1','$no_kendaraan1'),('$idp8','$idu','$idt','$tglb','$kt8','$nml8','$umr8','$idk8','$bg8','$nohp','$email','$tglp','1','$id_golongan1','$no_kendaraan1')");
                          
                                 
                         echo "
                             <script>
                             alert('Anda berhasil memesan tiket, silahkan lakukan pembayaran sesuai dengan total bayar.!');
                           
                             </script>
                             ";

                            echo "<meta http-equiv=refresh content=0;url=index.php?p=pesanan-saya>";
                          }
                            }
                            if($_GET['jlmp']>8){

                               echo "
                             <script>
                             alert('Maaf, anda hanya bisa memesan max 8 tiket.!');
                           
                             </script>
                             ";
                            }

                          }
                             
                            ?>
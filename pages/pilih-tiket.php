<!--start wrapper-->
<section class="wrapper">
<div class="slider-wrapper">
    <div class="slider">
        <div class="fs_loader"></div>
        <div class="slide">

            <img src="./assets/images/fraction-slider/base.jpg" width="1920" height="auto" data-in="fade" data-out="fade" />

            <img class="ftm" src="./assets/images/kapal/kapal1.jpg" width="500" height="390" data-position="60,1200" data-in="bottomLeft" data-out="fade" style="width:auto; height:auto" data-delay="500">

            <p class="slide-heading" data-position="130,380" data-in="top"  data-out="left" data-ease-in="easeOutBounce" data-delay="700">Keselamatan</p>

            <p class="sub-line" data-position="230,380" data-in="right" data-out="left" data-delay="1500">Kami selalu mengutamakan keselamatan pelanggan kami  </p>

            <p class="sub-line" data-position="330,380" data-in="bottom" data-out="bottom" data-delay="2000">Tanpa terkecuali</p>
        </div>

        <div class="slide">
            <img src="./assets/images/fraction-slider/base_2.jpg" width="1920" height="auto" data-in="fade" data-out="fade" />

            <p class="slide-heading" data-position="130,380" data-in="right"  data-out="left" data-ease-in="jswing">Kenyamanan</p>

            <p class="sub-line" data-position="225,380" data-in="right" data-out="left"  data-delay="1500">Kami akan selalu berusaha membuat pelanggan kami nyaman</p>

            <img class="ftm" src="./assets/images/kapal/kapal2.jpg" width="500" height="400" data-position="50,1200" data-in="left" data-out="fade" style="width:auto; height:auto" data-delay="500">

            <p class="sub-line" data-position="320,380" data-in="bottom" data-out="bottom" data-delay="2000">Bersama Kami</p>
        </div>

    </div>
</div>
<!--End Slider-->
  <section class="content contact">
            <div class="container">
                <div class="row sub_content">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                      
          <div class="widget widget_tab">
                                <div class="velocity-tab sidebar-tab">
                                    <ul  class="nav nav-tabs">
                                        <li class="active"><a href="#Popular" data-toggle="tab">Pilih Tiket</a></li>
                                    </ul>

                                    <div  class="tab-content clearfix">
                                        <div class="tab-pane fade active in" id="Popular">
                                             <table id="example1" class="table table-hover">
                      
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Kapal</th>
                        <th>Jam Berangkat</th>
                        <th>jam Tiba</th>
                        <th>Harga Dewasa</th>
                         <th>Harga Anak2</th>
                        <th></th>
                      </tr>
                    </thead>
                   
                    <tbody>
                     <?php
                    include '../../config/koneksi.php';


                    $tj=$_GET['tj'];
                    $idg=$_GET['id_golongan'];

                    $tt=$_GET['tb'];
                    $tb=date('Y-m-d',strtotime($tt));

                    $jml=$_GET['jpd'];

                    if($jml==0){
                      $jml=$_GET['jpa'];
                    }

                    if($idg==""){
                      $id_golongan="1";
                    }else{
                      $id_golongan = $_GET['id_golongan'];
                    }

                    if(empty($tj) or empty($tt) or empty($jml)){

                           echo "
                             <script>
                             alert('Kategori pencarian tiket masih belum lengkap.!');
                             javascript:history.back();
                             </script>
                             ";
                    }else{

                      $no=0;

                      $htd=mysqli_query($koneksi,"SELECT * FROM pesan WHERE tgl_berangkat='$tb' and ktgr_tiket='Dewasa'");
                      $jtd=mysqli_num_rows($htd);

                      $hta=mysqli_query($koneksi,"SELECT * FROM pesan WHERE tgl_berangkat='$tb' and ktgr_tiket='Anak'");
                      $jta=mysqli_num_rows($hta);

                      $tktd=$jtd + $_GET['jpd'];

                      $tkta=$jtd + $_GET['jpa'];

                      $tajuan=mysqli_query($koneksi,"SELECT *  FROM tujuan WHERE kode_tujuan='$tj'");
                      $b=mysqli_fetch_array($tajuan);


                    $sql=mysqli_query($koneksi,"SELECT tujuan.nama_tujuan,kapal.nama_kapal,tiket. * FROM tiket,tujuan,kapal WHERE tujuan.kode_tujuan=tiket.id_tujuan and kapal.kode_kapal=tiket.id_kapal and tiket.id_tujuan='$tj' and tiket.jml_tiket_dewasa > $tktd and tiket.jml_tiket_ank2 > $tkta");
                    

                    if(mysqli_num_rows($sql) > 0){
                        echo'<tr><b style="padding-left:100px; font-size:15px;color: rgb(114, 124, 182);border-right: 2px solid rgb(164, 162, 162);padding-right:10px;">Tujuan <i class="fa fa-arrow-right"></i> '.$b['nama_tujuan'].'</b></tr>';
                      echo'<tr><b style="padding-left:10px; font-size:15px;color: rgb(231, 172, 32);"> <i class="fa fa-calendar"></i> '.date('d F Y',strtotime($tt)).'</h2></tr>';
                      echo'<hr>';
                      while($q=mysqli_fetch_array($sql)){
                        $no++;
                      
                    
                      echo'<tr>
                        <td><br>'.$no.'<br></td>
                        <td><br>'.$q['nama_kapal'].'<br></td>
                        <td><br>'.date('H:i',strtotime($q['jam_berangkat'])).'<br></td>
                        <td><br>'.date('H:i',strtotime($q['jam_tiba'])).'<br></td>
                        <td><br><b>Rp'.number_format($q['hrg_tiket_dewasa'],0,".",".").'</b> <br></td>
                         <td><br><b>Rp'.number_format($q['hrg_tiket_ank2'],0,".",".").'</b> <br></td>
                        <td><br><a href="index.php?p=formulir-pesan&idt='.$q['kode_tiket'].'&tj='.$tj.'&tb='.$tt.'&jpd='.$_GET['jpd'].'&jpa='.$_GET['jpa'].'&id_golongan='.$_GET['id_golongan'].'" class="btn btn-success pesan"><i class="fa fa-cart-arrow-down"></i> Pesan Tiket</a><br></td>
                       
                       </td>
                        </tr>';
                      }
                    }else{
                       $sql=mysqli_query($koneksi,"SELECT tujuan.nama_tujuan FROM tujuan WHERE tujuan.kode_tujuan='$tj'");
                      $q=mysqli_fetch_array($sql);
                       echo'<tr><b style="padding-left:100px; font-size:15px;color: rgb(114, 124, 182);border-right: 2px solid rgb(164, 162, 162);padding-right:10px;">Tujuan <i class="fa fa-arrow-right"></i> '.$q['nama_tujuan'].'</b></tr>';
                      echo'<tr><b style="padding-left:10px; font-size:15px;color: rgb(231, 172, 32);"> <i class="fa fa-calendar"></i> '.date('d M Y',strtotime($tt)).'</h2></tr>';
                      echo'<hr>';
                      echo'<tr>
                        <td colspan="8"><br><b> <i class="fa fa-info-circle"></i>  Untuk saat ini tidak tersedia tiket dengan kategori yang anda cari, silahkan pilih kategori yang lain.</b><br></td></tr>';
                      }
                    }
                     ?>
                     <tbody>
                    
                  </table>
                  <a href="index.php" class="btn btn-default"><i class="fa fa-arrow-left"></i> Kembali</a>
                                        </div>
                                   
                                    </div>
                                </div>
                            </div>
                    </div>
               </div>
          </div>
 </section>
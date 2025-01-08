<style>
.custom-dropdown {
    position: relative;
    display: inline-block;
    width: 100%;
}

.dropdown-selected {
    background-color: #f1f1f1;
    padding: 8px;
    cursor: pointer;
    border: 1px solid #ccc;
    width: 100%;
}

.dropdown-options {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 100%;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
    max-height: 200px;
    overflow-y: auto;
}

.dropdown-option {
    padding: 12px 16px;
    cursor: pointer;
    border-bottom: 1px solid #ddd;
}

.dropdown-option:last-child {
    border-bottom: none;
}

.dropdown-option:hover {
    background-color: #ddd;
}

.dropdown-option strong {
    display: block;
}
</style>
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
         <div class="slide">

            <img src="./assets/images/fraction-slider/base.jpg" width="1920" height="auto" data-in="fade" data-out="fade" />

            <img class="ftm" src="./assets/images/kapal/kapal3.jpg" width="500" height="390" data-position="60,1200" data-in="bottomLeft" data-out="fade" style="width:auto; height:auto" data-delay="500">

            <p class="slide-heading" data-position="130,380" data-in="top"  data-out="left" data-ease-in="easeOutBounce" data-delay="700">Keselamatan</p>

            <p class="sub-line" data-position="230,380" data-in="right" data-out="left" data-delay="1500">Kami selalu mengutamakan keselamatan pelanggan kami  </p>

            <p class="sub-line" data-position="330,380" data-in="bottom" data-out="bottom" data-delay="2000">Tanpa terkecuali</p>
        </div>
        <div class="slide">
            <img src="./assets/images/fraction-slider/base_2.jpg" width="1920" height="auto" data-in="fade" data-out="fade" />

            <p class="slide-heading" data-position="130,380" data-in="right"  data-out="left" data-ease-in="jswing">Kenyamanan</p>

            <p class="sub-line" data-position="225,380" data-in="right" data-out="left"  data-delay="1500">Kami akan selalu berusaha membuat pelanggan kami nyaman</p>

            <img class="ftm" src="./assets/images/kapal/kapal4.jpg" width="500" height="400" data-position="50,1200" data-in="left" data-out="fade" style="width:auto; height:auto" data-delay="500">

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
                                        <li class="active"><a href="#Popular" data-toggle="tab">Cari Tiket</a></li>
                                    </ul>

                                    <div  class="tab-content clearfix">
                                        <div class="tab-pane fade active in" id="Popular">
                                       <form id="contactForm" action="index.php?p=pilih-tiket" method="GET">
                                             <div class="col-md-4">
                                             <input type="hidden" name="p" value="pilih-tiket">
                                             <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label>Tujuan</label>
                                            <div class="input-group"  style="padding-bottom: 5px;">
                                                <div class="input-group-addon"><i class="fa fa-arrow-right"></i></div>
                                                    <select name="tj" id="select" class="form-control">
                                                        <option value="">-Tujuan-</option>
                                                        <?php  
                                                        include './config/koneksi.php';

                                                        $sql=mysqli_query($koneksi,"SELECT * FROM tujuan");
                                                        while($q=mysqli_fetch_array($sql)){
                                                        ?>
                                                            <option value="<?php echo $q['kode_tujuan']; ?>"><?php echo $q['nama_tujuan']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <i>* Tujuan keberangkatan anda</i>
                                            </div>
                                        </div>
                                    </div>
                                             </div>
                                             <div class="col-md-4">
                                             <div class="row">
                                                <div class="form-group">
                                     <div class="col-md-12">
                                     <label>Tanggal Berangkat</label>
                                       <div class="input-group date" style="padding-bottom: 5px;">
                                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                          <input type="text" name="tb" class="form-control" placeholder="Tanggal Berangkat" id="datepickercari">
                                          
                                          </div>
                                        
                                          <i>* Tanggal anda berangkat</i>
                                     
                                </div>
                                </div>
                                             </div>
                                             </div>
                                                 <div class="col-md-4">
                                               <div class="row">
                                <div class="form-group"  style="padding-bottom: 5px;">
                                 <label style="padding-left: 15px;">Jumlah Penumpang</label>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="fa fa-users"></i></div>
                                                        <select name="jpd" id="select" class="form-control">
                                                            <option value="0">-Dewasa-</optiom>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                        </select>
                                                    </div>
                                                </div>

                                            <div class="col-md-6">
                                                <select name="jpa" id="select" class="form-control">
                                                    <option value="0">-Anak-anak-</optiom>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                </select>
                                            </div>
                                            <label style="padding-left: 15px;">Golongan Kendaraan</label>
                                            <div class="col-md-12">
                                                <div class="custom-dropdown">
                                                    <div class="dropdown-selected">Pilih Golongan</div>
                                                    <div class="dropdown-options">
                                                        <?php  
                                                        $sql2 = mysqli_query($koneksi, "SELECT * FROM golongan_kendaraan");
                                                        while ($q2 = mysqli_fetch_array($sql2)) {
                                                        ?>
                                                            <div class="dropdown-option" data-value="<?php echo $q2['id_golongan']; ?>">
                                                                <strong><?php echo $q2['nm_golongan']; ?></strong><br>
                                                                <span><?php echo $q2['ket_golongan']; ?></span>
                                                            </div>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="id_golongan" id="hidden-id_golongan">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                 

                                             <div class="col-md-12">
                                             <p>
                                              <div class="row">
                                <div class="col-md-12">
                                    <button  type="submit" data-loading-text="Loading..." class="btn btn-default btn-lg btn-cari"><i class="fa fa-search"></i> Cari tiket</button>
                                </div>
                            </div></div>
                                             </form>
                                        </div>
                                   
                                    </div>
                                </div>
                            </div>
                    </div>
               </div>
               <div class="container">
            <div class="row super_sub_content">
                <div class="col-md-3 col-sm-3">
                    <div class="serviceBox_2 green">
                        <div class="service-icon">
                            <i class="fa fa-users"></i>
                        </div>
                        <div class="service-content">
                            <h3>Nahkoda</h3>
                            <p> Nakkoda yang ahli dibidang nya dan sudah berpengalaman.</p>
                            <div class="read">
                              
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3">
                    <div class="serviceBox_2 purple">
                        <div class="service-icon">
                            <i class="fa fa-ship"></i>
                        </div>
                        <div class="service-content">
                            <h3>Kapal</h3>
                            <p> Kapal yang nyaman, yang bersertifikat lulus uji.</p>
                            <div class="read">
                              
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3">
                    <div class="serviceBox_2 red">
                        <div class="service-icon">
                            <i class="fa fa-arrow-right"></i>
                        </div>
                        <div class="service-content">
                            <h3>Tujuan</h3>
                            <p> Memiliki beberapa rute tujuan, yang telah sering dilalui .</p>
                            <div class="read">
                               
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3">
                    <div class="serviceBox_2 blue">
                        <div class="service-icon">
                            <i class="fa fa-money"></i>
                        </div>
                        <div class="service-content">
                            <h3>Harga</h3>
                            <p> Harga sesuai dengan fasilitas yang bersahabat dengan masyarakat.</p>
                            <div class="read">
                               
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <br>
        <br>
          </div>
 </section>

<script>
document.querySelector('.dropdown-selected').addEventListener('click', function() {
    document.querySelector('.dropdown-options').classList.toggle('show');
});

document.querySelectorAll('.dropdown-option').forEach(function(option) {
    option.addEventListener('click', function() {
        document.querySelector('.dropdown-selected').innerHTML = '<strong>' + this.querySelector('strong').innerHTML + '</strong><br>' + this.querySelector('span').innerHTML;
        document.querySelector('.dropdown-options').classList.remove('show');
        document.getElementById('hidden-id_golongan').value = this.getAttribute('data-value');
    });
});

window.addEventListener('click', function(e) {
    if (!e.target.matches('.dropdown-selected')) {
        var dropdowns = document.querySelectorAll('.dropdown-options');
        dropdowns.forEach(function(dropdown) {
            dropdown.classList.remove('show');
        });
    }
});

</script>

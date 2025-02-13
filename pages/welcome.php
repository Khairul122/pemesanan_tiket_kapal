<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemesanan Tiket Kapal</title>
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
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
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
</head>
<body>
    <section class="wrapper">
        <div class="slider-wrapper">
            <div class="slider">
                <div class="fs_loader"></div>
                <div class="slide">
                    <img src="./assets/images/fraction-slider/base.jpg" width="1920" height="auto" data-in="fade" data-out="fade" />
                    <img class="ftm" src="./assets/images/kapal/kapal1.jpg" width="500" height="390" data-position="60,1200" data-in="bottomLeft" data-out="fade" style="width:auto; height:auto" data-delay="500">
                    <p class="slide-heading" data-position="130,380" data-in="top" data-out="left" data-ease-in="easeOutBounce" data-delay="700">Keselamatan</p>
                    <p class="sub-line" data-position="230,380" data-in="right" data-out="left" data-delay="1500">Kami selalu mengutamakan keselamatan pelanggan kami</p>
                    <p class="sub-line" data-position="330,380" data-in="bottom" data-out="bottom" data-delay="2000">Tanpa terkecuali</p>
                </div>
                <div class="slide">
                    <img src="./assets/images/fraction-slider/base_2.jpg" width="1920" height="auto" data-in="fade" data-out="fade" />
                    <p class="slide-heading" data-position="130,380" data-in="right" data-out="left" data-ease-in="jswing">Kenyamanan</p>
                    <p class="sub-line" data-position="225,380" data-in="right" data-out="left" data-delay="1500">Kami akan selalu berusaha membuat pelanggan kami nyaman</p>
                    <img class="ftm" src="./assets/images/kapal/kapal2.jpg" width="500" height="400" data-position="50,1200" data-in="left" data-out="fade" style="width:auto; height:auto" data-delay="500">
                    <p class="sub-line" data-position="320,380" data-in="bottom" data-out="bottom" data-delay="2000">Bersama Kami</p>
                </div>
                <div class="slide">
                    <img src="./assets/images/fraction-slider/base.jpg" width="1920" height="auto" data-in="fade" data-out="fade" />
                    <img class="ftm" src="./assets/images/kapal/kapal3.jpg" width="500" height="390" data-position="60,1200" data-in="bottomLeft" data-out="fade" style="width:auto; height:auto" data-delay="500">
                    <p class="slide-heading" data-position="130,380" data-in="top" data-out="left" data-ease-in="easeOutBounce" data-delay="700">Keselamatan</p>
                    <p class="sub-line" data-position="230,380" data-in="right" data-out="left" data-delay="1500">Kami selalu mengutamakan keselamatan pelanggan kami</p>
                    <p class="sub-line" data-position="330,380" data-in="bottom" data-out="bottom" data-delay="2000">Tanpa terkecuali</p>
                </div>
                <div class="slide">
                    <img src="./assets/images/fraction-slider/base_2.jpg" width="1920" height="auto" data-in="fade" data-out="fade" />
                    <p class="slide-heading" data-position="130,380" data-in="right" data-out="left" data-ease-in="jswing">Kenyamanan</p>
                    <p class="sub-line" data-position="225,380" data-in="right" data-out="left" data-delay="1500">Kami akan selalu berusaha membuat pelanggan kami nyaman</p>
                    <img class="ftm" src="./assets/images/kapal/kapal4.jpg" width="500" height="400" data-position="50,1200" data-in="left" data-out="fade" style="width:auto; height:auto" data-delay="500">
                    <p class="sub-line" data-position="320,380" data-in="bottom" data-out="bottom" data-delay="2000">Bersama Kami</p>
                </div>
            </div>
        </div>

        <section class="content contact">
            <div class="container">
                <div class="row sub_content">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div id="modalSyarat" class="modal fade" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Syarat dan Ketentuan</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>Saya setuju atas syarat dan ketentuan apabila data yang diinputkan tidak sesuai dengan data yang sebenarnya.</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" id="batalBtn">Batal</button>
                                        <button type="button" class="btn btn-success" id="setujuBtn">Setuju</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="widget widget_tab">
                            <div class="velocity-tab sidebar-tab">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#Popular" data-toggle="tab">Cari Tiket</a></li>
                                </ul>
                                <div class="tab-content clearfix">
                                    <div class="tab-pane fade active in" id="Popular">
                                        <form id="contactForm" action="index.php?p=pilih-tiket" method="GET" onsubmit="return showModal();">
                                            <div class="col-md-4">
                                                <input type="hidden" name="p" value="pilih-tiket">
                                                <div class="row">
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <label>Rute</label>
                                                            <div class="input-group" style="padding-bottom: 5px;">
                                                                <div class="input-group-addon"><i class="fa fa-arrow-right"></i></div>
                                                                <select name="tj" id="select-rute" class="form-control">
                                                                    <option value="">Pilih Rute (Asal - Tujuan)</option>
                                                                    <?php
                                                                    require_once './config/koneksi.php';
                                                                    try {
                                                                        $query = "SELECT kode_tujuan, nama_tujuan, pelabuhan_asal FROM tujuan WHERE kode_tujuan IS NOT NULL AND nama_tujuan IS NOT NULL AND pelabuhan_asal IS NOT NULL ORDER BY pelabuhan_asal, nama_tujuan";
                                                                        $stmt = $koneksi->prepare($query);
                                                                        $stmt->execute();
                                                                        $result = $stmt->get_result();
                                                                        while ($row = $result->fetch_assoc()) {
                                                                            if (!empty($row['kode_tujuan']) && !empty($row['pelabuhan_asal']) && !empty($row['nama_tujuan'])) {
                                                                                $kode = trim(htmlspecialchars($row['kode_tujuan'], ENT_QUOTES, 'UTF-8'));
                                                                                $asal = trim(htmlspecialchars($row['pelabuhan_asal'], ENT_QUOTES, 'UTF-8'));
                                                                                $tujuan = trim(htmlspecialchars($row['nama_tujuan'], ENT_QUOTES, 'UTF-8'));
                                                                                printf('<option value="%s">%s - %s</option>', $kode, $asal, $tujuan);
                                                                            }
                                                                        }
                                                                        $stmt->close();
                                                                    } catch (Exception $e) {
                                                                        error_log("Error saat mengambil data rute: " . $e->getMessage());
                                                                        echo '<option value="">Error memuat data</option>';
                                                                    }
                                                                    ?>
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
                                                    <div class="form-group" style="padding-bottom: 5px;">
                                                        <label style="padding-left: 15px;">Jumlah Penumpang</label>
                                                        <div class="col-md-12">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="input-group">
                                                                        <div class="input-group-addon"><i class="fa fa-users"></i></div>
                                                                        <select name="jpd" id="select" class="form-control">
                                                                            <option value="0">-Dewasa-</option>
                                                                            <option value="1">1</option>
                                                                            <option value="2">2</option>
                                                                            <option value="3">3</option>
                                                                            <option value="4">4</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <select name="jpa" id="select" class="form-control">
                                                                        <option value="0">-Anak-anak-</option>
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
                                                            <button type="submit" data-loading-text="Loading..." class="btn btn-default btn-lg btn-cari"><i class="fa fa-search"></i> Cari tiket</button>
                                                        </div>
                                                    </div>
                                                </div>
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
                                    <p>Nahkoda yang ahli di bidangnya dan sudah berpengalaman.</p>
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
                                    <p>Kapal yang nyaman, yang bersertifikat lulus uji.</p>
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
                                    <p>Memiliki beberapa rute tujuan, yang telah sering dilalui.</p>
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
                                    <p>Harga sesuai dengan fasilitas yang bersahabat dengan masyarakat.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>

    <script>
        function showModal() {
            $("#modalSyarat").modal("show");
            return false;
        }

        document.getElementById("setujuBtn").addEventListener("click", function() {
            $("#modalSyarat").modal("hide");
            document.getElementById("contactForm").submit();
        });

        document.getElementById("batalBtn").addEventListener("click", function() {
            $("#modalSyarat").modal("hide");
            document.getElementById("contactForm").reset();
        });

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
</body>
</html>
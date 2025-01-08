
                       <?php 
                            include '../config/koneksi.php';
                            $id=$_POST['id'];

                           $sql=mysqli_query($koneksi,"SELECT tujuan.nama_tujuan,kapal.nama_kapal,nahkoda.nama_nah,tiket. * FROM tiket,nahkoda,tujuan,kapal WHERE tujuan.kode_tujuan=tiket.id_tujuan and kapal.kode_kapal=tiket.id_kapal and nahkoda.kode_nah=tiket.id_nahkoda and kode_tiket='$id'");
                      $q=mysqli_fetch_array($sql);

                          

                            ?>

                       
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-lg-12 ">
                                    <label>Tujuan</label>

                                     <input type="hidden" name="kdt" class="form-control" maxlength="100" value="<?php echo $id; ?>">
                                     <div class="input-group"> 
                                      <div class="input-group-addon"><i class="fa fa-map-marker"></i></div>
                                       <input type="text" id="jt" name="jt" class="form-control" maxlength="100" value="<?php echo $q['nama_tujuan']; ?>" readonly></div><p>
                                    </div>
                                </div>
                            </div>
                              <div class="row">
                                <div class="form-group">
                                    <div class="col-lg-12 ">
                                    <label>Tanggal Berangkat</label>
                                                                        <div class="input-group"> 
                                      <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                       <input type="text" id="jt" name="jt" class="form-control" maxlength="100" value="<?php echo date('d-m-Y',strtotime($q['tgl_b'])); ?>" readonly></div><p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-lg-12 ">
                                    <label>Jam Berangkat</label>
                                    
                                    <div class="input-group"> 
                                      <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                       <input type="text" id="jt" name="jt" class="form-control" maxlength="100" value="<?php echo date('H:i',strtotime($q['tgl_b'])); ?>" readonly></div><p>
                                    </div>
                                </div>
                            </div>  
                              <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                     <label>Jumlah Pesan</label>
                                    
                                      <div class="input-group"> 
                                      <div class="input-group-addon"><i class="fa fa-money"></i></div>
                                     <input type="text" name="jmlp" class="form-control" value="1" readonly style="font-weight:700;""> 
                                          </div>
                                         
                                    </div>
                                </div>
                            </div>
                           <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                     <label>Total Bayar</label>
                                    
                                      <div class="input-group"> 
                                      <div class="input-group-addon"><i class="fa fa-money"></i></div>
                                     <input type="text" name="hrg" class="form-control" value="<?php echo $q['harga']; ?>" readonly style="font-weight:700;"">
                                          </div><p>
                                         
                                    </div>
                                </div>
                            </div>
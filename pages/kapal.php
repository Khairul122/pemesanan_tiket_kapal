<!--start wrapper-->
    <section class="wrapper">
        <section class="page_head">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="page_title">
                            <h2>Kapal</h2>
                           
                        </div>
                        <nav id="breadcrumbs">
                            <ul>
                                <li>You are here:</li>
                                <li><a href="index.php">Home</a></li>
                                <li>Kapal</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <section class="content contact">
            <div class="container">
                <div class="row sub_content">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="dividerHeading">
                            <h4><span>Kapal</span></h4>
                        </div>
                        <?php
                             include './config/koneksi.php';

                              $sql=mysqli_query($koneksi,"SELECT * FROM kapal");
                            while($q=mysqli_fetch_array($sql)){

                         ?>
                        <div class="col-lg-3 col-md-3 col-sm-6">
                            <div class="our-team">
                                <div class="pic">
                                    <img src="./assets/images/kapal/<?php echo $q['ft_kapal']; ?>" alt="profile img">
                                   <div class="option">
                                   
                                </div>
                                </div>
                                <div class="team_prof">
                                    <h3 class="names"># <?php echo $q['nama_kapal']; ?></h3>
                                   
                                </div>
                            </div>
                        </div>
                        <?php } ?>
          
                    </div>
                    
                </div>
            </div>
        </section>
    </section>
    <!--end wrapper-->
<style type="text/css">
    #article .card {
        min-height: 380px;
    }
</style>
<section id="article" style="padding-bottom: 50px; position: relative; z-index: 99;">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 mb-3">
                <ul class="nav nav-tabs" style="padding-top: 0px; margin-top: 0px;">
                    <li class="active"><a data-toggle="tab" href="#new" class="active"><?php echo $judul_artikel_terbaru; ?></a></li>
                    <li><a data-toggle="tab" href="#popular"><?php echo $judul_artikel_populer; ?></a></li>
                </ul>
            </div>
        </div>
        <div class="tab-content">
            <div id="new" class="tab-pane fade in active show">
                <div class="row">
                    <?php 
                    
                    $query_artikel = mysqli_query($connect, "SELECT * FROM `tbl_artikel` order by timestamp desc limit 0, 3");
                    $jumlah_artikel = mysqli_num_rows($query_artikel);
                    if($jumlah_artikel > 0){
                        if($jumlah_artikel == 4){
                            $class_ = "col-md-3 col-sm-6 ";
                        }
                        if($jumlah_artikel == 3){
                            $class_ = "col-md-4 col-sm-6 ";
                        }
                        if($jumlah_artikel == 2){
                            $class_ = "col-md-6 col-sm-6 ";
                        }
                        if($jumlah_artikel == 1){
                            $class_ = "col-md-12 col-sm-12 ";
                        }
                        while($hasil_artikel = mysqli_fetch_array($query_artikel)){
                            if($hasil_artikel['photo_artikel'] != "" && file_exists(__DIR__ . "/../../upload/photo_artikel/" . $hasil_artikel['photo_artikel'])){
                                $src_ = "upload/photo_artikel/" . $hasil_artikel['photo_artikel'];
                                $style = ' style="background-image: url(\''.$src_.'\'); background-size: cover; border-top-left-radius: 12px; border-top-right-radius: 12px;"';
                                $img_src = '';
                            } else {
                                $src_ = "assets/img/LOGOARTICLE.png";
                                $style = '';
                                $img_src = '<img width="auto" height="165px" style="width: inherit !important;" src="assets/img/LOGOARTICLE.png" alt="newest-image-article">';
                            }
                            $nama_kategori = "Artikel";
                            $timestamp_ = $hasil_artikel['timestamp'];
                            $explode_timestamp_ = explode(" ", $timestamp_);
                            $waktu_aktif = (isset($explode_timestamp_[1]) ? substr($explode_timestamp_[1], 0, 5) : "00:00") . " WIB";
                            $tanggal = strtotime($explode_timestamp_[0]);
                            $explode_tanggal = explode("-", $explode_timestamp_[0]);
                            if(sizeof($explode_tanggal) == 3){
                                $tanggal_active = $explode_tanggal[2] . " " . get_month($explode_tanggal[1]) . " " . $explode_tanggal[0];
                            }
                            $day = date('w', $tanggal);
                            $nama_hari = get_day($day);
                            
                            $all_day = $nama_hari . ", " . $tanggal_active . " " . $waktu_aktif;
                            
                            $query_kategori = mysqli_query($connect, "select judul_kategori from tbl_artikel_kategori where id = '".$hasil_artikel['id_kategori']."'");
                            if(mysqli_num_rows($query_kategori) > 0){
                                $hasil_kategori = mysqli_fetch_array($query_kategori);
                                $nama_kategori = $hasil_kategori['judul_kategori'];
                            }
                            ?>
                            <!--  -->
                            <div class="<?php echo $class_; ?> col-xs-12">
                                <a href="artikel-<?php echo str_replace($GLOBALS['search'], $GLOBALS['replace'], strtolower($hasil_artikel['judul_artikel'])); ?>">
                                    <div class="card">
                                        <div class="card-header" <?php echo $style; ?>>
                                            <div class="image-wrapper" style="text-align: center;">
                                                <?php echo $img_src; ?>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="title-article">
                                                <span>
                                                    <?php echo $nama_kategori; ?>                                        
                                                </span>
                                            </div>
                                            <div class="desc-article">
                                                <span
                                                    class="d-block mb-2">
                                                    <strong style="display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical; overflow: hidden;"><?php echo $hasil_artikel['judul_artikel']; ?></strong>
                                                </span>
                                                <span class="text-secondary small"><?php echo $all_day; ?></span>
                                                <div class="limit-text-dashboard">
                                                    <?php echo substr(strip_tags($hasil_artikel['isi_artikel']), 0, 200); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <!--  -->
                            <?php
                        }
                    }
                    
                    ?>
                </div>
            </div>
            
            <div id="popular" class="tab-pane fade in show">
                <div class="row">
                    <?php 
                    
                    $query_artikel_ = mysqli_query($connect, "SELECT * FROM `tbl_artikel` order by jumlah_view desc limit 0, 3");
                    $jumlah_artikel_ = mysqli_num_rows($query_artikel_);
                    if($jumlah_artikel_ > 0){
                        if($jumlah_artikel_ == 4){
                            $class_ = "col-md-3 col-sm-6 ";
                        }
                        if($jumlah_artikel_ == 3){
                            $class_ = "col-md-4 col-sm-6 ";
                        }
                        if($jumlah_artikel_ == 2){
                            $class_ = "col-md-6 col-sm-6 ";
                        }
                        if($jumlah_artikel_ == 1){
                            $class_ = "col-md-12 col-sm-12 ";
                        }
                        while($hasil_artikel = mysqli_fetch_array($query_artikel_)){
                            if($hasil_artikel['photo_artikel'] != "" && file_exists(__DIR__ . "/../../upload/photo_artikel/" . $hasil_artikel['photo_artikel'])){
                                $src_ = "upload/photo_artikel/" . $hasil_artikel['photo_artikel'];
                                $style = ' style="background-image: url(\''.$src_.'\'); background-size: cover; border-top-left-radius: 12px; border-top-right-radius: 12px;"';
                                $img_src = '';
                            } else {
                                $src_ = "assets/img/LOGOARTICLE.png";
                                $style = '';
                                $img_src = '<img width="auto" height="165px" style="width: inherit !important;" src="assets/img/LOGOARTICLE.png" alt="newest-image-article">';
                            }
                            $nama_kategori = "Artikel";
                            $timestamp_ = $hasil_artikel['timestamp'];
                            $explode_timestamp_ = explode(" ", $timestamp_);
                            $waktu_aktif = (isset($explode_timestamp_[1]) ? substr($explode_timestamp_[1], 0, 5) : "00:00") . " WIB";
                            $tanggal = strtotime($explode_timestamp_[0]);
                            $explode_tanggal = explode("-", $explode_timestamp_[0]);
                            if(sizeof($explode_tanggal) == 3){
                                $tanggal_active = $explode_tanggal[2] . " " . get_month($explode_tanggal[1]) . " " . $explode_tanggal[0];
                            }
                            $day = date('w', $tanggal);
                            $nama_hari = get_day($day);
                            
                            $all_day = $nama_hari . ", " . $tanggal_active . " " . $waktu_aktif;
                            
                            $query_kategori = mysqli_query($connect, "select judul_kategori from tbl_artikel_kategori where id = '".$hasil_artikel['id_kategori']."'");
                            if(mysqli_num_rows($query_kategori) > 0){
                                $hasil_kategori = mysqli_fetch_array($query_kategori);
                                $nama_kategori = $hasil_kategori['judul_kategori'];
                            }
                            ?>
                            <!--  -->
                            <div class="<?php echo $class_; ?> col-xs-12">
                                <a href="#">
                                    <div class="card">
                                        <div class="card-header" <?php echo $style; ?>>
                                            <div class="image-wrapper" style="text-align: center;">
                                                <?php echo $img_src; ?>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="title-article">
                                                <span>
                                                    <?php echo $nama_kategori; ?>                                        
                                                </span>
                                            </div>
                                            <div class="desc-article">
                                                <span
                                                    class="d-block mb-2">
                                                    <strong><?php echo $hasil_artikel['judul_artikel']; ?></strong>
                                                </span>
                                                <span class="text-secondary small"><?php echo $all_day; ?></span>
                                                <div class="limit-text-dashboard">
                                                    <?php echo substr(strip_tags($hasil_artikel['isi_artikel']), 0, 200); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <!--  -->
                            <?php
                        }
                    }
                    
                    ?>
                </div>
            </div>


        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 text-center mt-3">
                <a href="berita-artikel" class="btn btn-light-theme">SELENGKAPNYA</a>
            </div>
        </div>
    </div>
</section>
<style type="text/css">
    #video .card .card-body a {
        text-align: left;
    }
</style>
<section id="video" style="position: relative; z-index: 99;">
    <div class="container" style="padding: 0 0; max-width: 80%;">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <h2 class="title-section mb-3">
                    <?php echo $judul_video_depan; ?>
                </h2>
                <p class="desc-section"><?php echo $deskripsi_video_depan; ?></p>
            </div>
        </div>
        <div class="row">
            <?php 
            
            $query_video = mysqli_query($connect, "SELECT * FROM `tbl_video` order by timestamp desc limit 0, 3");
            $jumlah_video = mysqli_num_rows($query_video);
            if($jumlah_video > 0){
                if($jumlah_video == 4){
                    $class_ = "col-md-3 col-sm-6 ";
                }
                if($jumlah_video == 3){
                    $class_ = "col-md-4 col-sm-6 ";
                }
                if($jumlah_video == 2){
                    $class_ = "col-md-6 col-sm-6 ";
                }
                if($jumlah_video == 1){
                    $class_ = "col-md-12 col-sm-12 ";
                }
                while($hasil_video = mysqli_fetch_array($query_video)){
                    if($hasil_video['photo_video'] != "" && file_exists(__DIR__ . "/../../upload/photo_video/" . $hasil_video['photo_video'])){
                        $style = ' style="height: 160px; background-position: center; background-image: url(\'upload/photo_video/'.$hasil_video['photo_video'].'\'); background-size: cover; border-top-left-radius: 12px; border-top-right-radius: 12px;"';
                        $img_src = '';
                    } else {
                        if(validIdYoutube($hasil_video['id_link_youtube'])){
                            $style = ' style="height: 160px; background-position: center; background-image: url(\'https://i.ytimg.com/vi/'.$hasil_video['id_link_youtube'].'/hqdefault.jpg\'); background-size: cover; border-top-left-radius: 12px; border-top-right-radius: 12px;"';
                            $img_src = '';
                        } else {
                            $style = '';
                            $img_src = '<img width="100%" height="auto" src="assets/img/LOGOVIDEO.png" alt="YKKBI Video">';
                        }
                    }
                    ?>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="card" style="min-height: 278px; margin-bottom: 20px;">
                            <div class="card-header" <?php echo $style; ?>>
                                <div id="iframe_0" class="image-wrapper">
                                    <?php echo $img_src; ?>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="desc-video">
                                    <a href="video-<?php echo str_replace($GLOBALS['search'],$GLOBALS['replace'], strtolower($hasil_video['judul_video'])); ?>" rel="noopener" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                                        <?php echo $hasil_video['judul_video']; ?>                            
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 text-center mt-3">
                <a rel="noopener" href="berita-video" class="btn btn-light-theme">SELENGKAPNYA</a>
            </div>
        </div>
    </div>
</section>
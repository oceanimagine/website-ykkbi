<div class="container" style="padding-right: 0px; padding-left: 0px; z-index: 0; position: relative; min-height: 80vh;">
    <div class="row" style="margin-right: 0px; margin-left: 0px;">
        <div class="col-md-12 col-sm-12 col-xs-12" style="padding-right: 0px; padding-left: 0px;">
            <div style=" width: 100%; height: 100%; background-color: #f1f1f1; padding: 0.01em 16px; border-radius: 0px; margin-left: auto; margin-right: auto; padding-top: 15px; padding-bottom: 15px; box-shadow: 0 4px 14.48px rgb(0 0 0 / 25%); z-index: 99; position: relative;">
                <div class="header_article" style="background-color: #3b3c8c; width: 100%; padding: 8px 16px; border-radius: 4px;">
                    <h3 style='color: white; margin-bottom: 2px; text-align: center;'>Dokumentasi Kegiatan</h3>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div style="width: 100%; margin-top: 15px;">
                            <h5>Dokumentasi Kegiatan</h5>
                        </div>
                        <div class="row" style="padding-bottom: 4px;">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <table border="0" cellspacing="0" cellpadding="0" style="width: 100%;">
                                    <tr>
                                        <td style="width: 90%;">
                                            <input placeholder="Cari Dokumentasi" type="text" style="height: 38px; padding: 10px; width: 100%; border-bottom-right-radius: 0px; border-top-right-radius: 0px; border-bottom-left-radius: 12px; border-top-left-radius: 12px;" class="form-control" />
                                        </td>
                                        <td style="width: 10%;">
                                            <button style="height: 38px; background-color: #3b3c8c; width: 100%; padding: 5px !important; border-bottom-right-radius: 12px; border-top-right-radius: 12px; border-bottom-left-radius: 0px; border-top-left-radius: 0px;" type="button" class="btn btn-info pull-right bg-light-blue-gradient">
                                                <span>
                                                    <i class="fa fa-search"></i>
                                                </span>
                                            </button>
                                        </td>
                                    </tr>
                                </table>
                                
                            </div>
                        </div>
                        <section id="article" style="background-color: #f1f1f1; padding-bottom: 0px; padding-top: 16px; position: relative; z-index: 99;">
                            <div class="row">
                                <?php 

                                $query_dokumentasi_header = mysqli_query($connect, "SELECT * FROM `tbl_dokumentasi_header` order by timestamp desc limit 0, 30");
                                $jumlah_dokumentasi_header = mysqli_num_rows($query_dokumentasi_header);
                                if($jumlah_dokumentasi_header > 0){
                                    $limit_dokumentasi_header_row = 3;
                                    $page_video_row_ = ceil($jumlah_dokumentasi_header / $limit_dokumentasi_header_row);
                                    $rest_video_row_ = $jumlah_dokumentasi_header - (($page_video_row_ - 1) * $limit_dokumentasi_header_row);
                                    $rest_hold = 0;
                                    $data_count = 0;
                                    while($hasil_dokumentasi_header = mysqli_fetch_array($query_dokumentasi_header)){
                                        if($jumlah_dokumentasi_header - $data_count == $rest_video_row_){
                                            $rest_hold = 1;
                                        }
                                        if($limit_dokumentasi_header_row == 4){
                                            $class_ = "col-md-3 col-sm-6 ";
                                        }
                                        if($limit_dokumentasi_header_row == 3){
                                            $class_ = "col-md-4 col-sm-6 ";
                                        }
                                        if($rest_hold){
                                            if($rest_video_row_ == 4){
                                                $class_ = "col-md-3 col-sm-6 ";
                                            }
                                            if($rest_video_row_ == 3){
                                                $class_ = "col-md-4 col-sm-6 ";
                                            }
                                            if($rest_video_row_ == 2){
                                                $class_ = "col-md-6 col-sm-6 ";
                                            }
                                            if($rest_video_row_ == 1){
                                                $class_ = "col-md-12 col-sm-12 ";
                                            }
                                        }
                                        if($hasil_dokumentasi_header['photo_dokumentasi_header'] != "" && file_exists(__DIR__ . "/../upload/photo_dokumentasi_header/" . $hasil_dokumentasi_header['photo_dokumentasi_header'])){
                                            $style = ' style="height: 160px; background-position: center; background-image: url(\'upload/photo_dokumentasi_header/'.$hasil_dokumentasi_header['photo_dokumentasi_header'].'\'); background-size: cover; border-top-left-radius: 12px; border-top-right-radius: 12px;"';
                                            $img_src = '';
                                        } else {
                                            $style = '';
                                            $img_src = '<img width="100%" height="auto" src="assets/img/LOGOARTICLE.png" alt="YKKBI Dokumentasi">';
                                        }
                                        
                                        $nama_kategori = "Video";
                                        $timestamp_ = $hasil_dokumentasi_header['timestamp'];
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
                                        
                                        $tanggal_mulai = $hasil_dokumentasi_header['tanggal_mulai'];
                                        $explode_tanggal_mulai = explode(" ", $tanggal_mulai);
                                        $tanggal_mulai_ = strtotime($explode_tanggal_mulai[0]);
                                        $explode_tanggal_mulai_ = explode("-", $explode_tanggal_mulai[0]);
                                        if(sizeof($explode_tanggal_mulai_) == 3){
                                            $tanggal_active_mulai_ = $explode_tanggal_mulai_[2] . " " . get_month($explode_tanggal_mulai_[1]) . " " . $explode_tanggal_mulai_[0];
                                        }
                                        $day_tanggal_mulai_ = date('w', $tanggal_mulai_);
                                        $nama_hari_tanggal_mulai_ = get_day($day_tanggal_mulai_);
                                        $all_day_tanggal_mulai_ = $nama_hari_tanggal_mulai_ . ", " . $tanggal_active_mulai_;
                                        
                                        $tanggal_selesai = $hasil_dokumentasi_header['tanggal_selesai'];
                                        $explode_tanggal_selesai = explode(" ", $tanggal_selesai);
                                        $tanggal_selesai_ = strtotime($explode_tanggal_selesai[0]);
                                        $explode_tanggal_selesai_ = explode("-", $explode_tanggal_selesai[0]);
                                        if(sizeof($explode_tanggal_selesai_) == 3){
                                            $tanggal_active_selesai_ = $explode_tanggal_selesai_[2] . " " . get_month($explode_tanggal_selesai_[1]) . " " . $explode_tanggal_mulai_[0];
                                        }
                                        $day_tanggal_selesai_ = date('w', $tanggal_selesai_);
                                        $nama_hari_tanggal_selesai_ = get_day($day_tanggal_selesai_);
                                        $all_day_tanggal_selesai_ = $nama_hari_tanggal_selesai_ . ", " . $tanggal_active_selesai_;
                                        ?>
                                        <!--  -->
                                        <div class="<?php echo $class_; ?> col-xs-12">
                                            <a href="#">
                                                <div class="card" style="height: 435px;">
                                                    <div class="card-header" <?php echo $style; ?>>
                                                        <div class="image-wrapper" style="text-align: center;">
                                                            <?php echo $img_src; ?>
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="title-article">
                                                            <span>
                                                                Dokumentasi Kegiatan                                 
                                                            </span>
                                                        </div>
                                                        <div class="desc-article">
                                                            <span
                                                                class="d-block mb-2">
                                                                <strong style="display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical; overflow: hidden;"><?php echo $hasil_dokumentasi_header['judul_event']; ?></strong>
                                                            </span>
                                                            <span class="text-secondary small">
                                                                <?php echo "Terbit, " . $all_day; ?><br />
                                                                <?php echo "Mulai, " . $all_day_tanggal_mulai_; ?><br />
                                                                <?php echo "Selesai, " . $all_day_tanggal_selesai_; ?>
                                                            </span>
                                                            <div class="limit-text-dashboard">
                                                                <?php echo substr(strip_tags($hasil_dokumentasi_header['deskripsi_singkat']), 0, 200); ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <!--  -->
                                        <?php
                                        if(!$rest_hold){
                                            $data_count++;
                                        }
                                    }
                                }

                                ?>
                            </div>
                        </section>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>
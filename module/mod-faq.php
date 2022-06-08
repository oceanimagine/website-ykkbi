<div class="container" style="padding-right: 0px; padding-left: 0px; z-index: 0; position: relative; min-height: 80vh;">
    <div class="row" style="margin-right: 0px; margin-left: 0px;">
        <div class="col-md-12 col-sm-12 col-xs-12" style="padding-right: 0px; padding-left: 0px;">
            <div style=" width: 100%; height: 100%; background-color: #f1f1f1; padding: 0.01em 16px; border-radius: 0px; margin-left: auto; margin-right: auto; padding-top: 15px; padding-bottom: 15px; box-shadow: 0 4px 14.48px rgb(0 0 0 / 25%); z-index: 99; position: relative;">
                <div class="header_article" style="background-color: #3b3c8c; width: 100%; padding: 8px 16px; border-radius: 4px;">
                    <h3 style='color: white; margin-bottom: 2px; text-align: center;'>FAQ</h3>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div style="width: 100%; margin-top: 15px;">
                            <h5>FAQ</h5>
                        </div>
                        
                        <section id="article" style="background-color: #f1f1f1; padding-bottom: 0px; padding-top: 16px; position: relative; z-index: 99;">
                            <div class="row">
                                <?php 

                                $query_faq = mysqli_query($connect, "SELECT * FROM `tbl_faq` order by timestamp desc limit 0, 30");
                                $jumlah_faq = mysqli_num_rows($query_faq);
                                if($jumlah_faq > 0){
                                    $limit_faq_row = 1;
                                    $page_faq_row_ = ceil($jumlah_faq / $limit_faq_row);
                                    $rest_faq_row_ = $jumlah_faq - (($page_faq_row_ - 1) * $limit_faq_row);
                                    $rest_hold = 0;
                                    $data_count = 0;
                                    while($hasil_faq = mysqli_fetch_array($query_faq)){
                                        if($jumlah_faq - $data_count == $rest_faq_row_){
                                            $rest_hold = 1;
                                        }
                                        $class_ = "col-md-12 col-sm-12 ";
                                        if($limit_faq_row == 4){
                                            $class_ = "col-md-3 col-sm-6 ";
                                        }
                                        if($limit_faq_row == 3){
                                            $class_ = "col-md-4 col-sm-6 ";
                                        }
                                        if($rest_hold){
                                            if($rest_faq_row_ == 4){
                                                $class_ = "col-md-3 col-sm-6 ";
                                            }
                                            if($rest_faq_row_ == 3){
                                                $class_ = "col-md-4 col-sm-6 ";
                                            }
                                            if($rest_faq_row_ == 2){
                                                $class_ = "col-md-6 col-sm-6 ";
                                            }
                                            if($rest_faq_row_ == 1){
                                                $class_ = "col-md-12 col-sm-12 ";
                                            }
                                        }
                                        
                                        $timestamp_ = $hasil_faq['timestamp'];
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
                                        
                                        ?>
                                        <!--  -->
                                        <div class="<?php echo $class_; ?> col-xs-12">
                                            <a href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">
                                                <div class="card">
                                                    
                                                    <div class="card-body" style="min-height: 0px;">
                                                        <div class="title-article"style="width: 100%; background: #3b3c8c !important; -webkit-border-radius: 5px; padding: 0px; padding-bottom: 10px; padding-top: 10px; padding-right: 10px; padding-left: 10px;">
                                                            <span style="padding: 0px;">
                                                                <?php echo $hasil_faq['pertanyaan']; ?>                                        
                                                            </span>
                                                        </div>
                                                        <div class="desc-article" style="margin-top: 10px; padding-right: 10px; padding-left: 10px;">
                                                            <span class="d-block mb-2" style="margin-bottom: 0px !important;">
                                                                <?php echo $hasil_faq['jawaban']; ?>
                                                            </span>
                                                            <span class="text-secondary small"><?php echo $all_day; ?></span>
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
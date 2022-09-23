<div class="container" style="padding-right: 0px; padding-left: 0px; z-index: 0; position: relative; min-height: 80vh;">
    <div class="row" style="margin-right: 0px; margin-left: 0px;">
        <div class="col-md-12 col-sm-12 col-xs-12" style="padding-right: 0px; padding-left: 0px;">
            <div style=" width: 100%; height: 100%; background-color: #f1f1f1; padding: 0.01em 16px; border-radius: 0px; margin-left: auto; margin-right: auto; padding-top: 15px; padding-bottom: 15px; box-shadow: 0 4px 14.48px rgb(0 0 0 / 25%); z-index: 99; position: relative;">
                <div class="header_article" style="background-color: #3b3c8c; width: 100%; padding: 8px 16px; border-radius: 4px;">
                    <h3 style='color: white; margin-bottom: 2px; text-align: center;'>Berita Terkini</h3>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div style="width: 100%; margin-top: 15px;">
                            <h5>Berita Terkini</h5>
                        </div>
                        <div class="row" style="padding-bottom: 4px;">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <table border="0" cellspacing="0" cellpadding="0" style="width: 100%;">
                                    <tr>
                                        <td style="width: 90%;">
                                            <input placeholder="Cari Berita Terkini" type="text" style="height: 38px; padding: 10px; width: 100%; border-bottom-right-radius: 0px; border-top-right-radius: 0px; border-bottom-left-radius: 12px; border-top-left-radius: 12px;" class="form-control" />
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
                                function hyphenize($string) {
                                    return 
                                        preg_replace(
                                            array('#[\\s-]+#', '#[^A-Za-z0-9. -]+#'),
                                            array('-', ''),
                                            urldecode($string)
                                        );
                                }
                                // make request
                                $curl = curl_init();
                                curl_setopt_array($curl, array(
                                    CURLOPT_URL => 'https://newsapi.org/v2/top-headlines?country=id&apiKey=d0ead8229c9e4fdb8a8d748a860f08b3',
                                    CURLOPT_RETURNTRANSFER => true,
                                    CURLOPT_ENCODING => '',
                                    CURLOPT_MAXREDIRS => 10,
                                    CURLOPT_TIMEOUT => 0,
                                    CURLOPT_FOLLOWLOCATION => true,
                                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                    CURLOPT_CUSTOMREQUEST => 'GET',
                                    CURLOPT_HTTPHEADER => array(
                                        'User-Agent: PostmanRuntime/7.29.2'
                                    ),
                                ));

                                $response = curl_exec($curl);
                                curl_close($curl);
                                $decode_article = json_decode($response); 
                                $totalResults = sizeof($decode_article->articles);
                                if($totalResults > 0){
                                    $limit_dokumentasi_header_row = 3;
                                    $page_video_row_ = ceil($totalResults / $limit_dokumentasi_header_row);
                                    $rest_video_row_ = $totalResults - (($page_video_row_ - 1) * $limit_dokumentasi_header_row);
                                    $rest_hold = 0;
                                    $data_count = 0;
                                    for($i = 0; $i < sizeof($decode_article->articles); $i++){
                                        $hasil_article = $decode_article->articles[$i];
                                        if($totalResults - $data_count == $rest_video_row_){
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
                                        if($hasil_article->urlToImage != ""){
                                            $style = ' style="height: 160px; background-position: center; background-image: url(\''.$hasil_article->urlToImage.'\'); background-size: cover; border-top-left-radius: 12px; border-top-right-radius: 12px;"';
                                            $img_src = '';
                                        } else {
                                            $style = ' style="height: 160px; background-position: center; background-image: url(\'https://stories.freepiklabs.com/storage/26832/oops-404-error-with-a-broken-robot-rafiki-2849.png\'); background-size: cover; border-top-left-radius: 12px; border-top-right-radius: 12px;"';
                                            $img_src = '';
                                        }
                                        
                                        
                                        $nama_kategori = "Video";
                                        $timestamp_ = str_replace(array("T","Z"), array(" ",""), $hasil_article->publishedAt);
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
                                            <a href="<?php echo $hasil_article->url; ?>" target="_blank">
                                                <div class="card" style="height: 435px;">
                                                    <div class="card-header" <?php echo $style; ?>>
                                                        <div class="image-wrapper" style="text-align: center;">
                                                            <?php echo $img_src; ?>
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="title-article">
                                                            <span>
                                                                Berita Terkini                                
                                                            </span>
                                                        </div>
                                                        <div class="desc-article">
                                                            <span
                                                                class="d-block mb-2">
                                                                <strong style="display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical; overflow: hidden;"><?php echo $hasil_article->title; ?></strong>
                                                            </span>
                                                            <span class="text-secondary small">
                                                                <?php echo "Terbit, " . $all_day; ?><br />
                                                                <?php echo "Author, " . ($hasil_article->author == "" ? "No Author." : $hasil_article->author); ?>
                                                            </span>
                                                            <div class="limit-text-dashboard">
                                                                <?php echo substr(strip_tags(hyphenize($hasil_article->content == "" ? "No Content." : $hasil_article->content)), 0, 200); ?>
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
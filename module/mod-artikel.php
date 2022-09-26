<div class="container" style="padding-right: 0px; padding-left: 0px; z-index: 0; position: relative; min-height: 80vh;">
    <div class="row" style="margin-right: 0px; margin-left: 0px;">
        <div class="col-md-12 col-sm-12 col-xs-12" style="padding-right: 0px; padding-left: 0px;">
            <div style=" width: 100%; height: 100%; background-color: #f1f1f1; padding: 0.01em 16px; border-radius: 0px; margin-left: auto; margin-right: auto; padding-top: 15px; padding-bottom: 15px; box-shadow: 0 4px 14.48px rgb(0 0 0 / 25%); z-index: 99; position: relative;">
                <div class="header_article" style="background-color: #3b3c8c; width: 100%; padding: 8px 16px; border-radius: 4px;">
                    <h3 style='color: white; margin-bottom: 2px; text-align: center;'>Berita Artikel</h3>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div style="width: 100%; margin-top: 15px;">
                            <h5>Berita Artikel</h5>
                        </div>
                        <div class="row" style="padding-bottom: 4px;">
                            
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <form method="POST">
                                    <table border="0" cellspacing="0" cellpadding="0" style="width: 100%;">
                                        <tr>
                                            <td style="width: 90%;">
                                                <input placeholder="Cari Artikel" id="cari_artikel" name="cari_artikel" type="text" style="height: 38px; padding: 10px; width: 100%; border-bottom-right-radius: 0px; border-top-right-radius: 0px; border-bottom-left-radius: 12px; border-top-left-radius: 12px;" class="form-control" value="<?php echo isset($_GET['search']) ? strtolower(str_replace(array_reverse($GLOBALS['replace']),array_reverse($GLOBALS['search']), strip_tags($_GET['search']))) : ""; ?>" />
                                            </td>
                                            <td style="width: 10%;">
                                                <button style="height: 38px; background-color: #3b3c8c; width: 100%; padding: 5px !important; border-bottom-right-radius: 12px; border-top-right-radius: 12px; border-bottom-left-radius: 0px; border-top-left-radius: 0px;" type="submit" class="btn btn-info pull-right bg-light-blue-gradient">
                                                    <span>
                                                        <i class="fa fa-search"></i>
                                                    </span>
                                                </button>
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                            </div>
                        </div>
                        <section id="article" style="background-color: #f1f1f1; padding-bottom: 0px; padding-top: 16px; position: relative; z-index: 99;">
                            <div class="row">
                                <?php 
                                $where_search = "";
                                if(isset($_GET['search']) && $_GET['search'] != ""){
                                    $search = mysqli_real_escape_string($connect, $_GET['search']);
                                    $where_search = " where judul_artikel like '%" . strtolower(str_replace(array_reverse($GLOBALS['replace']),array_reverse($GLOBALS['search']), strip_tags($search))) . "%' or isi_artikel like '%" . strtolower(str_replace(array_reverse($GLOBALS['replace']),array_reverse($GLOBALS['search']), strip_tags($search))) . "%'";
                                }
                                $query_artikel = mysqli_query($connect, "SELECT * FROM `tbl_artikel` ".$where_search." order by timestamp desc limit 0, 30");
                                $jumlah_artikel = mysqli_num_rows($query_artikel);
                                if($jumlah_artikel > 0){
                                    $limit_artikel_row = 3;
                                    $page_artikel_row_ = ceil($jumlah_artikel / $limit_artikel_row);
                                    $rest_artikel_row_ = $jumlah_artikel - (($page_artikel_row_ - 1) * $limit_artikel_row);
                                    $rest_hold = 0;
                                    $data_count = 0;
                                    while($hasil_artikel = mysqli_fetch_array($query_artikel)){
                                        if($jumlah_artikel - $data_count == $rest_artikel_row_){
                                            $rest_hold = 1;
                                        }
                                        if($limit_artikel_row == 4){
                                            $class_ = "col-md-3 col-sm-6 ";
                                        }
                                        if($limit_artikel_row == 3){
                                            $class_ = "col-md-4 col-sm-6 ";
                                        }
                                        if($rest_hold){
                                            if($rest_artikel_row_ == 4){
                                                $class_ = "col-md-3 col-sm-6 ";
                                            }
                                            if($rest_artikel_row_ == 3){
                                                $class_ = "col-md-4 col-sm-6 ";
                                            }
                                            if($rest_artikel_row_ == 2){
                                                $class_ = "col-md-6 col-sm-6 ";
                                            }
                                            if($rest_artikel_row_ == 1){
                                                $class_ = "col-md-12 col-sm-12 ";
                                            }
                                        }
                                        if($hasil_artikel['photo_artikel'] != "" && file_exists(__DIR__ . "/../upload/photo_artikel/" . $hasil_artikel['photo_artikel'])){
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
                                                <div class="card" style="min-height: 400px;">
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
                                        if(!$rest_hold){
                                            $data_count++;
                                        }
                                    }
                                } else {
                                    ?>
                                    <div class="col-xs-12" style="width: 100%; padding-right: 15px; padding-left: 15px;">
                                        <img src="assets/img/NOTFOUND.png" style="width: 100%; border-radius: 12px;" />
                                    </div>
                                    <?php
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
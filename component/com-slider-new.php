<div align="center" style="width: 100%; overflow: hidden; /* box-shadow: 0 8px 10px rgb(182 182 182 / 75%); */ z-index: 2; position: relative; margin-top: 10px; background-color: #fafafa;">
    <!-- https://getbootstrap.com/docs/4.0/components/collapse/ -->
    <!-- https://colorlib.com/wp/template/accordion-02/ -->
    <!-- https://freefrontend.com/bootstrap-accordions/ -->
    <!-- https://stackoverflow.com/questions/50196517/how-to-create-a-web-page-using-100vh-to-be-responsive -->
    <table style="width: 100%; table-layout: fixed;" border="0">
        <tr>
            <td id="td_slider_a" style="vertical-align: top;">
                <?php 
                        
                get_component_slide_inside("left");

                ?>
            </td>
            <td id="td_slider_b">
                <section class="u-align-center u-clearfix u-valign-middle u-section-2" id="sec-33aa" style="height: 448px; width: 100%; min-height: 350px; /* box-shadow: -4px 0 14px 2px grey, 4px 0 14px 2px grey; */ z-index: 99;">
                    <div id="carousel-bd35" data-interval="5000" data-u-ride="carousel" class="u-carousel u-expanded-width u-slider u-slider-1" style="height: 100%;">
                        <ol class="u-absolute-hcenter u-carousel-indicators u-carousel-indicators-1" style="width: 100%; bottom: 55px; top: 68vh;">
                            <?php  
                            $query_slider = mysqli_query($connect, "SELECT * FROM `tbl_slider`");
                            $array_slider = array();
                            if(mysqli_num_rows($query_slider) > 0){
                                while($hasil_slider = mysqli_fetch_array($query_slider)){
                                    $array_slider[] = $hasil_slider;
                                }
                            }
                            $in = false;
                            $ad = 0;
                            if(sizeof($array_slider) > 0){
                                for($i = 0; $i < sizeof($array_slider); $i++){
                                    if($array_slider[$i]['photo_slider'] != "" && file_exists(__DIR__ . "/../upload/photo_slider/" . $array_slider[$i]['photo_slider'])){
                                        $active = !$in ? "u-active " : "";
                                        $in = true;
                                        ?>
                                        <li data-u-target="#carousel-bd35" class="<?php echo $active; ?>u-active-grey-25 u-shape-circle u-white" data-u-slide-to="<?php echo $ad; ?>" style="width: 10px; height: 10px;"></li>
                                        <?php
                                        $ad++;
                                    }
                                }
                            } 
                            if(!$in){
                                ?>
                                <li data-u-target="#carousel-bd35" class="u-active u-active-grey-25 u-shape-circle u-white" data-u-slide-to="0" style="width: 10px; height: 10px;"></li>
                                <?php
                            }
                            ?>
                        </ol>
                        <div class="u-carousel-inner" role="listbox">
                            <?php 
                            $ins = false;
                            if(sizeof($array_slider) > 0){
                                for($i = 0; $i < sizeof($array_slider); $i++){
                                    if($array_slider[$i]['photo_slider'] != "" && file_exists(__DIR__ . "/../upload/photo_slider/" . $array_slider[$i]['photo_slider'])){
                                        $class_ = !$ins ? "u-active u-align-center u-carousel-item u-container-style u-image u-shading u-slide" : "u-align-center u-carousel-item u-container-style u-expanded-width u-image u-shading u-slide";
                                        $ins = true;
                                        ?>
                                        <div style="background-position: 50% 50%; background-image: linear-gradient(0deg, rgba(0,0,0,0.25), rgba(0,0,0,0.25)), url('upload/photo_slider/<?php echo $array_slider[$i]['photo_slider']; ?>');" class="<?php echo $class_; ?>" data-image-width="1980" data-image-height="990">
                                            <div class="u-container-layout u-valign-middle u-container-layout-3">
                                                <div style="width: 90%;" class="u-container-style u-group u-shape-rectangle u-group-2" data-animation-name="fadeIn" data-animation-duration="1000" data-animation-delay="1000" data-animation-direction="Up">
                                                    <div class="u-container-layout u-valign-top u-container-layout-4">
                                                        <h2 class="u-align-center u-text u-text-body-alt-color u-text-3"><strong><?php echo $array_slider[$i]['judul']; ?></strong></h2>
                                                        <p style="font-family: 'Open Sans', sans-serif; font-weight: 400; line-height: 1.6; font-size: 1.125rem !important;" class="u-align-center u-text u-text-4"><?php echo $array_slider[$i]['deskripsi']; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                }
                            }
                            if(!$ins){
                                ?>
                                <div style="background-position: 50% 50%; background-image: linear-gradient(0deg, rgba(0,0,0,0.25), rgba(0,0,0,0.25)), url('assets/img/BG01.jpg');" class="u-active u-align-center u-carousel-item u-container-style u-image u-shading u-slide" data-image-width="1980" data-image-height="990">
                                    <div class="u-container-layout u-valign-middle u-container-layout-3">
                                        <div style="width: 90%;" class="u-container-style u-group u-shape-rectangle u-group-2" data-animation-name="fadeIn" data-animation-duration="1000" data-animation-delay="1000" data-animation-direction="Up">
                                            <div class="u-container-layout u-valign-top u-container-layout-4">
                                                <h2 class="u-align-center u-text u-text-body-alt-color u-text-3"><strong>Tips Sehat Selama Pandemi</strong></h2>
                                                <p style="font-family: 'Open Sans', sans-serif; font-weight: 400; line-height: 1.6; font-size: 1.125rem !important;" class="u-align-center u-text u-text-4">Memulai hari dengan olahraga pastinya sangat baik. Selain menambah semangat dan mood sepanjang hari, kamu pun bisa lebih sehat dan pastinya menambah napsu makan. Sayangnya, waktu singkat selalu bikin kamu terburu-buru untuk melakukan olahraga.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php 
                            } 
                            ?>
                        </div>
                        <a class="u-absolute-vcenter u-carousel-control u-carousel-control-prev u-spacing-12 u-text-body-alt-color u-carousel-control-1" href="#carousel-bd35" role="button" data-u-slide="prev">
                            <?php 
                            $ind = false;
                            if(sizeof($array_slider) > 0){
                                for($i = 0; $i < sizeof($array_slider); $i++){
                                    if($array_slider[$i]['photo_slider'] != "" && file_exists(__DIR__ . "/../upload/photo_slider/" . $array_slider[$i]['photo_slider'])){
                                        $attribute = !$ind ? ' aria-hidden="true"' : ' class="sr-only"';
                                        $ind = true;
                                        ?>
                                        <span <?php echo $attribute; ?>>
                                            <svg viewBox="0 0 8 8"><path d="M5.25 0l-4 4 4 4 1.5-1.5-2.5-2.5 2.5-2.5-1.5-1.5z"></path></svg>
                                        </span>
                                        <?php
                                    }
                                }
                            }
                            if(!$ind){
                                ?>
                                <span aria-hidden="true">
                                    <svg viewBox="0 0 8 8"><path d="M5.25 0l-4 4 4 4 1.5-1.5-2.5-2.5 2.5-2.5-1.5-1.5z"></path></svg>
                                </span>
                                <?php 
                            }
                            ?>
                        </a>
                        <a class="u-absolute-vcenter u-carousel-control u-carousel-control-next u-spacing-12 u-text-body-alt-color u-carousel-control-2" href="#carousel-bd35" role="button" data-u-slide="next">
                            <?php 
                            $ins_ = false;
                            if(sizeof($array_slider) > 0){
                                for($i = 0; $i < sizeof($array_slider); $i++){
                                    if($array_slider[$i]['photo_slider'] != "" && file_exists(__DIR__ . "/../upload/photo_slider/" . $array_slider[$i]['photo_slider'])){
                                        $attribute = !$ins_ ? ' aria-hidden="true"' : ' class="sr-only"';
                                        $ins_ = true;
                                        ?>
                                        <span <?php echo $attribute; ?>>
                                            <svg viewBox="0 0 8 8"><path d="M2.75 0l-1.5 1.5 2.5 2.5-2.5 2.5 1.5 1.5 4-4-4-4z"></path></svg>
                                        </span>
                                        <?php
                                    }
                                }
                            }
                            if(!$ins_){
                                ?>
                                <span aria-hidden="true">
                                    <svg viewBox="0 0 8 8"><path d="M2.75 0l-1.5 1.5 2.5 2.5-2.5 2.5 1.5 1.5 4-4-4-4z"></path></svg>
                                </span>
                                <?php 
                            }
                            ?>
                        </a>
                    </div>
                </section>
            </td>
            <td id="td_slider_c" style="vertical-align: top;">
                <?php 
                        
                get_component_slide_inside("right");

                ?>
            </td>
        </tr>
    </table>
</div>
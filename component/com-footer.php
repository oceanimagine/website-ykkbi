<footer style="position: relative; z-index: 99;">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6  col-xs-12">
                <h4>Tentang Kami</h4>
                <ul class="list-unstyled">
                    <li>
                        <a href="#">Galeri</a>
                    </li>
                    <li>
                        <a href="#" target="_blank"
                           rel="noopener">Video</a>
                    </li>
                    <li>
                        <a href="#">Kontak Kami</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-3 col-sm-6  col-xs-12">
                <h4>Alamat Kami</h4>
                <ul class="list-unstyled">
                    <li class="mb-3"><?php echo $alamat; ?></li>
                    <li>
                        <a href="tel:<?php echo str_replace(array(" ","(",")"), "", $no_telepon); ?>"><?php echo $no_telepon; ?></a>
                        <br>
                        <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
                    </li>
                </ul>
            </div>
            <div class="col-md-3 col-sm-6  col-xs-12">
                <h4>Tentang Kami</h4>
                <ul class="list-unstyled">
                    <?php 
                    for($i = 0; $i < sizeof($var_name_social_media); $i++){
                        echo ${$var_name_social_media[$i]};
                    }
                    if(sizeof($var_name_social_media) == 0){
                    ?>
                    <li>
                        <a href="#" target="_blank"
                           class="d-flex align-items-center" rel="noopener">
                            <span class="rounded-border">
                                <span class="fa fa-youtube-play"></span>
                            </span>
                            <span>No Social Media</span>
                        </a>
                    </li>
                    <?php 
                    }
                    ?>
                </ul>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12 logo_footer">
                <div class="logo-footer">
                    <table border='0' style="width: 100%;">
                        <tr>
                            <td style="width: 10%;" id="footer_td">
                                <img width="100%" height="auto" src="assets/img/LOGOYKKBI.png" alt="logo-footer" style="width: 100%;">
                            </td>
                            <td style="width: 40%;">
                                <img width="100%" height="auto" src="assets/img/LOGOWHITE.PNG" alt="logo-footer">
                            </td>
                        </tr>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
    <div class="row m-0 footer-bottom">
        <div class="col-12">
            <p class="m-0">Copyright @<?php echo date("Y"); ?> YKKBI</p>
        </div>
    </div>
</footer>
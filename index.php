<?php 

include_once __DIR__ . "/config/connect-list.php";
include_once __DIR__ . "/config/connect.php";
info_server();
session_start();
$connect = mysqli_connect($host, $user, $pass, $data);
include_once __DIR__ . "/config/connect-redaksi.php";
check_url_index_php();
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        
        <base href="<?php echo $base; ?>">
        <noscript>
            <meta http-equiv="refresh" content="4;url=javascript-testing" />
        </noscript>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description"
              content="Yayasan Kesejahteraan Karyawan Bank Indonesia.">
        <meta name="author" content="yayasan kesejahteraan karyawan bank indonesia">
        <title>Website YKKBI</title>

        <!-- Favicons-->
        <link rel="shortcut icon" href="assets/img/LOGOYKKBI.png" type="image/x-icon">
        <!-- BASE CSS -->
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/font-awesome.min.css" />
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="assets/css/owl.carousel.min.css">
        <link rel="stylesheet" type="text/css" type="text/css" href="assets/css/owl.transitions.min.css">
        <link href="assets/css/vendors.css" rel="stylesheet">
        <link href="assets/css/animate.css" rel="stylesheet">
        <link href="assets/css/menu.css" rel="stylesheet">
        <link href="assets/css/style.css?v=1635742746" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/nicepage-core.css" media="screen">
        <link rel="stylesheet" href="assets/css/nicepage-extend.css" media="screen">

        <!-- YOUR CUSTOM CSS -->
        <link href="assets/css/custom.css" rel="stylesheet">
        <link href="assets/css/custom-ykkbi.css" rel="stylesheet">

    </head>
    <body style="visibility: hidden;">
        
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/owl.carousel.min.js"></script>
        <script src="assets/js/nicepage.js"></script>
        <div id="page">
            <!--Header  -->
            <?php 
            
            include_once "component/com-header.php";
            
            ?>
            <!-- /header --><!-- Content -->
            <!-- Banner -->
            <?php 
            
            $module = isset($_GET['module']) && $_GET['module'] != "" ? $_GET['module'] : "home";
            
            if(is_module_slider($module)){
                include_once "component/com-slider-new.php";
            }
            
            ?>
            <!-- /Banner -->
            
            <?php 
            
            $panelrightleft = isset($_GET['panelrightleft']) && $_GET['panelrightleft'] != "" ? $_GET['panelrightleft'] : "false";
            if(file_exists("module/mod-" . $module . ".php")){
                if($panelrightleft == "true"){
                    include_with_panel($module);
                } 
                else if($panelrightleft == "false"){
                    include_once "module/mod-" . $module . ".php";
                }
            }
            
            if($module != "home"){
                ?>
            <style type="text/css">
                @media (max-width: 800px){
                    footer {
                        top: 6.5vh;
                    }
                }
            </style>
                <?php 
            }
            
            if($module == "home"){
                ?>
            <style type="text/css">
                @media (max-width: 1100px){
                    .article-left {
                        width: 75% !important;
                        margin-left: 25% !important;
                    }
                    .article-right {
                        width: 75% !important;
                        margin-right: 25% !important;
                    }
                }
            </style>
                <?php
            }
            
            get_home_inside_module("alert");
            ?>
            
            <!-- footer -->
            <?php 
            
            include_once "component/com-footer.php";
            
            ?>
            <!-- /footer -->

            <div id="tombol_telepon" style="width: 85px; height: 74px; position: fixed; bottom: 0; right: 0; z-index: 9999; display: none;">
                <img src="assets/img/LOGOTELEPONKANANBAWAH.png" style="width: 78px; margin-left: -4px;margin-top: -4px;">
            </div>
            <div id="tombol_telepon_b" style="width: 85px; height: 74px; position: fixed; bottom: 0; right: 0; z-index: 9999; display: none;">
                <img src="assets/img/LOGOTELEPONKANANBAWAH.png" style="width: 78px; margin-left: -4px;margin-top: -4px;">
            </div>
            
            <button onclick="topFunction()" id="buttonToTop" title="Kembali ke atas">
                <span class="fa fa-arrow-left"></span>
            </button>

        </div>
        <!-- page -->

        <div id="toTop"></div>
        <!-- Back to top button -->

        <!-- COMMON SCRIPTS -->

        <script>
            const base_url = "<?php echo $base; ?>";
        </script>
        <script src="assets/js/common_scripts.min.js"></script>
        <script src="assets/js/wow.min.js" async></script>
        <script src="assets/js/functions.js"></script>

        <!-- js untuk halaman beranda -->
        <script src="assets/js/frontend_beranda.js" async></script>

        <!-- js untuk halaman fitnes -->

        <!-- js untuk halaman jadwal dokter -->

        <!-- js untuk halaman tpkk -->

        <script src="assets/js/mycustome.js" async></script>
        <script src="assets/js/index-custom.js" async></script>   
        <?php if($module == "organisasi"){ ?>
        <script src="assets/js/index-custom-organization.js" async></script>
        <?php } ?>
        <!-- /COMMON SCRIPTS -->
        <!-- FOOTER -->
        <script src="assets/js/frontend_footer.js"></script>
        <!-- /FOOTER -->
    </body>

</html>
<script>
            $(document).ready(function (e) {
                $(".mm-title").attr("href", "#");
            });
</script>
<!DOCTYPE html>
<html lang="en">
    <head>
	
        <base href="http://localhost/project-ykkbi-website/dokumentasi/KEGIATANYOGYA2022/" />
        <title>Kegiatan YKKBI</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="data:;base64,iVBORwOKGO=" />
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700" rel="stylesheet">

        <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
        <link rel="stylesheet" href="css/animate.css">

        <link rel="stylesheet" href="css/owl.carousel.min.css">
        <link rel="stylesheet" href="css/owl.theme.default.min.css">
        <link rel="stylesheet" href="css/magnific-popup.css">

        <link rel="stylesheet" href="css/aos.css">

        <link rel="stylesheet" href="css/ionicons.min.css">

        <link rel="stylesheet" href="css/bootstrap-datepicker.css">
        <link rel="stylesheet" href="css/jquery.timepicker.css">


        <link rel="stylesheet" href="css/flaticon.css">
        <link rel="stylesheet" href="css/icomoon.css">
        <link rel="stylesheet" href="css/style.css">
        <style type="text/css">
        #colorlib-aside #colorlib-main-menu ul li {
                margin: 0 0 8px 0;	
        }
        #colorlib-aside .colorlib-footer {
                bottom: 22px;
        }
        </style>
    </head>
    <body>

        <div id="colorlib-page">
            <a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
            <aside id="colorlib-aside" role="complementary" class="js-fullheight text-center">
                <h1 id="colorlib-logo"><a href="index.php"><span class="flaticon-camera"></span>Gathering Yogya YKKBI 2022</a></h1>
                <nav id="colorlib-main-menu" role="navigation">
                    <ul>
                        <li class="colorlib-active"><a href="/project-ykkbi-website/photo-event-gathering-yogyakarta-2022-1">Photo Day 1</a></li>
			<li class="colorlib-active"><a href="/project-ykkbi-website/photo-event-gathering-yogyakarta-2022-2">Photo Day 2</a></li>
			<li class="colorlib-active"><a href="/project-ykkbi-website/photo-event-gathering-yogyakarta-2022-3">Photo Day 3</a></li>
                        <li class="colorlib-active"><a href="/project-ykkbi-website/photo-event-gathering-yogyakarta-2022-ALL">Photo Compilation</a></li>
                        <li class="colorlib-active"><a href="/project-ykkbi-website/dokumentasi-kegiatan">Back to Website</a></li>
                    </ul>
                </nav>

                <div class="colorlib-footer">
                    <h3>Check Our Social Media!</h3>
                    <div class="d-flex justify-content-center">
                        <ul class="d-flex align-items-center">
                            <li class="d-flex align-items-center jusitfy-content-center"><a href="https://www.linkedin.com/company/ykkbi/about/" target="linkedin"><i class="icon-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </aside> <!-- END COLORLIB-ASIDE -->
            <div id="colorlib-main">
                <section class="ftco-section-2">
                    <div class="photograhy">
                        <div class="row no-gutters" id="album">
                            <?php 
                            
                            $folder_default = "DAYALL";
                            
                            if(isset($_GET['day']) && $_GET['day'] != "" && is_numeric($_GET['day']) && strlen($_GET['day']) < 4){
                                $folder_default = "DAY" . $_GET['day'];
                            }
                            
                            function samakan($param1, $param2){
                                $paramA = (string) $param1;
                                $paramB = (string) $param2;
                                $result = "";
                                $selisih = strlen($paramB) - strlen($paramA);
                                for($i = 0; $i < $selisih; $i++){
                                    $result = $result . "0";
                                }
                                return $result . $paramA;
                            }
                            
                            ?>
                            <?php $dir_ = scandir($folder_default); ?>
                            <?php for($i = 2; $i < sizeof($dir_); $i++){ ?>
                            <div class="col-md-3 ftco-animate">
                                <a href="<?php echo $folder_default . "-PIXEL"; ?>/<?php echo $dir_[$i]; ?>" class="photography-entry img image-popup d-flex justify-content-center align-items-center" style="background-image: url(<?php echo $folder_default . "-PIXEL"; ?>/<?php echo $dir_[$i]; ?>);">
                                    <div class="overlay"></div>
                                    <div class="text text-center">
                                        <h3>PHOTO <?php echo samakan($i - 1, sizeof($dir_)); ?></h3>
                                        <span class="tag">PHOTO <?php echo samakan($i - 1, sizeof($dir_)); ?></span>
                                    </div>
                                </a>
                            </div>
                            <?php } ?>
                            
                        </div>
                    </div>
                </section>
                <footer class="ftco-footer ftco-bg-dark ftco-section">
                    <div class="container px-md-5">
                        <div class="row mb-5">
                            <div class="col-md">
                                <div class="ftco-footer-widget mb-4 ml-md-4">
                                    <h2 class="ftco-heading-2">Category</h2>
                                    <ul class="list-unstyled categories">
                                        <li><a href="index.php">Kegiatan YKKBI <span>(-)</span></a></li>
                                        <li><a href="index.php">Kegiatan YKKBI <span>(-)</span></a></li>
                                        <li><a href="index.php">Kegiatan YKKBI <span>(-)</span></a></li>
                                        <li><a href="index.php">Kegiatan YKKBI <span>(-)</span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="ftco-footer-widget mb-4">
                                    <h2 class="ftco-heading-2">Archives</h2>
                                    <ul class="list-unstyled categories">
                                        <li><a href="index.php">Oktober 2022 <span>(-)</span></a></li>
                                        <li><a href="index.php">Oktober 2022 <span>(-)</span></a></li>
                                        <li><a href="index.php">Oktober 2022 <span>(-)</span></a></li>
                                        <li><a href="index.php">Oktober 2022 <span>(-)</span></a></li>
                                        <li><a href="index.php">Oktober 2022 <span>(-)</span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="ftco-footer-widget mb-4">
                                    <h2 class="ftco-heading-2">Ada Pertanyaan?</h2>
                                    <div class="block-23 mb-3">
                                        <ul>
                                            <li><span class="icon icon-map-marker"></span><span class="text">Gd.YKKBI, Jl. Deposito VI No. 12-14, Komplek Bidakara, Menteng Dalam, Tebet, RT.8/RW.8, Menteng Dalam, Kec. Tebet, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12870</span></li>
                                            <li><a href="https://wa.me/628812216790?text=MauTanya."><span class="icon icon-phone"></span><span class="text">+628812216790</span></a></li>
                                            <li><a href="mailto: info@ykkbi.or.id"><span class="icon icon-envelope"></span><span class="text"><span class="__cf_email__">info@ykkbi.or.id</span></span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">

                                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                    Copyright &copy;
                                    <script data-cfasync="false" src="js/email-decode.min.js"></script>
                                    <script type="3ff56be9887df6f9631f8092-text/javascript">
                                        document.write(new Date().getFullYear());
                                    </script> 
                                    All rights reserved 
                                </p>
                            </div>
                        </div>
                    </div>
                </footer>
            </div><!-- END COLORLIB-MAIN -->
        </div><!-- END COLORLIB-PAGE -->
        <!-- loader -->
        <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


        <script src="js/jquery.min.js" type="3ff56be9887df6f9631f8092-text/javascript"></script>
        <script src="js/jquery-migrate-3.0.1.min.js" type="3ff56be9887df6f9631f8092-text/javascript"></script>
        <script src="js/popper.min.js" type="3ff56be9887df6f9631f8092-text/javascript"></script>
        <script src="js/bootstrap.min.js" type="3ff56be9887df6f9631f8092-text/javascript"></script>
        <script src="js/jquery.easing.1.3.js" type="3ff56be9887df6f9631f8092-text/javascript"></script>
        <script src="js/jquery.waypoints.min.js" type="3ff56be9887df6f9631f8092-text/javascript"></script>
        <script src="js/jquery.stellar.min.js" type="3ff56be9887df6f9631f8092-text/javascript"></script>
        <script src="js/owl.carousel.min.js" type="3ff56be9887df6f9631f8092-text/javascript"></script>
        <script src="js/jquery.magnific-popup.min.js" type="3ff56be9887df6f9631f8092-text/javascript"></script>
        <script src="js/aos.js" type="3ff56be9887df6f9631f8092-text/javascript"></script>
        <script src="js/jquery.animateNumber.min.js" type="3ff56be9887df6f9631f8092-text/javascript"></script>
        <script src="js/bootstrap-datepicker.js" type="3ff56be9887df6f9631f8092-text/javascript"></script>
        <script src="js/jquery.timepicker.min.js" type="3ff56be9887df6f9631f8092-text/javascript"></script>
        <script src="js/scrollax.min.js" type="3ff56be9887df6f9631f8092-text/javascript"></script>
        <script src="js/main.js" type="3ff56be9887df6f9631f8092-text/javascript"></script>

        

	<script src="js/rocket-loader.min.js" data-cf-settings="3ff56be9887df6f9631f8092-|49" defer=""></script>
	<script type="text/javascript">
	    
	    window.onload = function(){
		var temps = "";
		var splid = [];
		if(typeof main_main !== "undefined"){
		    main_main();
		}
		// loadDoc();
		setInterval(function(){
		    var mfp_img = document.getElementsByTagName("img");
		    for(var i = 0; i < mfp_img.length; i++){
			if(mfp_img[i].getAttribute("class") === "mfp-img"){
			    var get_src = mfp_img[i].getAttribute("src");
			    if(temps !== get_src){
				splid = get_src.split("/");
				mfp_img[i].setAttribute("src", "<?php echo $folder_default; ?>/" + splid[1] + "?count=" + Math.random().toString());
				temps = get_src;
			    }
			    break;
			}
		    }
		}, 1000);
	    };
	</script>
    
    </body>
</html>
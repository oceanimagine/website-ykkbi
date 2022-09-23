<header class="header_sticky" style="height: 10vh;padding: 0px 0px;/* overflow: hidden; */">
        <div class="container-fluid" style="height: 100%;">
            <div class="header-bottom" style="padding-top: 0px; height: 100%;">
                <!-- btn mobile -->
                <a href="#menu" class="btn_mobile" style="top: 30% !important;">
                    <div class="hamburger hamburger--spin" id="hamburger">
                        <div class="hamburger-box">
                            <div class="hamburger-inner"></div>
                        </div>
                    </div>
                </a>
                <!-- /btn_mobile-->
                <!-- http://bootstrapessentials.com/fulldocs/components/navbar/navbar-submenu/ -->
                <div class="row" style="height: 100%;">
                    <div class="col-lg-2 col-6 header-bottom-left">
                        <div id="logo_home" style="height: 100%;">
                            <table border="0" style="height: 100%;">
                                <tr>
                                    <td id="td_background_logo_menu_a">
                                        <h2 style="margin-bottom: 0px;"><a href="#" title="YKKBI" id="href_h2">YKKBI</a></h2>
                                    </td>
                                    <td id="td_background_logo_menu">
                                        <h1><a href="#" title="YKKBI" style="height: 56px;" id="href_h1">YKKBI</a></h1>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-10 col-6 header-bottom-right">
                        <nav id="menu" class="main-menu" style="top: 0px;">
                            <ul class="nav navbar-nav" style="margin-top: auto; margin-bottom: auto; white-space: nowrap;">
                                <li class="dropdown">
                                    <a href="home"
                                       class="uppercase <?php echo set_active("home"); ?>" >
                                        BERANDA
                                    </a>
                                </li>
                                <li>
                                    <a href="#"
                                       class="dropdown-toggle uppercase <?php echo set_active("profile"); ?>"
                                       data-toggle="dropdown" 
                                       role="button" 
                                       aria-haspopup="true" 
                                       aria-expanded="true">
                                        Tentang YKKBI <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-submenu" style="top: 120%; border-top: 2px solid #5c5f9c;">
                                        <li><a href="organisasi" style="border-right: 0.45px solid #fff;">Organisasi</a></li>
                                        <li><a href="sejarah" style="border-right: 0.45px solid #fff;">Sejarah</a></li>
                                        <li><a href="profile-pengurus" style="border-right: 0.45px solid #fff;">Pengurus</a></li>
                                        <li><a href="transformasi" style="border-right: 0.45px solid #fff;">Transformasi YKKBI</a></li>
                                        
                                    </ul>
                                </li>
                                <li>
                                    <a href="#"
                                       class="dropdown-toggle uppercase <?php echo set_active("tkht"); ?>"
                                       data-toggle="dropdown" 
                                       role="button" 
                                       aria-haspopup="true" 
                                       aria-expanded="true">
                                        Program YKKBI
                                    </a>
                                    <ul class="dropdown-submenu" style="top: 120%; border-top: 2px solid #5c5f9c;">
                                        <li>
                                            <a href="#" style="border-right: 0.45px solid #fff;" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">TKHT</a>
                                            <ul class="dropdown-submenu" style="top: 0; left: 100%; border-top: 0px solid #5c5f9c;">
                                                <li><a href="tkht-rawatinap" style="border-right: 0.45px solid #fff;">Rawat Inap</a></li>
                                                <li><a href="tkht-rawatjalan" style="border-right: 0.45px solid #fff;">Rawat Jalan</a></li>
                                                <li><a href="tkht-dso" style="border-right: 0.45px solid #fff;">DSO</a></li><?php /*
                                                <li><a href="tkht-provider" style="border-right: 0.45px solid #fff;">Provider</a></li> */ ?>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#" style="border-right: 0.45px solid #fff;" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">BANTUAN</a>
                                            <ul class="dropdown-submenu" style="top: 0; left: 100%; border-top: 0px solid #5c5f9c;">
                                                <li><a href="bantuan-uang-duka" style="border-right: 0.45px solid #fff;">Uang Duka</a></li>
                                                <li><a href="bantuan-bencana-alam" style="border-right: 0.45px solid #fff;">Bencana Alam</a></li>
                                                <li><a href="bantuan-pendidikan" style="border-right: 0.45px solid #fff;">Pendidikan</a></li>
                                                <li><a href="bantuan-pinjaman" style="border-right: 0.45px solid #fff;">Pinjaman</a></li>
                                            </ul>
                                        </li><?php /*
                                        <li><a href="tkht" style="border-right: 0.45px solid #fff;">Info Lainnya</a></li> */ ?>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#"
                                       class="dropdown-toggle uppercase <?php echo set_active("layanan"); ?>"
                                       data-toggle="dropdown" 
                                       role="button" 
                                       aria-haspopup="true" 
                                       aria-expanded="true">
                                        Layanan <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-submenu" style="top: 120%; border-top: 2px solid #5c5f9c;"><?php /* 
                                        <li><a href="call-center" style="border-right: 0.45px solid #fff;">Call Center</a></li>
                                        <li><a href="https://www.bi.go.id/wbsbi/add_wbs2.aspx" target="_blank" style="border-right: 0.45px solid #fff;">WBS</a></li> */ ?>
                                        <li><a href="pengaduan" style="border-right: 0.45px solid #fff;">Whistleblowing System</a></li>
                                        <li><a href="tkht-provider" style="border-right: 0.45px solid #fff;"><div style="margin-bottom: 8px;">Provider Kesehatan</div><div>Pegawai Aktif Pensiunan</div></a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#"
                                       class="dropdown-toggle uppercase <?php echo set_active("edukasi"); ?>"
                                       data-toggle="dropdown" 
                                       role="button" 
                                       aria-haspopup="true" 
                                       aria-expanded="true">
                                        Edukasi <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-submenu" style="top: 120%; border-top: 2px solid #5c5f9c;">
                                        <li><a href="berita-artikel" style="border-right: 0.45px solid #fff;">Artikel</a></li>
                                        <li><a href="berita-video" style="border-right: 0.45px solid #fff;">Video</a></li>
                                        <li><a href="https://www.google.co.id/maps/place/Yayasan+Kesejahteraan+Karyawan+Bank+Indonesia/@-6.241752,106.8399915,17z/data=!3m1!4b1!4m5!3m4!1s0x2e69f3bf5f44e4e7:0xcdece62daa1ed69a!8m2!3d-6.2417573!4d106.8421802" target="_blank" style="border-right: 0.45px solid #fff;">Infografis</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="publikasi"
                                       class="dropdown-toggle uppercase <?php echo set_active("publikasi"); ?>"
                                       data-toggle="dropdown" 
                                       role="button" 
                                       aria-haspopup="true" 
                                       aria-expanded="true">
                                        Publikasi <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-submenu" style="top: 120%; border-top: 2px solid #5c5f9c;">
                                        <?php /*
                                        <li>
                                            <a href="#" style="border-right: 0.45px solid #fff;" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">Berita Terkini</a>
                                            <ul class="dropdown-submenu" style="top: 0; left: -100%; border-top: 0px solid #5c5f9c;">
                                                <li><a href="berita-artikel" style="border-right: 0.45px solid #fff;">Artikel</a></li>
                                                <li><a href="berita-video" style="border-right: 0.45px solid #fff;">Video</a></li>
                                            </ul>
                                        </li>
                                        
                                        <li><a href="galeri" style="border-right: 0.45px solid #fff;">Galeri</a></li> */ ?>
                                        <li><a href="peraturan" style="border-right: 0.45px solid #fff;">Peraturan</a></li>
                                        <li><a href="laporan" style="border-right: 0.45px solid #fff;">Laporan Tahunan</a></li>
                                        <li><a href="dokumentasi-kegiatan" style="border-right: 0.45px solid #fff;">Dokumentasi Kegiatan</a></li><?php /*
                                        <li><a href="https://www.bi.go.id/id/karier/default.aspx" target="_blank" style="border-right: 0.45px solid #fff;">Karir</a></li> */ ?>
                                        <li><a href="berita-terkini" style="border-right: 0.45px solid #fff;">Berita Terkini</a></li>
                                        <!-- data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true" -->
                                    </ul>
                                </li> 
                                <li>
                                    <a href="faq"
                                       class="uppercase <?php echo set_active("faq"); ?>">
                                        FAQ
                                    </a>
                                </li>
                                <li>
                                    <a href="administrator/"
                                       class="uppercase">
                                        Login
                                    </a>
                                </li>
                                <?php /*
                                <li>
                                    <a href="#"
                                       class="uppercase ">
                                        TUPERUM
                                    </a>
                                </li>
                                <li>
                                    <a href="#"
                                       class="uppercase ">
                                        WARTA
                                    </a>
                                </li>
                                <li>
                                    <a href="#contact" class="uppercase">
                                        Hubungi Kami
                                    </a>
                                </li> */ ?>
                            </ul>
                        </nav>
                        <!-- /main-menu -->
                    </div>
                </div>
                <!-- /container -->
            </div>
        </div>
    </header>
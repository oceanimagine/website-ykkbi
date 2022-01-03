<header class="header_sticky" style="height: 10vh;/* overflow: hidden; */">
        <div class="container-fluid">
            <div class="header-bottom" style="padding-top: 0px;">
                <!-- btn mobile -->
                <a href="#menu" class="btn_mobile" style="top: 26px;">
                    <div class="hamburger hamburger--spin" id="hamburger">
                        <div class="hamburger-box">
                            <div class="hamburger-inner"></div>
                        </div>
                    </div>
                </a>
                <!-- /btn_mobile-->
                <!-- http://bootstrapessentials.com/fulldocs/components/navbar/navbar-submenu/ -->
                <div class="row">
                    <div class="col-lg-2 col-6 header-bottom-left">
                        <div id="logo_home">
                            <table border="0">
                                <tr>
                                    <td>
                                        <h2 style="margin-bottom: 0px;"><a href="#" title="YKKBI">YKKBI</a></h2>
                                    </td>
                                    <td>
                                        <h1><a href="#" title="YKKBI" style="height: 56px;">YKKBI</a></h1>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-10 col-6 header-bottom-right">
                        <nav id="menu" class="main-menu" style="top: 0px;">
                            <ul class="nav navbar-nav">
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
                                        <li><a href="sejarah" style="border-right: 0.45px solid #fff;">Sejarah YKKBI</a></li>
                                        <li><a href="transformasi" style="border-right: 0.45px solid #fff;">Transformasi YKKBI</a></li>
                                        <li><a href="profile" style="border-right: 0.45px solid #fff;">Info YKKBI</a></li>
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
                                            <a href="#" style="border-right: 0.45px solid #fff;">TKHT</a>
                                            <ul class="dropdown-submenu" style="top: 0; left: 100%; border-top: 0px solid #5c5f9c;">
                                                <li><a href="tkht-rawatinap" style="border-right: 0.45px solid #fff;">Rawat Inap</a></li>
                                                <li><a href="tkht-rawatjalan" style="border-right: 0.45px solid #fff;">Rawat Jalan</a></li>
                                                <li><a href="tkht-dso" style="border-right: 0.45px solid #fff;">DSO</a></li>
                                                <li><a href="tkht-provider" style="border-right: 0.45px solid #fff;">Provider</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#" style="border-right: 0.45px solid #fff;">BANTUAN</a>
                                            <ul class="dropdown-submenu" style="top: 0; left: 100%; border-top: 0px solid #5c5f9c;">
                                                <li><a href="bantuan-uang-duka" style="border-right: 0.45px solid #fff;">Uang Duka</a></li>
                                                <li><a href="bantuan-bencana-alam" style="border-right: 0.45px solid #fff;">Bencana Alam</a></li>
                                                <li><a href="bantuan-pendidikan" style="border-right: 0.45px solid #fff;">Pendidikan</a></li>
                                                <li><a href="bantuan-pinjaman" style="border-right: 0.45px solid #fff;">Pinjaman</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="tkht" style="border-right: 0.45px solid #fff;">Penjelasan TKHT</a></li>
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
                                    <ul class="dropdown-submenu" style="top: 120%; border-top: 2px solid #5c5f9c;">
                                        <li><a href="call-center" style="border-right: 0.45px solid #fff;">Call Center</a></li>
                                        <li><a href="pengaduan" style="border-right: 0.45px solid #fff;">Pengaduan</a></li>
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
                                        <li><a href="#" style="border-right: 0.45px solid #fff;">Berita Terkini</a></li>
                                        <li><a href="#" style="border-right: 0.45px solid #fff;">Dokumentasi Kegiatan</a></li>
                                        <li><a href="#" style="border-right: 0.45px solid #fff;">Peraturan</a></li>
                                        <li><a href="#" style="border-right: 0.45px solid #fff;">Laporan</a></li>
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
<style type="text/css">
    li > p {
        margin-bottom: 0px;
    }
</style>
<div style="height: 100vh; min-height: 500px; overflow: auto; background-color: #fafafa; position: fixed; width:inherit; top: 0px; overflow: hidden; /* box-shadow: -4px 0 14px 2px grey, 4px 0 14px 2px grey; */" class="panel-left-right">
    <div style="width: 100%; height: 10vh; background-color: #3b3c8c;">
        <div class="logo-footer" style="display: table-cell; vertical-align: middle; height: 10vh;" align="center">
            <table border="0" style="width: 100%; width: 80%; background-color: white; border-radius: 10.8px;">
                <tbody><tr>
                    <td style="width: 10%; padding: 5px;" id="footer_td">
                        <img width="100%" height="auto" src="assets/img/LOGOYKKBI.png" alt="logo-footer" style="width: 100%;">
                    </td>
                    <td style="width: 40%; padding: 5px;">
                        <img width="100%" height="auto" src="assets/img/LOGOWHITE.PNG" alt="logo-footer">
                    </td>
                </tr>
            </tbody></table>

        </div>
    </div>
    <?php 
    
    $default_height = isset($_GET['module']) && $_GET['module'] != "" ? "63vh" : "450px";
    if((isset($_GET['module']) && $_GET['module'] != "") && (isset($logo_mode_right) && !$logo_mode_right)){
        $default_height = "90vh";
    }
    
    ?>
    <div style="padding: 40px; background-color: #fafafa; height: <?php echo $default_height; ?>; overflow: auto; <?php if((isset($_GET['module']) && $_GET['module'] != "") && (isset($logo_mode_left) && $logo_mode_left)){} else { ?> margin-top: 10px; <?php } ?>">
        <div style="margin-bottom: 10px!important;">
            <font style="font-weight: 700; font-size: 20px; color: #f77b04!important;">DOKUMEN TERBARU</font>
        </div>
        <?php 
        $query_dokumen = mysqli_query($connect, "SELECT * FROM `tbl_dokumen_ykkbi` where status = 'publish' order by timestamp desc limit 0, 30");
        $jumlah_dokumen = mysqli_num_rows($query_dokumen);
        if($jumlah_dokumen > 0){
            while($hasil_dokumen = mysqli_fetch_array($query_dokumen)){
                $timestamp_ = $hasil_dokumen['timestamp'];
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
                $judul_besar = $hasil_dokumen['judul_besar'];
                $judul_kecil = $hasil_dokumen['judul_kecil'];
                ?>
                <!-- 01 -->
                <div style="padding: 10px; border-radius: 10px; margin-bottom: 0; border-bottom: 1px solid #eee;">
                    <div style="color: #f77b04!important; font-family: poppins; color: #f77b04 !important;">
                        <b><?php echo $judul_besar; ?></b>
                    </div>
                    <div style="margin: 5px 0; margin-top: 10px!important; font-size: 14px; font-weight: 700;margin: 3px 0;">
                        <a href="dokumen-detail-<?php echo $hasil_dokumen['id']; ?>" style="font-size: 14px; color: #08294c;"><?php echo $judul_kecil; ?></a>
                    </div>
                    <span style="color: #737373; font-weight: 700; margin-top: 0!important; font-size: .8em; font-weight: 700;"><?php echo $all_day; ?></span>
                </div>
                <?php
            }
        }
        ?>
        
        <?php /*
        <!-- 02 -->
        <div style="padding: 10px; border-radius: 10px; margin-bottom: 0; border-bottom: 1px solid #eee;">
            <div style="color: #f77b04!important; font-family: poppins; color: #f77b04 !important;">
                <b>P3B</b>
            </div>
            <div style="margin: 5px 0; margin-top: 10px!important; font-size: 14px; font-weight: 700;margin: 3px 0;">
                <a href="#" style="font-size: 14px; color: #08294c;">Perjanjian Penghindaran Pajak Berganda: United Arab Emirates</a>
            </div>
            <span style="color: #737373; font-weight: 700; margin-top: 0!important; font-size: .8em; font-weight: 700;">1 Juni 2022</span>
        </div>
        
        <!-- 03 -->
        <div style="padding: 10px; border-radius: 10px; margin-bottom: 0; border-bottom: 1px solid #eee;">
            <div style="color: #f77b04!important; font-family: poppins; color: #f77b04 !important;">
                <b>PUTUSAN PENGADILAN PAJAK</b>
            </div>
            <div style="margin: 5px 0; margin-top: 10px!important; font-size: 14px; font-weight: 700;margin: 3px 0;">
                <a href="#" style="font-size: 14px; color: #08294c;">Putusan Pengadilan Pajak PUT-003674.99/2020/PP/M.XB Tahun 2021</a>
            </div>
            <span style="color: #737373; font-weight: 700; margin-top: 0!important; font-size: .8em; font-weight: 700;">1 Juni 2022</span>
        </div>
        
        <!-- 04 -->
        <div style="padding: 10px; border-radius: 10px; margin-bottom: 0; border-bottom: 1px solid #eee;">
            <div style="color: #f77b04!important; font-family: poppins; color: #f77b04 !important;">
                <b>PUTUSAN MAHKAMAH AGUNG</b>
            </div>
            <div style="margin: 5px 0; margin-top: 10px!important; font-size: 14px; font-weight: 700;margin: 3px 0;">
                <a href="#" style="font-size: 14px; color: #08294c;">Putusan Mahkamah Agung 1690/B/PK/PJK/2017</a>
            </div>
            <span style="color: #737373; font-weight: 700; margin-top: 0!important; font-size: .8em; font-weight: 700;">1 Juni 2022</span>
        </div>
        
        <!-- 05 -->
        <div style="padding: 10px; border-radius: 10px; margin-bottom: 0; border-bottom: 1px solid #eee;">
            <div style="color: #f77b04!important; font-family: poppins; color: #f77b04 !important;">
                <b>GLOSARIUM</b>
            </div>
            <div style="margin: 5px 0; margin-top: 10px!important; font-size: 14px; font-weight: 700;margin: 3px 0;">
                <a href="#" style="font-size: 14px; color: #08294c;">Laporan Realisasi Impor dan Perolehan</a>
            </div>
            <span style="color: #737373; font-weight: 700; margin-top: 0!important; font-size: .8em; font-weight: 700;">1 Juni 2022</span>
        </div>
        
        <!-- 06 -->
        <div style="padding: 10px; border-radius: 10px; margin-bottom: 0; border-bottom: 1px solid #eee;">
            <div style="color: #f77b04!important; font-family: poppins; color: #f77b04 !important;">
                <b>REKAP ATURAN</b>
            </div>
            <div style="margin: 5px 0; margin-top: 10px!important; font-size: 14px; font-weight: 700;margin: 3px 0;">
                <a href="#" style="font-size: 14px; color: #08294c;">Rekap Aturan Pajak atas Kawasan Perdagangan Bebas</a>
            </div>
            <span style="color: #737373; font-weight: 700; margin-top: 0!important; font-size: .8em; font-weight: 700;">1 Juni 2022</span>
        </div>
        
        <!-- 07 -->
        <div style="padding: 10px; border-radius: 10px; margin-bottom: 0; border-bottom: 1px solid #eee;">
            <div style="color: #f77b04!important; font-family: poppins; color: #f77b04 !important;">
                <b>DOWNLOAD FORMULIR</b>
            </div>
            <div style="margin: 5px 0; margin-top: 10px!important; font-size: 14px; font-weight: 700;margin: 3px 0;">
                <a href="#" style="font-size: 14px; color: #08294c;">Formulir Permohonan Surat Keterangan PP 23 Tahun 2018</a>
            </div>
            <span style="color: #737373; font-weight: 700; margin-top: 0!important; font-size: .8em; font-weight: 700;">1 Juni 2022</span>
        </div>
        
        <!-- 08 -->
        <div style="padding: 10px; border-radius: 10px; margin-bottom: 0; border-bottom: 1px solid #eee;">
            <div style="color: #f77b04!important; font-family: poppins; color: #f77b04 !important;">
                <b>BUKU PAJAK</b>
            </div>
            <div style="margin: 5px 0; margin-top: 10px!important; font-size: 14px; font-weight: 700;margin: 3px 0;">
                <a href="#" style="font-size: 14px; color: #08294c;">Basic Guidelines of Tax Procedures</a>
            </div>
            <span style="color: #737373; font-weight: 700; margin-top: 0!important; font-size: .8em; font-weight: 700;">1 Juni 2022</span>
        </div>
        
        <!-- 09 -->
        <div style="padding: 10px; border-radius: 10px; margin-bottom: 0; border-bottom: 1px solid #eee;">
            <div style="color: #f77b04!important; font-family: poppins; color: #f77b04 !important;">
                <b>ILUSTRASI KASUS</b>
            </div>
            <div style="margin: 5px 0; margin-top: 10px!important; font-size: 14px; font-weight: 700;margin: 3px 0;">
                <a href="#" style="font-size: 14px; color: #08294c;">Ilustrasi Kasus Perhitungan Pajak Bumi dan Bangunan (PBB)</a>
            </div>
            <span style="color: #737373; font-weight: 700; margin-top: 0!important; font-size: .8em; font-weight: 700;">1 Juni 2022</span>
        </div>
        
        <!-- 10 -->
        <div style="padding: 10px; border-radius: 10px; margin-bottom: 0; border-bottom: 1px solid #eee;">
            <div style="color: #f77b04!important; font-family: poppins; color: #f77b04 !important;">
                <b>UU PERPAPAJAKAN KONSOLIDASI</b>
            </div>
            <div style="margin: 5px 0; margin-top: 10px!important; font-size: 14px; font-weight: 700;margin: 3px 0;">
                <a href="#" style="font-size: 14px; color: #08294c;">UU Penagihan Pajak dengan Surat Paksa (PPSP) Konsolidasi</a>
            </div>
            <span style="color: #737373; font-weight: 700; margin-top: 0!important; font-size: .8em; font-weight: 700;">1 Juni 2022</span>
        </div>
        */ ?>
    </div><?php if((isset($_GET['module']) && $_GET['module'] != "") && (isset($logo_mode_right) && $logo_mode_right)){ ?>
    <div style="width: 100%;">
        <div class="logo-footer" style="vertical-align: middle; width:  100%;" align="center">
            <table border="0" style="width: 100%;width: 100%; border-radius: 10.8px;">
                <tbody><tr>
                    <td style="width: 10%;padding: 0px;text-align: center;background-color: white;" id="footer_td">
                        <img height="auto" src="assets/img/LOGOYKKBI.png" alt="logo-footer" style="height: 27vh;">
                    </td>
                </tr>
            </tbody></table>

        </div>
    </div><?php } ?>
</div>
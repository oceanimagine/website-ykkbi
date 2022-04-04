<style type="text/css">
    li > p {
        margin-bottom: 0px;
    }
</style>
<div style="height: 100vh; min-height: 500px; overflow: auto; background-color: #f1f1f1; position: fixed; width:inherit; top: 0px;  box-shadow: -4px 0 14px 2px grey, 4px 0 14px 2px grey;" class="panel-left-right">
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
    <div style="padding: 40px; background-color: #fafafa; height: <?php echo $default_height; ?>; overflow: auto;">
        <div style="margin-bottom: 10px!important;">
            <font style="font-weight: 700; font-size: 20px; color: #f77b04!important;">DOKUMEN TERBARU</font>
        </div>
        
        <!-- 01 -->
        <div style="padding: 10px; border-radius: 10px; margin-bottom: 0; border-bottom: 1px solid #eee;">
            <div style="color: #f77b04!important; font-family: poppins; color: #f77b04 !important;">
                <b>PERATURAN PAJAK</b>
            </div>
            <div style="margin: 5px 0; margin-top: 10px!important; font-size: 14px; font-weight: 700;margin: 3px 0;">
                <a href="#" style="font-size: 14px; color: #08294c;">Instruksi Presiden 1 TAHUN 2022</a>
            </div>
            <span style="color: #737373; font-weight: 700; margin-top: 0!important; font-size: .8em; font-weight: 700;">1 Juni 2022</span>
        </div>
        
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
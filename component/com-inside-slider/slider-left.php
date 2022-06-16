<style type="text/css">
    span > p {
        margin-bottom: 0px;
        font-size: .8em !important;
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
    
    $default_height = isset($_GET['module']) && $_GET['module'] != "" ? "63vh" : "90vh";
    if((isset($_GET['module']) && $_GET['module'] != "") && (isset($logo_mode_right) && !$logo_mode_right)){
        $default_height = "90vh";
    }
    
    ?>
    <div style="padding: 40px; background-color: #fafafa; height: <?php echo $default_height; ?>; overflow: auto; <?php if((isset($_GET['module']) && $_GET['module'] != "") && (isset($logo_mode_left) && $logo_mode_left)){} else { ?> margin-top: 10px; <?php } ?>">
        <div style="margin-bottom: 10px!important;">
            <font style="font-weight: 700; font-size: 20px; color: #f77b04!important;">Call Center</font>
        </div>
        <?php 
        $query_call_center = mysqli_query($connect, "SELECT * FROM `tbl_call_center`");
        $jumlah_call_center = mysqli_num_rows($query_call_center);
        if($jumlah_call_center > 0){
            while($hasil_call_center = mysqli_fetch_array($query_call_center)){
                $timestamp_ = $hasil_call_center['timestamp'];
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
                $judul_besar = $hasil_call_center['judul_call_center'];
                $judul_kecil = $hasil_call_center['nomor_call_center'];
                ?>
                <!-- 01 -->
                <div style="padding: 10px; border-radius: 10px; margin-bottom: 0; border-bottom: 1px solid #eee;">
                    <div style="color: #f77b04!important; font-family: poppins; color: #f77b04 !important;">
                        <img width="25px" height="auto" src="assets/img/PHONEICON.png" alt="icon-map" style="width: 20px !important;margin-bottom: 2.5px;">&nbsp;<b><?php echo $judul_besar; ?></b>
                    </div>
                    <div style="margin: 5px 0; margin-top: 10px!important; font-size: 14px; font-weight: 700;margin: 3px 0;">
                        <a href="tel:<?php echo $judul_kecil; ?>" style="font-size: 14px; color: #08294c;"><?php echo $judul_kecil; ?></a>
                    </div>
                    <div style="/* margin-bottom: 4px; */">
                        <span style="color: #737373; font-weight: 700; margin-top: 0!important; font-weight: 700;">
                            <?php echo $hasil_call_center['keterangan']; ?>
                        </span>
                    </div><?php /*
                    <span style="color: #737373; font-weight: 700; margin-top: 0!important; font-size: .8em; font-weight: 700;"><?php echo $all_day; ?></span> */ ?>
                </div>
                <?php
            }
        }
        ?>
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
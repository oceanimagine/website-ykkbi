<?php

if(!isset($_SERVER)){
    echo "<title>Something Wrong</title>\n";
    echo "<style type='text/css'>html, body { font-family: consolas, monospace; }</style>";
    echo "Maybe There is Something Wrong With Your PHP Instalation.\n";
    exit();
}

$module_using_slider = array(
    "home"
);

if(!isset($list_server[$_SERVER['SERVER_NAME']])){
    echo "<title>Something Wrong</title>\n";
    echo "<style type='text/css'>html, body { font-family: consolas, monospace; }</style>";
    echo "Your Connection Host is not Exists.\n";
    exit();
}

$host = $list_server[$_SERVER['SERVER_NAME']]['host'];
$user = $list_server[$_SERVER['SERVER_NAME']]['user'];
$pass = $list_server[$_SERVER['SERVER_NAME']]['pass'];
$data = $list_server[$_SERVER['SERVER_NAME']]['data'];
$base = $list_server[$_SERVER['SERVER_NAME']]['base'];
$get_info_server = false;
$GLOBALS['base_administrator'] = $base . "administrator/";
$GLOBALS['host'] = $host;
$GLOBALS['user'] = $user;
$GLOBALS['pass'] = $pass;
$GLOBALS['data'] = $data;
$GLOBALS['tinymce_base'] = $GLOBALS['base_administrator'] . "application/layout/lite/js/tinymce/js/tinymce/plugins/jbimages/images";
$logo_mode_right = false;
$logo_mode_left  = true;

/* Code for Relative Path for Tinymce */
$key_post = array_keys($_POST);
for($i = 0; $i < sizeof($key_post); $i++){
    if(substr($key_post[$i], 0, strlen("isi_")) == "isi_" || substr($key_post[$i], 0, strlen("deskripsi_")) == "deskripsi_" || $key_post[$i] == "jawaban"){
        $address_string = 0;
        $hasil_string = "";
        while(isset($_POST[$key_post[$i]]{$address_string})){
            if(substr($_POST[$key_post[$i]], $address_string, strlen($GLOBALS['tinymce_base'])) == $GLOBALS['tinymce_base']){
                $hasil_string = $hasil_string . "{{RELATIVE_PATH}}";
                $address_string = $address_string + strlen($GLOBALS['base_administrator']);
            }
            $hasil_string = $hasil_string . $_POST[$key_post[$i]]{$address_string};
            $address_string++;
        }
        $_POST[$key_post[$i]] = $hasil_string;
    }
}

/* Additional Function */
function check_url_index_php(){
    $request_uri = is_array($_SERVER) && isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : "";
    $address = 0;
    while(isset($request_uri[$address])){
        if(substr($request_uri, $address, strlen("index.php")) == "index.php"){
            header("location: home");
            exit();
        }
        $address++;
    }
}

function is_module_slider($module){
    global $module_using_slider;
    for($i = 0; $i < sizeof($module_using_slider); $i++){
        if($module == $module_using_slider[$i]){
            return true;
        }
    }
    return false;
}

function set_active($module){
    $module_ = isset($_GET['module']) && $_GET['module'] != "" ? $_GET['module'] : "home";
    if(substr($module_, 0, strlen($module)) == $module){
        return " active";
    }
    return "";
}

function samakan($paramA, $paramB){
    $param1 = (string) $paramA;
    $param2 = (string) $paramB;
    $result = "";
    $selisih = strlen($param2) - strlen($param1);
    for($i = 0; $i < $selisih; $i++){
        $result = $result . "0";
    }
    return $result . $paramA;
}

function include_with_panel($module){
    global $connect;
    global $var_name;
    for($i = 0; $i < sizeof($var_name); $i++){
        global ${$var_name[$i]};
    }
    global $var_name;
    for($i = 0; $i < sizeof($var_name); $i++){
        global ${$var_name[$i]};
    }
    global $var_name_social_media;
    for($i = 0; $i < sizeof($var_name_social_media); $i++){
        global ${$var_name_social_media[$i]};
    }
    global $judul_sejarah;
    global $isi_sejarah;
    $judul_sejarah = $judul_sejarah;
    $isi_sejarah = $isi_sejarah;
    global $judul_transformasi;
    global $isi_transformasi;
    $judul_transformasi = $judul_transformasi;
    $isi_transformasi = $isi_transformasi;
    global $judul_peraturan;
    global $judul_laporan;
    global $google_drive_pdf;
    $judul_peraturan = $judul_peraturan;
    $judul_laporan = $judul_laporan;
    $google_drive_pdf = $google_drive_pdf;
    global $judul_tentang_pengurus;
    global $isi_tentang_pengurus;
    $judul_tentang_pengurus = $judul_tentang_pengurus;
    $isi_tentang_pengurus = $isi_tentang_pengurus;
    global $judul_besar;
    global $judul_kecil;
    $judul_besar = $judul_besar;
    $judul_kecil = $judul_kecil;
    global $judul_artikel;
    global $isi_artikel;
    global $photo_artikel;
    $judul_artikel = $judul_artikel;
    $isi_artikel = $isi_artikel;
    $photo_artikel = $photo_artikel;
    global $judul_video;
    global $deskripsi_singkat;
    global $photo_video;
    global $id_link_youtube;
    $judul_video = $judul_video;
    $deskripsi_singkat = $deskripsi_singkat;
    $photo_video = $photo_video;
    $id_link_youtube = $id_link_youtube;
    global $array_var_name_tkht_lainnya;
    for($i = 0; $i < sizeof($array_var_name_tkht_lainnya); $i++){
        $explode_dash = explode(" -- ", $array_var_name_tkht_lainnya[$i]);
        global ${$explode_dash[0]};
        global ${$explode_dash[1]};
        ${$explode_dash[0]} = ${$explode_dash[0]};
        ${$explode_dash[1]} = ${$explode_dash[1]};
    }
    global $array_var_name_tkht_bantuan;
    for($i = 0; $i < sizeof($array_var_name_tkht_bantuan); $i++){
        $explode_dash = explode(" -- ", $array_var_name_tkht_bantuan[$i]);
        global ${$explode_dash[0]};
        global ${$explode_dash[1]};
        ${$explode_dash[0]} = ${$explode_dash[0]};
        ${$explode_dash[1]} = ${$explode_dash[1]};
    }
    
    $connect = $connect;
    $isi_panel = "";
    $isi_body = "";
    if(file_exists(__DIR__ . "/../component/com-inside-slider/slider-wrapper-right-left.php")){
        ob_start();
        include_once __DIR__ . "/../component/com-inside-slider/slider-wrapper-right-left.php";
        $isi_panel = ob_get_clean();
    }
    if(file_exists(__DIR__ . "/../module/mod-" . $module . ".php")){
        ob_start();
        include_once __DIR__ . "/../module/mod-" . $module . ".php";
        $isi_body = ob_get_clean();
    }
    echo "
    <style type='text/css'>
    @media (min-width: 1200px) {
        .container {
            max-width: 100%;
        }
    }
    .container {
        max-width: 100%;
    }
    </style>
    ";
    echo str_replace("<!-- CONTENT INSIDE -->", $isi_body, $isi_panel);
}

function info_server(){
    global $get_info_server;
    if($get_info_server){
        echo "<title>Info Server</title>\n";
        echo "<pre>\n";
        print_r($_SERVER);
        echo "</pre>\n";
        exit();
    }
}

/* Component Inside Module */
function get_menu_inside_module($module){
    global $connect;
    global $var_name;
    for($i = 0; $i < sizeof($var_name); $i++){
        global ${$var_name[$i]};
    }
    global $var_name_social_media;
    for($i = 0; $i < sizeof($var_name_social_media); $i++){
        global ${$var_name_social_media[$i]};
    }
    global $judul_sejarah;
    global $isi_sejarah;
    $judul_sejarah = $judul_sejarah;
    $isi_sejarah = $isi_sejarah;
    global $judul_transformasi;
    global $isi_transformasi;
    $judul_transformasi = $judul_transformasi;
    $isi_transformasi = $isi_transformasi;
    global $array_var_name_tkht_lainnya;
    for($i = 0; $i < sizeof($array_var_name_tkht_lainnya); $i++){
        $explode_dash = explode(" -- ", $array_var_name_tkht_lainnya[$i]);
        global ${$explode_dash[0]};
        global ${$explode_dash[1]};
        ${$explode_dash[0]} = ${$explode_dash[0]};
        ${$explode_dash[1]} = ${$explode_dash[1]};
    }
    global $array_var_name_tkht_bantuan;
    for($i = 0; $i < sizeof($array_var_name_tkht_bantuan); $i++){
        $explode_dash = explode(" -- ", $array_var_name_tkht_bantuan[$i]);
        global ${$explode_dash[0]};
        global ${$explode_dash[1]};
        ${$explode_dash[0]} = ${$explode_dash[0]};
        ${$explode_dash[1]} = ${$explode_dash[1]};
    }
    $connect = $connect;
    if(file_exists(__DIR__ . "/../module/com-menu/menu-" . $module . ".php")){
        include_once __DIR__ . "/../module/com-menu/menu-" . $module . ".php";
    }
}

function get_tkht_inside_module($module){
    global $connect;
    global $var_name;
    for($i = 0; $i < sizeof($var_name); $i++){
        global ${$var_name[$i]};
    }
    global $var_name_social_media;
    for($i = 0; $i < sizeof($var_name_social_media); $i++){
        global ${$var_name_social_media[$i]};
    }
    global $judul_sejarah;
    global $isi_sejarah;
    $judul_sejarah = $judul_sejarah;
    $isi_sejarah = $isi_sejarah;
    global $judul_transformasi;
    global $isi_transformasi;
    $judul_transformasi = $judul_transformasi;
    $isi_transformasi = $isi_transformasi;
    global $array_var_name_tkht_lainnya;
    for($i = 0; $i < sizeof($array_var_name_tkht_lainnya); $i++){
        $explode_dash = explode(" -- ", $array_var_name_tkht_lainnya[$i]);
        global ${$explode_dash[0]};
        global ${$explode_dash[1]};
        ${$explode_dash[0]} = ${$explode_dash[0]};
        ${$explode_dash[1]} = ${$explode_dash[1]};
    }
    global $array_var_name_tkht_bantuan;
    for($i = 0; $i < sizeof($array_var_name_tkht_bantuan); $i++){
        $explode_dash = explode(" -- ", $array_var_name_tkht_bantuan[$i]);
        global ${$explode_dash[0]};
        global ${$explode_dash[1]};
        ${$explode_dash[0]} = ${$explode_dash[0]};
        ${$explode_dash[1]} = ${$explode_dash[1]};
    }
    $connect = $connect;
    if(file_exists(__DIR__ . "/../module/com-tkht/tkht-" . $module . ".php")){
        include_once __DIR__ . "/../module/com-tkht/tkht-" . $module . ".php";
    }
}

function get_home_inside_module($module){
    global $connect;
    global $var_name;
    for($i = 0; $i < sizeof($var_name); $i++){
        global ${$var_name[$i]};
    }
    global $var_name_social_media;
    for($i = 0; $i < sizeof($var_name_social_media); $i++){
        global ${$var_name_social_media[$i]};
    }
    global $judul_sejarah;
    global $isi_sejarah;
    $judul_sejarah = $judul_sejarah;
    $isi_sejarah = $isi_sejarah;
    global $judul_transformasi;
    global $isi_transformasi;
    $judul_transformasi = $judul_transformasi;
    $isi_transformasi = $isi_transformasi;
    global $array_var_name_tkht_lainnya;
    for($i = 0; $i < sizeof($array_var_name_tkht_lainnya); $i++){
        $explode_dash = explode(" -- ", $array_var_name_tkht_lainnya[$i]);
        global ${$explode_dash[0]};
        global ${$explode_dash[1]};
        ${$explode_dash[0]} = ${$explode_dash[0]};
        ${$explode_dash[1]} = ${$explode_dash[1]};
    }
    global $array_var_name_tkht_bantuan;
    for($i = 0; $i < sizeof($array_var_name_tkht_bantuan); $i++){
        $explode_dash = explode(" -- ", $array_var_name_tkht_bantuan[$i]);
        global ${$explode_dash[0]};
        global ${$explode_dash[1]};
        ${$explode_dash[0]} = ${$explode_dash[0]};
        ${$explode_dash[1]} = ${$explode_dash[1]};
    }
    $connect = $connect;
    if(file_exists(__DIR__ . "/../module/com-home/home-" . $module . ".php")){
        include_once __DIR__ . "/../module/com-home/home-" . $module . ".php";
    }
}

/* Component Inside */
function get_component_slide_inside($module){
    global $connect;
    global $var_name;
    global $logo_mode_right;
    global $logo_mode_left;
    for($i = 0; $i < sizeof($var_name); $i++){
        global ${$var_name[$i]};
    }
    global $var_name_social_media;
    for($i = 0; $i < sizeof($var_name_social_media); $i++){
        global ${$var_name_social_media[$i]};
    }
    global $judul_sejarah;
    global $isi_sejarah;
    $judul_sejarah = $judul_sejarah;
    $isi_sejarah = $isi_sejarah;
    global $judul_transformasi;
    global $isi_transformasi;
    $judul_transformasi = $judul_transformasi;
    $isi_transformasi = $isi_transformasi;
    global $array_var_name_tkht_lainnya;
    for($i = 0; $i < sizeof($array_var_name_tkht_lainnya); $i++){
        $explode_dash = explode(" -- ", $array_var_name_tkht_lainnya[$i]);
        global ${$explode_dash[0]};
        global ${$explode_dash[1]};
        ${$explode_dash[0]} = ${$explode_dash[0]};
        ${$explode_dash[1]} = ${$explode_dash[1]};
    }
    global $array_var_name_tkht_bantuan;
    for($i = 0; $i < sizeof($array_var_name_tkht_bantuan); $i++){
        $explode_dash = explode(" -- ", $array_var_name_tkht_bantuan[$i]);
        global ${$explode_dash[0]};
        global ${$explode_dash[1]};
        ${$explode_dash[0]} = ${$explode_dash[0]};
        ${$explode_dash[1]} = ${$explode_dash[1]};
    }
    $connect = $connect;
    $logo_mode_right = $logo_mode_right;
    $logo_mode_left  = $logo_mode_left;
    if(file_exists(__DIR__ . "/../component/com-inside-slider/slider-" . $module . ".php")){
        include_once __DIR__ . "/../component/com-inside-slider/slider-" . $module . ".php";
    }
}

function get_day($address){
    $array_day = array(
        "0" => "Minggu",
        "1" => "Senin",
        "2" => "Selasa",
        "3" => "Rabu",
        "4" => "Kamis",
        "5" => "Jumat",
        "6" => "Sabtu",
    );
    return $array_day[$address];
}

function get_month($address){
    $array_month = array(
        "01" => "Januari",
        "02" => "Februari",
        "03" => "Maret",
        "04" => "April",
        "05" => "Mei",
        "06" => "Juni",
        "07" => "Juli",
        "08" => "Agustus",
        "09" => "September",
        "10" => "Oktober",
        "11" => "November",
        "12" => "Desember"
    );
    return $array_month[$address];
}

# https://stackoverflow.com/questions/2742813/how-to-validate-youtube-video-ids
# https://stackoverflow.com/questions/4521514/htaccess-rewrite-only-if-first-part-of-path-is-numeric
function validIdYoutube($id) {
    return preg_match('/^[a-zA-Z0-9_-]{11}$/', $id) > 0;
}
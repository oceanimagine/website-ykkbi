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

function include_with_panel($module){
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
    if(file_exists(__DIR__ . "/../module/com-menu/menu-" . $module . ".php")){
        include_once __DIR__ . "/../module/com-menu/menu-" . $module . ".php";
    }
}

function get_tkht_inside_module($module){
    if(file_exists(__DIR__ . "/../module/com-tkht/tkht-" . $module . ".php")){
        include_once __DIR__ . "/../module/com-tkht/tkht-" . $module . ".php";
    }
}

function get_home_inside_module($module){
    if(file_exists(__DIR__ . "/../module/com-home/home-" . $module . ".php")){
        include_once __DIR__ . "/../module/com-home/home-" . $module . ".php";
    }
}

/* Component Inside */
function get_component_slide_inside($module){
    if(file_exists(__DIR__ . "/../component/com-inside-slider/slider-" . $module . ".php")){
        include_once __DIR__ . "/../component/com-inside-slider/slider-" . $module . ".php";
    }
}
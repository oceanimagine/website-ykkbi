<?php

include_once __DIR__ . "/config/connect-list.php";
include_once __DIR__ . "/config/connect.php";

header('Content-Type: application/json');

$connect = mysqli_connect($host, $user, $pass, $data);
$module = isset($_GET['module']) && $_GET['module'] != "" ? $_GET['module'] : "";
$hasil = array("message" => "nomodule");

if($module != ""){
    if($module == "login"){
        $username = mysqli_real_escape_string($connect, isset($_POST['username']) ? $_POST['username'] : "");
        $password = mysqli_real_escape_string($connect, isset($_POST['password']) ? $_POST['password'] : "");
        if($username != "" && $password != ""){
            $check_login = mysqli_query($connect, "select id, nama_lengkap, photo_user_admin, nomor_karyawan, username from tbl_user_admin where username = '".$username."' and password = '".md5($password)."'");
            if(mysqli_num_rows($check_login) > 0){
                
                $hasil_login = mysqli_fetch_array($check_login,MYSQLI_ASSOC);
                $token = bin2hex(openssl_random_pseudo_bytes(8));
                mysqli_query($connect, "update tbl_user_admin set token = '".$token."' where id = '".$hasil_login['id']."'");
                $hasil['message'] = "success-login";
                $hasil['data'] = $hasil_login;
                $hasil['token'] = $token;
            } else {
                $hasil['message'] = "failed-login";
            }
        }
    }
    if($module == "contact"){

        $headers = getallheaders();
        $token_get = "";
        foreach ($headers as $header => $value) {
            if($header == "Authorization"){
                $explode_value = explode(" ", $value);
                if($explode_value[0] == "Bearer"){
                    $token_get = $explode_value[1];
                }
            }
        }
        if($token_get != ""){
            $check_login = mysqli_query($connect, "select id from tbl_user_admin where token = '".$token_get."'");
            if(mysqli_num_rows($check_login) > 0){
                $hasil['message'] = "success-get-data-contact";
                $data_contact = array();
                $query_contact = mysqli_query($connect, "select judul_call_center, nomor_call_center from tbl_call_center");
                if(mysqli_num_rows($query_contact) > 0){
                    while($hasil_contact = mysqli_fetch_array($query_contact,MYSQLI_ASSOC)){
                        $data_contact[] = $hasil_contact;
                    }
                }
                $hasil['data'] = $data_contact;
            }
        }
    }
}

echo json_encode($hasil);
<?php
session_start();
include_once __DIR__ . "/../config/connect-list.php";
include_once __DIR__ . "/../config/connect.php";
$connect = mysqli_connect($host, $user, $pass, $data);

header('Content-Type: application/json; charset=utf-8');

if(isset($_POST['name']) && $_POST['name'] != "" && ($_POST['email'] != "" && $_POST['message'] != "")){
    $hasil = array("return" => "noparam");
    $name = mysqli_real_escape_string($connect, $_POST['name']);
    $email = mysqli_real_escape_string($connect, $_POST['email']);
    $message = mysqli_real_escape_string($connect, $_POST['message']);
    $kodeCaptchaContactUs = mysqli_real_escape_string($connect, $_POST['kodeCaptchaContactUs']);
    $captchaContactUs = mysqli_real_escape_string($connect, $_POST['captchaContactUs']);
    
    if(isset($_SESSION["Captcha"]) && $_SESSION["Captcha"] == $captchaContactUs){
        mysqli_query($connect, "
            insert into tbl_hubungi_kami set 
                nama_lengkap_pengirim = '".$name."',
                email_pengirim = '".$email."',
                isi_pesan_pengirim = '".$message."'
        ");
        if(mysqli_affected_rows($connect)){
            $hasil["return"] = "success insert";
        } else {
            $hasil["return"] = "failed insert";
        }
    } else {
        $hasil["return"] = "captcha salah";
    }
} else {
    $hasil["return"] = "tidak boleh ada field kosong";
}

echo json_encode($hasil);

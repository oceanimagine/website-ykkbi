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
    $captchaContactUs = mysqli_real_escape_string($connect, $_POST['captchaContactUs']);
    $kategoriPengaduan = mysqli_real_escape_string($connect, $_POST['kategoriPengaduan']);
    $name_file = "";
    
    if(isset($_SESSION["Captcha"]) && $_SESSION["Captcha"] == $captchaContactUs){
        if(isset($_FILES['image']) && is_array($_FILES['image'])){
            $image = $_FILES['image'];
            $name_ = $image['name'];
            $temp = $image['tmp_name'];
            $explode_type = explode(".", $name_);
            $type_file = $explode_type[sizeof($explode_type) - 1];
            $name_file = "FILE" . date("YmdHis") . "." . $type_file;
            $dest = __DIR__ . "/../upload/photo_pengaduan_isi/" . $name_file;
            move_uploaded_file($temp, $dest);
        }
        mysqli_query($connect, "
            insert into tbl_pengaduan_isi set 
                id_pengaduan_kategori = '".$kategoriPengaduan."',
                photo_pengaduan_isi = '".$name_file."',
                nama_lengkap = '".$name."',
                email = '".$email."',
                pesan_pengaduan = '".$message."'
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

<?php
session_start();
include_once __DIR__ . "/../config/connect-list.php";
include_once __DIR__ . "/../config/connect.php";
$connect = mysqli_connect($host, $user, $pass, $data);

header('Content-Type: application/json; charset=utf-8');

if(isset($_POST['nama_pelapor']) && $_POST['nama_pelapor'] != "" && ($_POST['nama_dilaporkan'] != "" && $_POST['pelanggaran_dilaporkan'] != "" && $_POST['tanggal_kejadian'] != "" && $_POST['lokasi_kejadian'] != "")){
    $hasil = array("return" => "noparam");
    $nama_pelapor = mysqli_real_escape_string($connect, $_POST['nama_pelapor']);
    $nomor_telepon = mysqli_real_escape_string($connect, $_POST['nomor_telepon']);
    $alamat_email = mysqli_real_escape_string($connect, $_POST['alamat_email']);
    $nama_dilaporkan = mysqli_real_escape_string($connect, $_POST['nama_dilaporkan']);
    $pelanggaran_dilaporkan = mysqli_real_escape_string($connect, $_POST['pelanggaran_dilaporkan']);
    $tanggal_kejadian = mysqli_real_escape_string($connect, $_POST['tanggal_kejadian']);
    $lokasi_kejadian = mysqli_real_escape_string($connect, $_POST['lokasi_kejadian']);
    $captchaContactUs = mysqli_real_escape_string($connect, $_POST['captchaContactUs']);
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
                laporan_no = CONCAT(LPAD((SELECT (COUNT(b.id) + 1) next_num FROM `tbl_pengaduan_isi` b where SUBSTR(b.laporan_no, 5, 4) = YEAR(CURDATE())), 3, '0'), '-', YEAR(CURDATE()), '-', 'WBS'),
                laporan_tgl = '".date("Ymd")."',
                laporan_jam = '".date("H:i:s")."',
                pelapor_nama = '".$nama_pelapor."',
                pelapor_tlp = '".$nomor_telepon."',
                pelapor_email = '".$alamat_email."',
                dilaporkan_nama = '".$nama_dilaporkan."',
                dilaporkan_pelanggaran = '".$pelanggaran_dilaporkan."',
                kejadian_tgl = '".str_replace("-", "", $tanggal_kejadian)."',
                kejadian_lokasi = '".$lokasi_kejadian."',
                kejadian_bukti = '".$name_file."'
        ");
        if(mysqli_affected_rows($connect)){
            $hasil["return"] = "success insert";
        } else {
            $hasil["return"] = "failed insert";
        }
        unset($_SESSION["Captcha"]);
    } else {
        $hasil["return"] = "captcha salah";
    }
} else {
    $hasil["return"] = "tidak boleh ada field kosong";
}

echo json_encode($hasil);

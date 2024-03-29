<?php

/* Code for Replace and Search URL */
$GLOBALS['search'] = array("<",">","#","-"," ");
$GLOBALS['replace'] = array("LK","LB","TP","TS","-");

if(isset($_POST['cari_artikel'])){
    if($_POST['cari_artikel'] != ""){
        header("location: berita-search-artikel-" . str_replace($GLOBALS['search'], $GLOBALS['replace'], strtolower(strip_tags($_POST['cari_artikel']))));
    }
    if($_POST['cari_artikel'] == ""){
        header("location: berita-artikel");
    }
    exit();
}

if(isset($_POST['cari_video'])){
    if($_POST['cari_video'] != ""){
        header("location: berita-search-video-" . str_replace($GLOBALS['search'], $GLOBALS['replace'], strtolower(strip_tags($_POST['cari_video']))));
    }
    if($_POST['cari_video'] == ""){
        header("location: berita-video");
    }
    exit();
}

if(isset($_POST['cari_berita_terkini'])){
    if($_POST['cari_berita_terkini'] != ""){
        header("location: berita-search-terkini-" . str_replace($GLOBALS['search'], $GLOBALS['replace'], strtolower(strip_tags($_POST['cari_berita_terkini']))));
    }
    if($_POST['cari_berita_terkini'] == ""){
        header("location: berita-terkini");
    }
    exit();
}

if(isset($_POST['cari_dokumentasi'])){
    if($_POST['cari_dokumentasi'] != ""){
        header("location: dokumentasi-search-kegiatan-" . str_replace($GLOBALS['search'], $GLOBALS['replace'], strtolower(strip_tags($_POST['cari_dokumentasi']))));
    }
    if($_POST['cari_dokumentasi'] == ""){
        header("location: dokumentasi-kegiatan");
    }
    exit();
}

/* Redaksi Lainnya */
$query_redaksi = mysqli_query($connect, "select * from tbl_informasi_lainnya");
if(mysqli_num_rows($query_redaksi) > 0){
    $var_name = array();
    while($hasil_redaksi = mysqli_fetch_array($query_redaksi,MYSQLI_ASSOC)){
        ${$hasil_redaksi['jenis']} = $hasil_redaksi['redaksi'];
        $var_name[] = $hasil_redaksi['jenis'];
    }
}

/* Sosial Media */
$query_social_media = mysqli_query($connect, "select * from tbl_social_media");
if(mysqli_num_rows($query_social_media) > 0){
    $var_name_social_media = array();
    while($hasil_social_media = mysqli_fetch_array($query_social_media)){
        $explode_com = explode(".com", $hasil_social_media['link']);
        if(sizeof($explode_com) > 1){
            if(strtolower(substr($hasil_social_media['link'], 0, strlen("http"))) != "http"){
                $hasil_social_media['link'] = "https://" . $hasil_social_media['link'];
            }
        }
        ${str_replace(array("-"," "),"_", $hasil_social_media['logo'])} = '
        <li>
            <a href="'.$hasil_social_media['link'].'" target="_blank" class="d-flex align-items-center" rel="noopener">
                 <span class="rounded-border">
                     <span class="fa '.$hasil_social_media['logo'].'"></span>
                 </span>
                 <span>'.$hasil_social_media['nama_social_media'].'</span>
            </a>
        </li>
        ';
        $var_name_social_media[] = str_replace(array("-"," "),"_", $hasil_social_media['logo']);
    }
}

/* Sejarah */
$query_sejarah = mysqli_query($connect, "select * from tbl_tentang_sejarah where status = 'publish'");
$judul_sejarah = "Undefined";
$isi_sejarah = "Undefined";
if(mysqli_num_rows($query_sejarah) > 0){
    $hasil_sejarah = mysqli_fetch_array($query_sejarah);
    $judul_sejarah = $hasil_sejarah['judul'];
    $isi_sejarah = str_replace("{{RELATIVE_PATH}}", $GLOBALS['base_administrator'], $hasil_sejarah['isi_sejarah']);
}

/* Peraturan */
$query_peraturan = mysqli_query($connect, "select * from tbl_peraturan where status = 'publish'");
$judul_peraturan = "Undefined";
$google_drive_pdf = "Undefined";
if(mysqli_num_rows($query_peraturan) > 0){
    $hasil_peraturan = mysqli_fetch_array($query_peraturan);
    $judul_peraturan = $hasil_peraturan['judul_peraturan'];
    $google_drive_pdf = $hasil_peraturan['google_drive_pdf'];
}

/* Laporan */
$query_laporan = mysqli_query($connect, "select * from tbl_laporan where status = 'publish'");
$judul_laporan = "Undefined";
if(mysqli_num_rows($query_laporan) > 0){
    $hasil_laporan = mysqli_fetch_array($query_laporan);
    $judul_laporan = $hasil_laporan['judul_laporan'];
    $google_drive_pdf = $hasil_laporan['google_drive_pdf'];
}

/* Dokumen Detail */
$judul_besar = "Undefined";
$judul_kecil = "Undefined";
if(isset($_GET['iddokumen']) && $_GET['iddokumen'] != "" && is_numeric($_GET['iddokumen'])){
    $iddokumen = mysqli_real_escape_string($connect, $_GET['iddokumen']);
    $query_dokumen = mysqli_query($connect, "select * from tbl_dokumen_ykkbi where status = 'publish' and id = '".$iddokumen."'");
    if(mysqli_num_rows($query_dokumen) > 0){
        $hasil_dokumen = mysqli_fetch_array($query_dokumen);
        $judul_besar = $hasil_dokumen['judul_besar'];
        $judul_kecil = $hasil_dokumen['judul_kecil'];
        $google_drive_pdf = $hasil_dokumen['google_drive_pdf'];
    }
}

/* Artikel Detail */
$judul_artikel = "Undefined";
$isi_artikel = "Undefined";
$photo_artikel = "";
if(isset($_GET['judulartikel']) && $_GET['judulartikel'] != ""){
    $judulartikel = mysqli_real_escape_string($connect, $_GET['judulartikel']);
    $query_artikel = mysqli_query($connect, "select * from tbl_artikel where LOWER(judul_artikel) = '". str_replace(array_reverse($GLOBALS['replace']),array_reverse($GLOBALS['search']), $judulartikel)."'");
    if(mysqli_num_rows($query_artikel) > 0){
        $hasil_artikel = mysqli_fetch_array($query_artikel);
        if($hasil_artikel['photo_artikel'] != "" && file_exists("upload/photo_artikel/" . $hasil_artikel['photo_artikel'])){
            $photo_artikel = "upload/photo_artikel/" . $hasil_artikel['photo_artikel'];
        }
        $judul_artikel = $hasil_artikel['judul_artikel'];
        $isi_artikel = $hasil_artikel['isi_artikel'];
    }
}

/* Video Detail */
$judul_video = "Undefined";
$deskripsi_singkat = "Undefined";
$photo_video = "";
$id_link_youtube = "";
if(isset($_GET['judulvideo']) && $_GET['judulvideo'] != ""){
    $judulvideo = mysqli_real_escape_string($connect, $_GET['judulvideo']);
    $query_video = mysqli_query($connect, "select * from tbl_video where LOWER(judul_video) = '". str_replace(array_reverse($GLOBALS['replace']),array_reverse($GLOBALS['search']), $judulvideo)."'");
    if(mysqli_num_rows($query_video) > 0){
        $hasil_video = mysqli_fetch_array($query_video);
        if($hasil_video['photo_video'] != "" && file_exists("upload/photo_video/" . $hasil_video['photo_video'])){
            $photo_video = "upload/photo_video/" . $hasil_video['photo_video'];
        }
        $id_link_youtube = $hasil_video['id_link_youtube'];
        $judul_video = $hasil_video['judul_video'];
        $deskripsi_singkat = $hasil_video['deskripsi_singkat'];
    }
}

/* Transformasi */
$query_transformasi = mysqli_query($connect, "select * from tbl_tentang_transformasi where status = 'publish'");
$judul_transformasi = "Undefined";
$isi_transformasi = "Undefined";
if(mysqli_num_rows($query_transformasi) > 0){
    $hasil_transformasi = mysqli_fetch_array($query_transformasi);
    $judul_transformasi = $hasil_transformasi['judul'];
    $isi_transformasi = str_replace("{{RELATIVE_PATH}}", $GLOBALS['base_administrator'], $hasil_transformasi['isi_transformasi']);
}

/* Pengurus */
$query_tentang_pengurus = mysqli_query($connect, "select * from tbl_tentang_profile_pengurus where status = 'publish'");
$judul_tentang_pengurus = "Undefined";
$isi_tentang_pengurus = "Undefined";
if(mysqli_num_rows($query_tentang_pengurus) > 0){
    $hasil_tentang_pengurus = mysqli_fetch_array($query_tentang_pengurus);
    $judul_tentang_pengurus = $hasil_tentang_pengurus['judul'];
    $isi_tentang_pengurus = str_replace("{{RELATIVE_PATH}}", $GLOBALS['base_administrator'], $hasil_tentang_pengurus['isi_profile_pengurus']);
}

/* TKHT Lainnya */
$query_tkht_lainnya = mysqli_query($connect, "select * from tbl_tkht_lainnya where status = 'publish'");
$array_var_name_tkht_lainnya = array();
if(mysqli_num_rows($query_tkht_lainnya) > 0){
    while($hasil_tkht_lainnya = mysqli_fetch_array($query_tkht_lainnya)){
        ${'judul_' . $hasil_tkht_lainnya['tipe_tkht']} = $hasil_tkht_lainnya['judul'];
        ${'isi_' . $hasil_tkht_lainnya['tipe_tkht']} = str_replace("{{RELATIVE_PATH}}", $GLOBALS['base_administrator'], $hasil_tkht_lainnya['isi_tkht_lainnya']);
        $array_var_name_tkht_lainnya[] = 'judul_' . $hasil_tkht_lainnya['tipe_tkht'] . " -- " . 'isi_' . $hasil_tkht_lainnya['tipe_tkht'];
    }
}

/* TKHT Bantuan */
$query_tkht_bantuan = mysqli_query($connect, "select * from tbl_tkht_bantuan where status = 'publish'");
$array_var_name_tkht_bantuan = array();
if(mysqli_num_rows($query_tkht_bantuan) > 0){
    while($hasil_tkht_bantuan = mysqli_fetch_array($query_tkht_bantuan)){
        ${'judul_' . $hasil_tkht_bantuan['tipe_tkht']} = $hasil_tkht_bantuan['judul'];
        ${'isi_' . $hasil_tkht_bantuan['tipe_tkht']} = str_replace("{{RELATIVE_PATH}}", $GLOBALS['base_administrator'], $hasil_tkht_bantuan['isi_tkht_bantuan']);
        $array_var_name_tkht_bantuan[] = 'judul_' . $hasil_tkht_bantuan['tipe_tkht'] . " -- " . 'isi_' . $hasil_tkht_bantuan['tipe_tkht'];
    }
}
<?php

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
    $isi_sejarah = $hasil_sejarah['isi_sejarah'];
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

/* Transformasi */
$query_transformasi = mysqli_query($connect, "select * from tbl_tentang_transformasi where status = 'publish'");
$judul_transformasi = "Undefined";
$isi_transformasi = "Undefined";
if(mysqli_num_rows($query_transformasi) > 0){
    $hasil_transformasi = mysqli_fetch_array($query_transformasi);
    $judul_transformasi = $hasil_transformasi['judul'];
    $isi_transformasi = $hasil_transformasi['isi_transformasi'];
}

/* TKHT Lainnya */
$query_tkht_lainnya = mysqli_query($connect, "select * from tbl_tkht_lainnya where status = 'publish'");
$array_var_name_tkht_lainnya = array();
if(mysqli_num_rows($query_tkht_lainnya) > 0){
    while($hasil_tkht_lainnya = mysqli_fetch_array($query_tkht_lainnya)){
        ${'judul_' . $hasil_tkht_lainnya['tipe_tkht']} = $hasil_tkht_lainnya['judul'];
        ${'isi_' . $hasil_tkht_lainnya['tipe_tkht']} = $hasil_tkht_lainnya['isi_tkht_lainnya'];
        $array_var_name_tkht_lainnya[] = 'judul_' . $hasil_tkht_lainnya['tipe_tkht'] . " -- " . 'isi_' . $hasil_tkht_lainnya['tipe_tkht'];
    }
}

/* TKHT Bantuan */
$query_tkht_bantuan = mysqli_query($connect, "select * from tbl_tkht_bantuan where status = 'publish'");
$array_var_name_tkht_bantuan = array();
if(mysqli_num_rows($query_tkht_bantuan) > 0){
    while($hasil_tkht_bantuan = mysqli_fetch_array($query_tkht_bantuan)){
        ${'judul_' . $hasil_tkht_bantuan['tipe_tkht']} = $hasil_tkht_bantuan['judul'];
        ${'isi_' . $hasil_tkht_bantuan['tipe_tkht']} = $hasil_tkht_bantuan['isi_tkht_bantuan'];
        $array_var_name_tkht_bantuan[] = 'judul_' . $hasil_tkht_bantuan['tipe_tkht'] . " -- " . 'isi_' . $hasil_tkht_bantuan['tipe_tkht'];
    }
}
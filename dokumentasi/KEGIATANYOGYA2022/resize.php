<?php

function resize_image($file) {
    list($width, $height) = getimagesize($file);
    $exif = exif_read_data($file);
    $src1 = imagecreatefromjpeg($file);
    
    if(isset($exif['Orientation'])){
        // echo $exif['Orientation'] . "\n";
    }
    if(isset($exif['Orientation']) && $exif['Orientation'] == 6){
        $width_ = $height;
        $height_ = $width;
        if($height_ > 2000){
            $newwidth = $width_ / 5;
            $newheight = $height_ / 5;
        } else {
            $newwidth = $width_ / 3;
            $newheight = $height_ / 3;
        }
        $newimage = imagecreatetruecolor($newwidth,$newheight);
        $newsrc1 = imagerotate($src1,-90,0);
        imagecopyresampled($newimage,$newsrc1,0,0,0,0,$newwidth,$newheight,$width_,$height_);
    } else {
        if($width > 2000){
            $newwidth = $width / 5;
            $newheight = $height / 5;
        } else {
            $newwidth = $width / 3;
            $newheight = $height / 3;
        }
        $newimage = imagecreatetruecolor($newwidth,$newheight);
        imagecopyresampled($newimage,$src1,0,0,0,0,$newwidth,$newheight,$width,$height);
    }
    if(isset($newimage)){
        return $newimage;
    }
}

function samakan($param1, $param2){
    $paramA  = (string) $param1;
    $paramB  = (string) $param2;
    $selisih = strlen($paramB) - strlen($paramA);
    $results = "";
    for($i = 0; $i < $selisih; $i++){
        $results = $results . "0";
    }
    return $results . $paramA;
}

$folder = "DAYALL";

$scan_ = scandir(__DIR__.'/'.$folder.'/');
$count = 1;



for($i = 2; $i < sizeof($scan_); $i++){
    $jumlah  = sizeof($scan_);
    $newname = "SMALL" . samakan($count, $jumlah) . ".jpg";
    $img = resize_image(__DIR__.'/'.$folder.'/' . $scan_[$i]);
    imagejpeg($img, __DIR__.'/'.$folder.'-PIXEL/' . $newname);
    rename(__DIR__.'/'.$folder.'/' . $scan_[$i], __DIR__.'/'.$folder.'/' . $newname);
    echo "Berhasi " . $newname . "\n";
    $count++;
}
<title>Crawl BI GO ID Article</title>
<style type="text/css">
    html, body {
        font-family: consolas, monospace;
    }
</style>
<?php

// https://www.urlencoder.org/
// https://stackoverflow.com/questions/1133020/is-it-possible-crawl-asp-net-pages
// https://stackoverflow.com/questions/38024055/php-curl-to-aspx-page
// https://stackoverflow.com/questions/37577405/scrapy-crawling-not-working-on-aspx-website
// https://stackoverflow.com/questions/10281154/scraping-aspx-page-using-php-curl
// https://256cats.com/scraping-asp-websites-php-dopostback-ajax-emulation/
// https://github.com/256cats/ASPBrowser
// https://docs.microsoft.com/en-us/previous-versions/dotnet/articles/ms972976(v=msdn.10)?redirectedfrom=MSDN#viewstate_topic12

// Article
$url_bi = "https://www.bi.go.id";
$content_article = file_get_contents($url_bi . "/id/publikasi/ruang-media/news-release/Default.aspx");
$explode_pers_article = explode("<div class=\"media media--pers\">", $content_article);
for($i = 1; $i < sizeof($explode_pers_article); $i++){
    $explode_image = explode("'background-image: url(", $explode_pers_article[$i]);
    $explode_image_1 = explode(");'", $explode_image[1]);
    echo "<img src='" . $url_bi . $explode_image_1[0] . "' style='width: 200px;' /><br />\n";
}

// Input Hidden
$no = 1;
$explode_name = explode('<input type="hidden" name="', $content_article);
$__VIEWSTATE = "";
$__EVENTVALIDATION = "";
$__REQUESTDIGEST = "";
for($i = 1; $i < sizeof($explode_name); $i++){
    $explode_id = explode('" id="', $explode_name[$i]);
    $name_input = $explode_id[0];
    $explode_value = explode('" value="', $explode_name[$i]);
    $value_input = "";
    if(isset($explode_value[1])){
        $explode_comma = explode('" />', $explode_value[1]);
        $value_input = $explode_comma[0];
    }
    if($name_input == "__VIEWSTATE"){
        $__VIEWSTATE = $value_input; 
    }
    if($name_input == "__EVENTVALIDATION"){
        $__EVENTVALIDATION = $value_input; 
    }
    if($name_input == "__REQUESTDIGEST"){
        $__REQUESTDIGEST = $value_input; 
    }
    echo $no . " " . $name_input . " = " . $value_input . "<br />\n";
    $no++;
}

echo "AAAAAAAAAA" . $__VIEWSTATE . "\n";
echo "AAAAAAAAAA" . $__EVENTVALIDATION . "\n";
echo "AAAAAAAAAA" . $__REQUESTDIGEST . "\n";
// Input Text
$n = 1;
$explode_name_text = explode('<input name="', $content_article);
for($i = 1; $i < sizeof($explode_name_text); $i++){
    $explode_type = explode('" type="', $explode_name_text[$i]);
    $name_input_text = $explode_type[0];
    echo $n . " " . $name_input_text . "<br />\n";
    $n++;
}

$curl = curl_init();
$post_fields = array(
    'ctl00$ScriptManager' => 'ctl00$ctl44$g_895e8ef2_eaad_4a83_9db7_1632dd8595c0$ctl00$UpdatePanel1|ctl00$ctl44$g_895e8ef2_eaad_4a83_9db7_1632dd8595c0$ctl00$DataPagerSiaranPersList$ctl01$ctl01',
    '_maintainWorkspaceScrollPosition' => '0',
    '__SCROLLPOSITIONX' => '0',
    '__SCROLLPOSITIONY' => '0',
    'ctl00$ctl64' => '',
    'ctl00$ctl44$g_895e8ef2_eaad_4a83_9db7_1632dd8595c0$ctl00$TextBoxSearch' => '',
    'ctl00$ctl44$g_895e8ef2_eaad_4a83_9db7_1632dd8595c0$ctl00$textboxDatePickerAwal' => '',
    'ctl00$ctl44$g_895e8ef2_eaad_4a83_9db7_1632dd8595c0$ctl00$textboxDatePickerAkhir' => '',
    'ctl00$ctl44$g_895e8ef2_eaad_4a83_9db7_1632dd8595c0$ctl00$HiddenFieldUrl' => 'https://www.bi.go.id/id/publikasi/ruang-media/news-release',
    'ctl00$ctl44$g_895e8ef2_eaad_4a83_9db7_1632dd8595c0$ctl00$HiddenFieldBahasa' => 'id-ID',
    'ctl00$ctl44$g_895e8ef2_eaad_4a83_9db7_1632dd8595c0$ctl00$HiddenFieldKeyword' => '',
    'ctl00$ctl44$g_895e8ef2_eaad_4a83_9db7_1632dd8595c0$ctl00$HiddenFieldDariTanggal' => '',
    'ctl00$ctl44$g_895e8ef2_eaad_4a83_9db7_1632dd8595c0$ctl00$HiddenFieldSampaiTanggal' => '',
    'ctl00$ctl44$g_895e8ef2_eaad_4a83_9db7_1632dd8595c0$ctl00$HiddenFieldIsGambar' => 
    'True','ctl00$ctl44$g_895e8ef2_eaad_4a83_9db7_1632dd8595c0$ctl00$HiddenFieldIsHits' => 'True',
    'ctl00$PlaceHolderBottom$g_e3052be3_673c_405e_9cbe_a883a244c053$ctl00$HiddenFieldCount' => '2',
    '__EVENTTARGET' => 'ctl00$ctl44$g_895e8ef2_eaad_4a83_9db7_1632dd8595c0$ctl00$DataPagerSiaranPersList$ctl01$ctl01',
    '__EVENTARGUMENT' => '',
    '__VIEWSTATE' => $__VIEWSTATE,
    '__VIEWSTATEGENERATOR' => '17A21AF8',
    '__EVENTVALIDATION' => $__EVENTVALIDATION,
    '_wpcmWpid' => '',
    'wpcmVal' => '',
    'MSOWebPartPage_PostbackSource' => '',
    'MSOTlPn_SelectedWpId' => '',
    'MSOTlPn_View' => '0',
    'MSOTlPn_ShowSettings' => 'False',
    'MSOGallery_SelectedLibrary' => '',
    'MSOGallery_FilterString' => '',
    'MSOTlPn_Button' => '',
    '__REQUESTDIGEST' => $__REQUESTDIGEST,
    'MSOSPWebPartManager_DisplayModeName' => 'Browse',
    'MSOSPWebPartManager_ExitingDesignMode' => 'false',
    'MSOWebPartPage_Shared' => '',
    'MSOLayout_LayoutChanges' => '',
    'MSOLayout_InDesignMode' => '',
    '_wpSelected' => '',
    '_wzSelected' => '',
    'MSOSPWebPartManager_OldDisplayModeName' => 'Browse',
    'MSOSPWebPartManager_StartWebPartEditingName' => 'false',
    'MSOSPWebPartManager_EndWebPartEditing' => 'false',
    '__ASYNCPOST' => 'true'
);
curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://www.bi.go.id/id/publikasi/ruang-media/news-release/Default.aspx',
    CURLOPT_USERAGENT => "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => http_build_query($post_fields),
    CURLOPT_HTTPHEADER => array(
        'X-MicrosoftAjax: Delta=true',
        'Content-Type: application/x-www-form-urlencoded',
        'Origin: https://www.bi.go.id'
    )
));

$response = curl_exec($curl);
$array_keys = array_keys($post_fields);
echo sizeof($array_keys);
curl_close($curl);
echo "<br />\n";
echo $response;
echo "\n";

// echo $content_article;
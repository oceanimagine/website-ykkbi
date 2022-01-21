<?php 

include_once __DIR__ . "/../config/connect-list.php";
include_once __DIR__ . "/../config/connect.php";

?>
<base href="<?php echo $base; ?>">
<title>Javascript</title>
<style type="text/css">
    html, body {
        font-family: consolas, monospace;
    }
</style>
<div id="default">Javascript Inactive.</div>
<script type="text/javascript">

var default_ = document.getElementById("default");
default_.innerHTML = "Javascript Active will redirect to main page.";
setTimeout(function(){
    document.location = "home";
}, 1000);

</script>
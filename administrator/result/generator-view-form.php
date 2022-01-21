<?php

define('BASEPATH', "../application/config");
include_once __DIR__ . "/../../config/connect-list.php";
include_once __DIR__ . "/../../config/connect.php";
include BASEPATH . "/database.php";

$host = $db['default']['hostname'];
$user = $db['default']['username'];
$pass = $db['default']['password'];
$data = $db['default']['database'];

$nama_tabel = "tbl_tkht_bantuan";
$connect = mysqli_connect($host, $user, $pass, $data);

$query_describe = mysqli_query($connect, "describe " . $nama_tabel);

function change_name($name_underscore){
    $results_name = "";
    $explode_name = explode("_", $name_underscore);
    $space = "";
    for($i = 0; $i < sizeof($explode_name); $i++){
        $results_name = $results_name . $space . ucfirst($explode_name[$i]);
        $space = " ";
    }
    return $results_name;
}

if(mysqli_num_rows($query_describe) > 0){
    
    $explode_key = explode("_", $nama_tabel);
    $underscore_ = "";
    $rest_name_ = "";
    for($i = 1; $i < sizeof($explode_key); $i++){
        $rest_name_ = $rest_name_ . $underscore_ . $explode_key[$i];
        $underscore_ = "_";
    }
    $maps_active = 0;
    $maps_count = 0;
    ob_start();
    ?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php echo change_name($rest_name_); ?> Form</title>
    <style type="text/css">
        html, body {
            font-family: consolas, monospace;
            cursor: default;
            width: 100%;
            height: 100%;
            margin: 0px;
            padding: 0px;
        }
        pre {
            font-family: consolas, monospace;
        }
    </style>
    <script type="text/javascript">
        /* Put JS Here */ 
        function move_url(link){
            document.location = "../../../index.php/" + link;
        }
        /* JS Latlong Here */ 

    </script>
</head>
<body>
    <form class="form-horizontal" method="POST" enctype="multipart/form-data">
        <div class="box-body">
            <?php while($hasil_describe = mysqli_fetch_array($query_describe)){ $real_name = str_replace(" ", "_", $hasil_describe['Field']); ?>
            <?php if(strtolower($hasil_describe['Key']) != strtolower("PRI") && $hasil_describe['Field'] != "timestamp"){ ?>
            <?php if((strtolower(substr($hasil_describe['Type'], 0, strlen("varchar"))) == "varchar" || strtolower(substr($hasil_describe['Type'], 0, strlen("int"))) == "int" || strtolower(substr($hasil_describe['Type'], 0, strlen("date"))) == "date") && substr($hasil_describe['Field'], 0, strlen("photo")) != "photo" && substr($hasil_describe['Field'], 0, strlen("id_")) != "id_" && substr($hasil_describe['Field'], 0, strlen("latlong")) != "latlong"){ 
            $type = "text";
            $class_date = "";
            if(strtolower(substr($hasil_describe['Field'], 0, strlen("password"))) == "password"){
                $type = "password";
            }
            if(strtolower(substr($hasil_describe['Field'], 0, strlen("email"))) == "email"){
                $type = "email";
            }
            if(strtolower(substr($hasil_describe['Type'], 0, strlen("int"))) == "int"){
                $type = "number";
            }
            if(strtolower(substr($hasil_describe['Type'], 0, strlen("date"))) == "date"){
                $class_date = " tanggal_pilih";
            }
            ?>
            
            <div class="form-group">
                <label for="<?php echo $real_name; ?>" class="col-lg-2 control-label"><?php echo change_name($real_name); ?></label>
                <div class="col-lg-10">
                    <input type="<?php echo $type; ?>" id="<?php echo $real_name; ?>" class="form-control<?php echo $class_date; ?>" name="<?php echo $real_name; ?>" placeholder="<?php echo change_name($real_name); ?>" value="<?php echo '<?php echo isset($'.$real_name.') ? $'.$real_name.' : ""; ?>'; ?>">
                </div>
            </div>
            <?php } ?>
            <?php if(strtolower(substr($hasil_describe['Type'], 0, strlen("text"))) == "text"){ ?> 
            
            <div class="form-group">
                <label for="article_build" class="col-lg-2 control-label"><?php echo change_name($real_name); ?></label>
                <div class="col-lg-10">
                    <textarea id="article_build" class="form-control" name="<?php echo $real_name; ?>" placeholder="<?php echo change_name($real_name); ?>"><?php echo '<?php echo isset($'.$real_name.') ? $'.$real_name.' : ""; ?>'; ?></textarea>
                </div>
            </div>
            <?php } ?>
            <?php if(strtolower(substr($hasil_describe['Type'], 0, strlen("enum"))) == "enum"){ 
            $enum_all = strtolower($hasil_describe['Type']);
            $explode_01 = explode("enum('", $enum_all);
            $explode_02 = explode("')", $explode_01[1]);
            $explode_03 = explode("','", $explode_02[0]);
            ?> 
            
            <div class="form-group">
                <label for="<?php echo $real_name; ?>" class="col-lg-2 control-label"><?php echo change_name($real_name); ?></label>
                <div class="col-lg-10">
                    <select name="<?php echo $real_name; ?>" id="<?php echo $real_name; ?>" class="form-control">
                        <option value="">PILIH <?php echo strtoupper(change_name($real_name)); ?></option>
                        <?php for($i = 0; $i < sizeof($explode_03); $i++){ ?>
                        
                        <option value="<?php echo $explode_03[$i]; ?>"<?php echo " <?php echo isset($".$real_name.") && $".$real_name." == '".$explode_03[$i]."' ? ' selected' : ''; ?>"; ?>><?php echo $explode_03[$i]; ?></option><?php } ?>
                        
                    </select>
                </div>
            </div>
            <?php } ?>
            <?php if(substr($hasil_describe['Field'], 0, strlen("latlong")) == "latlong"){ $maps_active = 1; ?>  
            
            <div class="form-group">
                <label for="beginmarker<?php echo $maps_count; ?>" class="col-lg-2 control-label"><?php echo change_name($real_name); ?></label>
                <div class="col-lg-10">
                    <button id="beginmarker<?php echo $maps_count; ?>" style="width: 100%;" type="button" class="btn btn-default">Start Marker</button>
                </div>
            </div>
            <div class="form-group">
                <div for="latlong<?php echo $maps_count; ?>" class="col-lg-2 control-label" style="padding: 0px;"></div>
                <div class="col-lg-10">
                    <input type="text" id="latlong<?php echo $maps_count; ?>" class="form-control" name="<?php echo $real_name; ?>" placeholder="Latitude Longitude" value="<?php echo '<?php echo isset($'.$real_name.') ? $'.$real_name.' : ""; ?>'; ?>">
                </div>
            </div>
            <div class="form-group">
                <div for="map<?php echo $maps_count; ?>" class="col-lg-2 control-label" style="padding: 0px;"></div>
                <div class="col-lg-10">
                    <div id="map<?php echo $maps_count; ?>" style="width: 100%; margin-top: 6px;">If you are not see the map, maybe your browser is not supported.</div>
                </div>
            </div>
            <?php $maps_count++; } ?>
            <?php if(substr($hasil_describe['Field'], 0, strlen("photo")) == "photo"){ ?>  
            
            <?php echo "<?php " ?>show_photo("<?php echo $real_name; ?>", (isset($<?php echo $real_name; ?>) ? $<?php echo $real_name; ?> : ""));<?php echo " ?>"; ?> 
            
            <?php } ?>
            <?php if(substr($hasil_describe['Field'], 0, strlen("id_")) == "id_"){ 
            $table_name = "tbl_" . substr($hasil_describe['Field'], strlen("id_"));
            $describe_table_inside = mysqli_query($connect, "describe " . $table_name);
            if($describe_table_inside && mysqli_num_rows($describe_table_inside)){
                $column_pri = "";
                $column_varchar = "";
                while($hasil_describe_table_inside = mysqli_fetch_array($describe_table_inside)){
                    if(strtolower($hasil_describe_table_inside['Key']) == strtolower("PRI")){
                        if($column_pri == ""){
                           $column_pri = $hasil_describe_table_inside['Field'];
                        }
                    }
                    if(strtolower(substr($hasil_describe_table_inside['Type'], 0, strlen("varchar"))) == "varchar"){
                        if($column_varchar == ""){
                            $column_varchar = $hasil_describe_table_inside['Field'];
                        }
                    }
                    if($column_pri != "" && $column_varchar != ""){
                        break;
                    }
                }
            } else {
                ob_get_clean();
                echo "ERROR TABLE.";
                exit();
            }
            ?> 
            <div class="form-group">
                <label for="<?php echo substr($real_name,3); ?>" class="col-lg-2 control-label"><?php echo change_name(substr($real_name,3)); ?></label>
                <div class="col-lg-10">
                    <select name="<?php echo $real_name; ?>" id="<?php echo substr($real_name,3); ?>" class="form-control">
                        <option value="">PILIH <?php echo strtoupper(change_name(substr($real_name,3))); ?></option>
                        <?php echo '<?php $get_data = get_data("'.$table_name.'",array("'.$column_pri.'","'.$column_varchar.'")); ?>' . "\n";?>
                        <?php echo '<?php while(mysqli_num_rows($get_data) && $res_data = mysqli_fetch_array($get_data)){ ?>' . "\n"; ?>
                        <?php echo '    <option value="<?php echo $res_data[\''.$column_pri.'\']; ?>"<?php echo isset($'.$real_name.') && $'.$real_name.' == $res_data[\''.$column_pri.'\'] ? " selected" : ""; ?>><?php echo $res_data[\''.$column_varchar.'\']; ?></option>' . "\n"; ?>
                        <?php echo '<?php } ?>' . "\n"; ?>
                    </select>
                </div>
            </div>
            <?php } ?>
            <?php } ?>
            <?php } ?>
            
            <div class="box-footer"></div>
            
            <div class="form-group">
                <div class="col-lg-6 col-md-6" style="margin-bottom: 40px;">
                    <button style="width: 100%;" type="submit" class="btn btn-info pull-right bg-light-blue-gradient" name="input_<?php echo $rest_name_; ?>" value="Input <?php echo change_name($rest_name_); ?>">Input <?php echo change_name($rest_name_); ?></button>
                </div>
                <div class="col-lg-6 col-md-6">
                    <button style="width: 100%;" type="button" class="btn btn-default bg-aqua-gradient" onclick="move_url('<?php echo $rest_name_; ?>');">Lihat Data</button>
                </div>
            </div>
        </div>
    </form>
    <?php if($maps_active){ ?>
    
    <script type="text/javascript" src="js/mapmarker_new.js"></script>
    <?php for($i = 0; $i < $maps_count; $i++){ ?>
    <input type="text" class="form-control" id="search_map<?php echo $i; ?>" placeholder="Cari Map" style="width: 50%; z-index: 9999; display: none;" value="Binus" />
    <?php } ?>
    <?php } ?>
</body>
</html><?php
    $hasil_controller = ob_get_clean();
    if($maps_active){
        $hasil_controller = str_replace(
            "/* JS Latlong Here */", '
        window.onload = function(){
            setTimeout(function(){
                for(var i = 0; i <= 100; i++){
                    if(document.getElementById("latlong" + i)){
                        initialize(i);
                    } else {
                        break;
                    }
                }
            }, 500);
        };', 
            $hasil_controller
        );
    }
    file_put_contents(__DIR__ . "/../application/views/" . $rest_name_ . "_form.php", $hasil_controller);
}

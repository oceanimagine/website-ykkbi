<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Slider Form</title>
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
            
	</script>
</head>
<body>
    <form class="form-horizontal" method="POST" enctype="multipart/form-data">
        <div class="box-body">
                                                                                                  
            
            <?php show_photo("photo_slider", (isset($photo_slider) ? $photo_slider : "")); ?> 
            
                                                                                    
            <div class="form-group">
                <label for="judul" class="col-lg-2 control-label">Judul</label>
                <div class="col-lg-10">
                    <input type="text" id="judul" class="form-control" name="judul" placeholder="Judul" value="<?php echo isset($judul) ? $judul : ""; ?>">
                </div>
            </div>
                                                                                                                        
            <div class="form-group">
                <label for="deskripsi" class="col-lg-2 control-label">Deskripsi</label>
                <div class="col-lg-10">
                    <input type="text" id="deskripsi" class="form-control" name="deskripsi" placeholder="Deskripsi" value="<?php echo isset($deskripsi) ? $deskripsi : ""; ?>">
                </div>
            </div>
                                                                                                                        
            <div class="box-footer"></div>
            
            <div class="form-group">
                <div class="col-lg-6 col-md-6" style="margin-bottom: 40px;">
                    <button style="width: 100%;" type="submit" class="btn btn-info pull-right bg-light-blue-gradient" name="input_slider" value="Input Slider">Input Slider</button>
                </div>
                <div class="col-lg-6 col-md-6">
                    <button style="width: 100%;" type="button" class="btn btn-default bg-aqua-gradient" onclick="move_url('slider');">Lihat Data</button>
                </div>
            </div>
        </div>
    </form>
</body>
</html>
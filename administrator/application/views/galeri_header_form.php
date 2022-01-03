<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Galeri Header Form</title>
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
                                                                                                  
            
            <?php show_photo("photo_galeri_header", (isset($photo_galeri_header) ? $photo_galeri_header : "")); ?> 
            
                                                                                    
            <div class="form-group">
                <label for="judul_galeri" class="col-lg-2 control-label">Judul Galeri</label>
                <div class="col-lg-10">
                    <input type="text" id="judul_galeri" class="form-control" name="judul_galeri" placeholder="Judul Galeri" value="<?php echo isset($judul_galeri) ? $judul_galeri : ""; ?>">
                </div>
            </div>
                                                                                                                        
            <div class="form-group">
                <label for="deskripsi_singkat" class="col-lg-2 control-label">Deskripsi Singkat</label>
                <div class="col-lg-10">
                    <input type="text" id="deskripsi_singkat" class="form-control" name="deskripsi_singkat" placeholder="Deskripsi Singkat" value="<?php echo isset($deskripsi_singkat) ? $deskripsi_singkat : ""; ?>">
                </div>
            </div>
                                                                                                                        
            <div class="box-footer"></div>
            
            <div class="form-group">
                <div class="col-lg-6 col-md-6" style="margin-bottom: 40px;">
                    <button style="width: 100%;" type="submit" class="btn btn-info pull-right bg-light-blue-gradient" name="input_galeri_header" value="Input Galeri Header">Input Galeri Header</button>
                </div>
                <div class="col-lg-6 col-md-6">
                    <button style="width: 100%;" type="button" class="btn btn-default bg-aqua-gradient" onclick="move_url('galeri_header');">Lihat Data</button>
                </div>
            </div>
        </div>
    </form>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Dokumentasi Detail Form</title>
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
                                                                                                             
            <div class="form-group">
                <label for="dokumentasi_header" class="col-lg-2 control-label">Dokumentasi Header</label>
                <div class="col-lg-10">
                    <select name="id_dokumentasi_header" id="dokumentasi_header" class="form-control">
                        <option value="">PILIH DOKUMENTASI HEADER</option>
                        <?php $get_data = get_data("tbl_dokumentasi_header",array("id","judul_event")); ?>
                        <?php while(mysqli_num_rows($get_data) && $res_data = mysqli_fetch_array($get_data)){ ?>
                            <option value="<?php echo $res_data['id']; ?>"<?php echo isset($id_dokumentasi_header) && $id_dokumentasi_header == $res_data['id'] ? " selected" : ""; ?>><?php echo $res_data['judul_event']; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
                                                                                                  
            
            <?php show_photo("photo_dokumentasi_detail", (isset($photo_dokumentasi_detail) ? $photo_dokumentasi_detail : "")); ?> 
            
                                                                                    
            <div class="form-group">
                <label for="deskripsi_singkat" class="col-lg-2 control-label">Deskripsi Singkat</label>
                <div class="col-lg-10">
                    <input type="text" id="deskripsi_singkat" class="form-control" name="deskripsi_singkat" placeholder="Deskripsi Singkat" value="<?php echo isset($deskripsi_singkat) ? $deskripsi_singkat : ""; ?>">
                </div>
            </div>
                                                                                                                        
            <div class="box-footer"></div>
            
            <div class="form-group">
                <div class="col-lg-6 col-md-6" style="margin-bottom: 40px;">
                    <button style="width: 100%;" type="submit" class="btn btn-info pull-right bg-light-blue-gradient" name="input_dokumentasi_detail" value="Input Dokumentasi Detail">Input Dokumentasi Detail</button>
                </div>
                <div class="col-lg-6 col-md-6">
                    <button style="width: 100%;" type="button" class="btn btn-default bg-aqua-gradient" onclick="move_url('dokumentasi_detail');">Lihat Data</button>
                </div>
            </div>
        </div>
    </form>
</body>
</html>
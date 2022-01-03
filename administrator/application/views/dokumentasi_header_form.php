<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Dokumentasi Header Form</title>
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
                <label for="judul_event" class="col-lg-2 control-label">Judul Event</label>
                <div class="col-lg-10">
                    <input type="text" id="judul_event" class="form-control" name="judul_event" placeholder="Judul Event" value="<?php echo isset($judul_event) ? $judul_event : ""; ?>">
                </div>
            </div>
                                                                                                                                                  
            
            <?php show_photo("photo_dokumentasi_header", (isset($photo_dokumentasi_header) ? $photo_dokumentasi_header : "")); ?> 
            
                                                                                    
            <div class="form-group">
                <label for="tanggal_mulai" class="col-lg-2 control-label">Tanggal Mulai</label>
                <div class="col-lg-10">
                    <input type="text" id="tanggal_mulai" class="form-control tanggal_pilih" name="tanggal_mulai" placeholder="Tanggal Mulai" value="<?php echo isset($tanggal_mulai) ? $tanggal_mulai : ""; ?>">
                </div>
            </div>
                                                                                                                        
            <div class="form-group">
                <label for="tanggal_selesai" class="col-lg-2 control-label">Tanggal Selesai</label>
                <div class="col-lg-10">
                    <input type="text" id="tanggal_selesai" class="form-control tanggal_pilih" name="tanggal_selesai" placeholder="Tanggal Selesai" value="<?php echo isset($tanggal_selesai) ? $tanggal_selesai : ""; ?>">
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
                    <button style="width: 100%;" type="submit" class="btn btn-info pull-right bg-light-blue-gradient" name="input_dokumentasi_header" value="Input Dokumentasi Header">Input Dokumentasi Header</button>
                </div>
                <div class="col-lg-6 col-md-6">
                    <button style="width: 100%;" type="button" class="btn btn-default bg-aqua-gradient" onclick="move_url('dokumentasi_header');">Lihat Data</button>
                </div>
            </div>
        </div>
    </form>
</body>
</html>
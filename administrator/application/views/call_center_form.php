<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Call Center Form</title>
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
                <label for="judul_call_center" class="col-lg-2 control-label">Judul Call Center</label>
                <div class="col-lg-10">
                    <input type="text" id="judul_call_center" class="form-control" name="judul_call_center" placeholder="Judul Call Center" value="<?php echo isset($judul_call_center) ? $judul_call_center : ""; ?>">
                </div>
            </div>
                                                                                                                        
            <div class="form-group">
                <label for="nomor_call_center" class="col-lg-2 control-label">Nomor Call Center</label>
                <div class="col-lg-10">
                    <input type="text" id="nomor_call_center" class="form-control" name="nomor_call_center" placeholder="Nomor Call Center" value="<?php echo isset($nomor_call_center) ? $nomor_call_center : ""; ?>">
                </div>
            </div>
                                                                                                                         
            
            <div class="form-group">
                <label for="article_build" class="col-lg-2 control-label">Keterangan</label>
                <div class="col-lg-10">
                    <textarea id="article_build" class="form-control" name="keterangan" placeholder="Keterangan"><?php echo isset($keterangan) ? $keterangan : ""; ?></textarea>
                </div>
            </div>
                                                                                                            
            <div class="box-footer"></div>
            
            <div class="form-group">
                <div class="col-lg-6 col-md-6" style="margin-bottom: 40px;">
                    <button style="width: 100%;" type="submit" class="btn btn-info pull-right bg-light-blue-gradient" name="input_call_center" value="Input Call Center">Input Call Center</button>
                </div>
                <div class="col-lg-6 col-md-6">
                    <button style="width: 100%;" type="button" class="btn btn-default bg-aqua-gradient" onclick="move_url('call_center');">Lihat Data</button>
                </div>
            </div>
        </div>
    </form>
</body>
</html>
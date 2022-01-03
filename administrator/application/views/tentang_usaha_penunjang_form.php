<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Tentang Usaha Penunjang Form</title>
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
                <label for="nama_usaha" class="col-lg-2 control-label">Nama Usaha</label>
                <div class="col-lg-10">
                    <input type="text" id="nama_usaha" class="form-control" name="nama_usaha" placeholder="Nama Usaha" value="<?php echo isset($nama_usaha) ? $nama_usaha : ""; ?>">
                </div>
            </div>
                                                                                                                        
            <div class="form-group">
                <label for="link_usaha" class="col-lg-2 control-label">Link Usaha</label>
                <div class="col-lg-10">
                    <input type="text" id="link_usaha" class="form-control" name="link_usaha" placeholder="Link Usaha" value="<?php echo isset($link_usaha) ? $link_usaha : ""; ?>">
                </div>
            </div>
                                                                                                                        
            <div class="box-footer"></div>
            
            <div class="form-group">
                <div class="col-lg-6 col-md-6" style="margin-bottom: 40px;">
                    <button style="width: 100%;" type="submit" class="btn btn-info pull-right bg-light-blue-gradient" name="input_tentang_usaha_penunjang" value="Input Tentang Usaha Penunjang">Input Tentang Usaha Penunjang</button>
                </div>
                <div class="col-lg-6 col-md-6">
                    <button style="width: 100%;" type="button" class="btn btn-default bg-aqua-gradient" onclick="move_url('tentang_usaha_penunjang');">Lihat Data</button>
                </div>
            </div>
        </div>
    </form>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Video Kategori form</title>
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
    <form class="form-horizontal" method="POST">
        <div class="box-body">
                        
            <div class="form-group">
                <label for="judul_kategori" class="col-lg-2 control-label">Judul Kategori</label>
                <div class="col-lg-10">
                    <input type="text" id="judul_kategori" class="form-control" name="judul_kategori" placeholder="Judul Kategori" value="<?php echo isset($judul_kategori) ? $judul_kategori : ""; ?>">
                </div>
            </div>
            
            
                        
            <div class="box-footer"></div>
            <div class="form-group">
                <div class="col-lg-6 col-md-6" style="margin-bottom: 40px;">
                    <button style="width: 100%;" type="submit" class="btn btn-info pull-right bg-light-blue-gradient" name="input_judul_kategori" value="Input Admin">Input Judul Kategori</button>
                </div>
                <div class="col-lg-6 col-md-6">
                    <button style="width: 100%;" type="button" class="btn btn-default bg-aqua-gradient" onclick="move_url('video_kategori');">Lihat Data</button>
                </div>
            </div>
            
        </div>
    </form>
</body>
</html>




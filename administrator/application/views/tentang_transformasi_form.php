<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Tentang Transformasi Form</title>
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
                                                                        
            <div class="form-group">
                <label for="judul" class="col-lg-2 control-label">Judul</label>
                <div class="col-lg-10">
                    <input type="text" id="judul" class="form-control" name="judul" placeholder="Judul" value="<?php echo isset($judul) ? $judul : ""; ?>">
                </div>
            </div>
                                                                                                                                     
            
            <div class="form-group">
                <label for="article_build" class="col-lg-2 control-label">Isi Transformasi</label>
                <div class="col-lg-10">
                    <textarea id="article_build" class="form-control" name="isi_transformasi" placeholder="Isi Transformasi"><?php echo isset($isi_transformasi) ? $isi_transformasi : ""; ?></textarea>
                </div>
            </div>
                                                                                                                                     
            
            <div class="form-group">
                <label for="status" class="col-lg-2 control-label">Status</label>
                <div class="col-lg-10">
                    <select name="status" id="status" class="form-control">
                        <option value="">PILIH STATUS</option>
                                                
                        <option value="publish" <?php echo isset($status) && $status == 'publish' ? ' selected' : ''; ?>>publish</option>                        
                        <option value="no publish" <?php echo isset($status) && $status == 'no publish' ? ' selected' : ''; ?>>no publish</option>                        
                    </select>
                </div>
            </div>
                                                                                                            
            <div class="box-footer"></div>
            
            <div class="form-group">
                <div class="col-lg-6 col-md-6" style="margin-bottom: 40px;">
                    <button style="width: 100%;" type="submit" class="btn btn-info pull-right bg-light-blue-gradient" name="input_tentang_transformasi" value="Input Tentang Transformasi">Input Tentang Transformasi</button>
                </div>
                <div class="col-lg-6 col-md-6">
                    <button style="width: 100%;" type="button" class="btn btn-default bg-aqua-gradient" onclick="move_url('tentang_transformasi');">Lihat Data</button>
                </div>
            </div>
        </div>
    </form>
    </body>
</html>
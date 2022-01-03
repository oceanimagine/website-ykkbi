<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Tentang Form</title>
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
                <label for="kategori_tentang" class="col-lg-2 control-label">Kategori Tentang</label>
                <div class="col-lg-10">
                    <select name="kategori_tentang" id="kategori_tentang" class="form-control">
                        <option value="">PILIH KATEGORI TENTANG</option>
                                                
                        <option value="kegiatan" <?php echo isset($kategori_tentang) && $kategori_tentang == 'kegiatan' ? ' selected' : ''; ?>>kegiatan</option>                        
                        <option value="pengertian umum" <?php echo isset($kategori_tentang) && $kategori_tentang == 'pengertian umum' ? ' selected' : ''; ?>>pengertian umum</option>                        
                    </select>
                </div>
            </div>
                                                                                                
            <div class="form-group">
                <label for="judul_tentang" class="col-lg-2 control-label">Judul Tentang</label>
                <div class="col-lg-10">
                    <input type="text" id="judul_tentang" class="form-control" name="judul_tentang" placeholder="Judul Tentang" value="<?php echo isset($judul_tentang) ? $judul_tentang : ""; ?>">
                </div>
            </div>
                                                                                                                         
            
            <div class="form-group">
                <label for="article_build" class="col-lg-2 control-label">Isi Tentang</label>
                <div class="col-lg-10">
                    <textarea id="article_build" class="form-control" name="isi_tentang" placeholder="Isi Tentang"><?php echo isset($isi_tentang) ? $isi_tentang : ""; ?></textarea>
                </div>
            </div>
                                                                                                            
            <div class="box-footer"></div>
            
            <div class="form-group">
                <div class="col-lg-6 col-md-6" style="margin-bottom: 40px;">
                    <button style="width: 100%;" type="submit" class="btn btn-info pull-right bg-light-blue-gradient" name="input_tentang" value="Input Tentang">Input Tentang</button>
                </div>
                <div class="col-lg-6 col-md-6">
                    <button style="width: 100%;" type="button" class="btn btn-default bg-aqua-gradient" onclick="move_url('tentang');">Lihat Data</button>
                </div>
            </div>
        </div>
    </form>
</body>
</html>
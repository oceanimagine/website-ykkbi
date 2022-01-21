<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Informasi Lainnya Form</title>
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
                <label for="redaksi" class="col-lg-2 control-label">Redaksi</label>
                <div class="col-lg-10">
                    <input type="text" id="redaksi" class="form-control" name="redaksi" placeholder="Redaksi" value="<?php echo isset($redaksi) ? $redaksi : ""; ?>">
                </div>
            </div>
                                                                                                                                                 
            
            <div class="form-group">
                <label for="jenis" class="col-lg-2 control-label">Jenis</label>
                <div class="col-lg-10">
                    <select name="jenis" id="jenis" class="form-control">
                        <option value="">PILIH JENIS</option>
                        
                        <option value="judul_artikel_terbaru" <?php echo isset($jenis) && $jenis == 'judul_artikel_terbaru' ? ' selected' : ''; ?>>judul_artikel_terbaru</option>
                        <option value="judul_artikel_populer" <?php echo isset($jenis) && $jenis == 'judul_artikel_populer' ? ' selected' : ''; ?>>judul_artikel_populer</option>
                        <option value="judul_video_depan" <?php echo isset($jenis) && $jenis == 'judul_video_depan' ? ' selected' : ''; ?>>judul_video_depan</option>                        
                        <option value="deskripsi_video_depan" <?php echo isset($jenis) && $jenis == 'deskripsi_video_depan' ? ' selected' : ''; ?>>deskripsi_video_depan</option>                        
                        <option value="judul_hubungi_kami_depan" <?php echo isset($jenis) && $jenis == 'judul_hubungi_kami_depan' ? ' selected' : ''; ?>>judul_hubungi_kami_depan</option>                        
                        <option value="alamat" <?php echo isset($jenis) && $jenis == 'alamat' ? ' selected' : ''; ?>>alamat</option>                        
                        <option value="email" <?php echo isset($jenis) && $jenis == 'email' ? ' selected' : ''; ?>>email</option>                        
                        <option value="no_telepon" <?php echo isset($jenis) && $jenis == 'no_telepon' ? ' selected' : ''; ?>>no_telepon</option>                        
                        <option value="judul_pengaduan" <?php echo isset($jenis) && $jenis == 'judul_pengaduan' ? ' selected' : ''; ?>>judul_pengaduan</option>                        
                        <option value="deskripsi_pengaduan" <?php echo isset($jenis) && $jenis == 'deskripsi_pengaduan' ? ' selected' : ''; ?>>deskripsi_pengaduan</option>                        
                    </select>
                </div>
            </div>
                                                                                                            
            <div class="box-footer"></div>
            
            <div class="form-group">
                <div class="col-lg-6 col-md-6" style="margin-bottom: 40px;">
                    <button style="width: 100%;" type="submit" class="btn btn-info pull-right bg-light-blue-gradient" name="input_informasi_lainnya" value="Input Informasi Lainnya">Input Informasi Lainnya</button>
                </div>
                <div class="col-lg-6 col-md-6">
                    <button style="width: 100%;" type="button" class="btn btn-default bg-aqua-gradient" onclick="move_url('informasi_lainnya');">Lihat Data</button>
                </div>
            </div>
        </div>
    </form>
    </body>
</html>
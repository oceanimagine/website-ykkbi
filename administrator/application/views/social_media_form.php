<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Social Media Form</title>
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
                <label for="nama_social_media" class="col-lg-2 control-label">Nama Social Media</label>
                <div class="col-lg-10">
                    <input type="text" id="nama_social_media" class="form-control" name="nama_social_media" placeholder="Nama Social Media" value="<?php echo isset($nama_social_media) ? $nama_social_media : ""; ?>">
                </div>
            </div>
                                                                                                                                                 
            
            <div class="form-group">
                <label for="logo" class="col-lg-2 control-label">Logo</label>
                <div class="col-lg-10">
                    <select name="logo" id="logo" class="form-control">
                        <option value="">PILIH LOGO</option>
                                                
                        <option value="fa-youtube-play" <?php echo isset($logo) && $logo == 'fa-youtube-play' ? ' selected' : ''; ?>>fa-youtube-play</option>                        
                        <option value="fa-instagram" <?php echo isset($logo) && $logo == 'fa-instagram' ? ' selected' : ''; ?>>fa-instagram</option>                        
                        <option value="fa-facebook" <?php echo isset($logo) && $logo == 'fa-facebook' ? ' selected' : ''; ?>>fa-facebook</option>                        
                        <option value="fa-linkedin" <?php echo isset($logo) && $logo == 'fa-linkedin' ? ' selected' : ''; ?>>fa-linkedin</option>                        
                        <option value="fa-pinterest" <?php echo isset($logo) && $logo == 'fa-pinterest' ? ' selected' : ''; ?>>fa-pinterest</option>                        
                        <option value="fa-reddit" <?php echo isset($logo) && $logo == 'fa-reddit' ? ' selected' : ''; ?>>fa-reddit</option>                        
                        <option value="fa-twitter" <?php echo isset($logo) && $logo == 'fa-twitter' ? ' selected' : ''; ?>>fa-twitter</option>                        
                        <option value="fa-youtube" <?php echo isset($logo) && $logo == 'fa-youtube' ? ' selected' : ''; ?>>fa-youtube</option>                        
                    </select>
                </div>
            </div>
                                                                                                            
            <div class="form-group">
                <label for="link" class="col-lg-2 control-label">Link</label>
                <div class="col-lg-10">
                    <input type="text" id="link" class="form-control" name="link" placeholder="Link" value="<?php echo isset($link) ? $link : ""; ?>">
                </div>
            </div>
                                                                                                                                    
            <div class="box-footer"></div>
            
            <div class="form-group">
                <div class="col-lg-6 col-md-6" style="margin-bottom: 40px;">
                    <button style="width: 100%;" type="submit" class="btn btn-info pull-right bg-light-blue-gradient" name="input_social_media" value="Input Social Media">Input Social Media</button>
                </div>
                <div class="col-lg-6 col-md-6">
                    <button style="width: 100%;" type="button" class="btn btn-default bg-aqua-gradient" onclick="move_url('social_media');">Lihat Data</button>
                </div>
            </div>
        </div>
    </form>
    </body>
</html>
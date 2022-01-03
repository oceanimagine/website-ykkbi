<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php echo isset($judul) && $judul != "" ? $judul : ""; ?></title>
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
                <label for="nama_lengkap" class="col-lg-2 control-label">nama lengkap</label>
                <div class="col-lg-10">
                    <input type="text" id="nama_lengkap" class="form-control" name="nama_lengkap" placeholder="nama lengkap" value="<?php echo isset($nama_lengkap) ? $nama_lengkap : ""; ?>">
                </div>
            </div>
            
            <?php show_photo("photo_user_admin", (isset($photo_user_admin) ? $photo_user_admin : "")); ?>
            
            <div class="form-group">
                <label for="nomor_karyawan" class="col-lg-2 control-label">nomor karyawan</label>
                <div class="col-lg-10">
                    <input type="text" id="nomor_karyawan" class="form-control" name="nomor_karyawan" placeholder="nomor karyawan" value="<?php echo isset($nomor_karyawan) ? $nomor_karyawan : ""; ?>">
                </div>
            </div>
            
            <div class="form-group">
                <label for="username" class="col-lg-2 control-label">username</label>
                <div class="col-lg-10">
                    <input type="text" id="username" class="form-control" name="username" placeholder="username" value="<?php echo isset($username) ? $username : ""; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="col-lg-2 control-label">password</label>
                <div class="col-lg-10">
                    <input type="password" id="password" class="form-control" name="password" placeholder="password baru">
                </div>
            </div>
            <?php 
            if(isset($table_menu)){
                ?>
                <div class="form-group">
                    <label for="password" class="col-lg-2 control-label">privilege</label>
                    <div class="col-lg-10">
                        <?php echo $table_menu; ?>
                    </div>
                </div>
                <?php
            }
            ?>
            <div class="box-footer"></div>
            
            <div class="form-group">
                <div class="col-lg-6 col-md-6" style="margin-bottom: 40px;">
                    <button style="width: 100%;" type="submit" class="btn btn-info pull-right bg-light-blue-gradient" name="input_useradmin" value="Input user admin">Input user admin</button>
                </div>
                <div class="col-lg-6 col-md-6">
                    <button style="width: 100%;" type="button" class="btn btn-default bg-aqua-gradient" onclick="move_url('useradmin');">Lihat Data</button>
                </div>
            </div>
        </div>
    </form>
</body>
</html>
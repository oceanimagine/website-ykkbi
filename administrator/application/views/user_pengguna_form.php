<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>User Pengguna Form</title>
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
                <label for="nama_lengkap" class="col-lg-2 control-label">Nama Lengkap</label>
                <div class="col-lg-10">
                    <input type="text" id="nama_lengkap" class="form-control" name="nama_lengkap" placeholder="Nama Lengkap" value="<?php echo isset($nama_lengkap) ? $nama_lengkap : ""; ?>">
                </div>
            </div>
                                                                                                                                     
            
            <div class="form-group">
                <label for="jenis_kelamin" class="col-lg-2 control-label">Jenis Kelamin</label>
                <div class="col-lg-10">
                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                        <option value="">PILIH JENIS KELAMIN</option>
                                                
                        <option value="laki-laki" <?php echo isset($jenis_kelamin) && $jenis_kelamin == 'laki-laki' ? ' selected' : ''; ?>>laki-laki</option>                        
                        <option value="perempuan" <?php echo isset($jenis_kelamin) && $jenis_kelamin == 'perempuan' ? ' selected' : ''; ?>>perempuan</option>                        
                    </select>
                </div>
            </div>
                                                                                                
            <div class="form-group">
                <label for="nomor_telepon" class="col-lg-2 control-label">Nomor Telepon</label>
                <div class="col-lg-10">
                    <input type="text" id="nomor_telepon" class="form-control" name="nomor_telepon" placeholder="Nomor Telepon" value="<?php echo isset($nomor_telepon) ? $nomor_telepon : ""; ?>">
                </div>
            </div>
                                                                                                                        
            <div class="form-group">
                <label for="email" class="col-lg-2 control-label">Email</label>
                <div class="col-lg-10">
                    <input type="email" id="email" class="form-control" name="email" placeholder="Email" value="<?php echo isset($email) ? $email : ""; ?>">
                </div>
            </div>
                                                                                                                         
            
            <div class="form-group">
                <label for="article_build" class="col-lg-2 control-label">Alamat Lengkap</label>
                <div class="col-lg-10">
                    <textarea id="article_build" class="form-control" name="alamat_lengkap" placeholder="Alamat Lengkap"><?php echo isset($alamat_lengkap) ? $alamat_lengkap : ""; ?></textarea>
                </div>
            </div>
                                                                                                                                      
            
            <?php show_photo("photo_user_pengguna", (isset($photo_user_pengguna) ? $photo_user_pengguna : "")); ?> 
            
                                                                                    
            <div class="form-group">
                <label for="username" class="col-lg-2 control-label">Username</label>
                <div class="col-lg-10">
                    <input type="text" id="username" class="form-control" name="username" placeholder="Username" value="<?php echo isset($username) ? $username : ""; ?>">
                </div>
            </div>
                                                                                                                        
            <div class="form-group">
                <label for="password" class="col-lg-2 control-label">Password</label>
                <div class="col-lg-10">
                    <input type="password" id="password" class="form-control" name="password" placeholder="Password" value="<?php echo isset($password) ? $password : ""; ?>">
                </div>
            </div>
                                                                                                                        
            <div class="box-footer"></div>
            
            <div class="form-group">
                <div class="col-lg-6 col-md-6" style="margin-bottom: 40px;">
                    <button style="width: 100%;" type="submit" class="btn btn-info pull-right bg-light-blue-gradient" name="input_user_pengguna" value="Input User Pengguna">Input User Pengguna</button>
                </div>
                <div class="col-lg-6 col-md-6">
                    <button style="width: 100%;" type="button" class="btn btn-default bg-aqua-gradient" onclick="move_url('user_pengguna');">Lihat Data</button>
                </div>
            </div>
        </div>
    </form>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Pengaduan Isi Form</title>
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
                <label for="pengaduan_kategori" class="col-lg-2 control-label">Pengaduan Kategori</label>
                <div class="col-lg-10">
                    <select name="id_pengaduan_kategori" id="pengaduan_kategori" class="form-control">
                        <option value="">PILIH PENGADUAN KATEGORI</option>
                        <?php $get_data = get_data("tbl_pengaduan_kategori",array("id","judul_kategori")); ?>
                        <?php while(mysqli_num_rows($get_data) && $res_data = mysqli_fetch_array($get_data)){ ?>
                            <option value="<?php echo $res_data['id']; ?>"<?php echo isset($id_pengaduan_kategori) && $id_pengaduan_kategori == $res_data['id'] ? " selected" : ""; ?>><?php echo $res_data['judul_kategori']; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
                                                                                                  
            
            <?php show_photo("photo_pengaduan_isi", (isset($photo_pengaduan_isi) ? $photo_pengaduan_isi : "")); ?> 
            
                                                                                    
            <div class="form-group">
                <label for="nama_lengkap" class="col-lg-2 control-label">Nama Lengkap</label>
                <div class="col-lg-10">
                    <input type="text" id="nama_lengkap" class="form-control" name="nama_lengkap" placeholder="Nama Lengkap" value="<?php echo isset($nama_lengkap) ? $nama_lengkap : ""; ?>">
                </div>
            </div>
                                                                                                                        
            <div class="form-group">
                <label for="email" class="col-lg-2 control-label">Email</label>
                <div class="col-lg-10">
                    <input type="email" id="email" class="form-control" name="email" placeholder="Email" value="<?php echo isset($email) ? $email : ""; ?>">
                </div>
            </div>
                                                                                                                        
            <div class="form-group">
                <label for="pesan_pengaduan" class="col-lg-2 control-label">Pesan Pengaduan</label>
                <div class="col-lg-10">
                    <input type="text" id="pesan_pengaduan" class="form-control" name="pesan_pengaduan" placeholder="Pesan Pengaduan" value="<?php echo isset($pesan_pengaduan) ? $pesan_pengaduan : ""; ?>">
                </div>
            </div>
                                                                                                                        
            <div class="box-footer"></div>
            
            <div class="form-group">
                <div class="col-lg-6 col-md-6" style="margin-bottom: 40px;">
                    <button style="width: 100%;" type="submit" class="btn btn-info pull-right bg-light-blue-gradient" name="input_pengaduan_isi" value="Input Pengaduan Isi">Input Pengaduan Isi</button>
                </div>
                <div class="col-lg-6 col-md-6">
                    <button style="width: 100%;" type="button" class="btn btn-default bg-aqua-gradient" onclick="move_url('pengaduan_isi');">Lihat Data</button>
                </div>
            </div>
        </div>
    </form>
</body>
</html>
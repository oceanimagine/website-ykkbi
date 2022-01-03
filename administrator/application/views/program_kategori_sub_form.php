<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Program Kategori Sub Form</title>
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
                <label for="program_kategori_induk" class="col-lg-2 control-label">Program Kategori Induk</label>
                <div class="col-lg-10">
                    <select name="id_program_kategori_induk" id="program_kategori_induk" class="form-control">
                        <option value="">PILIH PROGRAM KATEGORI INDUK</option>
                        <?php $get_data = get_data("tbl_program_kategori_induk",array("id","judul_kategori")); ?>
                        <?php while(mysqli_num_rows($get_data) && $res_data = mysqli_fetch_array($get_data)){ ?>
                            <option value="<?php echo $res_data['id']; ?>"<?php echo isset($id_program_kategori_induk) && $id_program_kategori_induk == $res_data['id'] ? " selected" : ""; ?>><?php echo $res_data['judul_kategori']; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
                                                                        
            <div class="form-group">
                <label for="judul_kategori_sub" class="col-lg-2 control-label">Judul Kategori Sub</label>
                <div class="col-lg-10">
                    <input type="text" id="judul_kategori_sub" class="form-control" name="judul_kategori_sub" placeholder="Judul Kategori Sub" value="<?php echo isset($judul_kategori_sub) ? $judul_kategori_sub : ""; ?>">
                </div>
            </div>
                                                                                                                        
            <div class="box-footer"></div>
            
            <div class="form-group">
                <div class="col-lg-6 col-md-6" style="margin-bottom: 40px;">
                    <button style="width: 100%;" type="submit" class="btn btn-info pull-right bg-light-blue-gradient" name="input_program_kategori_sub" value="Input Program Kategori Sub">Input Program Kategori Sub</button>
                </div>
                <div class="col-lg-6 col-md-6">
                    <button style="width: 100%;" type="button" class="btn btn-default bg-aqua-gradient" onclick="move_url('program_kategori_sub');">Lihat Data</button>
                </div>
            </div>
        </div>
    </form>
</body>
</html>
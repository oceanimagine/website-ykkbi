<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Program Detail Isi Form</title>
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
                <label for="program_daftar_isi" class="col-lg-2 control-label">Program Daftar Isi</label>
                <div class="col-lg-10">
                    <select name="id_program_daftar_isi" id="program_daftar_isi" class="form-control">
                        <option value="">PILIH PROGRAM DAFTAR ISI</option>
                        <?php $get_data = get_data("tbl_program_daftar_isi",array("id","judul_daftar_isi")); ?>
                        <?php while(mysqli_num_rows($get_data) && $res_data = mysqli_fetch_array($get_data)){ ?>
                            <option value="<?php echo $res_data['id']; ?>"<?php echo isset($id_program_daftar_isi) && $id_program_daftar_isi == $res_data['id'] ? " selected" : ""; ?>><?php echo $res_data['judul_daftar_isi']; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
                                                                         
            
            <div class="form-group">
                <label for="article_build" class="col-lg-2 control-label">Isi</label>
                <div class="col-lg-10">
                    <textarea id="article_build" class="form-control" name="isi" placeholder="Isi"><?php echo isset($isi) ? $isi : ""; ?></textarea>
                </div>
            </div>
                                                                                                            
            <div class="box-footer"></div>
            
            <div class="form-group">
                <div class="col-lg-6 col-md-6" style="margin-bottom: 40px;">
                    <button style="width: 100%;" type="submit" class="btn btn-info pull-right bg-light-blue-gradient" name="input_program_detail_isi" value="Input Program Detail Isi">Input Program Detail Isi</button>
                </div>
                <div class="col-lg-6 col-md-6">
                    <button style="width: 100%;" type="button" class="btn btn-default bg-aqua-gradient" onclick="move_url('program_detail_isi');">Lihat Data</button>
                </div>
            </div>
        </div>
    </form>
</body>
</html>
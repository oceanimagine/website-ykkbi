<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Tkht Bantuan Form</title>
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
                <label for="article_build" class="col-lg-2 control-label">Isi Tkht Bantuan</label>
                <div class="col-lg-10">
                    <textarea id="article_build" class="form-control" name="isi_tkht_bantuan" placeholder="Isi Tkht Bantuan"><?php echo isset($isi_tkht_bantuan) ? $isi_tkht_bantuan : ""; ?></textarea>
                </div>
            </div>
                                                                                                                                     
            
            <div class="form-group">
                <label for="tipe_tkht" class="col-lg-2 control-label">Tipe Tkht</label>
                <div class="col-lg-10">
                    <select name="tipe_tkht" id="tipe_tkht" class="form-control">
                        <option value="">PILIH TIPE TKHT</option>
                                                
                        <option value="uang_duka" <?php echo isset($tipe_tkht) && $tipe_tkht == 'uang_duka' ? ' selected' : ''; ?>>uang_duka</option>                        
                        <option value="bencana_alam" <?php echo isset($tipe_tkht) && $tipe_tkht == 'bencana_alam' ? ' selected' : ''; ?>>bencana_alam</option>                        
                        <option value="pendidikan" <?php echo isset($tipe_tkht) && $tipe_tkht == 'pendidikan' ? ' selected' : ''; ?>>pendidikan</option>                        
                        <option value="pinjaman" <?php echo isset($tipe_tkht) && $tipe_tkht == 'pinjaman' ? ' selected' : ''; ?>>pinjaman</option>                        
                    </select>
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
                    <button style="width: 100%;" type="submit" class="btn btn-info pull-right bg-light-blue-gradient" name="input_tkht_bantuan" value="Input Tkht Bantuan">Input Tkht Bantuan</button>
                </div>
                <div class="col-lg-6 col-md-6">
                    <button style="width: 100%;" type="button" class="btn btn-default bg-aqua-gradient" onclick="move_url('tkht_bantuan');">Lihat Data</button>
                </div>
            </div>
        </div>
    </form>
    </body>
</html>
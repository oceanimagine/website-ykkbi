<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Artikel List form</title>
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
                <label for="judul_artikel" class="col-lg-2 control-label">Judul Artikel</label>
                <div class="col-lg-10">
                    <input type="text" id="judul_artikel" class="form-control" name="judul_artikel" placeholder="Judul Artikel" value="<?php echo isset($judul_artikel) ? $judul_artikel : ""; ?>">
                </div>
            </div>
            
            <?php show_photo("photo_artikel", (isset($photo_artikel) ? $photo_artikel : "")); ?>
            
            <div class="form-group">
                <label for="id_kategori" class="col-lg-2 control-label">Kategori Artikel</label>
                <div class="col-lg-10">
                    <select name="id_kategori" id="id_kategori" class="form-control">
                        <option value="">PILIH KATEGORI</option>
                        <?php 
                        
                        foreach($list_kategori as $list){
                            $selected = isset($id_kategori) && $id_kategori == $list->id ? " selected='selected'" : "";
                            echo "<option value='".$list->id."'".$selected.">".$list->judul_kategori."</option>\n";
                        }
                        
                        ?>
                    </select>
                </div>
            </div>
            
            <div class="form-group">
                <label for="artcle_build" class="col-lg-2 control-label">Isi Artikel</label>
                <div class="col-lg-10">
                    <textarea id="article_build" class="form-control" name="isi_artikel" placeholder="Isi Artikel"><?php echo isset($isi_artikel) ? $isi_artikel : ""; ?></textarea>
                </div>
            </div>
            
            <script type="text/javascript">
            
            var mulai_label = Number("<?php echo isset($list_label) ? sizeof($list_label) : 1; ?>");
            var mulai_tag = Number("<?php echo isset($list_tag) ? sizeof($list_tag) : 1; ?>");
            
            </script>
            <div class="form-group">
                <label for="Label_1" class="col-lg-2 control-label">Label (<font style="color: blue; cursor: pointer;" onclick="tambah_input('container-label','Label','mulai_label');">add label</font>)</label>
                <div class="col-lg-10" id="container-label">
                    <div>
                        <input type="text" id="Label_1" class="form-control" name="Label_1" placeholder="Label ke 1" value="<?php echo isset($list_label) && sizeof($list_label) > 0  ? $list_label[0]->nama_label : ""; ?>">
                    </div>
                    <?php 
                    
                    if(isset($list_label) && sizeof($list_label) > 0){
                        for($i = 1; $i < sizeof($list_label); $i++){
                            ?>
                            <div id="div_Label_<?php echo ($i + 1) ?>" style="margin-top: 8px;">
                                <table style="width: 100%;">
                                    <tr>
                                        <td style="width: 95%;">
                                            <input value="<?php echo $list_label[$i]->nama_label; ?>" type="text" id="Label_<?php echo ($i + 1); ?>" class="form-control" name="Label_<?php echo ($i + 1); ?>" placeholder="Label ke <?php echo ($i + 1); ?>">
                                        </td>
                                        <td style="width: 5%;">
                                            <button style="width: 100%; border-radius: 0px;" type="button" class="btn btn-info pull-right bg-light-blue-gradient" onclick="remove_input('container-label', 'Label', 'mulai_label', <?php echo ($i + 1); ?>);"><i class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>
                                </table>

                            </div>
                            <?php
                        }
                    }
                    
                    ?>
                </div>
            </div>
            
            <div class="form-group">
                <label for=Tag_1" class="col-lg-2 control-label">Tag (<font style="color: blue; cursor: pointer;" onclick="tambah_input('container-tag','Tag','mulai_tag');">add tag</font>)</label>
                <div class="col-lg-10" id="container-tag">
                    <div>
                        <input type="text" id="Tag_1" class="form-control" name="Tag_1" placeholder="Tag ke 1" value="<?php echo isset($list_tag) && sizeof($list_tag) > 0 ? $list_tag[0]->nama_tag : ""; ?>">
                    </div>
                    <?php 
                    
                    if(isset($list_tag) && sizeof($list_tag) > 0){
                        for($i = 1; $i < sizeof($list_tag); $i++){
                            ?>
                            <div id="div_Tag_<?php echo ($i + 1) ?>" style="margin-top: 8px;">
                                <table style="width: 100%;">
                                    <tr>
                                        <td style="width: 95%;">
                                            <input value="<?php echo $list_tag[$i]->nama_tag; ?>" type="text" id="Tag_<?php echo ($i + 1); ?>" class="form-control" name="Tag_<?php echo ($i + 1); ?>" placeholder="Tag ke <?php echo ($i + 1); ?>">
                                        </td>
                                        <td style="width: 5%;">
                                            <button style="width: 100%; border-radius: 0px;" type="button" class="btn btn-info pull-right bg-light-blue-gradient" onclick="remove_input('container-tag', 'Tag', 'mulai_tag', <?php echo ($i + 1); ?>);"><i class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>
                                </table>

                            </div>
                            <?php
                        }
                    }
                    
                    ?>
                </div>
                
            </div>
                        
            <div class="box-footer"></div>
            <div class="form-group">
                <div class="col-lg-6 col-md-6" style="margin-bottom: 40px;">
                    <button style="width: 100%;" type="submit" class="btn btn-info pull-right bg-light-blue-gradient" name="input_artikel" value="Input Artikel">Input Artikel</button>
                </div>
                <div class="col-lg-6 col-md-6">
                    <button style="width: 100%;" type="button" class="btn btn-default bg-aqua-gradient" onclick="move_url('artikel_list');">Lihat Data</button>
                </div>
            </div>
            
        </div>
    </form>
    
</body>
</html>




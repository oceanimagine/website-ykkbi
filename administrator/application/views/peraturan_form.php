<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Peraturan Form</title>
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
    <form class="form-horizontal" method="POST" enctype="multipart/form-data" id="form_google_drive_peraturan">
        <div class="box-body">
                                                                        
            <div class="form-group">
                <label for="judul_peraturan" class="col-lg-2 control-label">Judul Peraturan</label>
                <div class="col-lg-10">
                    <input type="text" id="judul_peraturan" class="form-control" name="judul_peraturan" placeholder="Judul Peraturan" value="<?php echo isset($judul_peraturan) ? $judul_peraturan : ""; ?>">
                </div>
            </div>
                                                                                                                                     
            
            <div class="form-group">
                <label for="article_build" class="col-lg-2 control-label">Google Drive Pdf</label>
                <div class="col-lg-10">
                    <input type="text" id="google_drive_pdf" class="form-control" name="google_drive_pdf" placeholder="Link Google Drive Pdf" value="<?php echo isset($google_drive_pdf) ? $google_drive_pdf : ""; ?>">
                </div>
            </div>
            
            <div class="form-group">
                <label for="status" class="col-lg-2 control-label">Status</label>
                <div class="col-lg-10">
                    <select name="status" id="status" class="form-control">
                        <?php if($jumlah_publish == 0 || (isset($id_data) && isset($id_edit) && $id_data == $id_edit)){ ?>
                        <option value="">PILIH STATUS</option>
                                                
                        <option value="publish" <?php echo isset($status) && $status == 'publish' ? ' selected' : ''; ?>>publish</option>                        
                        <option value="no publish" <?php echo isset($status) && $status == 'no publish' ? ' selected' : ''; ?>>no publish</option>      
                        <?php } else { ?>
                        <option value="no publish">no publish</option>   
                        <?php } ?>
                    </select>
                </div>
            </div>
                                                                                                                        
            <div class="box-footer"></div>
            
            <div class="form-group">
                <div class="col-lg-6 col-md-6" style="margin-bottom: 40px;">
                    <button style="width: 100%;" type="submit" class="btn btn-info pull-right bg-light-blue-gradient" name="input_peraturan" id="input_peraturan" value="Input Peraturan">Input Peraturan</button>
                </div>
                <div class="col-lg-6 col-md-6">
                    <button style="width: 100%;" type="button" class="btn btn-default bg-aqua-gradient" onclick="move_url('peraturan');">Lihat Data</button>
                </div>
            </div>
        </div>
    </form>
    <script type="text/javascript">
        var form_google_drive_peraturan = document.getElementById("form_google_drive_peraturan");
        form_google_drive_peraturan.onsubmit = function(e){
            e.preventDefault();
            var google_drive_pdf = document.getElementById("google_drive_pdf");
            if(google_drive_pdf.value === ""){
                var pesan_modal = document.getElementById("pesan_modal");
                pesan_modal.innerHTML = "Link Google Drive Tidak Boleh Kosong.";
                $('#modal-success').modal('show');
            } else {
                if(google_drive_pdf.value.substr(0,"https://drive.google.com/file/d/".length) !== "https://drive.google.com/file/d/"){
                    var pesan_modal = document.getElementById("pesan_modal");
                    pesan_modal.innerHTML = "Link Google Drive Salah.<br /><br />Berikut Contoh yang Benar : <br /><font style='font-size: 11px; color: blue;'><b>https://drive.google.com/file/d/1tVXy_uv0Ry4RaZ7XAn0U2REsHQcNTuIG/preview</b></font><br /><br />Ikuti Link Berikut Untuk Mekanismenya :<br /><a href='https://www.steegle.com/websites/google-sites-howtos/embed-drive-pdf' style='text-decoration: none; font-size: 11px;' target='_blank'>Klik Disini.</a>";
                    $('#modal-success').modal('show');
                }
                else if(google_drive_pdf.value.substr(0,"https://drive.google.com/file/d/".length) === "https://drive.google.com/file/d/"){
                    var split_link = google_drive_pdf.value.substring("https://".length).split("/");
                    var validate_link = 0;
                    if(split_link.length === 5){
                        if(split_link[split_link.length - 2] === ""){
                            var pesan_modal = document.getElementById("pesan_modal");
                            pesan_modal.innerHTML = "Link Google Drive masih Salah pastikan ujung link adalah <b>preview</b>.<br /><br />Berikut Contoh yang Benar : <br /><font style='font-size: 11px; color: blue;'><b>https://drive.google.com/file/d/1tVXy_uv0Ry4RaZ7XAn0U2REsHQcNTuIG/preview</b></font>";
                            $('#modal-success').modal('show');
                        }
                        else if(split_link[split_link.length - 1] !== "preview"){
                            var pesan_modal = document.getElementById("pesan_modal");
                            pesan_modal.innerHTML = "Link Google Drive masih Salah pastikan ujung link adalah <b>preview</b>.<br /><br />Berikut Contoh yang Benar : <br /><font style='font-size: 11px; color: blue;'><b>https://drive.google.com/file/d/1tVXy_uv0Ry4RaZ7XAn0U2REsHQcNTuIG/preview</b></font>";
                            $('#modal-success').modal('show');
                        } else {
                            validate_link = 1;
                        }
                    } else {
                        var pesan_modal = document.getElementById("pesan_modal");
                        pesan_modal.innerHTML = "Link Google Drive masih Salah pastikan urutan link benar.<br /><br />Berikut Contoh yang Benar : <br /><font style='font-size: 11px; color: blue;'><b>https://drive.google.com/file/d/1tVXy_uv0Ry4RaZ7XAn0U2REsHQcNTuIG/preview</b></font>";
                        $('#modal-success').modal('show');
                    }
                    if(validate_link){
                        var input_peraturan = document.getElementById("input_peraturan");
                        input_peraturan.innerHTML = "Proses....";
                        input_peraturan.style.opacity = "0.5";
                        input_peraturan.setAttribute("disabled", "");
                        this.submit();
                    }
                }
            }
        };
    </script>
    </body>
</html>
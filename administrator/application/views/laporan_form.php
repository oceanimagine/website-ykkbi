<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Laporan Form</title>
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
    <form class="form-horizontal" method="POST" enctype="multipart/form-data" id="form_google_drive_laporan">
        <div class="box-body">
                                                                        
            <div class="form-group">
                <label for="judul_laporan" class="col-lg-2 control-label">Judul Laporan</label>
                <div class="col-lg-10">
                    <input type="text" id="judul_laporan" class="form-control" name="judul_laporan" placeholder="Judul Laporan" value="<?php echo isset($judul_laporan) ? $judul_laporan : ""; ?>">
                </div>
            </div>
                                                                                                                                    
            <div class="form-group">
                <label for="google_drive_pdf" class="col-lg-2 control-label">Google Drive Pdf</label>
                <div class="col-lg-10">
                    <input type="text" id="google_drive_pdf" class="form-control" name="google_drive_pdf" placeholder="Google Drive Pdf" value="<?php echo isset($google_drive_pdf) ? $google_drive_pdf : ""; ?>">
                </div>
            </div>
                                                                                                                                    
            <div class="box-footer"></div>
            
            <div class="form-group">
                <div class="col-lg-6 col-md-6" style="margin-bottom: 40px;">
                    <button style="width: 100%;" type="submit" class="btn btn-info pull-right bg-light-blue-gradient" name="input_laporan" id="input_laporan" value="Input Laporan">Input Laporan</button>
                </div>
                <div class="col-lg-6 col-md-6">
                    <button style="width: 100%;" type="button" class="btn btn-default bg-aqua-gradient" onclick="move_url('laporan');">Lihat Data</button>
                </div>
            </div>
        </div>
    </form>
    
    <script type="text/javascript">
        var form_google_drive_laporan = document.getElementById("form_google_drive_laporan");
        form_google_drive_laporan.onsubmit = function(e){
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
                        var input_laporan = document.getElementById("input_laporan");
                        input_laporan.innerHTML = "Proses....";
                        input_laporan.style.opacity = "0.5";
                        input_laporan.setAttribute("disabled", "");
                        this.submit();
                    }
                }
            }
        };
    </script>
    </body>
</html>
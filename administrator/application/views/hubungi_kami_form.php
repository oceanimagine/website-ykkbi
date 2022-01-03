<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Hubungi Kami Form</title>
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
                <label for="nama_lengkap_pengirim" class="col-lg-2 control-label">Nama Lengkap Pengirim</label>
                <div class="col-lg-10">
                    <input type="text" id="nama_lengkap_pengirim" class="form-control" name="nama_lengkap_pengirim" placeholder="Nama Lengkap Pengirim" value="<?php echo isset($nama_lengkap_pengirim) ? $nama_lengkap_pengirim : ""; ?>">
                </div>
            </div>
                                                                                                                                    
            <div class="form-group">
                <label for="email_pengirim" class="col-lg-2 control-label">Email Pengirim</label>
                <div class="col-lg-10">
                    <input type="email" id="email_pengirim" class="form-control" name="email_pengirim" placeholder="Email Pengirim" value="<?php echo isset($email_pengirim) ? $email_pengirim : ""; ?>">
                </div>
            </div>
                                                                                                                                    
            <div class="form-group">
                <label for="isi_pesan_pengirim" class="col-lg-2 control-label">Isi Pesan Pengirim</label>
                <div class="col-lg-10">
                    <input type="text" id="isi_pesan_pengirim" class="form-control" name="isi_pesan_pengirim" placeholder="Isi Pesan Pengirim" value="<?php echo isset($isi_pesan_pengirim) ? $isi_pesan_pengirim : ""; ?>">
                </div>
            </div>
                                                                                                                                    
            <div class="box-footer"></div>
            
            <div class="form-group">
                <div class="col-lg-6 col-md-6" style="margin-bottom: 40px;">
                    <button style="width: 100%;" type="submit" class="btn btn-info pull-right bg-light-blue-gradient" name="input_hubungi_kami" value="Input Hubungi Kami">Input Hubungi Kami</button>
                </div>
                <div class="col-lg-6 col-md-6">
                    <button style="width: 100%;" type="button" class="btn btn-default bg-aqua-gradient" onclick="move_url('hubungi_kami');">Lihat Data</button>
                </div>
            </div>
        </div>
    </form>
    </body>
</html>
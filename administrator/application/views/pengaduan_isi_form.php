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
            
            <?php if(isset($laporan_no)){ ?>
            <div class="form-group">
                <label for="laporan_no" class="col-lg-2 control-label">No Laporan</label>
                <div class="col-lg-10">
                    <input disabled="" type="text" id="laporan_no" class="form-control" name="laporan_no" placeholder="Nomor Pelapor" value="<?php echo isset($laporan_no) ? $laporan_no : ""; ?>">
                </div>
            </div>
            <?php } ?>
            
            <div class="form-group">
                <label for="nama_pelapor" class="col-lg-2 control-label">Nama Pelapor</label>
                <div class="col-lg-10">
                    <input type="text" id="nama_pelapor" class="form-control" name="nama_pelapor" placeholder="Nama Pelapor" value="<?php echo isset($pelapor_nama) ? $pelapor_nama : ""; ?>">
                </div>
            </div>
                                                                                                                        
            <div class="form-group">
                <label for="nomor_telepon" class="col-lg-2 control-label">Nomor Telepon</label>
                <div class="col-lg-10">
                    <input type="text" id="nomor_telepon" class="form-control" name="nomor_telepon" placeholder="Nomor Telepon" value="<?php echo isset($pelapor_tlp) ? $pelapor_tlp : ""; ?>">
                </div>
            </div>
                                                                                                                        
            <div class="form-group">
                <label for="alamat_email" class="col-lg-2 control-label">Alamat Email</label>
                <div class="col-lg-10">
                    <input type="email" id="alamat_email" class="form-control" name="alamat_email" placeholder="Alamat Email" value="<?php echo isset($pelapor_email) ? $pelapor_email : ""; ?>">
                </div>
            </div>
            
            <div class="form-group">
                <label for="nama_dilaporkan" class="col-lg-2 control-label">Nama Dilaporkan</label>
                <div class="col-lg-10">
                    <input type="text" id="nama_dilaporkan" class="form-control" name="nama_dilaporkan" placeholder="Nama Dilaporkan" value="<?php echo isset($dilaporkan_nama) ? $dilaporkan_nama : ""; ?>">
                </div>
            </div>
            
            <div class="form-group">
                <label for="pelanggaran_dilaporkan" class="col-lg-2 control-label">Pelanggaran Dilaporkan</label>
                <div class="col-lg-10">
                    <input type="text" id="pelanggaran_dilaporkan" class="form-control" name="pelanggaran_dilaporkan" placeholder="Pelanggaran Dilaporkan" value="<?php echo isset($dilaporkan_pelanggaran) ? $dilaporkan_pelanggaran : ""; ?>">
                </div>
            </div>
            
            <div class="form-group">
                <label for="tanggal_kejadian" class="col-lg-2 control-label">Tanggal Kejadian</label>
                <div class="col-lg-10">
                    <input type="text" id="tanggal_kejadian" class="form-control tanggal_pilih" name="tanggal_kejadian" placeholder="Tanggal Kejadian" value="<?php echo isset($kejadian_tgl) ? $kejadian_tgl : ""; ?>">
                </div>
            </div>
            
            <div class="form-group">
                <label for="lokasi_kejadian" class="col-lg-2 control-label">Lokasi Kejadian</label>
                <div class="col-lg-10">
                    <input type="text" id="lokasi_kejadian" class="form-control" name="lokasi_kejadian" placeholder="Lokasi Kejadian" value="<?php echo isset($kejadian_lokasi) ? $kejadian_lokasi : ""; ?>">
                </div>
            </div>
            
            <?php show_photo("photo_pengaduan_isi", (isset($kejadian_bukti) ? $kejadian_bukti : "")); ?> 
            
                                                                                    
            
                                                                                                                        
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
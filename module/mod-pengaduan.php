<div class="container" style="padding-right: 0px; padding-left: 0px; min-height: 80vh;">
    <div class="row" style="margin-right: 0px; margin-left: 0px; min-height: 80vh;">
        <div class="col-md-12 col-sm-12 col-xs-12" style="padding-right: 0px; padding-left: 0px;">
            <div style=" width: 100%; height: 100%; background-color: #f1f1f1; padding: 0.01em 16px; border-radius: 4px; margin-left: auto; margin-right: auto; padding-top: 15px; padding-bottom: 15px; box-shadow: 0 4px 14.48px rgb(0 0 0 / 25%);">
                <div class="header_article" style="background-color: #3b3c8c; width: 100%; padding: 8px 16px; border-radius: 4px;">
                    <h3 style='color: white; margin-bottom: 2px; text-align: center;'>Pengaduan</h3>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div style="width: 100%; margin-top: 15px;">
                            <h5>Silahkan Isi Pengaduan</h5>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-12 contact-left">
                        <h2><?php echo $judul_pengaduan; ?></h2>
                        <ul class="list-unstyled">
                            <li> 
                                <p><?php echo $deskripsi_pengaduan; ?></p><br />
                            </li>
                            <li><a href="tel:<?php echo str_replace(array(" ","(",")"), "", $no_telepon); ?>"><?php echo $no_telepon; ?></a>
                            </li>
                            <li><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-12 contact-right">
                        <form id="form-pengaduan" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <input id="nama_pelapor" type="text" class="form-control" placeholder="Masukkan Nama Pelapor">
                                <div class="ntf_err err_name text-danger"></div>
                            </div><!-- 
                            <hr style="margin-bottom: 14px; margin-top: 14px; margin-right: 4px; margin-left: 4px; border-color: #c2bfbf70;" /> -->
                            <div class="form-group">
                                <input id="nomor_telepon" type="text" class="form-control" placeholder="Nomor Telepon">
                                <div class="ntf_err err_email text-danger"></div>
                            </div>
                            
                            <div class="form-group">
                                <input id="alamat_email" type="text" class="form-control" placeholder="Alamat Email">
                                <div class="ntf_err err_email text-danger"></div>
                            </div>
                            
                            <div class="form-group">
                                <input id="nama_dilaporkan" type="text" class="form-control" placeholder="Nama Yang Dilaporkan">
                                <div class="ntf_err err_email text-danger"></div>
                            </div>
                            
                            <div class="form-group">
                                <textarea name="pelanggaran_dilaporkan" id="pelanggaran_dilaporkan" cols="30" rows="10" class="form-control" placeholder="Pelanggaran Yang Dilaporkan"></textarea>
                                <div class="ntf_err err_email text-danger"></div>
                            </div>
                            
                            <div class="form-group">
                                <input id="tanggal_kejadian" type="text" class="form-control tanggal_pilih" placeholder="Tanggal Kejadian">
                                <div class="ntf_err err_email text-danger"></div>
                            </div>
                            
                            <div class="form-group">
                                <input id="lokasi_kejadian" type="text" class="form-control" placeholder="Lokasi Kejadian">
                                <div class="ntf_err err_email text-danger"></div>
                            </div>
                            
                            <div class="form-group" id="tempat_gambar" style="display: none;">
                                <img id="tag_gambar" src="" style="width: 100%; border-radius: 1rem;">
                            </div>
                            
                            <div class="form-group" id="tempat_nama_dokumen" style="display: none;">
                                <label class="form-control" style="white-space: nowrap; overflow: hidden;">Nama File</label>
                            </div>
                            
                            <div class="form-group">
                                <label class="form-control" for="file_bukti" style="white-space: nowrap; overflow: hidden;">Upload Dokumen Bukti Berupa Photo atau PDF</label>
                                <input id="file_bukti" name="file_bukti" type="file" style="display: none;" onchange="readURL(this);" accept="image/png, image/jpeg, application/pdf" />
                            </div>
                            
                            <div class="form-group">
                                <div class="d-flex">
                                    <div class="mr-1" id="captchaImage" style="padding-top: 2px;"><img src="captcha" id="tempat_captcha" /></div>
                                    <div class="mr-2" style="padding-top: 5px;">
                                        <a href="javascript: refresh_captcha();">
                                            <i class="fa fa-refresh" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                    <input id="kodeCaptchaContactUs" type="hidden" value="msk9p"
                                           autocomplete="off">
                                    <div class="d-flex flex-column w-100">
                                        <input id="captchaContactUs" type="text" class="form-control" placeholder="Masukan kode captcha">
                                        <div class="ntf_err err_captchaContactUs text-danger"></div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group text-center ">
                                <button class="btn btn-theme position-relative" style="width: 100%; padding: 10px">
                                    KIRIM ADUAN
                                    <div id="spinnerContactUs"
                                         style="display:none;position:absolute;right:5px;bottom:8px;width:1.5rem;height:1.5rem;"
                                         class="spinner-border text-light" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

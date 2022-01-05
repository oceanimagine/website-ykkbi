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
                        <h2>adukan ke kami</h2>
                        <ul class="list-unstyled">
                            <li> 
                                <p style="text-align: justify;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                            </li>
                            <li><a href="tel:02183795333">(021) 83795333</a>
                            </li>
                            <li><a href="mailto:info@yakestelkom.or.id">info@ykkbi.or.id</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-12 contact-right">
                        <form id="contact-us">
                            <div class="form-group">
                                <input id="name" type="text" class="form-control" placeholder="Masukan Nama">
                                <div class="ntf_err err_name text-danger"></div>
                            </div>
                            <div class="form-group">
                                <input id="emailContactUs" type="text" class="form-control" placeholder="Masukan Email">
                                <div class="ntf_err err_email text-danger"></div>
                            </div>
                            <div class="form-group">
                                <label class="form-control" for="file_bukti">Upload File Bukti</label>
                                <input id="file_bukti" name="file_bukti" type="file" style="display: none;" />
                            </div>
                            <div class="form-group">
                                <textarea name="message" id="message" cols="30" rows="10" class="form-control" placeholder="Tulis Pesanmu"></textarea>
                                <div class="ntf_err err_message text-danger"></div>
                            </div>
                            <div class="form-group">
                                <div class="d-flex">
                                    <div class="mr-1" id="captchaImage" style="padding-top: 5px;"><img src="assets/img/IMAGECAPTCHA.jpg" /></div>
                                    <div class="mr-2" style="padding-top: 5px;">
                                        <a href="" id="refreshCaptchaContactUs">
                                            <i class="fa fa-refresh" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                    <input id="kodeCaptchaContactUs" type="hidden" value="msk9p"
                                           autocomplete="off">
                                    <div class="d-flex flex-column w-100">
                                        <input id="captchaContactUs" type="text" class="form-control"
                                               placeholder="Masukan kode captcha">
                                        <div class="ntf_err err_captchaContactUs text-danger"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group text-center ">
                                <button class="btn btn-theme position-relative">
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
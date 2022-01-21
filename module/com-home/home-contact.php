<section id="contact" style="position: relative; z-index: 99;">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12 contact-left">
                <h2><?php echo $judul_hubungi_kami_depan; ?></h2>
                <ul class="list-unstyled">
                    <li><?php echo $alamat; ?>
                    </li>
                    <li style="margin-bottom: 8px;"><a href="tel:<?php echo str_replace(array(" ","(",")"), "", $no_telepon); ?>"><?php echo $no_telepon; ?></a>
                    </li>
                    <li><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
                    </li>
                </ul>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 contact-right">
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
                        <textarea name="message" id="message" cols="30" rows="10" class="form-control"
                                  placeholder="Tulis Pesanmu"></textarea>
                        <div class="ntf_err err_message text-danger"></div>
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
                                <input id="captchaContactUs" type="text" class="form-control"
                                       placeholder="Masukan kode captcha">
                                <div class="ntf_err err_captchaContactUs text-danger"></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-center ">
                        <button class="btn btn-theme position-relative" style="width: 100%; padding: 10px">
                            KIRIM PESAN
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
</section>
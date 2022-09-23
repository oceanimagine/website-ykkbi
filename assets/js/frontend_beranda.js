$(document).ready(function() {
    $("#btn-subscribe").click(function() {
        $("#btn-subscribe").addClass("disabled btn-progress"), $("#subscribe .ntf_err").text(""), $("#spinnerSubscriber").show("fast");
        var a = $("#subscribe #email").val(),
            t = $("#subscribe #kodeCaptchaSubscriber").val(),
            e = $("#subscribe #captchaSubscriber").val(),
            c = new FormData;
        c.append("email", a), c.append("kodeCaptchaSubscriber", t), c.append("captchaSubscriber", e), $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            }
        }), $.ajax({
            url: "kirim-subscribe",
            method: "post",
            data: c,
            type: "post",
            cache: !1,
            contentType: !1,
            processData: !1,
            dataType: "json"
        }).done(function(a) {
            $("#subscribe #email").val(""), $("#subscribe #captchaSubscriber").val(""), $("#btn-subscribe").removeClass("disabled"), $("#spinnerSubscriber").hide("fast"), $("#subscribe #captchaImage").html(a.captcha.capImageSubscriber), $("#subscribe #kodeCaptchaSubscriber").val(a.captcha.kodeCaptchaSubscriber), $("#alert-success-subscriber").show("fast"), setTimeout(function() {
                $("#alert-success-subscriber").hide("fast")
            }, 3e3)
        }).fail(function(a) {
            $("#spinnerSubscriber").hide("fast"), $("#btn-subscribe").removeClass("disabled"), $.each(a.responseJSON.data, function(a, t) {
                $("#subscribe .ntf_err.err_" + a).text(t)
            })
        }).always(function() {})
    });
    $("#contact-us").submit(function(a) {
        a.preventDefault(), $("#contact-us .btn-theme").addClass("disabled"), $("#contact-us .ntf_err").text(""), $("#spinnerContactUs").show("fast");
        var t = $("#contact-us #name").val(),
            e = $("#contact-us #emailContactUs").val(),
            c = $("#contact-us #message").val(),
            s = $("#contact-us #kodeCaptchaContactUs").val(),
            n = $("#contact-us #captchaContactUs").val(),
            o = new FormData;
        o.append("name", t), 
        o.append("email", e), 
        o.append("message", c), 
        o.append("kodeCaptchaContactUs", s), 
        o.append("captchaContactUs", n), 
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            }
        }), $.ajax({
            url: "kirim-pesan",
            method: "post",
            data: o,
            type: "post",
            cache: !1,
            contentType: !1,
            processData: !1,
            dataType: "json"
        }).done(function(a) {
            // $("#contact-us #captchaImage").html(a.captcha.capImageContactUs), 
            // $("#contact-us #kodeCaptchaContactUs").val(a.captcha.kodeCaptchaContactUs), 
            // console.log(a);
            var alert_heading_id = document.getElementById("alert-heading-id");
            var message_success = document.getElementById("message-success-pesan");
            if(a.return !== "success insert"){
                
                alert_heading_id.innerHTML = "Mohon Maaf";
                message_success.innerHTML = a.return;
            } else {
                $("#contact-us #name").val(""), 
                $("#contact-us #emailContactUs").val(""), 
                $("#contact-us #message").val(""), 
                $("#contact-us #captchaContactUs").val("");
                
            }
            $("#contact-us .btn-theme").removeClass("disabled"), 
            $("#spinnerContactUs").hide("fast");   
            $("#alert-success-contact-us").show("fast"), 
            setTimeout(function() {
                $("#alert-success-contact-us").hide("fast");
                setTimeout(function(){
                    alert_heading_id.innerHTML = "Terima kasih!";
                    message_success.innerHTML = "Pesan Anda telah terkirim.";
                }, 500);
            }, 3e3);
        }).fail(function(a) {
            console.log(a);
            $("#spinnerContactUs").hide("fast");
            $("#contact-us .btn-theme").removeClass("disabled"); 
            /*
            $.each(a.responseJSON.data, function(a, t) {
                $("#contact-us .ntf_err.err_" + a).text(t)
            }) */
        }).always(function() {})
    }); 
    $("#form-pengaduan").submit(function(a) {
        a.preventDefault(), $("#form-pengaduan .btn-theme").addClass("disabled"), $("#form-pengaduan .ntf_err").text(""), $("#spinnerContactUs").show("fast");
        var t = $("#form-pengaduan #name").val(),
            e = $("#form-pengaduan #emailContactUs").val(),
            c = $("#form-pengaduan #message").val(),
            n = $("#form-pengaduan #captchaContactUs").val(),
            k = $("#form-pengaduan #kategoriPengaduan").val(),
            o = new FormData;
            o.append("name", t), 
            o.append("email", e), 
            o.append("message", c),
            o.append("captchaContactUs", n),
            o.append("kategoriPengaduan", k),
            o.append('image', $('#form-pengaduan #file_bukti')[0].files[0]);
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                }
            }), $.ajax({
                url: "kirim-pengaduan",
                method: "post",
                data: o,
                type: "post",
                cache: !1,
                contentType: !1,
                processData: !1,
                dataType: "json"
            }).done(function(a) {
                var alert_success_pengaduan_heading_id = document.getElementById("alert-heading-id");
                var message_success_pengaduan_success_pesan = document.getElementById("message-success-pesan");
                if(a.return !== "success insert"){
                    alert_success_pengaduan_heading_id.innerHTML = "Mohon Maaf";
                    message_success_pengaduan_success_pesan.innerHTML = a.return;
                } else {
                    $("#form-pengaduan #name").val(""),
                    $("#form-pengaduan #emailContactUs").val(""),
                    $("#form-pengaduan #message").val(""),
                    $("#form-pengaduan #captchaContactUs").val(""),
                    $('#form-pengaduan #file_bukti').val(""),
                    $("#form-pengaduan #kategoriPengaduan").val("");
                    var tempat_gambar = document.getElementById("tempat_gambar");
                    var tag_gambar = document.getElementById("tag_gambar");
                    tempat_gambar.style.display = "none";
                    tag_gambar.src = "";
                }
                $("#form-pengaduan .btn-theme").removeClass("disabled"), 
                $("#form-pengaduan #spinnerContactUs").hide("fast");   
                $("#alert-success-contact-us").show("fast"), 
                setTimeout(function() {
                    $("#alert-success-contact-us").hide("fast");
                    setTimeout(function(){
                        alert_success_pengaduan_heading_id.innerHTML = "Terima kasih!";
                        message_success_pengaduan_success_pesan.innerHTML = "Pengaduan Anda telah terkirim.";
                    }, 500);
                }, 3e3);
            }).fail(function(a) {
                console.log(a);
                $("#form-pengaduan #spinnerContactUs").hide("fast");
                $("#form-pengaduan .btn-theme").removeClass("disabled"); 
            });
    });
    $("#refreshCaptchaSubscriber").click(function(a) {
        a.preventDefault(), $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            }
        }), $.ajax({
            url: linkRefreshCaptcha,
            method: "post",
            type: "post",
            cache: !1,
            contentType: !1,
            processData: !1,
            dataType: "json"
        }).done(function(a) {
            $("#subscribe #captchaImage").html(a.captcha.refreshCapImage), $("#subscribe #kodeCaptchaSubscriber").val(a.captcha.refreshKodeCaptcha)
        }).fail(function(a) {}).always(function() {})
    }); 
    $("#refreshCaptchaContactUs").click(function(a) {
        a.preventDefault(), $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            }
        }), $.ajax({
            url: linkRefreshCaptcha,
            method: "post",
            type: "post",
            cache: !1,
            contentType: !1,
            processData: !1,
            dataType: "json"
        }).done(function(a) {
            $("#contact-us #captchaImage").html(a.captcha.refreshCapImage), $("#contact-us #kodeCaptchaContactUs").val(a.captcha.refreshKodeCaptcha)
        }).fail(function(a) {}).always(function() {})
    });
});

var FileReader = typeof FileReader !== "undefined" ? FileReader : {};
function readURL(input) {
    var tempat_gambar = document.getElementById("tempat_gambar");
    var tag_gambar = document.getElementById("tag_gambar");
    if (typeof input === "object" && typeof input.files !== "undefined" && input.files && input.files[0] && typeof FileReader !== "undefined") {
        var reader = new FileReader();
        if(typeof reader.onload !== "undefined"){
            reader.onload = function(e) {
                if(e.target.result.substr(0,10) === "data:image"){
                    tempat_gambar.style.display = "";
                    tag_gambar.src = e.target.result;
                } else {
                    tempat_gambar.style.display = "none";
                    tag_gambar.src = "";
                }
            };
            reader.readAsDataURL(input.files[0]);
        } else {
            tempat_gambar.style.display = "none";
            tag_gambar.src = "";
            alert("Something Wrong With File Reader.");
        }
    } else {
        tempat_gambar.style.display = "none";
        tag_gambar.src = "";
        alert("Something Wrong With File Reader.");
    }
}
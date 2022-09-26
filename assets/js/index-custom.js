$(document).ready(function () {
    setTimeout(function () {
        document.body.style.visibility = "";
        window.onresize = function () {
            if (document.body.clientWidth === 1016 || document.body.clientWidth === 1146) {
                var href_h2 = document.getElementById("href_h2");
                href_h2.style.width = "40px";
                href_h2.style.height = "40px";
                var href_h1 = document.getElementById("href_h1");
                href_h1.style.height = "40px";
            } else {
                var href_h2 = document.getElementById("href_h2");
                href_h2.style.width = "";
                href_h2.style.height = "";
                var href_h1 = document.getElementById("href_h1");
                href_h1.style.height = "56px";
            }
        };
        if (document.body.clientWidth === 1016 || document.body.clientWidth === 1146) {
            var href_h2 = document.getElementById("href_h2");
            href_h2.style.width = "40px";
            href_h2.style.height = "40px";
            var href_h1 = document.getElementById("href_h1");
            href_h1.style.height = "40px";
        }
    }, 500);
    $('body').on('submit', '#form-search', function (e) {
        e.preventDefault();
        let search = $(this).find('input').val();
        window.open(
            'https://www.google.com/search?q=' + search + '&oq=' + search + '',
            '_blank' // <- This is what makes it open in a new window.
        );
        console.log($(this).find('input').val());
    });
});

function refresh_captcha() {
    var tempat_captcha = document.getElementById("tempat_captcha");
    var rand = Math.random();
    tempat_captcha.setAttribute("src", "captcha?" + rand.toString());

}

var kiri_b = "show";
var kanan_b = "hide";
function adapt() {
    console.log("HALLO");
    if (window.innerWidth <= 800) {
        if (document.getElementById("td_slider_b_selain_home")) {
            document.getElementById("td_slider_b_selain_home").removeAttribute("style");
            kiri_b = "show";
            kanan_b = "hide";
        }
        if (document.getElementById("article")) {
            var article_section = document.getElementById("article");
            article_section.setAttribute("class", "article-left");
            // var video_section = document.getElementById("video");
            // video_section.setAttribute("class", "video-left");
            if(document.getElementById("contact")){
                var contact_section = document.getElementById("contact");
                contact_section.setAttribute("class", "contact-main-left");
            }
        }
    }
};

function set_element_src(url, el){
    if(url.substr(0,"http".length) === "http"){
        $.post(
            "administrator/index.php/checker",
            {"url" : url},
            function(){
                el.style.backgroundImage = "url('"+el.getAttribute("url_active")+"')";
            }
        );
    }
}

window.addEventListener('resize', adapt);

function load_js() {
    var tombol_telepon = document.getElementById("tombol_telepon");
    var tombol_telepon_b = document.getElementById("tombol_telepon_b");
    var kiri = "show";
    var kanan = "hide";
    if (document.getElementById("td_slider_a")) {
        var td_slider_a = document.getElementById("td_slider_a");
        var td_slider_c = document.getElementById("td_slider_c");
    }
    tombol_telepon.onclick = function () {
        if (document.getElementById("td_slider_a_selain_home")) {
            var td_slider_a_selain_home = document.getElementById("td_slider_a_selain_home");
            var td_slider_c_selain_home = document.getElementById("td_slider_c_selain_home");
        }
        console.log("A");
        console.log(td_slider_a_selain_home);
        console.log(td_slider_c_selain_home);
        if (kiri === "show") {
            if (document.getElementById("td_slider_a")) {
                td_slider_a.style.display = "none";
                td_slider_c.style.display = "contents";
                var article_section = document.getElementById("article");
                article_section.setAttribute("class", "article-right");
                // var video_section = document.getElementById("video");
                // video_section.setAttribute("class", "video-right");
                var contact_section = document.getElementById("contact");
                contact_section.setAttribute("class", "contact-main-right");
            }
            if (document.getElementById("td_slider_a_selain_home")) {
                td_slider_a_selain_home.style.display = "none";
                td_slider_c_selain_home.style.display = "contents";
            }
            kiri = "hide";
            kanan = "show";
        } else if (kanan === "show") {
            if (document.getElementById("td_slider_a")) {
                td_slider_a.style.display = "contents";
                td_slider_c.style.display = "none";
                var article_section = document.getElementById("article");
                article_section.setAttribute("class", "article-left");
                // var video_section = document.getElementById("video");
                // video_section.setAttribute("class", "video-left");
                var contact_section = document.getElementById("contact");
                contact_section.setAttribute("class", "contact-main-left");
            }
            if (document.getElementById("td_slider_a_selain_home")) {
                td_slider_a_selain_home.style.display = "contents";
                td_slider_c_selain_home.style.display = "none";
            }
            kiri = "show";
            kanan = "hide";
        }
    };
    tombol_telepon_b.onclick = function () {
        if (document.getElementById("td_slider_a_selain_home")) {
            var td_slider_a_selain_home = document.getElementById("td_slider_b_selain_home");
            var td_slider_c_selain_home = document.getElementById("td_slider_c_selain_home");
        }
        if (kiri_b === "show") {
            if (document.getElementById("td_slider_a")) {
                td_slider_a.style.display = "none";
                td_slider_c.style.display = "contents";
            }
            if (document.getElementById("td_slider_a_selain_home")) {
                td_slider_a_selain_home.style.display = "none";
                td_slider_c_selain_home.style.display = "contents";
            }
            kiri_b = "hide";
            kanan_b = "show";
        } else if (kanan_b === "show") {
            if (document.getElementById("td_slider_a")) {
                td_slider_a.style.display = "contents";
                td_slider_c.style.display = "none";
            }
            if (document.getElementById("td_slider_a_selain_home")) {
                td_slider_a_selain_home.style.display = "contents";
                td_slider_c_selain_home.style.display = "none";
            }
            kiri_b = "show";
            kanan_b = "hide";
        }
    };
    window.addEventListener('resize', function () {
        if (document.getElementById("td_slider_a_selain_home")) {
            var td_slider_a_selain_home = document.getElementById("td_slider_a_selain_home");
            var td_slider_c_selain_home = document.getElementById("td_slider_c_selain_home");
        }
        if (document.getElementById("td_slider_a")) {
            td_slider_a.style.display = "";
            td_slider_c.style.display = "";
        }
        if (document.getElementById("td_slider_a_selain_home")) {
            td_slider_a_selain_home.style.display = "";
            td_slider_c_selain_home.style.display = "";
        }
        kiri = "show";
        kanan = "hide";
    }, true);

};

window.addEventListener("load", load_js);
/* https://www.youtube.com/watch?v=q7brvamCBqQ https://www.youtube.com/watch?v=3mKltQQsxGU */
function scrollFunction() {
    document.body.scrollTop > 500 || document.documentElement.scrollTop > 500 ? (typeof mybutton === "object" && mybutton !== null ? mybutton.style.display = "block" : "") : (typeof mybutton === "object" && mybutton !== null ? mybutton.style.display = "none" : "");
}
function topFunction() {
    (document.body.scrollTop = 0), (document.documentElement.scrollTop = 0);
}
$(document).ready(function () {
    (mybutton = document.getElementById("buttonToTop")),
        (window.onscroll = function () {
            scrollFunction();
        });
});

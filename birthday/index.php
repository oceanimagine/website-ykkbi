<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

function range_not_equal(){
    $returns = false;
    if(date("m-d") != "02-23" && date("m-d") != "02-24" && date("m-d") != "02-25" && date("m-d") != "02-26" && date("m-d") != "02-27" && date("m-d") != "02-28" && date("m-d") != "02-29"){
        $returns = true;
    }
}

if (range_not_equal()) {
    header("location: ../");
}

$_SESSION['ultah'] = 'ultah';
?>
<!Doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Happy Birthday</title>
        <link rel="icon" href="data:;base64,iVBORw0KGgo=">
        <style type="text/css">
            body {
                font-family:'Wendy One', sans-serif;
                overflow: hidden;
            }
            body {
                background-image: -webkit-gradient(radial, 50% 50%,
                    0,
                    50% 50%,
                    100,
                    color-stop(0%, #374566),
                    color-stop(100%, #010203));
                background-image: -webkit-radial-gradient(#374566,
                    #010203);
                background-image: -moz-radial-gradient(#374566,
                    #010203);
                background-image: -o-radial-gradient(#374566,
                    #010203);
                background-image: radial-gradient(#374566,
                    #010203);
            }
            html,
            body {
                --bg-color: #222;
                min-width: 100vw;
                min-height: 100vh;
                overflow: hidden;
                background:
                    radial-gradient(circle at 50% 100%, #222, rgba(0,0,0,.95) 40%),
                    var(--bg-color);
                margin: 0;
                image-rendering: pixelated;
            }

            body:after {
                content: url('../assets/img/BUILDING.png');
                mix-blend-mode: luminosity;
                position: absolute;
                bottom: 0;
                left: 50%;
                transform: translate(-50%, 8%);
                text-align: center;
            }
            span {
                text-transform: uppercase;
            }
            .container {
                width: 800px;
                height: 420px;
                padding: 10px;
                margin: 0 auto;
                position: relative;
                z-index: 9999;
            }
            .balloon {
                width: 738px;
                margin: 0 auto;
                padding-top: 30px;
                position: relative;
            }
            .balloon > div {
                width: 104px;
                height: 140px;
                background: rgba(182, 15, 97, 0.9);
                border-radius: 0;
                border-radius: 80% 80% 80% 80%;
                margin: 0 auto;
                position: absolute;
                padding: 10px;
                box-shadow: inset 17px 7px 10px rgba(182, 15, 97, 0.9);
                -webkit-transform-origin: bottom center;
                top: 80px;
            }
            .balloon > div:nth-child(1) {
                background: rgba(182, 15, 97, 0.9);
                left: 0;
                box-shadow: inset 10px 10px 10px rgba(135, 11, 72, 0.9);
                -webkit-animation: balloon1 6s ease-in-out infinite;
                -moz-animation: balloon1 6s ease-in-out infinite;
                -o-animation: balloon1 6s ease-in-out infinite;
                animation: balloon1 6s ease-in-out infinite;
            }
            .balloon > div:nth-child(1):before {
                color: rgba(182, 15, 97, 0.9);
            }
            .balloon > div:nth-child(2) {
                background: rgba(242, 112, 45, 0.9);
                left: 120px;
                box-shadow: inset 10px 10px 10px rgba(222, 85, 14, 0.9);
                -webkit-animation: balloon2 6s ease-in-out infinite;
                -moz-animation: balloon2 6s ease-in-out infinite;
                -o-animation: balloon2 6s ease-in-out infinite;
                animation: balloon2 6s ease-in-out infinite;
            }
            .balloon > div:nth-child(2):before {
                color: rgba(242, 112, 45, 0.9);
            }
            .balloon > div:nth-child(3) {
                background: rgba(45, 181, 167, 0.9);
                left: 240px;
                box-shadow: inset 10px 10px 10px rgba(35, 140, 129, 0.9);
                -webkit-animation: balloon4 6s ease-in-out infinite;
                -moz-animation: balloon4 6s ease-in-out infinite;
                -o-animation: balloon4 6s ease-in-out infinite;
                animation: balloon4 6s ease-in-out infinite;
            }
            .balloon > div:nth-child(3):before {
                color: rgba(45, 181, 167, 0.9);
            }
            .balloon > div:nth-child(4) {
                background: rgba(190, 61, 244, 0.9);
                left: 360px;
                box-shadow: inset 10px 10px 10px rgba(173, 14, 240, 0.9);
                -webkit-animation: balloon1 5s ease-in-out infinite;
                -moz-animation: balloon1 5s ease-in-out infinite;
                -o-animation: balloon1 5s ease-in-out infinite;
                animation: balloon1 5s ease-in-out infinite;
            }
            .balloon > div:nth-child(4):before {
                color: rgba(190, 61, 244, 0.9);
            }
            .balloon > div:nth-child(5) {
                background: rgba(180, 224, 67, 0.9);
                left: 480px;
                box-shadow: inset 10px 10px 10px rgba(158, 206, 34, 0.9);
                -webkit-animation: balloon3 5s ease-in-out infinite;
                -moz-animation: balloon3 5s ease-in-out infinite;
                -o-animation: balloon3 5s ease-in-out infinite;
                animation: balloon3 5s ease-in-out infinite;
            }
            .balloon > div:nth-child(5):before {
                color: rgba(180, 224, 67, 0.9);
            }
            .balloon > div:nth-child(6) {
                background: rgba(242, 194, 58, 0.9);
                left: 600px;
                box-shadow: inset 10px 10px 10px rgba(234, 177, 15, 0.9);
                -webkit-animation: balloon2 3s ease-in-out infinite;
                -moz-animation: balloon2 3s ease-in-out infinite;
                -o-animation: balloon2 3s ease-in-out infinite;
                animation: balloon2 3s ease-in-out infinite;
            }
            .balloon > div:nth-child(6):before {
                color: rgba(242, 194, 58, 0.9);
            }
            .balloon > div:before {
                color: rgba(182, 15, 97, 0.9);
                position: absolute;
                bottom: -11px;
                left: 52px;
                content:"▲";
                font-size: 1em;
            }
            span {
                font-size: 4.8em;
                color: white;
                position: relative;
                top: 30px;
                left: 50%;
                margin-left: -27px;
            }
            /*BALLOON 1 4*/
            @-webkit-keyframes balloon1 {
                0%, 100% {
                    -webkit-transform: translateY(0) rotate(-6deg);
                }
                50% {
                    -webkit-transform: translateY(-20px) rotate(8deg);
                }
            }
            @-moz-keyframes balloon1 {
                0%, 100% {
                    -moz-transform: translateY(0) rotate(-6deg);
                }
                50% {
                    -moz-transform: translateY(-20px) rotate(8deg);
                }
            }
            @-o-keyframes balloon1 {
                0%, 100% {
                    -o-transform: translateY(0) rotate(-6deg);
                }
                50% {
                    -o-transform: translateY(-20px) rotate(8deg);
                }
            }
            @keyframes balloon1 {
                0%, 100% {
                    transform: translateY(0) rotate(-6deg);
                }
                50% {
                    transform: translateY(-20px) rotate(8deg);
                }
            }
            /* BAllOON 2 5*/
            @-webkit-keyframes balloon2 {
                0%, 100% {
                    -webkit-transform: translateY(0) rotate(6eg);
                }
                50% {
                    -webkit-transform: translateY(-30px) rotate(-8deg);
                }
            }
            @-moz-keyframes balloon2 {
                0%, 100% {
                    -moz-transform: translateY(0) rotate(6deg);
                }
                50% {
                    -moz-transform: translateY(-30px) rotate(-8deg);
                }
            }
            @-o-keyframes balloon2 {
                0%, 100% {
                    -o-transform: translateY(0) rotate(6deg);
                }
                50% {
                    -o-transform: translateY(-30px) rotate(-8deg);
                }
            }
            @keyframes balloon2 {
                0%, 100% {
                    transform: translateY(0) rotate(6deg);
                }
                50% {
                    transform: translateY(-30px) rotate(-8deg);
                }
            }
            /* BAllOON 0*/
            @-webkit-keyframes balloon3 {
                0%, 100% {
                    -webkit-transform: translate(0, -10px) rotate(6eg);
                }
                50% {
                    -webkit-transform: translate(-20px, 30px) rotate(-8deg);
                }
            }
            @-moz-keyframes balloon3 {
                0%, 100% {
                    -moz-transform: translate(0, -10px) rotate(6eg);
                }
                50% {
                    -moz-transform: translate(-20px, 30px) rotate(-8deg);
                }
            }
            @-o-keyframes balloon3 {
                0%, 100% {
                    -o-transform: translate(0, -10px) rotate(6eg);
                }
                50% {
                    -o-transform: translate(-20px, 30px) rotate(-8deg);
                }
            }
            @keyframes balloon3 {
                0%, 100% {
                    transform: translate(0, -10px) rotate(6eg);
                }
                50% {
                    transform: translate(-20px, 30px) rotate(-8deg);
                }
            }
            /* BAllOON 3*/
            @-webkit-keyframes balloon4 {
                0%, 100% {
                    -webkit-transform: translate(10px, -10px) rotate(-8eg);
                }
                50% {
                    -webkit-transform: translate(-15px, 20px) rotate(10deg);
                }
            }
            @-moz-keyframes balloon4 {
                0%, 100% {
                    -moz-transform: translate(10px, -10px) rotate(-8eg);
                }
                50% {
                    -moz-transform: translate(-15px, 10px) rotate(10deg);
                }
            }
            @-o-keyframes balloon4 {
                0%, 100% {
                    -o-transform: translate(10px, -10px) rotate(-8eg);
                }
                50% {
                    -o-transform: translate(-15px, 10px) rotate(10deg);
                }
            }
            @keyframes balloon4 {
                0%, 100% {
                    transform: translate(10px, -10px) rotate(-8eg);
                }
                50% {
                    transform: translate(-15px, 10px) rotate(10deg);
                }
            }
            h1 {
                position: relative;
                top: 200px;
                text-align: center;
                color: white;
                font-size: 3.5em;
                margin-bottom: 8px;
            }
            h4 {
                position: relative;
                top: 210px;
                text-align: center;
                color: white;
                font-size: 2.5em;
                margin-top: 0px;
            }

            .kueultah {
                position: relative;
                top: 240px;
                text-align: center;
                color: white;
                margin-top: 0px;
                width: 100%;
                opacity: 0.1;
            }


            #canvas{
                height: 100%;
                width: 100%;
                position: absolute;
                top: 0px;
                left: 0px;
                opacity: 0.4;
                z-index: 2;
            }

            :root {
                --twinkle-duration: 4s;
            }

            .stars-wrapper {
                position: relative;
                pointer-events: none;
                width: 100vw;
                height: 100vh;
                background: linear-gradient(#16161d, #1f1f3a, #3b2f4a);
                overflow: hidden;
            }

            .stars {
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                -webkit-animation: twinkle var(--twinkle-duration) ease-in-out infinite;
                animation: twinkle var(--twinkle-duration) ease-in-out infinite;
            }
            .stars:nth-child(2) {
                -webkit-animation-delay: calc(var(--twinkle-duration) * -0.33);
                animation-delay: calc(var(--twinkle-duration) * -0.33);
            }
            .stars:nth-child(3) {
                -webkit-animation-delay: calc(var(--twinkle-duration) * -0.66);
                animation-delay: calc(var(--twinkle-duration) * -0.66);
            }
            @-webkit-keyframes twinkle {
                25% {
                    opacity: 0;
                }
            }
            @keyframes twinkle {
                25% {
                    opacity: 0;
                }
            }

            .star {
                fill: white;
            }
            .star:nth-child(3n) {
                opacity: 0.8;
            }
            .star:nth-child(7n) {
                opacity: 0.6;
            }
            .star:nth-child(13n) {
                opacity: 0.4;
            }
            .star:nth-child(19n) {
                opacity: 0.2;
            }

            .comet {
                transform-origin: center center;
                -webkit-animation: comet 10s linear infinite;
                animation: comet 10s linear infinite;
            }
            @-webkit-keyframes comet {
                0%, 40% {
                    transform: translateX(0);
                    opacity: 0;
                }
                50% {
                    opacity: 1;
                }
                60%, 100% {
                    transform: translateX(-100vmax);
                    opacity: 0;
                }
            }
            @keyframes comet {
                0%, 40% {
                    transform: translateX(0);
                    opacity: 0;
                }
                50% {
                    opacity: 1;
                }
                60%, 100% {
                    transform: translateX(-100vmax);
                    opacity: 0;
                }
            }

            .comet-b {
                -webkit-animation-delay: -3.3s;
                animation-delay: -3.3s;
            }

            .comet-c {
                -webkit-animation-delay: -5s;
                animation-delay: -5s;
            }


        </style>
    </head>

    <body class="fireworks" onclick="window.location = '../';" style="cursor: pointer;">
        <canvas id="canvas"></canvas>
        <link href="https://fonts.googleapis.com/css?family=Wendy+One" rel="stylesheet" type="text/css">
        <div class="pyro">
            <div class="before"></div>
            <div class="after"></div>
        </div>
        <div class="container">
            <div class="balloon">
                <div><span><img src="../assets/img/LOGOYKKBIREMOVEBG.png" style="width: 58px;" /></span>
                </div>
                <div><span>Y</span>
                </div>
                <div><span>K</span>
                </div>
                <div><span>K</span>
                </div>
                <div><span>B</span>
                </div>
                <div><span>I</span>
                </div>

            </div>
            <?php
            $date1 = new DateTime("1992-02-23");
            $date2 = new DateTime(date("Y-m-d"));
            $interval = $date1->diff($date2);
            ?>
            <h1>HUT YKKBI KE <?php echo $interval->y; ?></h1>
        </div>


        <div class="stars-wrapper" style="position: absolute; width: 100%; height: 100%; top: 0px; left: 0px; z-index: 0;">
            <svg class="stars" width="100%" height="100%" preserveAspectRatio="none">
            <circle class="star" cx="11.32%" cy="98.7%" r="1.4"></circle>
            <circle class="star" cx="50.21%" cy="93.51%" r="1"></circle>
            <circle class="star" cx="96.98%" cy="11.17%" r="1"></circle>
            <circle class="star" cx="20.41%" cy="54.47%" r="1"></circle>
            <circle class="star" cx="75.41%" cy="51.85%" r="1"></circle>
            <circle class="star" cx="13.96%" cy="42.67%" r="1.1"></circle>
            <circle class="star" cx="51.31%" cy="84.22%" r="1.2"></circle>
            <circle class="star" cx="29.49%" cy="0.12%" r="0.8"></circle>
            <circle class="star" cx="30.91%" cy="93.29%" r="1.3"></circle>
            <circle class="star" cx="76.09%" cy="39%" r="0.5"></circle>
            <circle class="star" cx="31.23%" cy="94.59%" r="0.7"></circle>
            <circle class="star" cx="75.46%" cy="58.81%" r="0.8"></circle>
            <circle class="star" cx="22.77%" cy="72.3%" r="0.8"></circle>
            <circle class="star" cx="55.35%" cy="14.14%" r="1.2"></circle>
            <circle class="star" cx="63.61%" cy="80.19%" r="1.2"></circle>
            <circle class="star" cx="7.45%" cy="38.04%" r="0.7"></circle>
            <circle class="star" cx="45.35%" cy="87.09%" r="1.4"></circle>
            <circle class="star" cx="18.64%" cy="93.46%" r="1"></circle>
            <circle class="star" cx="18.68%" cy="99.14%" r="1.4"></circle>
            <circle class="star" cx="63.81%" cy="26.74%" r="0.6"></circle>
            <circle class="star" cx="18.12%" cy="16.44%" r="0.8"></circle>
            <circle class="star" cx="49.51%" cy="11.49%" r="0.8"></circle>
            <circle class="star" cx="5.92%" cy="78.19%" r="0.9"></circle>
            <circle class="star" cx="23.7%" cy="75.35%" r="1"></circle>
            <circle class="star" cx="54.51%" cy="20.47%" r="1.2"></circle>
            <circle class="star" cx="90.62%" cy="5.23%" r="1.3"></circle>
            <circle class="star" cx="66.61%" cy="91.12%" r="0.6"></circle>
            <circle class="star" cx="14.13%" cy="36.04%" r="1.5"></circle>
            <circle class="star" cx="58.37%" cy="94.27%" r="1.2"></circle>
            <circle class="star" cx="66.61%" cy="20.03%" r="1.4"></circle>
            <circle class="star" cx="11.49%" cy="8.66%" r="1.3"></circle>
            <circle class="star" cx="78.64%" cy="10.48%" r="0.9"></circle>
            <circle class="star" cx="85.95%" cy="93.8%" r="1.1"></circle>
            <circle class="star" cx="70.91%" cy="34.93%" r="1"></circle>
            <circle class="star" cx="55.28%" cy="95.15%" r="1.3"></circle>
            <circle class="star" cx="53.93%" cy="16.64%" r="0.9"></circle>
            <circle class="star" cx="78.96%" cy="37.18%" r="1"></circle>
            <circle class="star" cx="38.05%" cy="3.73%" r="1.3"></circle>
            <circle class="star" cx="52.67%" cy="14.7%" r="0.8"></circle>
            <circle class="star" cx="18.12%" cy="5.59%" r="0.7"></circle>
            <circle class="star" cx="60.55%" cy="37.15%" r="0.9"></circle>
            <circle class="star" cx="94.85%" cy="47.04%" r="1"></circle>
            <circle class="star" cx="89.22%" cy="49.18%" r="0.6"></circle>
            <circle class="star" cx="31.98%" cy="70.15%" r="1.1"></circle>
            <circle class="star" cx="99%" cy="2.61%" r="0.7"></circle>
            <circle class="star" cx="16.97%" cy="86.8%" r="1.4"></circle>
            <circle class="star" cx="6.88%" cy="17.58%" r="0.9"></circle>
            <circle class="star" cx="85.68%" cy="40.72%" r="1.1"></circle>
            <circle class="star" cx="77.38%" cy="51.73%" r="1.1"></circle>
            <circle class="star" cx="12.45%" cy="22.73%" r="1.4"></circle>
            <circle class="star" cx="29.74%" cy="91.61%" r="1.2"></circle>
            <circle class="star" cx="73.82%" cy="48.19%" r="1.1"></circle>
            <circle class="star" cx="80.76%" cy="51.91%" r="1"></circle>
            <circle class="star" cx="49.91%" cy="91.78%" r="1"></circle>
            <circle class="star" cx="42.26%" cy="7.88%" r="1.2"></circle>
            <circle class="star" cx="7.99%" cy="81.06%" r="0.9"></circle>
            <circle class="star" cx="52.45%" cy="31.96%" r="1.1"></circle>
            <circle class="star" cx="49.22%" cy="12.2%" r="0.6"></circle>
            <circle class="star" cx="80.26%" cy="89.79%" r="1.3"></circle>
            <circle class="star" cx="8.22%" cy="54.26%" r="1.4"></circle>
            <circle class="star" cx="81%" cy="15.57%" r="0.9"></circle>
            <circle class="star" cx="73.99%" cy="27.79%" r="1"></circle>
            <circle class="star" cx="8.67%" cy="2.53%" r="0.7"></circle>
            <circle class="star" cx="90.61%" cy="84.05%" r="1.4"></circle>
            <circle class="star" cx="13.38%" cy="73.7%" r="0.8"></circle>
            <circle class="star" cx="38.47%" cy="49.6%" r="0.7"></circle>
            <circle class="star" cx="86.72%" cy="13.45%" r="1.2"></circle>
            <circle class="star" cx="38.13%" cy="88.5%" r="0.9"></circle>
            <circle class="star" cx="16.57%" cy="75.34%" r="1.4"></circle>
            <circle class="star" cx="49.98%" cy="64.09%" r="1.3"></circle>
            <circle class="star" cx="48.92%" cy="36.1%" r="0.6"></circle>
            <circle class="star" cx="6.02%" cy="32.04%" r="1.4"></circle>
            <circle class="star" cx="57.44%" cy="89.57%" r="0.6"></circle>
            <circle class="star" cx="40.17%" cy="36.27%" r="0.9"></circle>
            <circle class="star" cx="84.95%" cy="11.85%" r="1.2"></circle>
            <circle class="star" cx="38.6%" cy="85.37%" r="0.5"></circle>
            <circle class="star" cx="79.69%" cy="48.91%" r="1.1"></circle>
            <circle class="star" cx="40.98%" cy="3.29%" r="0.6"></circle>
            <circle class="star" cx="59.64%" cy="26.43%" r="1.4"></circle>
            <circle class="star" cx="84.35%" cy="6.26%" r="0.9"></circle>
            <circle class="star" cx="36.95%" cy="72.1%" r="0.6"></circle>
            <circle class="star" cx="71.84%" cy="41.77%" r="1"></circle>
            <circle class="star" cx="6.15%" cy="38.19%" r="1.1"></circle>
            <circle class="star" cx="70.99%" cy="92.61%" r="1.5"></circle>
            <circle class="star" cx="90.99%" cy="29.93%" r="0.9"></circle>
            <circle class="star" cx="7.02%" cy="51.14%" r="0.8"></circle>
            <circle class="star" cx="3.84%" cy="81.78%" r="1.5"></circle>
            <circle class="star" cx="26.73%" cy="39.3%" r="1.1"></circle>
            <circle class="star" cx="24.77%" cy="56.89%" r="1.5"></circle>
            <circle class="star" cx="3.66%" cy="21.66%" r="1.3"></circle>
            <circle class="star" cx="26.53%" cy="6.43%" r="1.4"></circle>
            <circle class="star" cx="24.39%" cy="57.65%" r="0.7"></circle>
            <circle class="star" cx="96.86%" cy="56.17%" r="0.7"></circle>
            <circle class="star" cx="51.86%" cy="55.56%" r="0.9"></circle>
            <circle class="star" cx="75.18%" cy="55.75%" r="1"></circle>
            <circle class="star" cx="76.75%" cy="83.13%" r="0.7"></circle>
            <circle class="star" cx="16.34%" cy="31.52%" r="0.6"></circle>
            <circle class="star" cx="79.16%" cy="78.82%" r="1.4"></circle>
            <circle class="star" cx="25.46%" cy="45.47%" r="1.1"></circle>
            <circle class="star" cx="56.78%" cy="63.28%" r="1.2"></circle>
            <circle class="star" cx="69.45%" cy="30.21%" r="1.1"></circle>
            <circle class="star" cx="14.33%" cy="67.98%" r="1.5"></circle>
            <circle class="star" cx="74.66%" cy="27.08%" r="0.5"></circle>
            <circle class="star" cx="82.3%" cy="78.12%" r="0.7"></circle>
            <circle class="star" cx="46.72%" cy="99.71%" r="1.4"></circle>
            <circle class="star" cx="1.91%" cy="56.95%" r="1.1"></circle>
            <circle class="star" cx="88.1%" cy="16.67%" r="1.2"></circle>
            <circle class="star" cx="95.75%" cy="75.18%" r="0.8"></circle>
            <circle class="star" cx="22.98%" cy="46.28%" r="1"></circle>
            <circle class="star" cx="7.21%" cy="72.68%" r="1.4"></circle>
            <circle class="star" cx="28.41%" cy="92.77%" r="0.8"></circle>
            <circle class="star" cx="70.51%" cy="58.74%" r="1.1"></circle>
            <circle class="star" cx="52.05%" cy="62.32%" r="1.1"></circle>
            <circle class="star" cx="64.37%" cy="84.39%" r="1.5"></circle>
            <circle class="star" cx="50.81%" cy="39.85%" r="1.4"></circle>
            <circle class="star" cx="27%" cy="42.8%" r="0.9"></circle>
            <circle class="star" cx="50.69%" cy="90.81%" r="0.8"></circle>
            <circle class="star" cx="87.85%" cy="13.91%" r="0.9"></circle>
            <circle class="star" cx="40.9%" cy="74.55%" r="0.8"></circle>
            <circle class="star" cx="20.35%" cy="29.54%" r="0.6"></circle>
            <circle class="star" cx="57.45%" cy="30.78%" r="1.1"></circle>
            <circle class="star" cx="14.89%" cy="55.7%" r="0.9"></circle>
            <circle class="star" cx="63.04%" cy="45.91%" r="1.1"></circle>
            <circle class="star" cx="34.42%" cy="20.85%" r="0.9"></circle>
            <circle class="star" cx="42.95%" cy="6.79%" r="1.3"></circle>
            <circle class="star" cx="59.27%" cy="75.86%" r="0.9"></circle>
            <circle class="star" cx="93.03%" cy="99.54%" r="0.5"></circle>
            <circle class="star" cx="68.65%" cy="37.1%" r="0.8"></circle>
            <circle class="star" cx="50.04%" cy="55.63%" r="1.4"></circle>
            <circle class="star" cx="59.77%" cy="36.8%" r="0.7"></circle>
            <circle class="star" cx="49.36%" cy="49.08%" r="1.2"></circle>
            <circle class="star" cx="23.1%" cy="91.06%" r="1.2"></circle>
            <circle class="star" cx="4.03%" cy="38.75%" r="1"></circle>
            <circle class="star" cx="70.8%" cy="80.5%" r="0.9"></circle>
            <circle class="star" cx="13.23%" cy="40.61%" r="0.8"></circle>
            <circle class="star" cx="71.81%" cy="62.25%" r="0.7"></circle>
            <circle class="star" cx="66.81%" cy="69.23%" r="1.3"></circle>
            <circle class="star" cx="49.87%" cy="21.7%" r="1.2"></circle>
            <circle class="star" cx="72.85%" cy="57.84%" r="1.4"></circle>
            <circle class="star" cx="66.37%" cy="52.78%" r="1"></circle>
            <circle class="star" cx="86.9%" cy="91.96%" r="1.2"></circle>
            <circle class="star" cx="86%" cy="57.93%" r="1.3"></circle>
            <circle class="star" cx="19.24%" cy="69.47%" r="1.3"></circle>
            <circle class="star" cx="99.44%" cy="65.49%" r="1.3"></circle>
            <circle class="star" cx="39.65%" cy="19%" r="0.5"></circle>
            <circle class="star" cx="8.46%" cy="82.84%" r="1.1"></circle>
            <circle class="star" cx="15.42%" cy="47.95%" r="1.3"></circle>
            <circle class="star" cx="20.51%" cy="52.83%" r="0.9"></circle>
            <circle class="star" cx="58.22%" cy="42.1%" r="0.8"></circle>
            <circle class="star" cx="33.48%" cy="74.2%" r="0.6"></circle>
            <circle class="star" cx="14.91%" cy="50.81%" r="0.8"></circle>
            <circle class="star" cx="32.93%" cy="92.3%" r="0.6"></circle>
            <circle class="star" cx="85.49%" cy="34.6%" r="1.4"></circle>
            <circle class="star" cx="49.19%" cy="35.84%" r="0.5"></circle>
            <circle class="star" cx="74.51%" cy="97.68%" r="1.5"></circle>
            <circle class="star" cx="12.63%" cy="63.5%" r="0.9"></circle>
            <circle class="star" cx="75.23%" cy="42.97%" r="1.1"></circle>
            <circle class="star" cx="60.61%" cy="30.94%" r="1.3"></circle>
            <circle class="star" cx="6.57%" cy="24.64%" r="1.2"></circle>
            <circle class="star" cx="39.21%" cy="61.9%" r="0.6"></circle>
            <circle class="star" cx="3.76%" cy="2.19%" r="1"></circle>
            <circle class="star" cx="14.21%" cy="3.75%" r="1"></circle>
            <circle class="star" cx="33.95%" cy="31.08%" r="0.7"></circle>
            <circle class="star" cx="58.73%" cy="75.16%" r="1.1"></circle>
            <circle class="star" cx="0.99%" cy="91.37%" r="0.7"></circle>
            <circle class="star" cx="81.66%" cy="30.54%" r="0.9"></circle>
            <circle class="star" cx="63.9%" cy="23.07%" r="0.8"></circle>
            <circle class="star" cx="57.11%" cy="71.96%" r="0.7"></circle>
            <circle class="star" cx="49.27%" cy="23.45%" r="1"></circle>
            <circle class="star" cx="36.47%" cy="79.17%" r="0.9"></circle>
            <circle class="star" cx="37.08%" cy="44.1%" r="1.4"></circle>
            <circle class="star" cx="11.49%" cy="3.99%" r="0.8"></circle>
            <circle class="star" cx="73.34%" cy="79.01%" r="1.3"></circle>
            <circle class="star" cx="95.47%" cy="64.29%" r="0.8"></circle>
            <circle class="star" cx="96.9%" cy="80.58%" r="0.5"></circle>
            <circle class="star" cx="27.55%" cy="70.46%" r="0.5"></circle>
            <circle class="star" cx="27.79%" cy="97.27%" r="1.2"></circle>
            <circle class="star" cx="40.68%" cy="48.8%" r="0.9"></circle>
            <circle class="star" cx="2.37%" cy="85.35%" r="0.6"></circle>
            <circle class="star" cx="91.65%" cy="4.93%" r="1.2"></circle>
            <circle class="star" cx="70.47%" cy="1.69%" r="0.8"></circle>
            <circle class="star" cx="76.55%" cy="34.56%" r="0.9"></circle>
            <circle class="star" cx="40.7%" cy="51.35%" r="0.7"></circle>
            <circle class="star" cx="87.32%" cy="75.63%" r="0.7"></circle>
            <circle class="star" cx="78.81%" cy="24.84%" r="1.1"></circle>
            <circle class="star" cx="72.47%" cy="96.85%" r="0.9"></circle>
            <circle class="star" cx="16.94%" cy="46.78%" r="1.2"></circle>
            <circle class="star" cx="25%" cy="65.06%" r="1.2"></circle>
            <circle class="star" cx="46.46%" cy="65.03%" r="0.8"></circle>
            <circle class="star" cx="58%" cy="30.32%" r="0.7"></circle>
            <circle class="star" cx="83.88%" cy="64.02%" r="1.1"></circle>
            <circle class="star" cx="35.43%" cy="78.61%" r="1.2"></circle>
            <circle class="star" cx="29.17%" cy="76.79%" r="1.4"></circle>
            <circle class="star" cx="63.68%" cy="51.61%" r="1.3"></circle>
            <circle class="star" cx="15.1%" cy="75.26%" r="0.9"></circle>
            <circle class="star" cx="22.32%" cy="32.09%" r="1"></circle>
            <circle class="star" cx="9.13%" cy="53.08%" r="0.7"></circle>
            <circle class="star" cx="57.1%" cy="77.31%" r="0.9"></circle>
            <circle class="star" cx="51.09%" cy="28.46%" r="0.9"></circle>
            <circle class="star" cx="27.94%" cy="65.36%" r="1.4"></circle>
            </svg>
            <svg class="stars" width="100%" height="100%" preserveAspectRatio="none">
            <circle class="star" cx="58.38%" cy="0.01%" r="1.2"></circle>
            <circle class="star" cx="9.7%" cy="97.36%" r="1.4"></circle>
            <circle class="star" cx="50.9%" cy="87.13%" r="1"></circle>
            <circle class="star" cx="14.86%" cy="66.79%" r="1"></circle>
            <circle class="star" cx="6.49%" cy="95.05%" r="1"></circle>
            <circle class="star" cx="36.25%" cy="86.03%" r="1.5"></circle>
            <circle class="star" cx="81.97%" cy="22.07%" r="0.9"></circle>
            <circle class="star" cx="86.58%" cy="83.95%" r="1.1"></circle>
            <circle class="star" cx="84.5%" cy="1.21%" r="0.6"></circle>
            <circle class="star" cx="1.08%" cy="10.93%" r="1.3"></circle>
            <circle class="star" cx="3.7%" cy="43.09%" r="0.6"></circle>
            <circle class="star" cx="65.34%" cy="33.57%" r="1"></circle>
            <circle class="star" cx="91.81%" cy="70.63%" r="0.8"></circle>
            <circle class="star" cx="33.43%" cy="99.94%" r="1.1"></circle>
            <circle class="star" cx="57.38%" cy="95.85%" r="0.7"></circle>
            <circle class="star" cx="75.93%" cy="59.96%" r="1.1"></circle>
            <circle class="star" cx="89.41%" cy="11.8%" r="0.7"></circle>
            <circle class="star" cx="68.7%" cy="93.28%" r="1"></circle>
            <circle class="star" cx="1.33%" cy="32.57%" r="0.9"></circle>
            <circle class="star" cx="39.55%" cy="82.69%" r="1.4"></circle>
            <circle class="star" cx="35.92%" cy="64.51%" r="1.2"></circle>
            <circle class="star" cx="10.57%" cy="48.39%" r="1.1"></circle>
            <circle class="star" cx="20.98%" cy="74.05%" r="1"></circle>
            <circle class="star" cx="14.49%" cy="1.52%" r="0.8"></circle>
            <circle class="star" cx="70.37%" cy="25.22%" r="1.5"></circle>
            <circle class="star" cx="99.14%" cy="87.04%" r="0.8"></circle>
            <circle class="star" cx="67.65%" cy="62.38%" r="1"></circle>
            <circle class="star" cx="26.84%" cy="84.46%" r="0.7"></circle>
            <circle class="star" cx="27.95%" cy="13.91%" r="1.3"></circle>
            <circle class="star" cx="88.05%" cy="17.07%" r="1.1"></circle>
            <circle class="star" cx="78.74%" cy="23.93%" r="1.5"></circle>
            <circle class="star" cx="49.11%" cy="16.17%" r="1.4"></circle>
            <circle class="star" cx="95.35%" cy="62.9%" r="1.3"></circle>
            <circle class="star" cx="12.56%" cy="29.29%" r="1"></circle>
            <circle class="star" cx="26.2%" cy="92.16%" r="1.4"></circle>
            <circle class="star" cx="69.61%" cy="54.47%" r="1.5"></circle>
            <circle class="star" cx="92.36%" cy="93.02%" r="1.5"></circle>
            <circle class="star" cx="91.02%" cy="53.82%" r="0.9"></circle>
            <circle class="star" cx="15.99%" cy="78.13%" r="1.1"></circle>
            <circle class="star" cx="38.16%" cy="38.29%" r="1.2"></circle>
            <circle class="star" cx="32.52%" cy="14.1%" r="1.4"></circle>
            <circle class="star" cx="69.77%" cy="87.63%" r="0.6"></circle>
            <circle class="star" cx="22.39%" cy="70.4%" r="1.1"></circle>
            <circle class="star" cx="40.64%" cy="27.92%" r="0.9"></circle>
            <circle class="star" cx="13.49%" cy="56.72%" r="1.3"></circle>
            <circle class="star" cx="55.31%" cy="16.87%" r="0.8"></circle>
            <circle class="star" cx="59.64%" cy="31.49%" r="1.2"></circle>
            <circle class="star" cx="98.8%" cy="23.91%" r="0.9"></circle>
            <circle class="star" cx="7.63%" cy="32.59%" r="1.5"></circle>
            <circle class="star" cx="82.17%" cy="17.08%" r="1.4"></circle>
            <circle class="star" cx="43.35%" cy="12.9%" r="1.4"></circle>
            <circle class="star" cx="77.1%" cy="85.68%" r="0.7"></circle>
            <circle class="star" cx="15.08%" cy="60.18%" r="0.5"></circle>
            <circle class="star" cx="43.11%" cy="27.46%" r="1.4"></circle>
            <circle class="star" cx="18.81%" cy="71.5%" r="0.6"></circle>
            <circle class="star" cx="40.96%" cy="69.54%" r="1.2"></circle>
            <circle class="star" cx="75.53%" cy="68.56%" r="1.4"></circle>
            <circle class="star" cx="14.61%" cy="92.53%" r="1.5"></circle>
            <circle class="star" cx="74.14%" cy="49.66%" r="1.5"></circle>
            <circle class="star" cx="45.43%" cy="13.92%" r="1.1"></circle>
            <circle class="star" cx="29.74%" cy="93.04%" r="0.8"></circle>
            <circle class="star" cx="69.83%" cy="91.75%" r="0.8"></circle>
            <circle class="star" cx="92.5%" cy="94.55%" r="1.1"></circle>
            <circle class="star" cx="61.45%" cy="94.27%" r="0.6"></circle>
            <circle class="star" cx="0.61%" cy="17.31%" r="0.5"></circle>
            <circle class="star" cx="55.79%" cy="74.36%" r="1.1"></circle>
            <circle class="star" cx="75.88%" cy="63.62%" r="1.2"></circle>
            <circle class="star" cx="50.95%" cy="73.36%" r="0.8"></circle>
            <circle class="star" cx="1.58%" cy="53.87%" r="0.8"></circle>
            <circle class="star" cx="76.24%" cy="28.52%" r="1"></circle>
            <circle class="star" cx="55.44%" cy="54.46%" r="1"></circle>
            <circle class="star" cx="83.44%" cy="60.36%" r="0.7"></circle>
            <circle class="star" cx="24.76%" cy="6.6%" r="1.2"></circle>
            <circle class="star" cx="59.45%" cy="8.57%" r="1.2"></circle>
            <circle class="star" cx="36.59%" cy="29.57%" r="1.1"></circle>
            <circle class="star" cx="11.65%" cy="70.23%" r="0.6"></circle>
            <circle class="star" cx="8.44%" cy="13.89%" r="1.3"></circle>
            <circle class="star" cx="7.83%" cy="61.64%" r="1"></circle>
            <circle class="star" cx="87.93%" cy="50.75%" r="0.7"></circle>
            <circle class="star" cx="91.23%" cy="84.02%" r="0.8"></circle>
            <circle class="star" cx="63%" cy="97.81%" r="1.4"></circle>
            <circle class="star" cx="18.04%" cy="93.89%" r="0.5"></circle>
            <circle class="star" cx="81.76%" cy="14.95%" r="1.2"></circle>
            <circle class="star" cx="63.87%" cy="3.02%" r="0.9"></circle>
            <circle class="star" cx="4.81%" cy="29.39%" r="1.3"></circle>
            <circle class="star" cx="43.7%" cy="52.72%" r="0.8"></circle>
            <circle class="star" cx="95.48%" cy="79.28%" r="1.2"></circle>
            <circle class="star" cx="42.3%" cy="32.53%" r="0.5"></circle>
            <circle class="star" cx="7.5%" cy="13.45%" r="0.9"></circle>
            <circle class="star" cx="90.74%" cy="97.18%" r="0.6"></circle>
            <circle class="star" cx="24.42%" cy="82.04%" r="1.1"></circle>
            <circle class="star" cx="97.09%" cy="59%" r="1.2"></circle>
            <circle class="star" cx="37.46%" cy="48.29%" r="1.1"></circle>
            <circle class="star" cx="2.29%" cy="33.97%" r="1.1"></circle>
            <circle class="star" cx="92.23%" cy="97.69%" r="1.5"></circle>
            <circle class="star" cx="41.02%" cy="49.73%" r="1"></circle>
            <circle class="star" cx="7.28%" cy="29.9%" r="1.3"></circle>
            <circle class="star" cx="83.01%" cy="55.28%" r="1.1"></circle>
            <circle class="star" cx="24.05%" cy="86.39%" r="1.3"></circle>
            <circle class="star" cx="99.06%" cy="66.3%" r="0.9"></circle>
            <circle class="star" cx="98.73%" cy="84.71%" r="0.9"></circle>
            <circle class="star" cx="11.55%" cy="6.67%" r="1.1"></circle>
            <circle class="star" cx="32.37%" cy="44.96%" r="1.4"></circle>
            <circle class="star" cx="53.26%" cy="76.3%" r="0.5"></circle>
            <circle class="star" cx="65.59%" cy="33.9%" r="1.2"></circle>
            <circle class="star" cx="41.63%" cy="95.52%" r="1.3"></circle>
            <circle class="star" cx="36.68%" cy="74.46%" r="0.7"></circle>
            <circle class="star" cx="47.55%" cy="84.71%" r="0.8"></circle>
            <circle class="star" cx="55.25%" cy="64.92%" r="1"></circle>
            <circle class="star" cx="97.74%" cy="95.08%" r="1.2"></circle>
            <circle class="star" cx="48.74%" cy="67.81%" r="1.4"></circle>
            <circle class="star" cx="13.21%" cy="18.98%" r="0.8"></circle>
            <circle class="star" cx="52.75%" cy="2.37%" r="0.9"></circle>
            <circle class="star" cx="72.13%" cy="84.9%" r="0.9"></circle>
            <circle class="star" cx="20.95%" cy="34.41%" r="1.4"></circle>
            <circle class="star" cx="56.65%" cy="31.99%" r="1.4"></circle>
            <circle class="star" cx="78.02%" cy="96.8%" r="0.8"></circle>
            <circle class="star" cx="23.25%" cy="17.28%" r="1.5"></circle>
            <circle class="star" cx="46.91%" cy="37.99%" r="1.5"></circle>
            <circle class="star" cx="35.37%" cy="15.48%" r="1.2"></circle>
            <circle class="star" cx="92.1%" cy="64.71%" r="1"></circle>
            <circle class="star" cx="99.86%" cy="86.97%" r="0.8"></circle>
            <circle class="star" cx="60.32%" cy="31.18%" r="1"></circle>
            <circle class="star" cx="14.34%" cy="5.06%" r="0.8"></circle>
            <circle class="star" cx="80.51%" cy="73.36%" r="0.9"></circle>
            <circle class="star" cx="84.29%" cy="75.08%" r="0.8"></circle>
            <circle class="star" cx="58.58%" cy="7.78%" r="1.2"></circle>
            <circle class="star" cx="69.71%" cy="20.93%" r="1"></circle>
            <circle class="star" cx="36.29%" cy="73.98%" r="0.5"></circle>
            <circle class="star" cx="63.22%" cy="7.11%" r="1.4"></circle>
            <circle class="star" cx="23.84%" cy="38.52%" r="1"></circle>
            <circle class="star" cx="0.91%" cy="56.2%" r="1"></circle>
            <circle class="star" cx="26.29%" cy="58.15%" r="1"></circle>
            <circle class="star" cx="47.22%" cy="21.72%" r="0.5"></circle>
            <circle class="star" cx="3.34%" cy="31.08%" r="1.4"></circle>
            <circle class="star" cx="43.25%" cy="39.45%" r="1.3"></circle>
            <circle class="star" cx="52.37%" cy="0.63%" r="0.9"></circle>
            <circle class="star" cx="35.89%" cy="97.17%" r="0.6"></circle>
            <circle class="star" cx="99.27%" cy="66.55%" r="1"></circle>
            <circle class="star" cx="82.39%" cy="51.96%" r="1"></circle>
            <circle class="star" cx="79.41%" cy="84.82%" r="1.3"></circle>
            <circle class="star" cx="92.16%" cy="63.98%" r="1.4"></circle>
            <circle class="star" cx="93.13%" cy="56.38%" r="1"></circle>
            <circle class="star" cx="89.87%" cy="23.31%" r="0.5"></circle>
            <circle class="star" cx="78.98%" cy="28.12%" r="0.9"></circle>
            <circle class="star" cx="36.4%" cy="51.83%" r="0.8"></circle>
            <circle class="star" cx="15.32%" cy="46.37%" r="0.9"></circle>
            <circle class="star" cx="72.39%" cy="40.85%" r="0.9"></circle>
            <circle class="star" cx="48.8%" cy="60.69%" r="0.6"></circle>
            <circle class="star" cx="55.4%" cy="44.25%" r="1"></circle>
            <circle class="star" cx="32.02%" cy="12.86%" r="0.9"></circle>
            <circle class="star" cx="80.67%" cy="14.8%" r="1.1"></circle>
            <circle class="star" cx="25.92%" cy="19.78%" r="0.8"></circle>
            <circle class="star" cx="76.65%" cy="71.1%" r="1.3"></circle>
            <circle class="star" cx="85.65%" cy="28.4%" r="1.4"></circle>
            <circle class="star" cx="61.72%" cy="67.77%" r="1"></circle>
            <circle class="star" cx="14.91%" cy="71.37%" r="0.9"></circle>
            <circle class="star" cx="98.2%" cy="6.38%" r="0.8"></circle>
            <circle class="star" cx="39.9%" cy="28.26%" r="1.5"></circle>
            <circle class="star" cx="89.3%" cy="99.74%" r="0.9"></circle>
            <circle class="star" cx="51.03%" cy="30.74%" r="1.2"></circle>
            <circle class="star" cx="88.7%" cy="17.63%" r="0.8"></circle>
            <circle class="star" cx="80.02%" cy="27.07%" r="1.2"></circle>
            <circle class="star" cx="37.13%" cy="91.35%" r="1.4"></circle>
            <circle class="star" cx="6.85%" cy="91.83%" r="0.8"></circle>
            <circle class="star" cx="9.37%" cy="52.78%" r="1.1"></circle>
            <circle class="star" cx="55.32%" cy="37.03%" r="0.5"></circle>
            <circle class="star" cx="99.55%" cy="42.01%" r="0.9"></circle>
            <circle class="star" cx="6.91%" cy="25.67%" r="1.4"></circle>
            <circle class="star" cx="23.99%" cy="6.38%" r="0.6"></circle>
            <circle class="star" cx="47.9%" cy="60.47%" r="1.2"></circle>
            <circle class="star" cx="90.27%" cy="47.72%" r="1.4"></circle>
            <circle class="star" cx="37.65%" cy="84.18%" r="0.8"></circle>
            <circle class="star" cx="23.69%" cy="83%" r="1"></circle>
            <circle class="star" cx="15.5%" cy="73.32%" r="0.5"></circle>
            <circle class="star" cx="14.98%" cy="79.1%" r="1.4"></circle>
            <circle class="star" cx="99.01%" cy="59.55%" r="0.8"></circle>
            <circle class="star" cx="76.33%" cy="46.83%" r="0.8"></circle>
            <circle class="star" cx="52.14%" cy="14.53%" r="0.9"></circle>
            <circle class="star" cx="50.43%" cy="8.04%" r="1"></circle>
            <circle class="star" cx="9.63%" cy="22.8%" r="1"></circle>
            <circle class="star" cx="42.05%" cy="7.45%" r="1.5"></circle>
            <circle class="star" cx="23.88%" cy="78.62%" r="1.2"></circle>
            <circle class="star" cx="54.94%" cy="14.6%" r="1.1"></circle>
            <circle class="star" cx="92.51%" cy="14.39%" r="0.9"></circle>
            <circle class="star" cx="95.21%" cy="60.97%" r="1.5"></circle>
            <circle class="star" cx="0.88%" cy="75%" r="0.7"></circle>
            <circle class="star" cx="58.27%" cy="49.44%" r="1.2"></circle>
            <circle class="star" cx="82.78%" cy="10.82%" r="1.1"></circle>
            <circle class="star" cx="50.71%" cy="1.19%" r="1"></circle>
            <circle class="star" cx="53.41%" cy="77.25%" r="0.5"></circle>
            <circle class="star" cx="87.06%" cy="42.24%" r="0.9"></circle>
            <circle class="star" cx="99.28%" cy="25.95%" r="0.8"></circle>
            <circle class="star" cx="11.4%" cy="4.21%" r="0.8"></circle>
            <circle class="star" cx="91.95%" cy="80.76%" r="1.2"></circle>
            <circle class="star" cx="36.46%" cy="13.93%" r="1.4"></circle>
            <circle class="star" cx="73.86%" cy="78.3%" r="1.3"></circle>
            <circle class="star" cx="27.14%" cy="47.98%" r="0.7"></circle>
            <circle class="star" cx="69.73%" cy="26.11%" r="0.6"></circle>
            <circle class="star" cx="65.75%" cy="48.15%" r="1.1"></circle>
            </svg>
            <svg class="stars" width="100%" height="100%" preserveAspectRatio="none">
            <circle class="star" cx="21.16%" cy="12.02%" r="0.9"></circle>
            <circle class="star" cx="49.38%" cy="17.29%" r="1.1"></circle>
            <circle class="star" cx="50.31%" cy="19.92%" r="1.1"></circle>
            <circle class="star" cx="90.55%" cy="69.69%" r="1.3"></circle>
            <circle class="star" cx="50.15%" cy="89.59%" r="0.8"></circle>
            <circle class="star" cx="47.24%" cy="84.95%" r="1.5"></circle>
            <circle class="star" cx="64.46%" cy="64.24%" r="0.6"></circle>
            <circle class="star" cx="93.45%" cy="86.91%" r="0.9"></circle>
            <circle class="star" cx="30.18%" cy="10.43%" r="1"></circle>
            <circle class="star" cx="92.46%" cy="95.8%" r="1"></circle>
            <circle class="star" cx="24.97%" cy="22.05%" r="1"></circle>
            <circle class="star" cx="82.51%" cy="54.66%" r="1"></circle>
            <circle class="star" cx="76.17%" cy="50.64%" r="0.6"></circle>
            <circle class="star" cx="90.94%" cy="10.43%" r="1.5"></circle>
            <circle class="star" cx="96.78%" cy="67.54%" r="0.9"></circle>
            <circle class="star" cx="79.84%" cy="86.51%" r="1"></circle>
            <circle class="star" cx="89.9%" cy="69.9%" r="0.8"></circle>
            <circle class="star" cx="95.77%" cy="73.54%" r="0.9"></circle>
            <circle class="star" cx="9.54%" cy="22.51%" r="0.9"></circle>
            <circle class="star" cx="36.68%" cy="91.21%" r="0.9"></circle>
            <circle class="star" cx="40.58%" cy="33.69%" r="1.3"></circle>
            <circle class="star" cx="37.37%" cy="79.2%" r="1.5"></circle>
            <circle class="star" cx="41.96%" cy="65.56%" r="1.4"></circle>
            <circle class="star" cx="3.54%" cy="69.82%" r="0.9"></circle>
            <circle class="star" cx="4.05%" cy="51.78%" r="0.7"></circle>
            <circle class="star" cx="49.77%" cy="39.05%" r="1.3"></circle>
            <circle class="star" cx="63.51%" cy="80.11%" r="0.6"></circle>
            <circle class="star" cx="83.24%" cy="7.88%" r="0.6"></circle>
            <circle class="star" cx="32.64%" cy="63.29%" r="0.7"></circle>
            <circle class="star" cx="80.35%" cy="92.95%" r="1"></circle>
            <circle class="star" cx="61.01%" cy="71.76%" r="0.8"></circle>
            <circle class="star" cx="40.22%" cy="93.89%" r="0.5"></circle>
            <circle class="star" cx="8.08%" cy="76.86%" r="1.1"></circle>
            <circle class="star" cx="93.75%" cy="64.64%" r="0.7"></circle>
            <circle class="star" cx="52.94%" cy="99.18%" r="1.4"></circle>
            <circle class="star" cx="66.45%" cy="87.22%" r="1.4"></circle>
            <circle class="star" cx="95.93%" cy="93.37%" r="0.7"></circle>
            <circle class="star" cx="51.78%" cy="7.02%" r="1.4"></circle>
            <circle class="star" cx="16.26%" cy="95.9%" r="1"></circle>
            <circle class="star" cx="74.61%" cy="17.52%" r="0.9"></circle>
            <circle class="star" cx="27.66%" cy="78.96%" r="0.9"></circle>
            <circle class="star" cx="67.66%" cy="61.45%" r="1.3"></circle>
            <circle class="star" cx="26.53%" cy="40.78%" r="1.4"></circle>
            <circle class="star" cx="30.77%" cy="75.2%" r="1.3"></circle>
            <circle class="star" cx="42.24%" cy="16.5%" r="0.5"></circle>
            <circle class="star" cx="30.95%" cy="71.75%" r="1.2"></circle>
            <circle class="star" cx="0.71%" cy="8.07%" r="0.9"></circle>
            <circle class="star" cx="60.21%" cy="86.16%" r="0.5"></circle>
            <circle class="star" cx="92.37%" cy="78.93%" r="0.9"></circle>
            <circle class="star" cx="25.82%" cy="28.34%" r="1.3"></circle>
            <circle class="star" cx="3.16%" cy="76.11%" r="1.2"></circle>
            <circle class="star" cx="84.09%" cy="40.51%" r="0.9"></circle>
            <circle class="star" cx="63.26%" cy="16.57%" r="1.3"></circle>
            <circle class="star" cx="35.99%" cy="71.26%" r="1.5"></circle>
            <circle class="star" cx="60.27%" cy="85.82%" r="1"></circle>
            <circle class="star" cx="90.09%" cy="54.92%" r="1.2"></circle>
            <circle class="star" cx="55.6%" cy="57.53%" r="1.5"></circle>
            <circle class="star" cx="47.99%" cy="12.3%" r="0.8"></circle>
            <circle class="star" cx="37.94%" cy="84.72%" r="1"></circle>
            <circle class="star" cx="17.27%" cy="61.1%" r="0.9"></circle>
            <circle class="star" cx="7.02%" cy="24.51%" r="0.6"></circle>
            <circle class="star" cx="7.38%" cy="36.05%" r="1"></circle>
            <circle class="star" cx="51.63%" cy="30.06%" r="0.7"></circle>
            <circle class="star" cx="58.75%" cy="9.97%" r="0.7"></circle>
            <circle class="star" cx="32.15%" cy="16.06%" r="0.6"></circle>
            <circle class="star" cx="55.3%" cy="52.47%" r="0.7"></circle>
            <circle class="star" cx="93.12%" cy="77.16%" r="0.5"></circle>
            <circle class="star" cx="48.85%" cy="32.96%" r="0.9"></circle>
            <circle class="star" cx="87.87%" cy="67.22%" r="1"></circle>
            <circle class="star" cx="29.25%" cy="85.72%" r="0.6"></circle>
            <circle class="star" cx="66.95%" cy="93.91%" r="0.7"></circle>
            <circle class="star" cx="72.74%" cy="25.04%" r="1.4"></circle>
            <circle class="star" cx="15.41%" cy="64.77%" r="0.6"></circle>
            <circle class="star" cx="57.09%" cy="99.69%" r="1.3"></circle>
            <circle class="star" cx="7.27%" cy="95.85%" r="1.1"></circle>
            <circle class="star" cx="36.97%" cy="10.62%" r="1"></circle>
            <circle class="star" cx="3.22%" cy="0.55%" r="1.2"></circle>
            <circle class="star" cx="94.92%" cy="18.62%" r="1.3"></circle>
            <circle class="star" cx="27.47%" cy="18.9%" r="0.7"></circle>
            <circle class="star" cx="91.53%" cy="55.08%" r="0.8"></circle>
            <circle class="star" cx="51.28%" cy="95.62%" r="1.5"></circle>
            <circle class="star" cx="76.07%" cy="13.06%" r="0.9"></circle>
            <circle class="star" cx="62.5%" cy="41.96%" r="0.7"></circle>
            <circle class="star" cx="77.87%" cy="48.13%" r="1.1"></circle>
            <circle class="star" cx="16.81%" cy="84.39%" r="0.9"></circle>
            <circle class="star" cx="79.67%" cy="62.25%" r="0.9"></circle>
            <circle class="star" cx="3.72%" cy="30.67%" r="1"></circle>
            <circle class="star" cx="58.64%" cy="45.02%" r="1.1"></circle>
            <circle class="star" cx="22.91%" cy="3.51%" r="1.3"></circle>
            <circle class="star" cx="68.51%" cy="4.6%" r="1"></circle>
            <circle class="star" cx="67.24%" cy="68.95%" r="0.5"></circle>
            <circle class="star" cx="2.06%" cy="68.48%" r="1.1"></circle>
            <circle class="star" cx="58.11%" cy="18.18%" r="1.4"></circle>
            <circle class="star" cx="31.61%" cy="60.94%" r="0.8"></circle>
            <circle class="star" cx="10.13%" cy="82.83%" r="0.8"></circle>
            <circle class="star" cx="67.99%" cy="39.37%" r="1.1"></circle>
            <circle class="star" cx="16.19%" cy="39.01%" r="0.6"></circle>
            <circle class="star" cx="91.71%" cy="75.51%" r="0.6"></circle>
            <circle class="star" cx="9.17%" cy="40.44%" r="1.5"></circle>
            <circle class="star" cx="44.65%" cy="93.51%" r="0.7"></circle>
            <circle class="star" cx="2.65%" cy="51.4%" r="1.3"></circle>
            <circle class="star" cx="55.41%" cy="15.14%" r="1"></circle>
            <circle class="star" cx="95.64%" cy="66.79%" r="1.2"></circle>
            <circle class="star" cx="62.47%" cy="75.56%" r="1.2"></circle>
            <circle class="star" cx="2.39%" cy="79.44%" r="1.2"></circle>
            <circle class="star" cx="62.09%" cy="26.93%" r="0.8"></circle>
            <circle class="star" cx="28.81%" cy="11.06%" r="0.5"></circle>
            <circle class="star" cx="54.37%" cy="75.98%" r="0.8"></circle>
            <circle class="star" cx="39.21%" cy="76.83%" r="0.5"></circle>
            <circle class="star" cx="26.43%" cy="10.83%" r="0.6"></circle>
            <circle class="star" cx="60.09%" cy="63.43%" r="0.5"></circle>
            <circle class="star" cx="78.13%" cy="80.33%" r="1.1"></circle>
            <circle class="star" cx="8.47%" cy="33.99%" r="1"></circle>
            <circle class="star" cx="87.8%" cy="97.88%" r="1.1"></circle>
            <circle class="star" cx="29.97%" cy="92.78%" r="0.8"></circle>
            <circle class="star" cx="88.58%" cy="59.11%" r="1.2"></circle>
            <circle class="star" cx="52.17%" cy="85.93%" r="1.4"></circle>
            <circle class="star" cx="92.77%" cy="65.56%" r="0.8"></circle>
            <circle class="star" cx="93.8%" cy="63.29%" r="1.1"></circle>
            <circle class="star" cx="41.2%" cy="89.22%" r="1"></circle>
            <circle class="star" cx="21.7%" cy="52.97%" r="0.8"></circle>
            <circle class="star" cx="38.19%" cy="47.15%" r="0.5"></circle>
            <circle class="star" cx="72.44%" cy="14.94%" r="0.9"></circle>
            <circle class="star" cx="13.32%" cy="33.35%" r="0.6"></circle>
            <circle class="star" cx="39.18%" cy="27.92%" r="1.3"></circle>
            <circle class="star" cx="23.67%" cy="85.9%" r="0.9"></circle>
            <circle class="star" cx="15.15%" cy="28.94%" r="0.8"></circle>
            <circle class="star" cx="71.13%" cy="89.66%" r="1.2"></circle>
            <circle class="star" cx="54.32%" cy="9.67%" r="1"></circle>
            <circle class="star" cx="94.27%" cy="97.71%" r="1.3"></circle>
            <circle class="star" cx="12.13%" cy="63.4%" r="1.5"></circle>
            <circle class="star" cx="22.05%" cy="56.73%" r="1"></circle>
            <circle class="star" cx="6.37%" cy="13.53%" r="1"></circle>
            <circle class="star" cx="42.14%" cy="99.66%" r="0.8"></circle>
            <circle class="star" cx="13.92%" cy="19.43%" r="0.6"></circle>
            <circle class="star" cx="13.44%" cy="87.2%" r="1.3"></circle>
            <circle class="star" cx="89.83%" cy="5.17%" r="0.6"></circle>
            <circle class="star" cx="0.03%" cy="17.22%" r="0.5"></circle>
            <circle class="star" cx="34.52%" cy="41.68%" r="0.9"></circle>
            <circle class="star" cx="71.13%" cy="41.25%" r="0.5"></circle>
            <circle class="star" cx="53.23%" cy="92.23%" r="0.7"></circle>
            <circle class="star" cx="32.85%" cy="39.56%" r="1.2"></circle>
            <circle class="star" cx="69.14%" cy="75.1%" r="1.3"></circle>
            <circle class="star" cx="84.19%" cy="15.47%" r="0.8"></circle>
            <circle class="star" cx="4.93%" cy="37.24%" r="1.2"></circle>
            <circle class="star" cx="90.61%" cy="50.48%" r="0.9"></circle>
            <circle class="star" cx="70.06%" cy="68.41%" r="1.2"></circle>
            <circle class="star" cx="55.62%" cy="74.04%" r="0.9"></circle>
            <circle class="star" cx="39.79%" cy="39.4%" r="0.7"></circle>
            <circle class="star" cx="46.47%" cy="28.11%" r="0.6"></circle>
            <circle class="star" cx="46.41%" cy="75.3%" r="0.7"></circle>
            <circle class="star" cx="8.36%" cy="30.39%" r="0.5"></circle>
            <circle class="star" cx="43.19%" cy="5.04%" r="1.2"></circle>
            <circle class="star" cx="88.08%" cy="45.91%" r="0.8"></circle>
            <circle class="star" cx="69.66%" cy="95.83%" r="1.5"></circle>
            <circle class="star" cx="74.61%" cy="36.87%" r="0.8"></circle>
            <circle class="star" cx="15.33%" cy="45.85%" r="1"></circle>
            <circle class="star" cx="19.76%" cy="28.84%" r="1.4"></circle>
            <circle class="star" cx="41.61%" cy="27.06%" r="1.1"></circle>
            <circle class="star" cx="80.69%" cy="42.52%" r="0.5"></circle>
            <circle class="star" cx="93.42%" cy="13.02%" r="0.8"></circle>
            <circle class="star" cx="32.79%" cy="10.57%" r="1"></circle>
            <circle class="star" cx="48.95%" cy="97.89%" r="0.8"></circle>
            <circle class="star" cx="82.31%" cy="13.69%" r="0.9"></circle>
            <circle class="star" cx="70%" cy="1.2%" r="0.9"></circle>
            <circle class="star" cx="74.21%" cy="28.44%" r="0.6"></circle>
            <circle class="star" cx="86.95%" cy="65.51%" r="1"></circle>
            <circle class="star" cx="2.72%" cy="8.49%" r="1.2"></circle>
            <circle class="star" cx="38.83%" cy="46.21%" r="0.6"></circle>
            <circle class="star" cx="15.59%" cy="73.44%" r="1.2"></circle>
            <circle class="star" cx="22.91%" cy="16.35%" r="1.4"></circle>
            <circle class="star" cx="90.87%" cy="42.56%" r="0.8"></circle>
            <circle class="star" cx="32.62%" cy="28.16%" r="0.9"></circle>
            <circle class="star" cx="25.67%" cy="20.09%" r="1.3"></circle>
            <circle class="star" cx="73.6%" cy="70.8%" r="1.1"></circle>
            <circle class="star" cx="5.7%" cy="59.35%" r="1.1"></circle>
            <circle class="star" cx="54.89%" cy="1.18%" r="1.4"></circle>
            <circle class="star" cx="64.09%" cy="43.08%" r="1.3"></circle>
            <circle class="star" cx="11.35%" cy="76.37%" r="1.2"></circle>
            <circle class="star" cx="45.34%" cy="2.21%" r="0.8"></circle>
            <circle class="star" cx="58.02%" cy="97.9%" r="1.1"></circle>
            <circle class="star" cx="48.36%" cy="10.25%" r="0.8"></circle>
            <circle class="star" cx="21.51%" cy="78.44%" r="1"></circle>
            <circle class="star" cx="30.46%" cy="29.5%" r="0.9"></circle>
            <circle class="star" cx="92.63%" cy="52.32%" r="0.8"></circle>
            <circle class="star" cx="46.91%" cy="35.15%" r="1.4"></circle>
            <circle class="star" cx="1.39%" cy="55.35%" r="1"></circle>
            <circle class="star" cx="40.1%" cy="67.37%" r="1"></circle>
            <circle class="star" cx="16.82%" cy="1.09%" r="0.5"></circle>
            <circle class="star" cx="4.57%" cy="69.34%" r="0.8"></circle>
            <circle class="star" cx="67.68%" cy="21.93%" r="1.1"></circle>
            <circle class="star" cx="1.02%" cy="98.7%" r="0.7"></circle>
            <circle class="star" cx="89.76%" cy="1.05%" r="0.8"></circle>
            <circle class="star" cx="55.13%" cy="6.66%" r="1.3"></circle>
            <circle class="star" cx="53.34%" cy="95.42%" r="0.9"></circle>
            <circle class="star" cx="71.72%" cy="24.89%" r="0.5"></circle>
            <circle class="star" cx="91.35%" cy="29.18%" r="1.4"></circle>
            <circle class="star" cx="80.76%" cy="55.62%" r="1.5"></circle>
            <circle class="star" cx="63.65%" cy="48.47%" r="0.8"></circle>
            <circle class="star" cx="88.16%" cy="29.04%" r="0.6"></circle>
            </svg>
            <svg class="extras" width="100%" height="100%" preserveAspectRatio="none">
            <defs>
            <radialGradient id="comet-gradient" ="" cx="0" cy=".5" r="0.5">
            <stop offset="0%" stop-color="rgba(255,255,255,.8)"></stop>
            <stop offset="100%" stop-color="rgba(255,255,255,0)"></stop>
            </radialGradient>
            </defs>
            <g transform="rotate(-135)">
            <ellipse class="comet comet-a" fill="url(#comet-gradient)" cx="0" cy="0" rx="150" ry="2"></ellipse>
            </g>
            <g transform="rotate(20)">
            <ellipse class="comet comet-b" fill="url(#comet-gradient)" cx="100%" cy="0" rx="150" ry="2"></ellipse>
            </g>
            <g transform="rotate(300)">
            <ellipse class="comet comet-c" fill="url(#comet-gradient)" cx="40%" cy="100%" rx="150" ry="2"></ellipse>
            </g>
            </svg>
        </div>
        <script type="text/javascript">

            var fw_spread = 250 // how wide the particles expand
            var fw_scale = 5  // how large the particles get
            var fw_launch_rate = 1000 // in milliseconds 

            function createFirework() {
                var f = document.createElement('div')
                f.className = 'firework'
                f.style.width = '3px'
                f.style.height = '3px'
                f.style.position = 'absolute'
                var fx = Math.random() * 100 + '%'
                f.style.left = Math.random() * 33 + 33 + '%'
                f.style.top = '100%'
                var clr = 'hsl(' + Math.random() * 360 + 'deg,100%,50%)'
                var clr2 = 'hsla(' + Math.random() * 360 + 'deg,100%,50%,0.1)'
                // f.style.backgroundColor = clr
                f.style.transition = Math.random() < .5 ? 'ease-out ' + 3 + 's' : 'ease-in ' + 2.5 + 's'

                document.body.appendChild(f)

                for (var i = 0; i < 25; i++) {
                    var p = document.createElement('div')
                    p.className = 'particle'
                    p.style.width = '100%'
                    p.style.height = '100%'
                    p.style.backgroundColor = clr
                    p.style.position = 'absolute'
                    p.style.left = '0'
                    p.style.top = '0'
                    p.style.transition = '.5s'
                    p.style.borderRadius = '50%'
                    f.appendChild(p)
                }

                setTimeout(function () {
                    f.style.top = Math.random() * 50 + 5 + '%'
                    // f.style.left = fx    
                    f.ontransitionend = function () {

                        var p = this.querySelectorAll('.particle')
                        p.forEach(function (elm) {
                            var x = Math.random() < .5 ? Math.random() * fw_spread : (-1) * Math.random() * fw_spread
                            var y = Math.random() < .5 ? Math.random() * fw_spread : (-1) * Math.random() * fw_spread
                            elm.style.left = x + 'px'
                            elm.style.top = y + 'px'
                            elm.style.opacity = '0'
                            elm.style.transform = 'scale(' + fw_scale + ')'
                            // elm.style.borderRadius = '50%'
                            // elm.style.filter = 'blur(1px)'
                            document.body.style.setProperty('--bg-color', clr)
                            document.getElementById("canvas").style.backgroundColor = clr2;
                            elm.ontransitionend = function () {
                                this.remove()
                            }
                        })
                        setTimeout(function () {
                            f.remove()
                        }, 1000)
                    }
                }, 100)

                setTimeout(createFirework, fw_launch_rate)
            }

            createFirework()
            // window.addEventListener('click', createFirework)

            const canvas = document.getElementById("canvas");
            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;
            var ctx = canvas.getContext("2d");
            function Firework(x, y, height, yVol, R, G, B) {
                this.x = x;
                this.y = y;
                this.yVol = yVol;
                this.height = height;
                this.R = R;
                this.G = G;
                this.B = B;
                this.radius = 2;
                this.boom = false;
                var boomHeight = Math.floor(Math.random() * 200) + 50;
                this.draw = function () {

                    ctx.fillStyle = "rgba(" + R + "," + G + "," + B + ")";
                    ctx.strokeStyle = "rgba(" + R + "," + G + "," + B + ")";
                    ctx.beginPath();
                    //   ctx.arc(this.x,boomHeight,this.radius,Math.PI * 2,0,false);
                    ctx.stroke();
                    ctx.beginPath();
                    ctx.arc(this.x, this.y, 3, Math.PI * 2, 0, false);
                    ctx.fill();
                }
                this.update = function () {
                    this.y -= this.yVol;
                    if (this.radius < 20) {
                        this.radius += 0.35;
                    }
                    if (this.y < boomHeight) {
                        this.boom = true;

                        for (var i = 0; i < 120; i++) {
                            particleArray.push(new Particle(
                                    this.x,
                                    this.y,
                                    // (Math.random() * 2) + 0.5//
                                            (Math.random() * 2) + 1,
                                            this.R,
                                            this.G,
                                            this.B,
                                            1,
                                            ))

                        }
                    }
                    this.draw();
                }
                this.update()
            }

            window.addEventListener("click", (e) => {
                var x = e.clientX;
                var y = canvas.height;
                var R = Math.floor(Math.random() * 255)
                var G = Math.floor(Math.random() * 255)
                var B = Math.floor(Math.random() * 255)
                var height = (Math.floor(Math.random() * 20)) + 10;
                fireworkArray.push(new Firework(x, y, height, 5, R, G, B))
            })

            function Particle(x, y, radius, R, G, B, A) {
                this.x = x;
                this.y = y;
                this.radius = radius;
                this.R = R;
                this.G = G;
                this.B = B;
                this.A = A;
                this.timer = 0;
                this.fade = false;

                // Change random spread
                this.xVol = (Math.random() * 10) - 4
                this.yVol = (Math.random() * 10) - 4


                console.log(this.xVol, this.yVol)
                this.draw = function () {
                    //   ctx.globalCompositeOperation = "lighter"
                    ctx.fillStyle = "rgba(" + R + "," + G + "," + B + "," + this.A + ")";
                    ctx.save();
                    ctx.beginPath();
                    // ctx.fillStyle = "white"
                    ctx.globalCompositeOperation = "screen"
                    ctx.arc(this.x, this.y, this.radius, Math.PI * 2, 0, false);
                    ctx.fill();

                    ctx.restore();
                }
                this.update = function () {
                    this.x += this.xVol;
                    this.y += this.yVol;

                    // Comment out to stop gravity. 
                    if (this.timer < 200) {
                        this.yVol += 0.12;
                    }
                    this.A -= 0.02;
                    if (this.A < 0) {
                        this.fade = true;
                    }
                    this.draw();
                }
                this.update();
            }

            var fireworkArray = [];
            var particleArray = [];
            for (var i = 0; i < 6; i++) {
                var x = Math.random() * canvas.width;
                var y = canvas.height;
                var R = Math.floor(Math.random() * 255)
                var G = Math.floor(Math.random() * 255)
                var B = Math.floor(Math.random() * 255)
                var height = (Math.floor(Math.random() * 20)) + 10;
                fireworkArray.push(new Firework(x, y, height, 5, R, G, B))
            }


            function animate() {
                requestAnimationFrame(animate);
                // ctx.clearRect(0,0,canvas.width,canvas.height)
                ctx.fillStyle = "rgba(0,0,0,0.1)"
                ctx.fillRect(0, 0, canvas.width, canvas.height);
                for (var i = 0; i < fireworkArray.length; i++) {
                    fireworkArray[i].update();
                }
                for (var j = 0; j < particleArray.length; j++) {
                    particleArray[j].update();
                }
                if (fireworkArray.length < 4) {
                    var x = Math.random() * canvas.width;
                    var y = canvas.height;
                    var height = Math.floor(Math.random() * 20);
                    var yVol = 5;
                    var R = Math.floor(Math.random() * 255);
                    var G = Math.floor(Math.random() * 255);
                    var B = Math.floor(Math.random() * 255);
                    fireworkArray.push(new Firework(x, y, height, yVol, R, G, B));
                }


                fireworkArray = fireworkArray.filter(obj => !obj.boom);
                particleArray = particleArray.filter(obj => !obj.fade);
            }
            animate();

            window.addEventListener("resize", (e) => {
                canvas.width = window.innerWidth;
                canvas.height = window.innerHeight;
            })

        </script>
    </body>
</html>
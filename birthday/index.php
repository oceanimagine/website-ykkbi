<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(date("m-d") != "02-24"){
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
            }
            

        </style>
    </head>

    <body class="fireworks">
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
        
            $date1 = new DateTime("1992-02-24");
            $date2 = new DateTime(date("Y-m-d"));
            $interval = $date1->diff($date2);

            ?>
            <h1>HUT YKKBI KE <?php echo $interval->y; ?></h1>
            <h4 onclick="window.location = '../';" style="cursor: pointer;">Kembali ke Website</h4>
            <img class="kueultah" src="../assets/img/Kue Ulang Tahun.png" />
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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RestroBook | Access Denied</title>
    <style>
        @import url("https://fonts.googleapis.com/css?family=Comfortaa");

        * {
            box-sizing: border-box;
        }

        body,
        html {
            margin: 0;
            padding: 0;
            height: 100%;
            overflow: hidden;
        }

        body {
            background-color: black;
            color: white;
        }

        h1 {
            color: red;
        }

        h6 {
            color: red;
            text-decoration: underline;
        }


        .lock {
            transition: 0.5s ease;
            position: relative;
            overflow: hidden;
            opacity: 0;
            z-index: -100;
        }

        .lock.generated {
            transform: scale(0.5);
            position: absolute;
            -webkit-animation: 2s move linear;
            animation: 9s move linear;
            -webkit-animation-fill-mode: forwards;
            animation-fill-mode: forwards;
            filter: blur(1.5px);
        }

        .lock ::after {
            content: "";
            background: #a74006;
            opacity: 0.3;
            display: block;
            position: absolute;
            height: 100%;
            width: 50%;
            top: 0;
            left: 0;
        }

        .lock .bottom {
            background: #940023;
            height: 40px;
            width: 60px;
            display: block;
            position: relative;
            margin: 0 auto;
        }

        .lock .top {
            height: 60px;
            width: 50px;
            border-radius: 50%;
            border: 10px solid #fff;
            display: block;
            position: relative;
            top: 30px;
            margin: 0 auto;
        }

        .lock .top::after {
            padding: 10px;
            border-radius: 50%;
        }

        .main {
            min-height: 100vh;
            width: 100%;
            display: flex;
            flex-wrap: nowrap;
            flex-direction: column;
            justify-content: center;
        }

        .main-mid {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            text-align: center;
        }

        .w-100 {
            width: 100%;
        }

        .animate-top {
            position: relative;
            animation: animatetop 0.4s
        }
        .jumbo{
            font-size:64px
        }

        @keyframes animatetop {
            from {
                top: -300px;
                opacity: 0
            }

            to {
                top: 0;
                opacity: 1
            }
        }

        .animate-left {
            position: relative;
            animation: animateleft 0.4s
        }

        @keyframes animateleft {
            from {
                left: -300px;
                opacity: 0
            }

            to {
                left: 0;
                opacity: 1
            }
        }

        .animate-right {
            position: relative;
            animation: animateright 0.4s
        }

        @keyframes animateright {
            from {
                right: -300px;
                opacity: 0
            }

            to {
                right: 0;
                opacity: 1
            }
        }


        .animate-zoom {
            animation: animatezoom 0.6s
        }

        @keyframes animatezoom {
            from {
                transform: scale(0)
            }

            to {
                transform: scale(1)
            }
        }


        @-webkit-keyframes move {
            to {
                top: 100%;
            }
        }

        @keyframes move {
            to {
                top: 100%;
            }
        }

        @media (max-width: 420px) {
            .container {
                transform: translate(-50%, -50%) scale(0.8);
            }

            .lock.generated {
                transform: scale(0.3);
            }
        }
    </style>
</head>

<body>
    <div class="main">
        <div class="main-mid">
            <h1 class="w-100 animate-top jumbo"><code>Access Denied</code></h1>
            <hr class="w-100 animate-left" style="margin:auto;width:50%">
            <h3 class="w-100 animate-right">You dont have permission to view this site.</h3>
            <h3 class="w-100 animate-zoom">🚫🚫🚫🚫</h3>
            <h6 class="w-100 animate-zoom">error code:403 forbidden</h6>
        </div>
    </div>
    <script>
        const interval = 500;

        function generateLocks() {
            const lock = document.createElement('div'),
                position = generatePosition();
            lock.innerHTML = '<div class="top"></div><div class="bottom"></div>';
            lock.style.top = position[0];
            lock.style.left = position[1];
            lock.classList = 'lock' // generated';
            document.body.appendChild(lock);
            setTimeout(() => {
                lock.style.opacity = '1';
                lock.classList.add('generated');
            }, 100);
            setTimeout(() => {
                lock.parentElement.removeChild(lock);
            }, 2000);
        }

        function generatePosition() {
            const x = Math.round((Math.random() * 100) - 10) + '%';
            const y = Math.round(Math.random() * 100) + '%';
            return [x, y];
        }
        setInterval(generateLocks, interval);
        generateLocks();
    </script>
</body>

</html>
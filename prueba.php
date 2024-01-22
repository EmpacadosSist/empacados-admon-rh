<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Efecto de carga con Anime.js</title>
    <style>
        body {
            margin: 0;
            overflow: hidden;
        }

        .container-wrapper {
            position: relative;
            width: 100vw;
            height: 100vh;
            display: flex;
            justify-content: space-between;
        }

        .corner-container {
            position: absolute;
            top: 0;
            bottom: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .image-container {
            opacity: 0;
            width: 89;
        }

        .image {
            width: 70%;
            max-width: 150px;
            height: auto;
        }

        #top-left {
            left: 22;
        }

        #top-right {
            right: 0;
        }

        #bottom-left {
            left: 0;
        }

        #bottom-right {
            right: 0;
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
</head>
<body>

<div class="container-wrapper">
    <div class="corner-container" id="top-left">
        <div class="image-container">
            <img class="image" src="assets/img/arroz.png" alt="Imagen1">
        </div>
        <div class="image-container">
            <img class="image" src="assets/img/arroz.png" alt="Imagen2">
        </div>
        <div class="image-container">
            <img class="image" src="assets/img/arroz.png" alt="Imagen3">
        </div>
        <!-- Agrega más imágenes aquí -->
        <div class="image-container">
            <img class="image" src="assets/img/arroz.png" alt="Imagen4">
        </div>
        <div class="image-container">
            <img class="image" src="assets/img/arroz.png" alt="Imagen5">
        </div>
        <div class="image-container">
            <img class="image" src="assets/img/arroz.png" alt="Imagen24">
        </div>
    </div>

    <div class="corner-container" id="top-right">
        <div class="image-container">
            <img class="image" src="assets/img/arroz.png" alt="Imagen6">
        </div>
        <div class="image-container">
            <img class="image" src="assets/img/arroz.png" alt="Imagen7">
        </div>
        <div class="image-container">
            <img class="image" src="assets/img/arroz.png" alt="Imagen8">
        </div>
        <!-- Agrega más imágenes aquí -->
        <div class="image-container">
            <img class="image" src="assets/img/arroz.png" alt="Imagen9">
        </div>
        <div class="image-container">
            <img class="image" src="assets/img/arroz.png" alt="Imagen10">
        </div>
        <div class="image-container">
            <img class="image" src="assets/img/arroz.png" alt="Imagen23">
        </div>
    </div>

    <div class="corner-container" id="bottom-left">
        <div class="image-container">
            <img class="image" src="assets/img/arroz.png" alt="Imagen11">
        </div>
        <div class="image-container">
            <img class="image" src="assets/img/arroz.png" alt="Imagen12">
        </div>
        <div class="image-container">
            <img class="image" src="assets/img/arroz.png" alt="Imagen13">
        </div>
        <!-- Agrega más imágenes aquí -->
        <div class="image-container">
            <img class="image" src="assets/img/arroz.png" alt="Imagen14">
        </div>
        <div class="image-container">
            <img class="image" src="assets/img/arroz.png" alt="Imagen15">
        </div>
        <div class="image-container">
            <img class="image" src="assets/img/arroz.png" alt="Imagen22">
        </div>
    </div>

    <div class="corner-container" id="bottom-right">
        <div class="image-container">
            <img class="image" src="assets/img/arroz.png" alt="Imagen16">
        </div>
        <div class="image-container">
            <img class="image" src="assets/img/arroz.png" alt="Imagen17">
        </div>
        <div class="image-container">
            <img class="image" src="assets/img/arroz.png" alt="Imagen18">
        </div>
        <!-- Agrega más imágenes aquí -->
        <div class="image-container">
            <img class="image" src="assets/img/arroz.png" alt="Imagen19">
        </div>
        <div class="image-container">
            <img class="image" src="assets/img/arroz.png" alt="Imagen20">
        </div>
        <div class="image-container">
            <img class="image" src="assets/img/arroz.png" alt="Imagen21">
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        var cornerContainers = document.querySelectorAll('.corner-container');
        var images = document.querySelectorAll('.image-container');

        function animateImages() {
            cornerContainers.forEach(function(container, index) {
                var options = {
                    targets: container,
                    translateX: index % 2 === 0 ? ['-100%', 0] : ['100%', 0],
                    translateY: index < 2 ? ['-100%', 0] : ['100%', 0],
                    scale: [0, 1], // Efecto de escala
                    rotate: [180, 0], // Efecto de rotación
                    duration: 1000,
                    easing: 'easeInOutQuad',
                    delay: 300 * index,
                    complete: function(anim) {
                        images.forEach(function(img, imgIndex) {
                            if (Math.floor(imgIndex / 3) === index) {
                                anime({
                                    targets: img,
                                    opacity: [0, 1],
                                    duration: 500,
                                    easing: 'easeInOutQuad',
                                    delay: 100 * (imgIndex % 3),
                                });
                            }
                        });
                    }
                };

                anime(options);
            });
        }

        animateImages();
    });
</script>

</body>
</html>

<?php 
  require_once('layout/session.php');
  require_once('helpers/utils.php');
  require_once('helpers/Consultas.php');
  require 'nav.php'; 
?>
<?php require 'layout/libreriasdatatable2.php';?>
<?php require_once('layout/sidebar.php'); ?>

<script type="text/javascript">
  document.oncontextmenu = function(){
    return false;
  }
</script>

<script>
  document.title = "Organigrama Empacados"

  window.onload = function() {
    if (window.location.href.includes('organigrama.php#')) {
        // Redirigir a la URL base 'organigrama.php' al recargar
        window.history.replaceState({}, document.title, "organigrama.php");
        setTimeout(() => {
          window.history.replaceState({}, document.title, "organigrama.php");
        }, 25000);
    }
};
</script>
<!doctype html>
<html>
  <head>
    <meta data-n-head="1" charset="utf-8" />
    <meta
      data-n-head="1"
      name="viewport"
      content="width=device-width,initial-scale=1"
    />
    <meta
      data-n-head="1"
      data-hid="description"
      name="description"
      content="Free Organization Chart generator and viewer"
    />
    <meta
      data-n-head="1"
      data-hid="keywords"
      name="keywords"
      content="vuejs, nuxt, javascript, orgchart, organization, open-source"
    />
    <meta
      data-n-head="1"
      name="google-site-verification"
      content="faMBWsCcw7RZQp1wVNh-Hgy7aQ8D2KMMNpwg0LKtsu4"
    />
    <title>Organigrama</title>
    <script data-n-head="1" src="translate.js"></script>
    <!-- <script data-n-head="1" src="datas.js"></script> -->
    <?php require "data.php" ?>
    <script data-n-head="1" src="config.js"></script>
    <link rel="preload" href="./e8cd43a.js" as="script" />
    <link rel="preload" href="./a865292.js" as="script" />
    <link rel="preload" href="./8e0b1c0.js" as="script" />
    <link rel="preload" href="./1b3c704.js" as="script" />
    
  </head>
  <body class="toggle-sidebar">
    <div id="__nuxt">

      <style>

        title{
          padding: 1rem;
        }

        #__nuxt,
        body,
        html {
          background: #fff;
          width: 100%;
          height: 100%;
          display: flex;
          justify-content: center;
          align-items: center;
          margin: 0;
          padding: 0;
        }
        .sk-circle {
          width: 40px;
          height: 40px;
          position: relative;
        }
        .sk-circle .sk-child {
          width: 100%;
          height: 100%;
          position: absolute;
          left: 0;
          top: 0;
        }
        .sk-circle .sk-child:before {
          content: '';
          display: block;
          margin: 0 auto;
          width: 15%;
          height: 15%;
          background-color: #05668d;
          border-radius: 100%;
          -webkit-animation: sk-circleBounceDelay 1.2s infinite
            ease-in-out both;
          animation: sk-circleBounceDelay 1.2s infinite ease-in-out
            both;
        }
        .sk-circle .sk-circle2 {
          -webkit-transform: rotate(30deg);
          -ms-transform: rotate(30deg);
          transform: rotate(30deg);
        }
        .sk-circle .sk-circle3 {
          -webkit-transform: rotate(60deg);
          -ms-transform: rotate(60deg);
          transform: rotate(60deg);
        }
        .sk-circle .sk-circle4 {
          -webkit-transform: rotate(90deg);
          -ms-transform: rotate(90deg);
          transform: rotate(90deg);
        }
        .sk-circle .sk-circle5 {
          -webkit-transform: rotate(120deg);
          -ms-transform: rotate(120deg);
          transform: rotate(120deg);
        }
        .sk-circle .sk-circle6 {
          -webkit-transform: rotate(150deg);
          -ms-transform: rotate(150deg);
          transform: rotate(150deg);
        }
        .sk-circle .sk-circle7 {
          -webkit-transform: rotate(180deg);
          -ms-transform: rotate(180deg);
          transform: rotate(180deg);
        }
        .sk-circle .sk-circle8 {
          -webkit-transform: rotate(210deg);
          -ms-transform: rotate(210deg);
          transform: rotate(210deg);
        }
        .sk-circle .sk-circle9 {
          -webkit-transform: rotate(240deg);
          -ms-transform: rotate(240deg);
          transform: rotate(240deg);
        }
        .sk-circle .sk-circle10 {
          -webkit-transform: rotate(270deg);
          -ms-transform: rotate(270deg);
          transform: rotate(270deg);
        }
        .sk-circle .sk-circle11 {
          -webkit-transform: rotate(300deg);
          -ms-transform: rotate(300deg);
          transform: rotate(300deg);
        }
        .sk-circle .sk-circle12 {
          -webkit-transform: rotate(330deg);
          -ms-transform: rotate(330deg);
          transform: rotate(330deg);
        }
        .sk-circle .sk-circle2:before {
          -webkit-animation-delay: -1.1s;
          animation-delay: -1.1s;
        }
        .sk-circle .sk-circle3:before {
          -webkit-animation-delay: -1s;
          animation-delay: -1s;
        }
        .sk-circle .sk-circle4:before {
          -webkit-animation-delay: -0.9s;
          animation-delay: -0.9s;
        }
        .sk-circle .sk-circle5:before {
          -webkit-animation-delay: -0.8s;
          animation-delay: -0.8s;
        }
        .sk-circle .sk-circle6:before {
          -webkit-animation-delay: -0.7s;
          animation-delay: -0.7s;
        }
        .sk-circle .sk-circle7:before {
          -webkit-animation-delay: -0.6s;
          animation-delay: -0.6s;
        }
        .sk-circle .sk-circle8:before {
          -webkit-animation-delay: -0.5s;
          animation-delay: -0.5s;
        }
        .sk-circle .sk-circle9:before {
          -webkit-animation-delay: -0.4s;
          animation-delay: -0.4s;
        }
        .sk-circle .sk-circle10:before {
          -webkit-animation-delay: -0.3s;
          animation-delay: -0.3s;
        }
        .sk-circle .sk-circle11:before {
          -webkit-animation-delay: -0.2s;
          animation-delay: -0.2s;
        }
        .sk-circle .sk-circle12:before {
          -webkit-animation-delay: -0.1s;
          animation-delay: -0.1s;
        }
        @-webkit-keyframes sk-circleBounceDelay {
          0%,
          100%,
          80% {
            -webkit-transform: scale(0);
            transform: scale(0);
          }
          40% {
            -webkit-transform: scale(1);
            transform: scale(1);
          }
        }
        @keyframes sk-circleBounceDelay {
          0%,
          100%,
          80% {
            -webkit-transform: scale(0);
            transform: scale(0);
          }
          40% {
            -webkit-transform: scale(1);
            transform: scale(1);
          }
        }
      </style>
      <div class="sk-circle">
        <div class="sk-circle1 sk-child"></div>
        <div class="sk-circle2 sk-child"></div>
        <div class="sk-circle3 sk-child"></div>
        <div class="sk-circle4 sk-child"></div>
        <div class="sk-circle5 sk-child"></div>
        <div class="sk-circle6 sk-child"></div>
        <div class="sk-circle7 sk-child"></div>
        <div class="sk-circle8 sk-child"></div>
        <div class="sk-circle9 sk-child"></div>
        <div class="sk-circle10 sk-child"></div>
        <div class="sk-circle11 sk-child"></div>
        <div class="sk-circle12 sk-child"></div>
      </div>
    </div>
    <script>
      window.__NUXT__ = {
        config: {
          _app: { basePath: '/', assetsPath: './', cdnURL: null },
        },
      }
    </script>
    <script src="./e8cd43a.js"></script>
    <script src="./a865292.js"></script>
    <script src="./8e0b1c0.js"></script>
    <script src="./1b3c704.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="assets/js/main.js"></script>

    <script src="assets/vendor/chart.js/chart.umd.js"></script>
    <script src="assets/vendor/echarts/echarts.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="icon" href="/assets/img/Capturalog.ico" id="elLogo">
    <script>
     
    document.title = "Organigrama Empacados";

    </script>
    
  </body>
  <?php require 'layout/footer.php';?>
</html>


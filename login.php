
<?php 
session_name('rh_admon');
session_start();

if (isset($_SESSION['identity'])) {
  header('Location: index.php');
  exit();
}
require_once('helpers/utils.php');

$pagLogin = isset($_GET['pag']) ? $_GET['pag'] : ""; 
?>
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Iniciar Sesión</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   
    <!--Bootsrap 4 CDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <!-- Favicons -->
    <link href="assets/img/Capturalog.ico" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <!--Custom styles-->
    <link rel="stylesheet" type="text/css" href="css/styles_log.css">
       
  </head>

  <style>
       body {
      background-color: #1a1a1a;
      color: #fff;
      font-family: 'Open Sans', sans-serif;
    }

    .container {
      background-size: cover;
      background-position: center;
    }
    .input-group-prepend span {
    /* width: 50px; */
    background-color: #f20909;
    color: white;
    /* border: 0 !important; */
}

    .section {
      background-image: url('assets/img/pragna-organiks-fondo.jpg');
      background-size: cover;
      background-position: center;
      padding: 20px;
      border-radius: 10px;
      color: #fff;
      text-align: center;
      opacity: 0.97;
    }

    .logo img {
      height: 60px; /* Increase logo size */
      margin-right: 10px;
      opacity: 0.7;
    }

    .card {
      border: none;
      border-radius: 10px;
      box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1);
    }

    .login-form {
      margin-top: 20px;
    }

    .login-form label {
      color: #ccc;
    }

    .login-form input,
    .login-form button {
      margin-top: 10px;
    }

    .login-form button {
      background-color: #3498db;
      color: #fff;
      transition: background-color 0.3s ease;
    }

    .login-form button:hover {
      background-color: #2980b9;
    }

    .login-form p {
      margin-top: 20px;
      color: #ccc;
    }

    .logo span {
      font-size: 25px;
      font-weight: 666;
      color: #000000;
      font-family: "Nunito", sans-serif;
      align-items: center;
    }
    .errorent{
			  background-color: #E74F4F;
			  position: absolute;
			  top: 0;
			  padding: 10px 0 ;
			  border-radius:  0 0 5px 5px;
			  color: #fff;
			  width: 100%;
			  text-align: center;			    
			}
  </style>
  <body>
  
    <!-- Navigation -->
  	<?php if(isset($_SESSION['error_login'])): ?>
  	
  	<!-- Navigation -->
  	<div class="errorent">
  		<span><?=$_SESSION['error_login']?></span>
  	</div>
  	
  	<?php endif; ?>
  	
  	<?php Utils::deleteSession('error_login'); ?>
    
    
    
    <div class="container">
      <div class="d-flex justify-content-center h-100">
        <div class="card">

          <div class="card-header">
            <h3 align="center">ACCESO</h3>
               
                 <!--<div class="d-flex justify-content-end social_icon">
                  <span><img src="imagenes/logo.png" width="227" height="61"></span>
                </div> -->
          </div>
          <div class="card-body" align="center">
            <form action="login/login.php" method="POST">
              <input type="hidden" name="pagLogin" id="pagLogin" value="<?=$pagLogin?>">
              <!--campo nombre-->
              <div class="input-group form-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-user"></i></span>
                </div>
                <input type="text" class="form-control" placeholder="Número de empleado" name="numemp" id="numemp" required>            
              </div>
              <div class="input-group form-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-key"></i></span>
                </div>
                <input type="password" class="form-control" placeholder="Contraseña" name="password" id="password" required>
              </div>
              <div class="form-group">
                <input class="btn float-right login_btn" title="Al ingresar usted acepta los Términos de Uso" type="submit" value="Ingresar">
              </div>                       
            </form>
          </div>
          <div class="card-footer">
                <!--
                <div class="d-flex justify-content-center links">
                  Acceso al Inventario
                </div>
                <div class="d-flex justify-content-center">
                  Existencias de nuestro stock<br>en tiempo real.
                </div>
                -->
            <div class="d-flex justify-content-center">
              <span><img src="assets/img/logo2024.png" width="227" height="48"></span>
            </div>        
          </div>
        </div>
      </div>
    </div>

    <script>
      $("#ingresar").click(function(){
        //alert("esto es una prueba");
        let numemp = $("#numemp").val();
        let pass = $("#password").val();
        console.log({
          numemp,
          pass
        })
      })
    </script>
  </body>

</html>
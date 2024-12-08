<?php
  //Verificar si el usuario existe
  session_start();
  if(!isset($_SESSION['autorizado'])){
    $_SESSION['autorizado']='no';
  }
?>
<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inicio</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel = "icon" href = "img/icono_prueba1.png">
    <?php
        //Archivos a incluir
        require("inc/menu.php");

        //Seccion mensaje
        $mensaje = '';
        if(isset($_GET['mensaje'])){
            if($_GET['mensaje']=='uno'){$mensaje = 'El usuario ya existe en la base';}
            if($_GET['mensaje']=='dos'){$mensaje = 'La dirección de correo no es válida';}
            if($_GET['mensaje']=='tres'){$mensaje = 'Los datos son incorrectos';}
        }
    ?>
  </head>
  <body class="container" style="background-color: #c6dbd1;">
    <!-- Barra de navegación -->
    <?php menu(); ?>
  
    <?php
    if($_SESSION['autorizado'] == 'no'){
      // Mostrat título de la página solo si no se inició sesión.
    ?>
      <div class="alert text-center fst-italic" style="background-color: #1f2633; color: #f99e1c;" role="alert">
          <h5>Bienvenido.</h5>
      </div>
    <?php 
    }
    ?>

    <!-- Fila 1 -->
    <div class="container">
      <div class="row">
          <div class="col-3"></div>
          <div class="col-6">
              <!-- Formulario de ingreso -->
              <?php
                if($_SESSION['autorizado']=='no'){
              ?>
              <!-- Formulario -->
              <br>
              <legend style="color: #1f2633; font-weight: bold;"> Formulario de Ingreso </legend>
              <form action="login.php" method="POST">
                  <div class="form-group">
                    <label for="user">Ingrese su usuario</label>
                    <input type="text" id="user" name="user" class="form-control">
                  </div>
                  <br>
                  <div class="form-group">
                    <label for="pass"> Ingrese su clave</label>
                    <input type="password" id="pass" name="pass" class="form-control">
                  </div>
                  <br>
                  <button class="btn btn-danger container-fluid"> Ingresar </button>
                  <div class="row">
                    <div class="col text-center" style="font-weight: bold;"><a href="registro.php">Registrarse</a></div>
                    <div class="col text-center" style="font-weight: bold;"><a href="index.php">Olvidé mi clave</a></div>
                  </div>
                  <br><?php echo $mensaje; ?>
              </form>
                <!-- Fin del Formulario -->
                <?php
                } else {
                ?>
                <br>
                  <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img src="img/foto5.png" class="d-block w-100" alt="Our foto5">
                      </div>
                      <div class="carousel-item">
                        <img src="img/foto6.png" class="d-block w-100" alt="Our foto6">
                      </div>
                      <div class="carousel-item">
                        <img src="img/foto7.png" class="d-block w-100" alt="Our foto7">
                      </div>
                     </div>
                  </div>
                  <?php
                  //echo '<h3>Bienvenido a nuestro sistema.</h3>';
                  //echo '<h5>Nombre: '.$_SESSION['nombre'].'</h5>';
                  //echo '<h5>Apellido: '.$_SESSION['apellido'].'</h5>';
                  //echo '<h5>Perfil: '.$_SESSION['rol'].'</h5>';
                }
              ?>
          </div>
          <div class="col-3"></div>
      </div>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
  </body>
</html>



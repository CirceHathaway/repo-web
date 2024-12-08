<?php
  //Verificar si el usuario no existe
  session_start();
  if(!isset($_SESSION['autorizado']) or $_SESSION['autorizado']=='no'){
    header("Location:index.php");
  }
?>
<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Plantilla</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel = "icon" href = "img/icono_prueba1.png">
    <?php
        require("inc/menu.php")
        require("inc/conexion.php");
    ?>
  </head>
  <body class="container">
    <!-- Barra de navegación -->
    <?php menu(); ?>
    <!-- Título de la página -->
    <div class="alert alert-primary text-center fst-italic" role="alert">
        <h5>Plantilla.</h5>
    </div> 
    <script src="js/bootstrap.bundle.min.js"></script>
  </body>
</html>



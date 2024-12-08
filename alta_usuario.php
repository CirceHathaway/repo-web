<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nuevo Usuario</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel = "icon" href = "img/icono_prueba1.png">
    <?php
        require("inc/conexion.php");
        //Seccion mensaje
        $mensaje = 'Ingrese los nuevos datos';
        if(isset($_GET['mensaje'])){
            if($_GET['mensaje']=='uno'){$mensaje = 'El usuario ya existe en la base';}
        }
    ?>
  </head>
  <body class="container" style="background-color: #c6dbd1;">

    <!-- Título de la página -->
    <div class="alert text-center fst-italic" style="background-color: #1f2633; color: #f99e1c;" role="alert">
        <h5>Alta de Usuario.</h5>
    </div> 
    
    <br>

    <!-- Formulario -->
    <div class = "container">
        <div class = "row">
            <div class = "col-3"></div>
            <div class = "col-6">

                <form action="alta_usuario_sql.php" method = "post">
                    <!-- Input de usuario-->
                    <div class="form-group">
                        <label for="usuario" style="color:#1f2633" class="fw-bold">Ingrese el usuario</label>
                        <input required type="text" id="usuario" name="usuario" placeholder="Escriba el nuevo usuario" class="form-control">
                    </div>
                    <br>
                    <!-- Input de clave-->
                    <div class="form-group">
                        <label for="clave" style="color:#1f2633" class="fw-bold">Ingrese la clave</label>
                        <input required type="text" id="clave" name="clave" placeholder="Escriba una clave" class="form-control">
                    </div>
                    <br>
                    <!-- Input de rol-->
                    <div class="form-group">
                        <label for="rol" style="color:#1f2633" class="fw-bold">Ingrese el perfil</label>
                        <input required type="text" id="rol" name="rol" placeholder="Escriba el perfil" class="form-control">
                    </div>
                    <br>
                    <!-- Button -->
                     <button type="submit" class="btn btn-danger container-fluid">Cargar registro</button>
                     <br>
                     <?php echo $mensaje;?>
                </form>

            </div>
            <div class = "col-3"></div>
        </div>

    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
  </body>
</html>
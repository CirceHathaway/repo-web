<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registro Nuevo Usuario</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel = "icon" href = "img/icono_prueba1.png">
    <?php
        require("inc/conexion.php");

        //Seccion mensaje
        $mensaje = 'Ingrese los nuevos datos';
        if(isset($_GET['mensaje'])){
            if($_GET['mensaje']=='uno'){$mensaje = 'El usuario ya existe en la base';}
            if($_GET['mensaje']=='clave_mayuscula'){$mensaje = 'La contraseña debe contener al menos una letra mayúscula';}
            if($_GET['mensaje']=='clave_minuscula'){$mensaje = 'La contraseña debe contener al menos una letra minúscula';}
            if($_GET['mensaje']=='clave_numero'){$mensaje = 'La contraseña debe contener al menos un número';}
            if($_GET['mensaje']=='clave_corta'){$mensaje = 'La contraseña debe tener al menos 8 caracteres';}
        }
    ?>
  </head>
  <body class="container" style="background-color: #c6dbd1;">

    <!-- Título de la página -->
    <div class="alert text-center fst-italic" style="background-color: #1f2633; color: #f99e1c;" role="alert">
        <h5>Registro de nuevo usuario</h5>
    </div> 

    <!-- Formulario -->
    <div class = "container">
        <div class = "row">
            <div class = "col-3"></div>
            <div class = "col-6">

                <form action="registro_sql.php" method = "post">
                    <!-- Input de usuario-->
                    <div class="form-group">
                        <label for="usuario" style="color:#1f2633" class="fw-bold">Ingrese el usuario</label>
                        <input required type="text" id="usuario" name="usuario" placeholder="Escriba el nuevo usuario" class="form-control">
                    </div>
                    <br>
                    <!-- Input de clave-->
                    <div class="form-group">
                        <label for="clave" style="color:#1f2633" class="fw-bold">Ingrese la clave</label>
                        <input required type="password" id="clave" name="clave" placeholder="Escriba la clave" class="form-control">
                    </div>
                    <br>
                    <!-- Input de Nombre-->
                    <div class="form-group">
                        <label for="nombre" style="color:#1f2633" class="fw-bold">Ingrese su nombre</label>
                        <input required type="text" id="nombre" name="nombre" placeholder="Escriba su nombre" class="form-control">
                    </div>
                    <br>
                    <!-- Input de Apellido-->
                    <div class="form-group">
                        <label for="apellido" style="color:#1f2633" class="fw-bold">Ingrese su apellido</label>
                        <input required type="text" id="apellido" name="apellido" placeholder="Escriba su apellido" class="form-control">
                    </div>
                    <br>
                    <!-- Input de Correo-->
                    <div class="form-group">
                        <label for="correo" style="color:#1f2633" class="fw-bold">Ingrese su correo</label>
                        <input required type="email" id="correo" name="correo" placeholder="Escriba su correo" class="form-control">
                    </div>
                    <br>
                    <!-- Button -->
                     <button type="submit" class="btn btn-danger container-fluid">Registrar usuario</button>
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
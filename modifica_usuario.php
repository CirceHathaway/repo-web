<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modificar Usuario</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel = "icon" href = "img/icono_prueba1.png">
    <?php
        require("inc/conexion.php");

        //Tomo los valores de la ulr
        $usuario = $_GET['usuario'];
        $clave = $_GET['clave'];
        $rol = $_GET['rol'];

    ?>
  </head>
  <body class="container" style="background-color: #c6dbd1;">

    <!-- Título de la página -->
    <div class="alert text-center fst-italic" style="background-color: #1f2633; color: #f99e1c;" role="alert">
        <h5>Modificación de Usuario.</h5>
    </div> 

    <!-- Formulario -->
    <div class = "container">
        <div class = "row">
            <div class = "col-3"></div>
            <div class = "col-6">

                <form action="modifica_usuario_sql.php" method = "post">
                    <!-- Input de usuario-->
                    <div class="form-group">
                        <label for="usuario" style="color:#1f2633" class="fw-bold">Usuario</label>
                        <input readonly value=<?php echo $usuario?> type="text" id="usuario" name="usuario" class="form-control">
                    </div>
                    <br>
                    <!-- Input de clave-->
                    <div class="form-group">
                        <label for="clave" style="color:#1f2633" class="fw-bold">Clave</label>
                        <input value=<?php echo $clave?> type="text" id="clave" name="clave" class="form-control">
                    </div>
                    <br>
                    <!-- Input de rol-->
                    <div class="form-group">
                        <label for="rol" style="color:#1f2633" class="fw-bold">Perfil</label>
                        <input value=<?php echo $rol?> type="text" id="rol" name="rol" class="form-control">
                    </div>
                    <br>
                    <!-- Button -->
                    <div class="row">
                        <div class="col-6">
                            <button name="boton" values=1 type="submit" class="btn btn-primary container-fluid">Modificar registro</button>
                        </div>
                        <div class="col-6">
                            <button name="boton" values=0 type="submit" class="btn btn-danger container-fluid">Cancelar</button>
                        </div>
                    </div>
                    <br>
                </form>

            </div>
            <div class = "col-3"></div>
        </div>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
  </body>
</html>



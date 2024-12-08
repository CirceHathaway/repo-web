<?php
    //Iniciar Sesión
    session_start();

    // Verificar si el usuario no está autorizado
    if (!isset($_SESSION['autorizado']) || $_SESSION['autorizado'] == 'no') {
        echo "<script>
                alert('Acceso denegado: No hay usuario autorizado');
                window.location.href = 'index.php';
            </script>";
        exit;
     }

?>
<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formulario</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="img/icono_prueba1.png">
    <?php
        require("inc/menu.php")
    ?>
  </head>
  <body class="container" style="background-color: #c6dbd1;">
    <!-- Barra de navegación -->
    <?php menu(); ?>
    <!-- Título de la página -->
    <div class="alert text-center fst-italic" style="background-color: #1f2633; color: #f99e1c;" role="alert">
        <h4>Envio de datos al servidor.</h4>
    </div> 

    <!-- Fila 1 -->
     <div class="row">
        <div class="col-4"></div>
        <div class="col-4">

            <form action="formulario_destino.php" method="POST">    
                <div class="mb-3">
                    <label for="nombre">Nombre</label>
                    <input require type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese su nombre">
                </div>
                <div class="mb-3">
                    <label for="apellido">Apellido</label>
                    <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Ingrese su apellido">
                </div>
                <div class="mb-3">
                    <label for="clave">Clave</label>
                    <input type="password" class="form-control" id="clave" name="clave" placeholder="Ingrese su clave">
                </div>    
                
                <hr size="2px" color="black">
                <h6 class="fst-italic">Seleccione sus materias favoritas.</h6>

                <div class="form-group">
                    <input type="checkbox" id="materia1" name="materia1" value="php">
                    <label for="materia1">Páginas Web</label>
                </div>
                <div class="form-group">
                    <input type="checkbox" id="materia2" name="materia2" value="java">
                    <label for="materia2">Programación en JAVA</label>
                </div>
                <div class="form-group">
                    <input type="checkbox" id="materia3" name="materia3" value="sql">
                    <label for="materia3">Bases de datos</label>
                </div>

                <hr size="3px" color="black">
                <fieldset>
                    <legend>Seleccione su nivel de inglés.</legend>
                    <div class="form-group">
                        <label>
                            <input type="radio" name="nivel" value="alto">Alto
                        </label>
                    </div>
                    <div class="form-group">
                        <label>
                            <input type="radio" name="nivel" value="medio">Medio
                        </label>
                    </div>
                    <div class="form-group">
                        <label>
                            <input type="radio" name="nivel" value="bajo">Bajo
                        </label>
                    </div>                                        
                </fieldset>

                <hr size="3px" color="black">
                <div class="form-group">
                    <label for="selector1">Seleccione su motivo de contacto.</label>
                    <select name="selector1" id="selector1">
                        <option value="consulta">Consulta</option>
                        <option value="sugerencia">Sugerencia</option>
                        <option value="queja">Queja</option>
                    </select>
                </div>

                <br><br>
                <button type="submit" class="btn btn-danger container-fluid">Enviar</button>
            </form>

        </div>
        <div class="col-4"></div>
     </div>


    <script src="js/bootstrap.bundle.min.js"></script>
  </body>
</html>
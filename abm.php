<?php
  //Verificar si el usuario no existe
  session_start();
 // if(!isset($_SESSION['autorizado']) or $_SESSION['autorizado']=='no'){
  //  header("Location:index.php");
  //}
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
    <title>ABM</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel = "icon" href = "img/icono_prueba1.png">
    <?php
        //Archivos a incluir
        require("inc/menu.php");

        //Conexión a la BDD
        require("inc/conexion.php");

        //Paso 4) Creamos la consulta SQL
        $consulta = "select * from usuario";

        //Paso 5) Ejecutamos la consulta SQL
        $resultado = mysqli_query($conexion,$consulta);

        //Consultamos un solo valor.
        $consulta1 = "select count(distinct usuario) as usuarios from usuario";
        $resultado1 = mysqli_query($conexion,$consulta1);
        while($fila = mysqli_fetch_assoc($resultado1)){
          $cantidad_usuarios = $fila['usuarios'];
        }
        //echo "Cantidad de usuarios: ".$cantidad_usuarios;

        //Consultamos un valor pero usando variables
        $a = 'administrador';
        $consulta2 = "select count(distinct usuario) as usuarios from usuario where rol = '$a' ";
        $resultado2 = mysqli_query($conexion,$consulta2);
        while($fila = mysqli_fetch_assoc($resultado2)){
          $cantidad_administrador = $fila['usuarios'];
        }

        $a = 'analista';
        $consulta3 = "select count(distinct usuario) as usuarios from usuario where rol = '$a' ";
        $resultado3 = mysqli_query($conexion,$consulta3);
        while($fila = mysqli_fetch_assoc($resultado3)){
          $cantidad_analista = $fila['usuarios'];
        }

        //Consulta de tabla completa
        $consulta4 = "select distinct * from usuario";
        
        $resultado4 = mysqli_query($conexion,$consulta4);

    ?>
  </head>
  <body class="container" style="background-color: #c6dbd1;">
 <!-- <body class="container" background ="img/textura4.webp"> -->
    <!-- Barra de navegación -->
    <?php menu(); ?>
    <!-- Título de la página -->
    <div class="alert text-center fst-italic" style="background-color: #f99e1c; color: black;" role="alert">
        <h5>Práctica de ABM.</h5>
    </div>
    <!-- Fila 1 --> 
    <div class="container">
        <div class="row">
            <div class="col-3">
                <button type="button" class="btn btn-primary container-fluid text-start">
                    Usuarios: <span class="badge text-bg-warning"><?php echo $cantidad_usuarios; ?></span>
                </button>
            </div>
            <div class="col-3">
                <button type="button" class="btn btn-success container-fluid text-start">
                    Administradores: <span class="badge text-bg-warning"><?php echo $cantidad_administrador; ?></span>
                </button>
            </div>
            <div class="col-3">
                <button type="button" class="btn btn-info container-fluid text-start">
                    Analistas: <span class="badge text-bg-warning"><?php echo $cantidad_analista; ?></span>
                </button>
            </div>
            <div class="col-3">
                <button type = "button" class= "btn btn-danger container-fluid">
                    <a href = "alta_usuario.php" style="color:white;text-decoration:none">Alta de Usuario</a>
                </button>
            </div>
        </div>
    </div>
    <br>
    <!-- Fila 2 -->
    <div class = "container">
        <div class = "row">
            <div class="col-2"></div>
            <div class="col-8">

                <!-- Tabla -->
                <div class = "table-responsive">
                    <table class="table table-bordered table-sm table-hover">
                        <thead class = "table-dark text-center">
                            <tr>
                                <td>Usuario</td><td>Clave</td><td>Perfil</td><td>Acciones</td>
                            </tr>
                        </thead>
                        <tbody class="table-success">
                            <?php
                                while($fila = mysqli_fetch_array($resultado4)){
                                    echo "<tr>";
                                        echo "<td>".$fila['usuario']."</td>";
                                        echo "<td>".$fila['clave']."</td>";
                                        echo "<td>".$fila['rol']."</td>";
                                        echo "<td>
                                                <a href='modifica_usuario.php?usuario=".$fila['usuario']." & clave=".$fila['clave']." & rol=".$fila['rol']."'
                                                style = 'text-decoration:none'>
                                                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
                                                        <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
                                                        <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z'/>
                                                    </svg>
                                                </a>
                                                <a href='baja_usuario.php?usuario=".$fila['usuario']." & clave=".$fila['clave']." & rol=".$fila['rol']."' 
                                                    style = 'text-decoration:none'>             
                                                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
                                                        <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0'/>
                                                    </svg>
                                                </a>
                                            </td>";
                                    echo "</tr>";
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-2"></div>
        </div>
    </div>
    
    <script src="js/bootstrap.bundle.min.js"></script>
  </body>
</html>



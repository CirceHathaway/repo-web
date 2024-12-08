<?php
  //Verificar si el usuario no existe
    session_start();
  //if(!isset($_SESSION['autorizado']) or $_SESSION['autorizado']=='no'){
   // header("Location:index.php");
  //}
  //Verificar si el usuario es administrador
 // if(!isset($_SESSION['rol']) or $_SESSION['rol']!='administrador'){
  //  header("Location:index.php?error=acceso_denegado");
  //}

   // Verificar si el usuario no está autorizado
   if (!isset($_SESSION['autorizado']) || $_SESSION['autorizado'] == 'no') {
    echo "<script>
            alert('Acceso denegado: Usuario no autorizado');
            window.location.href = 'index.php'?error=acceso_denegado;
          </script>";
    exit;
  }

  // Verificar si el usuario no es administrador
  if (!isset($_SESSION['rol']) || $_SESSION['rol'] != 'administrador') {
    echo "<script>
            alert('Acceso denegado: Sólo administradores pueden acceder');
            window.location.href = 'index.php?error=acceso_denegado';
          </script>";
    exit;
  }

?>
<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ADMINISTRADOR</title>
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

        //Consultamos cantidad de usuarios.
        $consulta1 = "select count(distinct usuario) as users from users";
        $resultado1 = mysqli_query($conexion,$consulta1);
        while($fila = mysqli_fetch_assoc($resultado1)){
          $cantidad_usuarios = $fila['users'];
        }

        //Consultamos administradores y analistas pero usando variables.
        $a = 'administrador';
        $consulta2 = "select count(distinct usuario) as users from users where rol = '$a' ";
        $resultado2 = mysqli_query($conexion,$consulta2);
        while($fila = mysqli_fetch_assoc($resultado2)){
          $cantidad_administrador = $fila['users'];
        }

        $a = 'analista';
        $consulta3 = "select count(distinct usuario) as users from users where rol = '$a' ";
        $resultado3 = mysqli_query($conexion,$consulta3);
        while($fila = mysqli_fetch_assoc($resultado3)){
          $cantidad_analista = $fila['users'];
        }

        //Consulta de tabla completa solo usuarios con estado 'Nuevo'.
        $consulta4 = "select * from users where estado = 'Nuevo'";
        $resultado4 = mysqli_query($conexion,$consulta4);

    ?>
  </head>
  <body class="container" background ="img/textura4.webp">
    <!-- Barra de navegación -->
    <?php menu(); ?>
    <!-- Título de la página -->
    <div class="alert alert-warning text-center fst-italic" style="color: black;" role="alert">
        <h5>Sección de Administrador.</h5>
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
                                <td>Nombre</td><td>Apellido</td><td>fecha de Alta</td><td>Estado</td><td>Perfil</td><td>Acciones</td>
                            </tr>
                        </thead>
                        <tbody class="table-success">
                            <?php
                                while($fila = mysqli_fetch_array($resultado4)){
                                    echo "<tr>";
                                        echo "<td>".$fila['nombre']."</td>";
                                        echo "<td>".$fila['apellido']."</td>";
                                        echo "<td>".$fila['fc_alta']."</td>";
                                        echo "<td>".$fila['estado']."</td>";
                                        echo "<td>".$fila['rol']."</td>";
                                        echo "<td>
                                                
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



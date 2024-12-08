<?php
    //Agrego conexión a la base de datos
    require("inc/conexion.php");

    // Tomo los datos del formulario...
    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];
    $rol = $_POST['rol'];

    //Verificamos si existe el usuario
    $consulta1 = "select count(distinct usuario) as nuevo from usuario where usuario = '$usuario' ";

    $resultado1 = mysqli_query($conexion,$consulta1);

    while($a = mysqli_fetch_assoc($resultado1)){
        $existe = $a['nuevo'];
    }

    //Estructura de decisión
    if($existe == 1){
        //modifico el mensaje y volvemos al formulario
        header("Location: alta_usuario.php?mensaje=uno");
    } else{
        //el usuario no existe, permitimos la carga.
        $alta = "insert into usuario values('$usuario','$clave','$rol')";
        $resultado_alta = mysqli_query($conexion,$alta);

        //Redirigimos al usuario
        header("Location: abm.php");
    }

?>
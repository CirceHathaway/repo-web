<?php
    //Agrego conexión a la base de datos
    require("inc/conexion.php");

    // Tomo los datos del formulario y los sanitizo...
    $usuario = filter_var($_POST['usuario'], FILTER_SANITIZE_STRING);
    $clave = filter_var($_POST['clave'], FILTER_SANITIZE_STRING);
    $nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
    $apellido = filter_var($_POST['apellido'], FILTER_SANITIZE_STRING);
    $correo = filter_var($_POST['correo'], FILTER_SANITIZE_EMAIL);

    // Validación de contraseña
    if (!preg_match('/[A-Z]/', $clave)) {
        header("Location: registro.php?mensaje=clave_mayuscula");
        exit(); // Detenemos la ejecución
    }
    if (!preg_match('/[a-z]/', $clave)) {
        header("Location: registro.php?mensaje=clave_minuscula");
        exit();
    }
    if (!preg_match('/[0-9]/', $clave)) {
        header("Location: registro.php?mensaje=clave_numero");
        exit();
    }
    if (strlen($clave) < 8) {
        header("Location: registro.php?mensaje=clave_corta");
        exit();
    }

    //Encriptamos la clave
    $clave2 = password_hash($clave,PASSWORD_DEFAULT);

    //Verificamos si existe el usuario
    $consulta1 = "select count(distinct usuario) as nuevo from users where usuario = '$usuario' ";

    $resultado1 = mysqli_query($conexion,$consulta1);

    while($a = mysqli_fetch_assoc($resultado1)){
        $existe = $a['nuevo'];
    }

    //Estructura de decisión
    if($existe == 1){
        //modifico el mensaje y volvemos al formulario
        header("Location: registro.php?mensaje=uno");
    } else{
        //el usuario no existe, permitimos la carga.
        $alta = "insert into users (usuario,clave,nombre,apellido,correo,fc_alta,estado,rol) 
                values('$usuario','$clave2','$nombre','$apellido','$correo',now(),'Nuevo','analista')";
        $resultado_alta = mysqli_query($conexion,$alta);

        //Redirigimos al usuario
        header("Location: index.php");
    }

?>
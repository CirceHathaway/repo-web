<?php
    //Aviso que trabajo con sesiones
    session_start();
    //Conexion a la BDD
    require("inc/conexion.php");

    //Buscamos los valores del ingreso
    $usuario = filter_var($_POST['user'],FILTER_SANITIZE_SPECIAL_CHARS);
    $clave = filter_var($_POST['pass'],FILTER_SANITIZE_SPECIAL_CHARS);

    //Verificamos si el usuario existe em la BDD
    $consulta1 = "select count(usuario) as nuevo from users where usuario = '$usuario'";
    $resultado1 = mysqli_query($conexion,$consulta1);

    while($a = mysqli_fetch_assoc($resultado1)){
        $existe = $a['nuevo'];
    }

    //Estructura de decisión
    if($existe==0){
        //no existe el usuario
        header("Location:index.php?mensaje=tres");
    } else{
        //Existe el usuario y leemos la clave.
        $consulta_clave_bdd = "select clave from users where usuario = '$usuario'";
        $resultado_clave_bdd = mysqli_query($conexion,$consulta_clave_bdd);

        while($a = mysqli_fetch_assoc($resultado_clave_bdd)){
            $clave_bdd = $a['clave'];
        }
    }

    //Verificamos la clave.
    if(password_verify($clave,$clave_bdd)){
        //Clave correcta
        $consulta_datos = "select usuario,nombre,apellido,rol from users where usuario = '$usuario'";
        $resultado_consulta_datos = mysqli_query($conexion,$consulta_datos);

        while($b=mysqli_fetch_array($resultado_consulta_datos)){
            $_SESSION['usuario'] = $b['nombre'];
            $_SESSION['nombre'] = $b['nombre'];
            $_SESSION['apellido'] = $b['apellido'];
            $_SESSION['rol'] = $b['rol'];
            $_SESSION['autorizado'] = 'si';
        }
        header("Location:index.php");
    } else{
        //Clave incorrecta
        header("Location: index.php?mensaje=tres");
    }

?>
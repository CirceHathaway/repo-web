<?php

    //Conexión a la BDD
    //Paso 1) Datos de conexión
    $usuario = 'root';
    $clave = '';
    $servidor = 'localhost';
    $basededatos = 'tpFundacion';

    //Paso 2) Creamos la conexión
    $conexion = mysqli_connect($servidor,$usuario,$clave);

    //Paso 3) Me conecto a la base de datos
    $db = mysqli_select_db($conexion,$basededatos);

?>
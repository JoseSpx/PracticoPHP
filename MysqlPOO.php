<?php

    $host = "localhost";
    $bd = "josebd";
    $user = "root";
    $pass = "";

    $conexion = @new mysqli($host,$user,$pass,$bd);

    if($conexion->connect_errno){
        die("Error al conectar a la base de datos");
    }

    $conexion->set_charset("utf8");

    $consulta = "select nombre,edad from persona where edad > ?";
    $edad = 10;

    $preparedStatement = $conexion->stmt_init();

    if($preparedStatement->prepare($consulta)){
        $preparedStatement->bind_param("i",$edad);
        $preparedStatement->execute();

        $preparedStatement->bind_result($nombre,$edad);

        while($preparedStatement->fetch()){
            print $nombre . "   " . $edad . "<br>";
        }

    }


    $conexion->close();



<?php

    require ("config.php");
    require ("DevuelveDatos.php");

    $n = $_GET["nombre"];
    $e = $_GET["edad"];

    $conexion = new DevuelveDatos(HOST,DATABASE,USER,PASS);
    $conexion->obtenerDatos($n,$e);




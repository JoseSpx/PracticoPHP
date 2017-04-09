<?php

    require "../BaseDeDatos/Conexion.php";

    $conexion = Coneccion::inicializarConeccion();

    $registrosSeleccionados = $_GET["registrosSeleccionados"];
    $cantidad =  count($registrosSeleccionados);

    for($i = 0; $i<$cantidad; $i++){
        $conexion->eliminar($registrosSeleccionados[$i]);
    }

    header("location:eliminar.php");
<?php

    if(isset($_GET["nombre"]) && isset($_GET["apellido"])){

        $codigo = $_GET["codigo"];
        $nombre = $_GET["nombre"];
        $apellido = $_GET["apellido"];

        require "../BaseDeDatos/Conexion.php";

        $conexion = Coneccion::inicializarConeccion();
        $conexion->actualizar($codigo,$nombre,$apellido);

        header("location:actualiza.php");

    }
<?php

    if(isset($_POST["enviar"])){
       include "conexion.php";
    }

?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../librerias/materialize/css/materialize.min.css">
    <script src="../librerias/jquery/jquery-3.2.0.min.js"></script>
    <script src="../librerias/materialize/js/materialize.min.js"></script>
    <title>Document</title>
</head>
<body>

    <?php
        if(!isset($_SESSION["usuario"])){
            include "formulario.php";
        }

    ?>

    <img src="imagen.jpg" alt="">

</body>
</html>

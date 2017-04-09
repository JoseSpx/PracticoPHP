<?php

    if(!isset($_GET["radioActualizar"])){
        header("location:actualiza.php");
    }


    $valor = $_GET["radioActualizar"];

    $arreglo = explode("-",$valor);

    $codigo = $arreglo[0];
    $nombre = $arreglo[1];
    $apellido = $arreglo[2];

    require "../BaseDeDatos/Conexion.php";

?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Actualizar</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../Menu/MenuEstilo.css">
    <link rel="stylesheet" href="actualizar2Estilo.css">
    <link rel="stylesheet" href="../../librerias/materialize/css/materialize.min.css">
    <script src="../../librerias/jquery/jquery-3.2.0.min.js"></script>
    <script src="../../librerias/materialize/js/materialize.min.js"></script>
</head>
<body>
    <?php
        include "../Menu/menu.php";
    ?>

    <div class="cuerpo">
        <div class="titulo">
            Actualizar Registro
        </div>
        <form action="metodoActualizar.php" method="get">

            <div class="row">
                <div class="input-field col s6 offset-s3">
                    <input readonly type="text" class="activate" id="codigo" name="codigo" value="<?php echo $codigo ?>">
                    <label for="codigo">Codigo</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s6 offset-s3">
                    <input type="text" class="activate" id="nombre" name="nombre" value="<?php echo $nombre ?>">
                    <label for="nombre">Nombre</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s6 offset-s3">
                    <input type="text" class="activate" id="apellido" name="apellido" value="<?php echo $apellido ?>">
                    <label for="apellido">Apellido</label>
                </div>
            </div>

            <div class="row">
                <button class="btn waves-effect waves-light col s2 offset-s5">
                    Actualizar
                </button>
            </div>


        </form>
    </div>

</body>
</html>


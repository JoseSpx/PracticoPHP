<?php

require "../BaseDeDatos/Conexion.php";

$conexion = Coneccion::inicializarConeccion();
$resultSet = $conexion->getTodosRegistros();
$cantidad = count($resultSet);

?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Actualizar Registros</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../Menu/MenuEstilo.css">
    <link rel="stylesheet" href="actualizarEstilo.css">
    <link rel="stylesheet" href="../../librerias/materialize/css/materialize.min.css">
    <script src="../../librerias/jquery/jquery-3.2.0.min.js"></script>
    <script src="../../librerias/materialize/js/materialize.min.js"></script>
</head>
<body>

<?php
include "../Menu/menu.php";
?>



<div class="cuerpo">

    <div class="row">
        <div class=" col s6 offset-s3 titulo">
            Registros de la Base de Datos
        </div>
    </div>

    <div class="row">
        <form action="actualizar2.php" method="get">
            <table class="col s6 offset-s3 centered striped">
                <thead>
                <tr>
                    <td class="center"><i class="material-icons">mode_edit</i></td>
                    <td class="center">Codigo</td>
                    <td class="center">Nombre</td>
                    <td class="center">Apellido</td>
                </tr>
                </thead>
                <tbody>
                <?php
                for($i=0;$i<$cantidad;$i++){

                    $clave = $resultSet[$i]["codigo"];
                    $nombre = $resultSet[$i]["nombre"];
                    $apellido = $resultSet[$i]["apellido"];

                    $valor = $clave . "-" . $nombre . "-" . $apellido;

                    echo "<tr>";

                    echo "<td>";
                    echo "<input type='radio' class='with-gap' id='$clave' value='$valor' name='radioActualizar'>";
                    echo "<label for='$clave'>Actualizar</label>";
                    echo "</td>";

                    echo "<td>";
                    echo $resultSet[$i]["codigo"];
                    echo "</td>";

                    echo "<td>";
                    echo $resultSet[$i]["nombre"];
                    echo "</td>";

                    echo "<td>";
                    echo $resultSet[$i]["apellido"];
                    echo "</td>";

                    echo "</tr>";
                }
                ?>
                </tbody>
            </table>

            <div class="botonEliminar">
                <button class="btn waves-effect waves-light">
                    <i class=" large material-icons">mode_edit</i>
                </button>
            </div>

            <div class="texto">
                Actualizar
            </div>


        </form>
    </div>

</div>

<script>
    $(".botonEliminar").hover(function () {
        $(".texto").css("visibility","visible");
    },function () {
        $(".texto").css("visibility","hidden");
    });
</script>
</body>
</html>

<?php

    require "../BaseDeDatos/Conexion.php";

    $conexion = Coneccion::inicializarConeccion();
    $nroPaginas = $conexion->getNroPaginas();
    $paginaFinal = $nroPaginas;

    $paginaActual = 1;

    if(isset($_GET["paginaActual"])){
        $paginaActual = $_GET["paginaActual"];
        //echo "<script>window.alert('otra pagina')</script>";
    }else{
        $paginaActual = 1;
        //echo "<script>window.alert('pagina 1')</script>";
    }

    $resultSet = $conexion->getRegistrosPorPagina($paginaActual);
    $cantidad = count($resultSet);
?>


<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="../../librerias/jquery/jquery-3.2.0.min.js"></script>
    <link rel="stylesheet" href="../Menu/MenuEstilo.css">
    <link rel="stylesheet" href="LeerDatosEstilo.css">
    <link rel="stylesheet" href="../../librerias/materialize/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="../../librerias/materialize/js/materialize.min.js"></script>
    <title>Document</title>
</head>
<body>
    <div class="main">

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
                <table class="col s6 offset-s3 centered striped">
                    <thead>
                    <tr>
                        <td class="center">Codigo</td>
                        <td class="center">Nombre</td>
                        <td class="center">Apellido</td>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                            for($i=0;$i<$cantidad;$i++){
                               echo "<tr>";

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
            </div>

            <div class="paginacion row">
                <ul class="pagination col s4 offset-s4">
                    <?php
                        if($paginaActual == 1){
                            echo "<li class='disabled'><a href='#''><i class='material-icons'>chevron_left</i></a></li>";
                        }else{
                            $paginaAnterior = $paginaActual - 1;
                            echo "<li class='waves-effect'><a href='LeerDatos.php?paginaActual=$paginaAnterior''><i class='material-icons'>chevron_left</i></a></li>";
                        }

                        for($i = 0;$i<$nroPaginas;$i++){
                            $pagina = $i+1;
                            if($paginaActual == $pagina){
                                echo "<li class='active'><a href='LeerDatos.php?paginaActual=$pagina'>$pagina</a></li>";
                            }else{
                                echo "<li class='waves-effect'><a href='LeerDatos.php?paginaActual=$pagina'>$pagina</a></li>";
                            }
                        }

                    if($paginaActual == $paginaFinal){
                        echo "<li class='disabled'><a href='#''><i class='material-icons'>chevron_right</i></a></li>";
                    }else{
                        $paginaSiguiente = $paginaActual + 1;
                        echo "<li class='waves-effect'><a href='LeerDatos.php?paginaActual=$paginaSiguiente''><i class='material-icons'>chevron_right</i></a></li>";
                    }
                    ?>

                </ul>
            </div>

        </div>
    </div>
</body>
</html>


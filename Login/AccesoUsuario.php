<?php

    session_start();

    if(!isset($_SESSION["usuario"])){
        header("location:index.html");
    }

?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrados</title>
    <link rel="stylesheet" href="../librerias/materialize/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="../librerias/jquery/jquery-3.2.0.min.js"></script>
    <script src="../librerias/materialize/js/materialize.min.js"></script>
</head>
<body>
    <div class="row">
        <table class="col s6 offset-s3 centered">
            <thead class="row">
                <tr>
                    <th>Usuarios Registrados</th>
                </tr>
            </thead>
            <tbody>
                <tr class="row">
                    <td class="col s4"><a href="registrados/pagina1.php">Pagina 1</a></td>
                    <td class="col s4"><a href="registrados/pagina2.php">Pagina 2</a></td>
                    <td class="col s4"><a href="registrados/pagina3.php">Pagina 3</a></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="row">
        <a href="cerrarSesion.php">Cerrar Session</a>
    </div>

</body>
</html>

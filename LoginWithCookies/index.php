<?php

    if(isset($_COOKIE["recordar"])){
        header("location:usuarioRegistrado.php");
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
    <title>Login</title>
</head>
<body>

    <div class="row">
        <form action="iniciarSesion.php" method="get" class="col s4 offset-s4">
            <div class="input-field">
                <input type="text" id="usuario" name="usuario">
                <label for="usuario">Usuario</label>
            </div>
            <div class="input-field">
                <input type="password" id="clave" name="clave">
                <label for="clave">Contraseña</label>
            </div>
            <div class="box">
                <input type="checkbox" id="box" name="recordar">
                <label for="box">Recordar</label>
            </div>
            <button class="btn waves-effect waves-light col s4 offset-s4" name="bttingresar">
                Ingresar
            </button>
        </form>
    </div>

</body>
</html>
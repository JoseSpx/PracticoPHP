<?php

    function comprobarCaracteres($word){
        $cant = count($word);
    }

    if(isset($_GET["nombre"]) && isset($_GET["apellido"])){

        if($_GET["nombre"] != "" && $_GET["apellido"] != ""){

           require "../BaseDeDatos/Conexion.php";

            $error = false;
            $registroExito = false;

            $nombre = htmlentities(addslashes($_GET["nombre"]));
            $apellido = htmlentities(addslashes($_GET["apellido"]));

            $conexion = null;
            $ps = null;
            $queryInsert = "insert into listapersona(nombre,apellido) values(:nombre,:apellido)";

            try{
                $conexion = Coneccion::inicializarConeccion();
                $conexion->insertar($nombre,$apellido);
                $error = false;
                $registroExito = true;
            }catch (Exception $e){
                $error = true;
            }
        }else{
            $faltanDatos = true;
        }

    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="../../librerias/jquery/jquery-3.2.0.min.js"></script>
    <link rel="stylesheet" href="RegistroEstilo.css">
    <link rel="stylesheet" href="../../librerias/materialize/css/materialize.min.css">
    <script src="../../librerias/materialize/js/materialize.min.js"></script>
</head>
<body>

<div class="main">
    <?php
        include "../Menu/menu.php";
    ?>

    <div class="cuerpo">
        <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="get">
            <div class="row">
                <div class="titulo col s4 offset-s4">
                    REGISTRAR UNA PERSONA
                </div>
            </div>
            <div class="row">
                <div class="input-field col s4 offset-s4">
                    <?php
                        if(isset($faltanDatos)) {
                            if ($faltanDatos = true) {
                                ?>
                                <input type="text" id="nombre" class="validate" name="nombre"
                                       value="<?php echo $_GET['nombre'] ?>">
                                <?php
                            }else{
                                echo "<input type='text' id='nombre' class='validate' name='nombre'>";
                            }
                        }else{
                            echo "<input type='text' id='nombre' class='validate' name='nombre'>";
                        }
                     ?>


                    <!--input type="text" id="nombre" class="validate" name="nombre"-->
                    <label for="nombre">Nombre</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s4 offset-s4 ">
                    <?php
                    if(isset($faltanDatos)) {
                        if ($faltanDatos = true) {
                            ?>
                            <input type="text" id="apellido" class="validate" name="apellido"
                                   value="<?php echo $_GET['apellido'] ?>">
                            <?php
                        }else{
                            echo "<input type='text' id='apellido' class='validate' name='apellido'>";
                        }

                    }else{
                        echo "<input type='text' id='apellido' class='validate' name='apellido'>";
                    }
                    ?>
                    <!--input type="text" id="apellido" class="validate centered" name="apellido"-->
                    <label for="apellido">Apellido</label>
                </div>
            </div>
            <div class="row">
                <button class="btn waves-effect waves-light col s2 offset-s5" name="bttRegistrar">
                    Registrar
                </button>
            </div>
        </form>
        <div class="col s6 offset-s3">
            <?php
                if(isset($registroExito)){
                    if($registroExito == true){
                        echo "
                            <div class='aviso'>Registro con Exito</div>
                            ";
                    }
                }
                if(isset($error)){
                    if($error == true){
                        echo "
                            <div class='aviso'>Error al Registrar en la Base de Datos</div>
                            ";
                    }
                }
                if(isset($faltanDatos)){
                    if($faltanDatos = true){
                        echo "
                            <div class='aviso'>Complete los espacios</div>
                            ";
                    }
                }
            ?>
        </div>
    </div>
</div>

</body>
</html>
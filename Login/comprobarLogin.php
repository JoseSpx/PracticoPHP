<?php

    if(!isset($_GET["submit"])){
        die("no se presiono o no existe");
    }

    $usuario = addslashes($_GET["usuario"]);
    $password = addslashes($_GET["password"]);

    $consulta = "select usuario,clave from registro where usuario = :usuario and clave = :clave";

    try {
        $conexion = new PDO("mysql:host=localhost;dbname=josebd", "root", "");
        $conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $conexion->exec("set character set utf8");
        $ps = $conexion->prepare($consulta);
        $ps->bindValue(":usuario",$usuario);
        $ps->bindValue(":clave",$password);
        $ps->execute();

        $cantidad = $ps->rowCount();

        if($cantidad > 0 ){
            session_start();
            $_SESSION["usuario"] = $_GET["usuario"];
            header("location:AccesoUsuario.php");
        }
        else{
            header("location:index.html");
        }

    }catch (Exception $e){
        die("Error : " . $e->getMessage());
    }finally{
        $ps->closeCursor();
        $conexion = null;

    }
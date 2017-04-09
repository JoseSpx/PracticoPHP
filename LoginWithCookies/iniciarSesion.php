<?php

    if(!isset($_GET["bttingresar"]) || !isset($_GET["usuario"]) || !isset($_GET["clave"])){
        header("location:index.php");
    }

    $usuario = $_GET["usuario"];
    $clave = $_GET["clave"];

    $conexion = null;
    $ps = null;
    $consulta = "select usuario,clave from registro where usuario = :usuario and clave = :clave";

    try{
        $conexion = new PDO("mysql:host=localhost;dbname=josebd","root","");
        $conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
        $conexion->exec("set character set utf8");
        $ps = $conexion->prepare($consulta);
        $ps->execute(array(":usuario"=>$usuario,":clave"=>$clave));
        $cantidad = $ps->rowCount();

        if($cantidad > 0){
            if(isset($_GET["recordar"])){
                setcookie("recordar","on",time()+1000);
            }

            header("location:usuarioRegistrado.php");

        }else{
            header("location:index.php");
        }

    }catch (Exception $e){
        echo $e->getMessage();
    }finally{
        $ps->closeCursor();
        unset($conexion);
    }
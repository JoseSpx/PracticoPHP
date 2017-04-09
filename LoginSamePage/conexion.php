<?php

    $usuario = $_POST["usuario"];
    $clave = $_POST["clave"];

    $ps = null;

    try{
        $conexion = new PDO("mysql:host=localhost;dbname=josebd","root","");
        $conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
        $ps = $conexion->prepare("select usuario,clave from registro where usuario = :usuario and clave = :clave");
        $ps->execute(array(":usuario"=>$usuario,":clave"=>$clave));

        $cant = $ps->rowCount();

        if($cant > 0){
            session_start();
            $_SESSION["usuario"] = $usuario;
            print "se Accedio Muy bien";
        }
    }catch (Exception $e){
        print $e->getMessage();
    }finally{
        $ps->closeCursor();
        unset($conexion);
    }

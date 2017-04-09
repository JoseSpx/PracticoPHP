<?php

    $consulta = "select nombre,edad from persona where edad > ?";

    try{
        $conexion = new PDO('mysql:host=localhost;dbname=josebd','root','');
        $conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $conexion->exec("set character set utf8");

        $ps = $conexion->prepare($consulta);
        $ps->execute(array(10));

        while($fila = $ps->fetch(PDO::FETCH_ASSOC)) {
            print $fila["nombre"] . "  " . $fila["edad"] . "<br>";
        }

        $ps->closeCursor();

        print "Conexion OK";
    }catch (Exception $e){
        die ("Hubo un error al conectar base de Datos " . $e->getMessage());
    }finally{
        print "<br> Final";
        $conexion = null;
    }



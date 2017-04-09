<?php

    require ("Conexion.php");

    class DevuelveDatos extends Conexionn {

        public function __construct($host, $bd, $user, $pass){
            parent::__construct($host, $bd, $user, $pass);
        }

        public function obtenerDatos($name,$age){
            $consulta = "select nombre,edad from persona where nombre = :name and edad = :edad";
            $ps =  $this->conexion->prepare("$consulta");
            $ps->execute(array(":name"=>$name,":edad"=>$age));

            while($fila = $ps->fetch(PDO::FETCH_ASSOC)){
                print $fila["nombre"] . "  " . $fila["edad"];
            }
            
        }

    }
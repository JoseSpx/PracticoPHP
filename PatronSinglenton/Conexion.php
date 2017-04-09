<?php

    require ("config.php");

    class Conexion{

        private $conexion;
        public static $instancia;

        public static function inicializarConexion(){
            if(!(isset(self::$instancia))){
                self::$instancia = new self();
            }

            return self::$instancia;
        }

        public function __construct(){
            try{
                $conectar = "mysql:host=".HOST.";dbname=".DATABASE;
                $this->conexion = new PDO($conectar,USER,PASS);
                $this->conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
                $this->conexion->exec("set character set utf8");
            }catch (Exception $e){
                print $e->getMessage();
            }

        }

        public function obtenerDatos(){
            $consulta = "select nombre,edad from persona";
            $ps = $this->conexion->prepare($consulta);
            $ps->execute(null);

            while($fila = $ps->fetch(PDO::FETCH_ASSOC)){
                print $fila["nombre"] . "  "  . $fila["edad"] . "<br>";
            }
        }

    }




    $conex = Conexion::inicializarConexion();
    $conex->obtenerDatos();


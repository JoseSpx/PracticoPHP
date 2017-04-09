<?php

    class Conexionn{

        protected $conexion;

        public function __construct($host,$bd,$user,$pass){
            try{
                $this->conexion = new PDO("mysql:host=$host;dbname=$bd",$user,$pass);
                $this->conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
                $this->conexion->exec("set character set utf8");
                //return $this->conexion;
            }catch (Exception $e){
                print $e->getMessage();
            }

        }

    }
<?php

    class Coneccion{

        private $conexion;
        private $ps;
        public static $instancia = null;

        public function __construct(){
            try{
                //$this->conexion = new PDO("mysql:host=mysql.hostinger.es;dbname=u143333173_jose","u143333173_user","josesp95");
                 $this->conexion = new PDO("mysql:host=localhost;dbname=josebd","root","");
                 $this->conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
                 $this->conexion->exec("set character set utf8" );
            }catch (Exception $e){
                echo $e->getMessage();
            }
        }

        public static function inicializarConeccion(){
            if(!isset(self::$instancia)){
                self::$instancia = new self;
            }
            return self::$instancia;
        }

        public function getTodosRegistros(){
            $query = "select codigo,nombre,apellido from listapersona";
            $this->ps =  $this->conexion->prepare($query);
            $this->ps->execute();
            $resultado = $this->ps->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        }

        public function getRegistrosPorPagina($paginaActual){
            $registroInicio = 10*($paginaActual-1);
            $query = "select codigo,nombre,apellido from listapersona limit $registroInicio,10";
            $this->ps =  $this->conexion->prepare($query);
            $this->ps->execute();
            $resulSet = $this->ps->fetchAll(PDO::FETCH_ASSOC);
            return $resulSet;
        }

        public function insertar($nombre,$apellido){
            $queryInsertar = "insert into listapersona(nombre,apellido) values(:nombre,:apellido)";
            try{
                $this->ps =  $this->conexion->prepare($queryInsertar);
                $this->ps->execute(array(":nombre"=>$nombre,":apellido"=>$apellido));
            }catch (Exception $e){
                echo $e->getMessage();
            }
        }

        public function eliminar($claveEliminado){
            $queryEliminar = "delete from listapersona where codigo = :eliminado";
            $this->ps =  $this->conexion->prepare($queryEliminar);
            $this->ps->bindValue(":eliminado",$claveEliminado);
            $this->ps->execute();
        }

        public function actualizar($clave,$nombre,$apellido){
            $queryActualizar = "update listapersona set nombre = :nombre , apellido = :apellido where codigo = :clave";
            $this->ps =  $this->conexion->prepare($queryActualizar);
            $this->ps->bindValue(":nombre",$nombre);
            $this->ps->bindValue(":apellido",$apellido);
            $this->ps->bindValue(":clave",$clave);
            $this->ps->execute();
        }

        public function getNroPaginas(){
            $query = "select codigo,nombre,apellido from listapersona";
            $this->ps =  $this->conexion->prepare($query);
            $this->ps->execute();
            $nroRegistros = $this->ps->rowCount();
            return ceil($nroRegistros/10);
        }

    }

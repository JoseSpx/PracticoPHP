<?php

    class Persona{

        private $nombre;
        private $apellido;

        public function __construct(){
            $cant = func_num_args();
            if($cant == 1) {
                $this->nombre = func_get_arg(0);
            }else{
                $this->nombre = func_get_arg(0);
                $this->apellido = func_get_arg(1);
            }
        }

        public function getDatos(){
            print "Nombre :  " . $this->nombre . "  Apellido : " . $this->apellido;
        }


    }


    $p1 = new Persona("jose","Suarez");
    $p1->getDatos();
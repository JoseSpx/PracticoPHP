<?php

    /*
    include "funcion1.php";
    include "funcion2.php";

    use function f2\imprimir;

    imprimir();

    */

    /*use clases\Persona; // para clases solo se pe defrente el namespace

    $p = new Persona("Victor");
    */

    //si quieres usar varios namespace es asi :

    use clases\Persona,function f1\imprimir, function  f2; // por comas


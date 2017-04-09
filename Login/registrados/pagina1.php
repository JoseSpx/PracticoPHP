<?php

    session_start();

    if(!$_SESSION["usuario"]){
        header("location:../index.html");
    }


    print "Usuario : " . $_SESSION["usuario"] . " y logramos ingresar a la PAGINA 1";
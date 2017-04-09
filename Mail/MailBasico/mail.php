<?php

    $destinatario = "jose_95sp@hotmail.com";
    $asunto = "ese es un asunto";
    $texto = "este es el mensaje de prueba \n esto es otra linea";

    //$headers .= "Content-type : text/html; charset=iso-8859-1";
    $headers =  "From: josesp95@gmail.com" . "\r\n" ;

    $resultado = mail($destinatario,$asunto,$texto,$headers);
    if($resultado){
        echo "se envio mensaje";
    }else{
        echo "no se envio mensaje";
    }
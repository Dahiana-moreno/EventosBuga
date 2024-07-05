<?php

    $conexion = mysqli_connect('localhost','root','','eventos');
    $tildes = $conexion->query("SET NAMES 'utf8'");
    if(mysqli_connect_error()){
        die('No se puede conectar a la base de datos'.mysqli_connect_error());
    }

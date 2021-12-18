<?php
    $server  = "localhost";
    $user = "root";
    $password = "";
    $database = "comics";
    $conection = mysqli_connect($server, $user, $password, $database);
    if($conection == true){
        echo "Conexion exitosa";
    }else{
        echo "Error en conexion";
    }
?>
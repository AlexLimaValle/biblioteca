<?php 

    define("USER","root");
    define("PASSWORD","");
    $data = "biblioteca";
    $host = "localhost";

    try{
        $conexion = new PDO("mysql:host=$host;dbname=$data",USER,PASSWORD);
    }catch(PDOExection $error){
       echo "error ".$error->getMessage();
    }


    
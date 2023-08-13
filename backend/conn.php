<?php
    include("./data.php");

    if($_POST){
        $titulo = $_POST["titulo"];
        $imagen = $_FILES['imagen']["name"];
        if(isset($imagen) && $imagen != ""){
            $titulo=filter_var($titulo,FILTER_SANITIZE_STRING);
            $tipo = $_FILES["imagen"]["type"];
            $tmp = $_FILES["imagen"]["tmp_name"];
            $query = "INSERT INTO libros VALUES (NULL,'$titulo',NULL,0,'$imagen')";
            $conn = $conexion->prepare($query);
            $conn->execute();
            $conn = null;
            move_uploaded_file($tmp,"./img/".$imagen);
            header("Location: ../index.php");
        }
    }
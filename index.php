<?php
    include_once("./backend/data.php");

    $query = "SELECT * FROM libros";
    $imagenes = $conexion->prepare($query);
    $imagenes->execute();
    $mis_libros = $imagenes->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</head>
<body>
    <main class="container">
        <div class="row justify-content-center">
            <form action="./backend/conn.php" method="POST" enctype="multipart/form-data" class="col-5 mt-5">
                <div class="input-group mt-4">
                    <span class="input-group-text">Titulo</span>
                    <input type="text" name="titulo" class="form-control">
                </div>
                <div class="input-group mt-4">
                    <span class="input-group-text">Imagen</span>
                    <input type="file" name="imagen" class="form-control">
                </div>
                <div class="btn-group mt-4">
                    <button type="submit" class="btn btn-success">Enviar</button>
                    <button type="reset" class="btn btn-danger">Borrar</button>
                </div>
            </form>
        </div>
        <div class="row justify-content-between mt-5">
            <?php if(count($mis_libros) != 0):?>
                <?php foreach($mis_libros as $libros):?>
                    <div class="card col-4 mt-3" style="height:400px;width:250px">
                        <img src=<?="./backend/img/".$libros["imagen"]?> alt="img" class="card-img-top mt-2" style="height:80%;width:100%">
                        <div class="card-body">
                            <h2 class="card-title lead text-center"><?=$libros["titulo"]?></h2>
                        </div>
                    </div>
                <?php endforeach;?>
            <?php endif;?>
        </div>
    </main>
</body>
</html>
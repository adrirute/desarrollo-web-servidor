<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos de Libros</title>
    <?php require 'database_conection.php' ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <?php
    if(!isset($_GET["titulo"])) header('location: index.php'); //para que si en la url no hay info de datos, te redirecciona a index 
    if($_SERVER["REQUEST_METHOD"] == "GET"){
        $titulo = $_GET["titulo"];
        $sql = $conexion -> prepare ("SELECT * FROM libros WHERE titulo = ?");
        $sql -> bind_param("s", $titulo);
        $sql -> execute();
        $result = $sql -> get_result();
        $sql -> close();
        $fila = $result -> fetch_assoc();
    }
    ?>

    <div class="container">
        <h1>Datos de libro</h1>
        <h3>Titulo: <?php echo $fila["titulo"] ?></h3>
        <h3>Autor: <?php echo $fila["autor"] ?></h3>
        <h3>Paginas: <?php echo $fila["paginas"] ?></h3>

        <div class="row mb-3">
            <div class="col-1">
                <form action="edit_book.php" method="GET">
                    <input type="hidden" name="titulo" value="<?php echo $titulo ?>">
                    <input type="submit" class="btn btn-primary" value="editar">
                </form>
            </div>
            <div class="col-1">
            <a href="index.php" class="btn btn-secondary">Volver</a>
            </div>
        </div>      
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
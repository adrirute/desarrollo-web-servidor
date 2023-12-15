<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libros</title>
    <?php require 'database_conection.php' ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body>
    <?php  

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $titulo = $_POST["titulo"];
            $ordenadrTit = $_POST["ordenar1"];  
            $ordenAscDesc = $_POST["ordenar2"];
                     
            $sql = $conexion -> prepare ("SELECT * FROM libros WHERE titulo LIKE CONCAT('%', ?, '%') ORDER BY $ordenadrTit $ordenAscDesc");
            $sql -> bind_param("s", $titulo);
            $sql -> execute();
            $result = $sql -> get_result();      
            $conexion -> close();              
        }   
        if($_SERVER["REQUEST_METHOD"] == "GET"){
            $sql = $conexion -> prepare ("SELECT * FROM libros");
            $sql -> execute();
            $result = $sql -> get_result();
            $conexion -> close();
        }
        

            
    ?>
    <div class="container">
        <h1>Libros</h1>

        <form action="" method="post">
            <div class="row mb-3">
                <div class="col-4">
                    <input type="text" class="form-control" name="titulo">
                </div>
                <div class="col-2">
                    <input type="submit" class="btn btn-primary" value="Buscar">
                </div>
            </div>
            <div class="row mb-3">
            <div class="col-2">
                <label for="">Ordenar: </label>
            </div>
                <div class="col-2">                 
                    <select class="form-select" name="ordenar1" id="ordenar1">
                        <option selected value="titulo">Título</option>
                        <option value="autor">Autor</option>
                        <option value="paginas">Páginas</option>
                    </select>
                </div>
                <div class="col-3">
                    <select class="form-select" name="ordenar2" id="ordenar2">
                        <option value="ASC">Ascendente</option>
                        <option value="DESC">Descendente</option>
                    </select>
                </div>
            </div>
        </form>
        <table class="table table-striped table-hover">
            <thead class="table table-dark table-striped table-primary">
                <tr>
                    <th>Titulo</th>
                    <th>Paginas</th>
                    <th>Autor</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                    <?php
                    while($fila = $result -> fetch_assoc()){?>
                        <tr>
                            <td><?php echo $titulo = $fila["titulo"] ?></td>
                            <td><?php echo $paginas = $fila["paginas"] ?></td>
                            <td><?php echo $autor = $fila["autor"] ?></td>
                            <form action="view_book.php" method="get">
                                <td><input type="hidden" value="<?php echo $titulo ?>" name="titulo"></td>
                                <td><input type="submit" value="Ver" name="verMas"></td>
                            </form>
                        </tr>                  
                    <?php } ?>
                </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>
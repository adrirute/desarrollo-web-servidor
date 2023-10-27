<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require '../funciones/util.php' ?>
    <?php require '../funciones/bbdd_games.php' ?>
    <?php require '../objetos/videojuego.php' ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <?php
    $sql = "SELECT * FROM videojuegos";
    $resultado = $conexion -> query($sql);
    $videojuegos = [];
    /* por cada fila que se cree en el formulario, lo metemos en un objeto */
    while($fila = $resultado -> fetch_assoc()){
        $id_videojuego = $fila ["id_videojuego"];
        $titulo = $fila ["titulo"];
        $pegi = $fila ["pegi"];
        $compania = $fila ["compania"];

        $nuevo_videojuego = new Videojuego ($id_videojuego, $titulo, $pegi, $compania);
        array_push($videojuegos, $nuevo_videojuego);
    }
    ?>

    <div class="container">
        <h1>Listado de Usuarios</h1>       
     <table class="table table-striped table-hover">
            <thead class="table table-dark table-striped table-primary">
                <tr>
                    <th>Usuario</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Fecha de Nacimiento</th>
                </tr>
            </thead>
            <tbody>  
            <?php
            foreach($videojuegos as $videojuego){
                echo "<tr>";
                    echo "<td>" . $videojuego -> id_videojuego . "</td>";
                    echo "<td>" . $videojuego -> titulo . "</td>";
                    echo "<td>" . $videojuego -> pegi . "</td>";
                    echo "<td>" . $videojuego -> compania . "</td>";
                echo "</tr>";
            }
            ?>             
            </tbody>
        </table>       
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> 
</body>
</html>
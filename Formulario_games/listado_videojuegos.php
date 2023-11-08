<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require '../funciones/bbdd_games.php'?>
    <?php require '../funciones/util.php'?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="estilos.css">
</head>
<body>
    <div class="container">
        <h1>Listado de videojuegos</h1>
        <?php
        $sql = "SELECT * FROM videojuegos";
        $resultado = $conexion -> query($sql);
        ?>
        
        <table class="table table-striped table-hover">
            <thead class="table table-dark table-striped table-primary">
                <tr>
                    <th>ID</th>
                    <th>Titulo</th>
                    <th>PEGI</th>
                    <th>Compañia</th>
                    <th>Imagen</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while($fila = $resultado -> fetch_assoc()){ /* coge la fila de la tabla en la bbdd y crea un array asociativo */
                    /* [id=2. tituo=Spiderman, pefi=7, compañia= Sony] */
                    echo "<tr>";
                        echo "<td>" . $fila ["id_videojuego"] . "</td>";
                        echo "<td>" . $fila ["titulo"] . "</td>";
                        echo "<td>" . $fila ["pegi"] . "</td>";
                        echo "<td>" . $fila ["compania"] . "</td>";?>
                        <td>
                            <img width="60" height="80" src="<?php echo $fila["imagen"] ?>">
                        </td>
                        <?php
                        echo "</tr>";

                    
                    /*  echo $fila["titulo"] . " " . $fila["pegi"] . "<br>"; */ 
                }
            ?>


            </tbody>
        </table>
        
        
        
        </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
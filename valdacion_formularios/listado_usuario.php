<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require '../funciones/util.php' ?>
    <?php require '../funciones/base_de_datos.php' ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1>Listado de Usuarios</h1>
        <?php
        $sql = "SELECT * FROM usuarios";
        $resultado = $conexion -> query($sql);
        ?>

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
                while($fila = $resultado -> fetch_assoc()){ /* coge la fila de la tabla en la bbdd y crea un array asociativo */
                     /* [id=2. tituo=Spiderman, pefi=7, compañia= Sony] */
                        echo "<tr>";
                            echo "<td>" . $fila ["usuario"] . "</td>";
                            echo "<td>" . $fila ["nombre"] . "</td>";
                            echo "<td>" . $fila ["apellidos"] . "</td>";
                            echo "<td>" . $fila ["fecha_nacimiento"] . "</td>";
                        echo "</tr>";                          
                }
                ?>
            </tbody>
        </table>       
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> 
</body>
</html>
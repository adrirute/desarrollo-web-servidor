<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba Videojuego</title>
    <?php require 'videojuego.php' ?>
</head>
<body>
    <?php
    $videojuego1 = new Videojuego(1, "Spiderman", "7", "Sony");
    $videojuego2 = new Videojuego(2, "Forza", "3", "Ubisoft");
    $videojuego3 = new Videojuego(3, "Fortnite", "12", "Epic Games");
    /* echo $videojuego1 -> titulo; */

    /* 1. Crear array con 3 videojuegos
    2. Recorrer con foreach el arrray
    3. Mostrar los videojuegos en una tabla */

    $listas = [$videojuego1, $videojuego2, $videojuego3];
    ?>


    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>PEGI</th>
                <th>Compañia</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($listas as $lista){
                echo "<tr>";
                    echo "<td>" . $lista -> id_videojuego . "</td>";
                    echo "<td>" . $lista -> titulo . "</td>";
                    echo "<td>" . $lista -> pegi . "</td>";
                    echo "<td>" . $lista -> compania . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

    <?php
    



    ?>
</body>
</html>
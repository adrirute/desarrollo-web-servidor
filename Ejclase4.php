<!-- Crea un array multidimensional que contenga info sobre series: titulo, plataforma y temporadas
Crea 5 series con sus titulos, plataforma y temporadas.
Muestralos en 3 tablas. 
Uuna los mostrará tal y como lo has añadido.
Otra ordenada por temporada(menor a mayor).
Otra por la plataforma a la que pertenecen, y si es igual, por el titulo. -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
</body>
</html>





<?php
    $series=[
                ["Rick y Morty", "HBO", 5],
                ["Suits", "Netflix", 7],
                ["Fargo", "Amazon", 4],
                ["One Piece", "Crunchy Roll", 12],
                ["Friends", "Netflix", 8]
            ];
    
    ?>

    <table >
        <caption>Series</caption>
        <thead>
            <tr>
                <th>Titulo</th>
                <th>Plataforma</th>
                <th>Temporadas</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($series as $serie){
                    list($titulo, $plataforma, $temp) = $serie;
                        echo "<tr>";
                        echo "<td> $titulo </td>";
                        echo "<td> $plataforma </td>";
                        echo "<td> $temp </td>";
                        echo "</tr>";
                }
            ?>
        </tbody>
    </table>


    <?php
        $c_temp = array_column($series,2);
        array_multisort($c_temp, SORT_ASC, $series);
    ?>


    <table >
        <caption>Series</caption>
        <thead>
            <tr>
                <th>Titulo</th>
                <th>Plataforma</th>
                <th>Temporadas</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($series as $serie){
                    list($titulo, $plataforma, $temp) = $serie;
                        echo "<tr>";
                        echo "<td> $titulo </td>";
                        echo "<td> $plataforma </td>";
                        echo "<td> $temp </td>";
                        echo "</tr>";
                }
            ?>
        </tbody>
    </table>


    <?php
        $c_titulo = array_column($series,0);
        $c_plataforma = array_column($series,1);
        array_multisort($c_plataforma, SORT_ASC,$c_plataforma,SORT_ASC ,$series);
    ?>
    

    <table >
        <caption>Series</caption>
        <thead>
            <tr>
                <th>Titulo</th>
                <th>Plataforma</th>
                <th>Temporadas</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($series as $serie){
                    list($titulo, $plataforma, $temp) = $serie;
                        echo "<tr>";
                        echo "<td> $titulo </td>";
                        echo "<td> $plataforma </td>";
                        echo "<td> $temp </td>";
                        echo "</tr>";
                }
            ?>
        </tbody>
    </table>

<br><br>

    <?php
        $total=0;    
        foreach($series as $serie){
            list($titulo, $plataforma, $temp) = $serie;
                $total += $temp;             
        }
        echo "$total<br>";

        //list($titulo, $plataforma, $temp) = $serie;
        $media=$total/count($series);
        echo "$media";
        
    ?>

    

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Se crea el array multidimensional -->
    <?php
    $temperaturas = [
        ["Málaga", 20, 27],
        ["Sevilla", 17, 36],
        ["Cádiz", 19, 31],
        ["Jaén", 19, 33],
        ["Granada", 12, 35],
        ["Almería", 20, 27],
        ["Huelva", 16, 33]
        ];     
    
    /* Se añade una nueva columna a la tabla usando bucle For */    
    for($i = 0; $i<count($temperaturas);$i++){
        $temperaturas [$i][count($temperaturas[$i])] = ($temperaturas[$i][1]+$temperaturas[$i][2])/2;
    }

    /* Se ordena por temperatura minima prevista y si hay iguales, por nombre alfabéticamente */
    $c_ciudad = array_column($temperaturas,0);
    $c_tempMedia = array_column($temperaturas,3);
    array_multisort($c_tempMedia, SORT_ASC, $c_ciudad, SORT_ASC,$temperaturas);
    ?>
    
    <!-- Creamos tabla -->
<table class="mi_tabla" >
    <caption class="mi_caption">Temperaturas</caption>
    <thead>
        <th>Ciudad</th>
        <th>Temperatura Min</th>
        <th>Temperatura Max</th>
        <th>Temperatura Media</th>
    </thead>
    <tbody>
        <?php
        $min=0;
        $max=0;
        foreach($temperaturas as $temperatura){
            list($ciudad,$tempMin,$tempMax,$tempMedia) = $temperatura;
            echo "<tr>";
            echo "<td> $ciudad </td>";
            echo "<td> $tempMin º</td>";
            echo "<td> $tempMax º</td>";
            echo "<td> $tempMedia º</td>";
            echo "</tr>";
            $min += $tempMin;
            $max += $tempMax; 
        }
        ?>
    </tbody>
</table> <br>
   
        <?php
            echo "<h3> La temperatura media minima es " . round($min/count($temperaturas),2) . "º</h3><br>";
            echo "<h3> La temperatura media maxima es " . round($max/count($temperaturas),2) . "º</h3";
        ?>

</body>
</html>
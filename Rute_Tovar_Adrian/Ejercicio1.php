<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <?php
    for($i=1;$i<=10;$i++){
        echo "<table class='mi_tabla'>";
        echo "<th> Tabla del $i </th>";        
            for($j=1;$j<=10;$j++){               
                echo "<tr>";
                echo "<td>" . $i ." x " . $j. "=". $i*$j ."</td>";
                echo "</tr>";               
            }
        echo "</table>";            
    }   
    ?>
    
</body>
</html>
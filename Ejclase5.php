<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej5</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
<?php
    $estudiantes =[
        ["Adri",rand(1,10)],
        ["Javi",rand(1,10)],
        ["Jorgeto",rand(1,10)],
    ];


    $c_nombre = array_column($estudiantes, 0);
    array_multisort($c_nombre, SORT_ASC, $estudiantes);
?>   
      
    <table class="mi_tabla">
        <caption class="mi_caption" >Notas</caption>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Nota</th>
                <th>Calificacion</th>               
            </tr>
        </thead>    
        <tbody>
            <?php
            foreach($estudiantes as $estudiante){
                list($nombre, $nota) = $estudiante;
                echo "<tr>";
                echo "<td> $nombre </td>";
                echo "<td> $nota </td>";

        /* Otra forma para hacer el IF de suspensos, aprobados...
        $calificacion match(true){
            $nota >=0 && $nota<5 => "Suspenso",
            $nota >=5 && $nota <7 => "Aprobado",
            $nota >=7 && $nota <=9 => "Notable",    
            $nota >=9 && $nota <=10 => "Sobresaliente",
            default => "Error"     
            } --> */

               if($nota<5){
                    echo "<td>Suspenso </td>";
                }
                elseif($nota>=5 and $nota<7){
                    echo "<td>Aprobado </td>";
                }
                elseif($nota>=7 and $nota<=8){
                    echo "<td>Notable </td>";
                }else{
                    echo "<td>Sobresaliente </td>";
                }
                /* echo "<td>$calificacion</td>"; */
                echo "</tr>";      
            }
            ?>
        </tbody>    
    </table> 
</body>
</html>

<!-- Otra forma para hacer el IF de suspensos, aprobados...
$calificacion match(true){
    $nota < 5 => "Suspenso",
    $nota >=5 && $nota <7 => "Aprobado",
    $nota >=7 && $nota <=9 => "Notable",    
    $nota >=9 && $nota <=10 => "Sobresaliente",     
} -->

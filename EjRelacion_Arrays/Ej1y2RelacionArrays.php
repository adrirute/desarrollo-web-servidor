<!-- Crea un array que almacene nombres de productos y sus respectivos precios.
Muestra en una tabla los productos con sus precios, ordenados alfabéticamente por
el nombre del producto. Muestra también el precio total de todos los productos y
cuántos productos hay en el array. -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
    $productos = [
        ["Leche", 2.90],
        ["Patatas", 3],
        ["Chocolate", 5],
    ];

    $c_nombre = array_column($productos, 0);
    array_multisort($c_nombre, SORT_ASC, $productos);
?>

<table class="mi_tabla" >
    <caption class="mi_caption">PRODUCTOS</caption>
    <thead>
        <th>Nombre</th>
        <th>Precio</th>
    </thead>
    <tbody>
        <?php
        foreach($productos as $producto){
            list($nombre,$precio) = $producto;
            echo "<tr>";
            echo "<td> $nombre </td>";
            echo "<td>". $precio ." €</td>";
            echo "</tr>"; 
        }
        ?>
    </tbody>
</table>

<?php
    $suma=0;
    foreach($productos as $producto){
        list($nombre,$precio) = $producto;
        $suma+=$precio;
    }
    echo $suma." € <br>";
    
    $Nproducto=count($productos);
    echo $Nproducto;
?>

<br><br>
<!-- Modifica el array anterior para que además de los productos y sus precios almacene
la cantidad que se ha comprado de cada producto. Muestra en una columna
adicional el precio total de cada producto (producto x cantidad) y al final de la tabla el
precio total de todos los productos comprados y la cantidad de productos adquiridos. -->

<?php
for($i = 0; $i<count($productos);$i++){
    $productos [$i][count($productos[$i])] = rand(1,40);
 }
 
for($i = 0; $i<count($productos);$i++){
    $productos [$i][count($productos[$i])] = $productos[$i][1] * $productos[$i][2];
 }
?>

<table class="mi_tabla" >
    <caption class="mi_caption">PRODUCTOS</caption>
    <thead>
        <th>Nombre</th>
        <th>Precio</th>
        <th>N Productos</th>
        <th>Precio final</th>
    </thead>
    <tbody>
        <?php       
        foreach($productos as $producto){
            list($nombre,$precio,$total,$precioFinal) = $producto;
            echo "<tr>";
            echo "<td> $nombre </td>";
            echo "<td>". $precio ." €</td>";
            echo "<td>" . $total . "</td>";
            echo "<td>" . $precioFinal . " €</td>";
            echo "</tr>"; 
        }
        ?>
    </tbody>
</table>






</body>
</html>



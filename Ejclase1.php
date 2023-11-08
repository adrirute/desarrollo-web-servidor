<!-- Crea un array que contenga los numeros pares del 1 al 50 y muestralos.
Investiga si hay algún método en PHP para "barajar" los elementos de un array.
Una vez barajado, muestra los números en orden descendente. -->

<?php
$arr = [];
for($i=1; $i<=50;$i++){
    if($i%2 == 0){//Se usa array_push($nombreArray, "elementos") o $nombreArray[]="nuevoElemento";
        array_push($arr,$i);
    }
    
}

shuffle($arr);
rsort($arr);
?>

<ul>
    <?php
    foreach($arr as $array){
        echo "<li> $array </li>";
    }
    ?>
</ul>
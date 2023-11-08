<?php



/* Funcion sumatorio */
function sumatorio( int $numero):int{
    $suma=0;
    for($i=1;$i<=$numero;$i++){
        $suma+=$i;
    }
    return $suma;
}

/* Funcion facotorial */
function factorial (int $numero):int{
    $facto=1;
    for($i=1;$i<=$numero;$i++){
        $facto*=$i;
    }
    return $facto;
}
?>
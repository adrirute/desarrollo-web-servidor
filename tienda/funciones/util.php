<?php

function depurar(string $entrada): string{
    $salida = htmlspecialchars($entrada);/* accede a los html de manera especial */
    $salida = trim($salida);/* quitar espacios en el formulario */
    return $salida;
}

?>
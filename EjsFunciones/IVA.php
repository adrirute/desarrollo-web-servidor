<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    /* Declaro constantes */
    define("GENERAL",21);
    define("REDUCIDO",10);
    define("SUPERREDUCIDO",4);

        /* Con match */

         function precioSinIva(int|float $precio,String $IVA):float{ 
            $precioSinIVA = match($IVA){
                "GENERAL" => $precio - $precio * GENERAL/100,
                "REDUCIDO" => $precio - $precio * GENERAL/100,
                "SUPERREDUCIDO" => $precio - $precio * GENERAL/100,
                "SIN IVA" => $precio
            };
            return $precioSinIVA;
        }
        

        function precioConIva(int|float $precio, String $IVA):float{
            $precioConIVA = match($IVA){
                "GENERAL" => $precio + $precio * GENERAL/100,
                "REDUCIDO" => $precio + $precio * GENERAL/100,
                "SUPERREDUCIDO" => $precio + $precio * GENERAL/100,
                "SIN IVA" => $precio
            };
            return $precioConIVA;
        }
        
        echo "<h3>" . precioConIva(10,"REDUCIDO") ."</h3>";
        echo "<h3>" . precioSinIva(10,"REDUCIDO") ."</h3>";
    ?>
</body>
</html>
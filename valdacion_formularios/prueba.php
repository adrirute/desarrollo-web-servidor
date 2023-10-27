<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php  
    
    function depurar(string $entrada): string{
        $salida = htmlspecialchars($entrada);/* accede a los html de manera especial */
        $salida = trim($salida);/* quitar espacios en el formulario */
        return $salida;
    }


    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $temp_campo1= depurar($_POST["campo1"]); 
        
        /* if(strlen($temp_campo1)>0){ 
           if(is_numeric($temp_campo1)){
               $temp_campo1 = (float) $temp_campo1;
               if($temp_campo1 >= 0){
                    $campo1 = $temp_campo1;
               }else{
                $error_campo1 = "El numero debe ser mayor que 0";
               }
           }else{
                $error_campo1= "Debes introducir un numero";
           }
        } else{
            $error_campo1 = "este campo es obligatorio";
        } */

        /* El codigo de antes mejorado y simplificado */
        if(!strlen($temp_campo1) > 0){ /* strlen --> comprueba longitud de string */
            $error_campo1 = "Este campo es obligatorio";
        }else{
            if(filter_var($temp_campo1, FILTER_VALIDATE_INT) ===  false){
                $error_campo1 = "Debes introducir un numero";
            }else{
                $temp_campo1 = (float) $temp_campo1;
                if($temp_campo1 < 0){
                    $error_campo1 = "El numero debe ser mayor que 0";
                }else{
                    $campo1 = $temp_campo1;
                }
            }
        }

    }
    ?>
    <form action="" method="POST">
        <label for="">Campo 1: </label>
        <input type="text" name="campo1">
        
         <?php   if(isset($error_campo1)) echo $error_campo1; ?>
        
        <br><br>
        <input type="submit" value="Enviar">
    </form>
    <?php
    if(isset($campo1){
        echo "<h3>$campo1</h3>";
    })
    ?>
</body>
</html>
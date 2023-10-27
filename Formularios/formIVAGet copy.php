<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require '../EjsFunciones/IVA.php' ?>
    <?php require '../EjsFunciones/EjIRPF.php'  ?>
    <link rel="stylesheet" href="styleFormulario.css">
</head>
<body>
<?php    
    
    function depurar(string $entrada):string{
        $salida = htmlspecialchars($entrada);
        $salida = trim($salida);
        return $salida;
    }
    
    if($_SERVER["REQUEST_METHOD"] == "GET"){
        if(isset($_GET["f"])){
            if($_GET["f"] == "IVA"){                               
                $temp_precio =  depurar($_GET["sueldo"]);
                if(isset($_GET["IVA"])){
                    $temp_iva = depurar($_GET["IVA"]);
                }else{
                    $temp_iva = "";
                }    
                #Validar precio
                if(!strlen($temp_precio)>0){
                    $error_precio = "El precio es obligatorio";
                } else{
                    if(filter_var($temp_precio, FILTER_VALIDATE_FLOAT) === false){
                        $error_precio = "El precio debe ser un numero";
                    }else{
                        $temp_precio = (float) $temp_precio;
                        if($temp_precio < 0){
                            $error_precio = "El precio debe ser mayor que 0";
                        }else{
                            $precio = $temp_precio;
                        }
                    }
                }
                
                #Validacion IVA
                if(!strlen($temp_iva) > 0){
                    $error_iva = "El iva es obligatorio";
                } else{
                    $lista_iva_validos = ["GENERAL", "REDUCIDO", "SUPERREDUCIDO", "SIN IVA"];
                    if(!in_array($temp_iva, $lista_iva_validos)){
                        $error_iva = "El IVA debe ser valido";
                    }else{
                        $iva = $temp_iva;
                    }
                }
            
            }
        }
        
        

    }
    ?>
   <form action="" method="get">

    <fieldset>
    <h2>IVA</h2>
    <label for="">Introduzca sueldo anual</label>
    <input type="text" name="sueldo"> 
    <label for="">Introduzca tipo de IVA</label>
    <select name="tipoIVA" id="IVA">
        <option disabled selected hidden>--Elige un IVA--</option>
        <option value="GENERAL">General</option>
        <option value="REDUCIDO">Reducido</option>
        <option value="SUPERREDUCIDO">Superreducido</option>
        <option value="SIN IVA">Ninguno</option>
    </select>
    <?php if(isset($temp_iva)) echo $error_iva ?>
    <BR></BR>
    <input type="hidden" name="f" value="IVA">
    <input type="submit" value="calcular">
    <?php if(isset($precio) && isset($iva)){
        echo "<h3>Precio con iva: " . precioConIva($precio, $iva)  .  "</h3>";
    }  ?>
    </fieldset>
    </form>

    <br><br>
    <fieldset>
    <h2>IRPF</h2>
    <form action="" method="get">
    <label for="">Introduzca su salario</label>
    <input type="text" name="salario">
    <BR>
    <input type="hidden" name="f" value="irpf">
    <input type="submit" value="calcular">
    
    </form>
    </fieldset> 
</body>
</html>
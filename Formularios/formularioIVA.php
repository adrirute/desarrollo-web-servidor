<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require '../EjsFunciones/IVA.php' ?>
</head>
<body>
<?php    
    
    function depurar (string $entrada):string{
        $salida = htmlspecialchars($entrada);
        $salida = trim($salida);
        return $salida;
    }

    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $temp_precio = (float) $_POST["sueldo"];
        $IVA = $_POST["tipoIVA"];
        echo precioConIva($precio, $IVA);
    }
?>
    <form action="" method="post">

    <label for="">Introduzca sueldo anual</label>
    <input type="text" name="sueldo"> <br><br>
    <label for="">Introduzca tipo de IVA</label>
    <select name="tipoIVA" id="">
        <option value="GENERAL">General</option>
        <option value="REDUCIDO">Reducido</option>
        <option value="SUPERREDUCIDO">Superreducido</option>
        <option value="SIN IVA">Ninguno</option>
    </select>
    <BR></BR>
    <input type="submit" value="calcular">
    </form>
    
</body>
</html>
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
    <form action="" method="get">

    <fieldset>
    <h2>IVA</h2>
    <label for="">Introduzca sueldo anual</label>
    <input type="text" name="sueldo"> 
    <label for="">Introduzca tipo de IVA</label>
    <select name="tipoIVA" id="">
        <option value="GENERAL">General</option>
        <option value="REDUCIDO">Reducido</option>
        <option value="SUPERREDUCIDO">Superreducido</option>
        <option value="SIN IVA">Ninguno</option>
    </select>
    <BR></BR>
    <input type="hidden" name="f" value="iva">
    <input type="submit" value="calcular">
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
    <?php
    if($_SERVER["REQUEST_METHOD"] == "GET"){
        if(isset($_GET["f"])){
            if($_GET["f"] == "iva"){
                $precio = (float) $_GET["sueldo"];
                $IVA = $_GET["tipoIVA"];
                echo precioConIva($precio, $IVA);
            }else
            if($_GET["f"] == "irpf"){
                $salario = (float) $_GET["salario"];
                echo calculoIRPF($salario);
            }
        }
        
        

    }
    ?>
    
</body>
</html>
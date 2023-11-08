<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Producto</title>
    <?php require 'funciones/util.php' ?>
    <?php require 'base_de_datos.php' ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

<!-- Realizamos las validaciones -->
<?php
if($_SERVER["REQUEST_METHOD"] === "POST"){
    $temp_nombreProducto = depurar($_POST["nombreProducto"]);
    $temp_precioProducto = depurar($_POST["precioProducto"]);
    $temp_descripcionProducto = depurar($_POST["descripcionProducto"]);
    $temp_cantidadProducto = depurar($_POST["cantidadProducto"]);    





/* Validacion de nombre producto */
    if(strlen($temp_nombreProducto)==0){
        $err_nombreProducto = "El nombre es obligatorio <br>";
    }else{
        if(strlen($temp_nombreProducto)<40){
            $regex1 = "/^[a-zA-Z0-9 ]+$/";
            if(!preg_match($regex1, $temp_nombreProducto)){
                $err_nombreProducto = "El nombre debe contener letras o numeros o espacios en blanco <br>";
            }else{
                $nombreProducto = $temp_nombreProducto;
            }
        }else{
            $err_nombreProducto = "Debe contener máximo 40 caracteres";
        }
    }

/* Validacion de precio */
    if(strlen($temp_precioProducto)===0){
        $err_precioProducto = "El precio es obligatorio <br>";
    }else{
       if(filter_var($temp_precioProducto, FILTER_VALIDATE_FLOAT) === false){
        $err_precioProducto = "Debe contener numeros decimales";
       }else{
            if(($temp_precioProducto>=0) && ($temp_precioProducto)<=99999.99){
                $precioProducto = (float) $temp_precioProducto;
            }else{
                $err_precioProducto = "El precio debe ser menos de 1M";
            }
       }
    }

/* Validacion de descripcion */
    if(strlen($temp_descripcionProducto)===0){
        $err_descripcionProducto = "La descripcion es obligatoria";
    }else{       
        if(strlen($temp_descripcionProducto) > 255){
            $err_descripcionProducto = "No debe contener mas de 255 caracteres <br>";
        }else{
            $descripcionProducto = $temp_descripcionProducto;
        }
    }


/* Validacion de cantidad */
    if(strlen($temp_cantidadProducto) === 0){
        $err_cantidadProducto = "Este campo es obligatorio";
    }else{
        if(filter_var($temp_cantidadProducto, FILTER_VALIDATE_INT) === false){
            $err_cantidadProducto = "Insertar solo valores numericos";
        }else{
            if(strlen($temp_cantidadProducto)< 0 || strlen($temp_cantidadProducto)>99999){
                $err_cantidadProducto = "No puede superar los 99999";
            }else{
                $cantidadProducto = $temp_cantidadProducto;
            }
        }
    }
}

?>
   
    <div class="container">
    <h1>Inventario de Productos</h1>
        <h3>Productos</h3>
        <form action="" method="post">
            <div class="mb-3">
                <label for="">Introduzca nombre del producto: </label>
                <input type="text" name="nombreProducto">
                <?php if(isset($err_nombreProducto)) echo $err_nombreProducto ?>
            </div>
            <div class="mb-3">
                <label for="">Introduzca precio del producto: </label>
                <input type="text" name="precioProducto">
                <?php if(isset($err_precioProducto)) echo $err_precioProducto ?>
            </div>
            <div class="mb-3">
                <label for="">Introduzca descripcion del producto: </label>
                <input type="text" name="descripcionProducto">
                <?php if(isset($err_descripcionProducto)) echo $err_descripcionProducto ?>
            </div>
            <div class="mb-3">
                <label for="">Introduzca cantidad del producto: </label>
                <input type="text" name="cantidadProducto">
                <?php if(isset($err_cantidadProducto)) echo $err_cantidadProducto ?>
            </div>
        <input type="submit" value="Aceptar">
        </form>
    </div>

    <?php
    if(isset($nombreProducto) && isset($precioProducto) && isset($descripcionProducto) && isset($cantidadProducto)){
    $sql = "INSERT INTO Productos (nombreProducto, precio, descripcion, cantidad)
        values ('$nombreProducto', '$precioProducto', '$descripcionProducto', '$cantidadProducto')";
    
    $conexion->query($sql);
    }
    ?>  


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
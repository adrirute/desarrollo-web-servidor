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

    //Para las imagenes
    $nombre_fichero = $_FILES["imagen"]["name"];
    $ruta_temporal = $_FILES["imagen"]["tmp_name"];
    $formato = $_FILES["imagen"]["type"];
    $ruta_final = "imagenes/" . $nombre_fichero; //debo crear carpeta imagenes
    $tamano = $_FILES["imagen"]["size"];
    //move_uploaded_file($ruta_temporal, $ruta_final); 




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

    /* Validacion de imagenes */
    if(strlen($nombre_fichero) === 0){
        $err_imagen = "Este campo es obligatorio";
    }else{
        if($formato != "image/jpg" && $formato != "image/png" && $formato != "image/jpeg"){
            $err_imagen = "Error,la imagen debe ser .png , .jpg o ,jpeg";
        }else{
            if($tamano > 5*1024*1024){
                $err_imagen = "El tamaño del archivo no debe superar los 5MB";
            }else{
                echo "funciona!";
                move_uploaded_file($ruta_temporal, $ruta_final);
            }
        }
    }
}

?>
   
    <div class="container">
    <h1>Inventario de Productos</h1>
        <h3>Productos</h3>
        <form action="" method="post" enctype="multipart/form-data">
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
            <div class="mb-3">
                <label for="" class="form-label">Imagen</label>
                <input type="file" name="imagen">
                <?php if(isset($err_imagen)) echo $err_imagen ?>
            </div>
        <input type="submit" value="Aceptar">
        </form>
    </div>

    <?php
    if(isset($nombreProducto) && isset($precioProducto) && isset($descripcionProducto) && isset($cantidadProducto) && isset($ruta_final)){
    $sql = "INSERT INTO Productos (nombreProducto, precio, descripcion, cantidad, imagen)
        values ('$nombreProducto', '$precioProducto', '$descripcionProducto', '$cantidadProducto', '$ruta_final')";
    
    $conexion->query($sql);
    }
    ?>  


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
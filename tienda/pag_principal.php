<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
       

    </style>
    <?php require 'base_de_datos.php' ?>
    <?php require 'Producto.php' ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $idProducto = $_POST["idProducto"];
        echo "<p>El producto seleccionado es $idProducto</p>";
    }

    session_start();

    if(isset($_SESSION["usuario"])){
        $usuario = $_SESSION["usuario"];
    }else{
        /* header('location: iniciar_sesion.php'); */ /* Si queremos q nos redirija al login */
        $_SESSION["usuario"] = "invitado";
        $usuario = $_SESSION["usuario"]; 
    }

    $sql = "SELECT rol FROM Usuarios WHERE usuario = '$usuario'";
    $rol = $conexion -> query($sql); //para conectarse a la data base
    ?>
    <div class="container">
        <h1>Listado de Productos</h1>
        <?php
        $sql = "SELECT * FROM Productos";
        $resultado = $conexion -> query($sql);
        $productos = [];
        while($fila = $resultado -> fetch_assoc()){ /* coge la fila de la tabla en la bbdd y crea un array asociativo */
            /* [id=2. tituo=Spiderman, pefi=7, compañia= Sony] */
            $idProducto= $fila["idProducto"];  
            $nombreProducto = $fila["nombreProducto"];
            $precio = $fila["precio"];
            $descripcion = $fila["descripcion"] ;
            $cantidad= $fila["cantidad"];
            $imagen = $fila["imagen"];
                
            $nuevo_producto = new Producto ($idProducto, $nombreProducto, $precio, $descripcion, $cantidad, $imagen);
            array_push ($productos, $nuevo_producto);                
        }
        ?>

        <table class="table table-striped table-hover">
            <thead class="table table-dark table-striped table-primary">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Descripción</th>
                    <th>Cantidad</th>
                    <th>Imagen</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($productos as $producto) { ?>
                       <tr>
                            <td><?php echo $producto->idProducto ?></td>
                            <td><?php echo $producto->nombreProducto?></td>
                            <td><?php echo $producto->precio?></td>
                            <td><?php echo $producto->descripcion?></td>
                            <td><?php echo $producto->cantidad?></td>
                       
                        <td>
                            <img width="160px" height="160px" src="<?php echo $producto->imagen ?>">
                        </td>
                        <td>
                            <form action="" method="post">
                                <input type="hidden" name="idProducto" value="><?php echo $producto -> $idProducto ?>">
                                <input class="btn btn-danger" type="submit" value="Añadir a cesta">
                            </form>
                        </td>
                        </tr>
                        <?php                       
                    }?>            
            </tbody>
        </table>

        <?php
            if($rol -> fetch_assoc()["rol"] == "Admin"){
                echo "<a href='Producto.php'>Crear Producto</a>"
            }
        ?>
        
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>   
</body>
</html>
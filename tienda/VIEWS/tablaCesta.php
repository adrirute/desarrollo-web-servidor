<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require '../UTIL/base_de_datos.php' ?>
    <?php require '../UTIL/Producto.php' ?>
    <?php require '../UTIL/util.php' ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <?php
    session_start();

    if(isset($_SESSION["usuario"])){
        $usuario = $_SESSION["usuario"];
        $rol = $_SESSION["rol"];
    }else{
        header('location: inicio_sesion.php');
        $_SESSION["usuario"] = "invitado";
        $usuario = $_SESSION["usuario"]; 
    }

    /* Guarda idCesta en el $_SESSION */
        $sql = "SELECT idCesta FROM Cestas WHERE usuario = '$usuario'";
        $resultado = $conexion -> query($sql);

        while($fila = $resultado -> fetch_assoc()){
            $idCesta = $fila["idCesta"];
        }   
        
        
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $insertPedido = "INSERT INTO Pedidos (usuario, precioTotal) VALUES ('$usuario', 'COMING SOON') ";
    }
    ?>

<!-- Hacemos lista de cesta de productos -->
    <h1>Cesta de Productos</h1>
    <?php
    /* Consulta join para coger datos productos y de ProductoCesta */
    $sql = "SELECT p.nombreProducto as nombre, p.precio as precio, p.imagen as imagen, c.idCesta as idCesta, c.cantidad as cantidad
    from Productos p
    join ProductosCestas c
    on (p.idProducto = c.idProducto)
    where c.idCesta = '$idCesta'"; 

    $resultado = $conexion -> query($sql);
    ?>
    <div>
        <table class="table table-striped table-hover">
            <thead class="table table-dark table-striped table-primary">
                <tr>
                    <th>Nombre</th>
                    <th>Precio</th>                  
                    <th>Cantidad</th>
                    <th>Imagen</th>                       
                </tr>
            </thead>
            <tbody>
                <?php
                    $suma = 0;
                    $total = 0;

                    while($fila = $resultado -> fetch_assoc()){
                        echo "<tr>"; 
                        echo "<td>" . $fila ["nombre"] . "</td>"; 
                        echo "<td>" . $fila ["precio"] . "</td>";    
                        echo "<td>" . $fila ["cantidad"] . "</td>";?>                                                  
                        <td>
                            <img width="60" height="80" src="<?php echo $fila["imagen"] ?>">
                        </td> 
                            <?php
                            echo "</tr>";
                            $suma = $fila ["cantidad"] * $fila ["precio"];
                            $total += $suma;
                                  
                        }   
                        echo "<td> Precio Total: " . $total . "</td>";                      
                        ?>
                </tbody>
        </table>
        <a href="pag_principal.php"><button>Volver</button></a>
        <form action="" method="post">
            <input type="submit" value="Finalizar Pedido" >
        </form>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>   
</body>
</html>
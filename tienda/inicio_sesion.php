<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require 'base_de_datos.php' ?>
    <?php require 'funciones/util.php' ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <?php
        if($_SERVER["REQUEST_METHOD"] === "POST"){
            $usuario = depurar($_POST["usuario"]);
            $contrasena = depurar($_POST["contrasena"]);

            $sql = "SELECT * FROM Usuarios WHERE usuario = '$usuario'";
            $resultado = $conexion -> query($sql);

            if($resultado -> num_rows === 0){
                echo "El usuario no existe";
            }else{
                while($fila = $resultado -> fetch_assoc()){ /* coge una fila de una tabla de una consulta y lo convierte en array */
                    $contrasena_cifrada = $fila["contrasena"];
                }

                $acceso_valido = password_verify($contrasena, $contrasena_cifrada);

                if($acceso_valido){
                    echo "INICIO DE SESION COMPLETADO";
                    session_start();
                    $_SESSION["usuario"]=$usuario;
                    header('location: productoFormulario.php');
                }else{
                    echo "CONTRASEÑA INCORRECTA";
                }
            }
        }
    ?>


    <div class="container">
    <h1>Iniciar Sesion</h1>
    <form action="" method="post">
        <div class="mb-3">
            <label class="form-label" for="">Usuario</label>
            <input class="form-control" type="text" name="usuario">
        </div>
        <div class="mb-3">
            <label class="form-label" for="">Contraseña</label>
            <input class="form-control" type="password" name="contrasena">
        </div>  
    <input type="submit" class="btn btn-primary" value="Iniciar Sesion">
    </form>
    </div>
    <a href="cerrar_sesion.php"><input type="button" value="Cerrar Sesion"></a>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuario</title>
    <?php require '../UTIL/util.php' ?>
    <?php require '../UTIL/base_de_datos.php' ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

<?php
if($_SERVER["REQUEST_METHOD"] === "POST"){
    $temp_usuario = depurar($_POST["usuario"]); 
    $temp_contrasena = depurar($_POST["contrasena"]);
    $temp_fechaNacimiento = depurar($_POST["fechaNacimiento"]);
    
    

/* Validacion usuario */
if(strlen($temp_usuario)===0){
    $err_usuario = "El nombre es obligatorio <br>";
}else{
    if(strlen($temp_usuario)>=4 && strlen($temp_usuario)<=12){
        $regex = "/^[a-zA-Z_]+$/";
        if(!preg_match($regex, $temp_usuario)){
            $err_usuario = "Solo se pueden caracteres y barra baja";
        }else{
            $usuario = $temp_usuario;
        }
    }else{
        $err_usuario = "Debe contener entre 4 y 12";
    }     
}

/* Validacion contraseña */
if(empty($temp_contrasena)){
    $err_contrasena = "Este campo es obligatorio";
}else{
    if(strlen($temp_contrasena)>255){
        $err_contrasena = "Maximo son 255 caracteres";
    }else{
        $contrasena_cifrada = password_hash($temp_contrasena, PASSWORD_DEFAULT);
    }
}

/* Validacion fecha de nacimiento */
if (empty($temp_fechaNacimiento)) {
    $err_fechaNacimiento = "Campo obligatorio de fecha <br><br>";
} else {
    $fecha_actual = date("Y-m-d");
    list($anyo_act, $mes_act, $dia_act) = explode('-', $fecha_actual);

    list($anyo_nac, $mes_nac, $dia_nac) = explode('-', $temp_fechaNacimiento);

    if($anyo_act - $anyo_nac < 12 || $anyo_act - $anyo_nac > 120){
        $err_fechaNacimiento = "Años incorrectos, debes tener entre 12 y 120 años";
    }elseif($anyo_act- $anyo_nac == 12) {
        if($mes_act - $mes_nac < 0){
            $err_fechaNacimiento = "No superas los 12 años mínimos";
        }elseif ($mes_act - $mes_nac == 0){
            if($dia_act - $dia_nac < 0){
                $err_fechaNacimiento = "No superas los 12 años por dias" ;
            }else{
                $fechaNacimiento = $err_fechaNacimiento;
            }
        }    
    } elseif ($anyo_act - $anyo_nac > 0){
        $fechaNacimiento = $temp_fechaNacimiento;
    }

}
}
?>

    <h1>Users</h1>
    <div class="container">
        <h3>Registro de usuarios</h3>
        <form action="" method="post">
            <div class="mb-3">
                <label for="">Nombre de usuario: </label>
                <input type="text" name="usuario">
                <?php if(isset($err_usuario)) echo $err_usuario?>
            </div>
            <div class="mb-3">
                <label for="">Introduzca contraseña: </label>
                <input type="password" name="contrasena">
                <?php if(isset($err_contrasena)) echo $err_contrasena ?>
            </div>
            <div class="mb-3">
                <label for="">Introduzca fecha de nacimiento: </label>
                <input type="date" name="fechaNacimiento">
                <?php if(isset($err_fechaNacimiento)) echo $err_fechaNacimiento ?>
            </div>
            <input type="submit" value="Aceptar">
        </form>
        <br>
        <a href="inicio_sesion.php"><button>Ir a Inicio Sesión</button></a>       
    </div>

    <?php

    if(isset($usuario) && isset($contrasena_cifrada) && isset($fechaNacimiento)){
        $sql = "INSERT INTO Usuarios (usuario, contrasena, fechaNacimiento)
            values ('$usuario', '$contrasena_cifrada', '$fechaNacimiento')";

        $conexion->query($sql);
        
        $sql = "INSERT INTO Cestas (usuario, precioTotal)  values ('$usuario', 0)"; 
    
        $conexion->query($sql);
        }
    ?>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
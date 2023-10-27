<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <?php require '../funciones/util.php' ?>
    <?php require '../funciones/base_de_datos.php' ?>
</head>
<body>
    <?php
    if($_SERVER["REQUEST_METHOD"] === "POST"){
        $temp_usuario = depurar( $_POST["usuario"]);
        $temp_nombre = depurar($_POST["nombre"]);
        $temp_apellidos = depurar($_POST["apellidos"]);
        $temp_fecha = depurar($_POST["fecha"]);

        if(strlen($temp_usuario) == 0){ /* indica el tamaño del string */
            $err_usuario = "El nombre de usuario es obligatorio <br><br>";
        }else{
            $regex = "/^[a-zA-Z_][a-zA-Z0-9_]{3,7}$/";
            if(!preg_match($regex, $temp_usuario)){
                $err_usuario = "El nombre de usuario debe contener de 4 a 8 caracteres o úmeros o barrabaja <br><br>";
            }else{
                $usuario = $temp_usuario;
            }
        }

        if(strlen($temp_nombre) == 0){
            $err_nombre = "El nombre es obligatorio <br><br>";
        }else{
            if(strlen($temp_nombre)>=2 && strlen($temp_nombre)<=20){
                $regex = "/^[a-zA-Z ]+$/";
                if(!preg_match($regex, $temp_nombre)){
                    $err_nombre = "El nombre debe contener letras";                  
                }else{
                    $nombre = $temp_nombre;
                }
            }else{
                $err_nombre = "El nombre debe contener entre 2 y 20 caracteres <br><br>";
            }
        }

        if(strlen($temp_apellidos) == 0){
            $err_apellidos= "El apellido es obligatorio <br><br>";
        }else{
            if(strlen($temp_nombre)>=2 && strlen($temp_nombre)<=40){
                $regex = "/^[a-zA-Z ]+$/";
                if(!preg_match($regex, $temp_apellidos)){
                    $err_apellidos = "El apellido debe contener letras";                  
                }else{
                    $apellidos = $temp_apellidos;
                }
            }else{
                $err_apellidos = "El apellido debe contener entre 2 y 20 caracteres <br><br>";
            }
        }

         /* Validacion fecha */
        if(empty($temp_fecha)){
            $err_fecha = "Campo obligatorio de fecha <br><br>";
        }else{
            $fecha_actual = date("Y-m-d");
            list($anyo_act, $mes_act, $dia_act) = explode('-', $fecha_actual);

            
            list($anyo_nac, $mes_nac, $dia_nac) = explode('-', $temp_fecha);

            if($anyo_act - $anyo_nac < 18){
                $err_fecha = "No puedes ser menor de edad";
            }elseif($anyo_act - $anyo_nac == 18){
                if($mes_act - $mes_nac < 0){
                    $err_apellidos = "No puedes ser menor de edad";
                }elseif($mes_act - $mes_nac == 0){
                    if($dia_act - $dia_nac < 0){
                        $err_fecha = "No puedes ser menor de edad";
                    }else{
                        $fecha = $temp_apellidos;
                    }
                }elseif($mes_act - $mes_nac > 0){
                    $fecha = $temp_fecha;
                }            
            }elseif($anyo_act - $anyo_nac > 18){
                $fecha = $temp_fecha;
            }
        }

       
        
    }
    ?>
    <form action="" method="post">
        <label for="">Usuario: </label>
        <input type="text" name="usuario"><br><br>
        <?php if(isset($err_usuario)) echo $err_usuario  ?>
        <label for="">Nombre: </label>       
        <input type="text" name="nombre"> <br><br>
        <?php if(isset($err_nombre)) echo $err_nombre?>
        <label for="">Apellidos: </label>       
        <input type="text" name="apellidos"> <br><br>
        <?php if(isset($err_apellidos)) echo $err_apellidos?>
        <label for="">Fecha de nacimiento: </label>       
        <input type="date" name="fecha"> <br><br>
        <?php if(isset($err_fecha)) echo $err_fecha?>
        <input type="submit" value="Enviar"> <br><br>
        
    </form>
    <?php 
    
    
    
     if(isset($usuario) && isset($nombre) && isset($apellidos) && isset($fecha)) {
        echo "<h3>$usuario</h3>";
        echo "<h3>$nombre $apellidos</h3>";
        echo "<h3>$fecha</h3>";
        $sql = "INSERT INTO usuarios(usuario, nombre, apellidos, fecha_nacimiento) /* mismos nombres que en el mysql */
            VALUES ('$usuario', '$nombre', '$apellidos', '$fecha')";
        
        $conexion->query($sql);
     }
    ?>
    
</body>
</html>


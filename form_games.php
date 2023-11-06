<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Videojuegos</title>
    <?php require '../funciones/bbdd_games.php'?>
    <?php require '../funciones/util.php'?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    
    <?php
    if($_SERVER["REQUEST_METHOD"] === "POST"){
        $temp_id = depurar($_POST["id"]);
        $temp_titulo = depurar($_POST["titulo"]);
        if(isset($_POST["pegi"])){ /* para cuando sea select */
            $temp_pegi = depurar($_POST["pegi"]);
        }else{
            $temp_pegi = "";
        }
        
        $temp_compania = depurar($_POST["compania"]);
    
        $nombre_fichero = $_FILES["imagen"]["name"];
        $ruta_temporal = $_FILES["imagen"]["tmp_name"];
        $formato = $_FILES["imagen"]["type"];
        $ruta = "imagenes/" . $nombre_fichero;

        move_uploaded_file($ruta_temporal, $ruta);

    /* Validacion de id */
    if(strlen($temp_id) == 0){
        $err_id = "<b>El ID es obligatoroio</b> <br><br>";
    }else{
        if(strlen($temp_id)>8){
            $err_id = "<b>El ID no puede contener mas de 8 caracteres</b> <br><br>";
        }else{
            if(filter_var($temp_id,FILTER_VALIDATE_INT) === false){
                $err_id = "<b>Solo se pueden numeros enteros</b> <br><br>";
            }else{
                $id = $temp_id;             
            }
        }
    }

    /* Validacion titulo */
    if(strlen($temp_titulo)== 0){
        $err_titulo = "<b>El titulo es obligatoroio</b> <br><br>";
    }else{
        if(strlen($temp_titulo)>100){
            $err_titulo = "<b>El titulo no puede contener mas de 100 caracteres</b> <br><br>";
        }else{
            $titulo = $temp_titulo;
        }
    }

    /* Validacion Pegi */
    if(strlen($temp_id)== 0){
        $err_pegi = "<b>El Pegi es obligatoroio</b> <br><br>";
    }else{
       $pegis_validos = ['3', '7', '12', '16', '18'];
       if(!in_array($temp_pegi, $pegis_validos)){
        $err_pegi= "PEGI no valido";
       }else{
            $pegi = $temp_pegi;
       }
    }

    /* Validacion compañia */
    if(strlen($temp_compania)== 0){
        $err_compania = "<b>La compañia es obligatoria</b> <br><br>";
    }else{
        if(strlen($temp_compania)>50){
            $err_compania = "<b>La compañia no puede contener mas de 50 caracteres</b> <br><br>";
        }else{
            $compania = $temp_compania;
        }
    }

    }
    ?>

    <div class="container">
        <h1>Almacen de Videojuegos</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form_label" for="">ID: </label>
                <input class="form-control" type="text" name="id"> 
                <?php if(isset($err_id)) echo $err_id ?>
            </div>
            <div class="mb-3">
                <label for="">Titulo: </label>
                <input class="form-control" type="text" name="titulo">
                <?php if(isset($err_titulo)) echo $err_titulo ?>
            </div>
            <div class="mb-3">
                <label class="form_label" for="">Pegi: </label>
                <select class="form-select" name="pegi" id="pegi">
                    <option hidden selected disabled >--Elige PEGI--</option> <!--disabled para que no vuelva a salir la opcion -->
                    <option value="3">3</option>
                    <option value="7">7</option>
                    <option value="12">12</option>
                    <option value="16">16</option>
                    <option value="18">18</option>
                </select>          
                <?php if(isset($err_pegi)) echo $err_pegi ?>
            </div>
            <div class="mb-3">
                <label class="form_label" for="">Compañia: </label>
                <input class="form-control" type="text" name="compania">
                <?php if(isset($err_compania)) echo $err_compania ?>
            </div>        
            <div class="mb-3">
                <label for="" class="form-label">Imagen</label>
                <input type="file" name="imagen">
            </div>
            <input type="submit" class="btn btn-primary" value="Enviar">
        </form>
    </div>

    

    <?php
    if(isset($id) && isset($titulo) && isset($pegi) && isset($compania)) {
        echo "<h3>$id</h3>";
        echo "<h3>$titulo</h3>"; 
        echo "<h3>$pegi</h3>";
        echo "<h3>$compania</h3>";
        $sql = "INSERT INTO videojuegos(id_videojuego, titulo, pegi, compania) /* mismos nombres que en el mysql */
            VALUES ('$id', '$titulo', '$pegi', '$compania')";
        
        $conexion->query($sql);
     }
    ?>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>    
</body>
</html>
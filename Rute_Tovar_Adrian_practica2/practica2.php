<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practica 2</title>
    <?php require "Ejercicio2.php" ?>
    <?php require "Ejercicio1.php" ?>
    <?php require "Ejercicio3.php" ?>
    <link rel="stylesheet" href="style.css">  
</head>
<body>
    <!-- Ejercicio 1 -->
    <fieldset>
        <form action="" method="POST">
            <label for=""></label>Dinero a convertir 
            <input type="number" name="dinero"> <br><br>
            <label for="">Elija divisa actual</label>
            <input type="radio" value="€" name="grupo1">Euros (€)
            <input type="radio" value="$" name="grupo1">Dólares ($)
            <input type="radio" value="yen" name="grupo1">Yenes (¥)
            <br><br>
            <label for="">Elija divisa a convertir</label>
            <input type="radio" value="€" name="grupo2" >Euros (€)
            <input type="radio" value="$" name="grupo2">Dólares ($)
            <input type="radio" value="yen" name="grupo2">Yenes (¥)
            <br><br>
            <input type="hidden" name="esconder" value="ej1">
            <input type="submit" value="Calcular">
        </form>
    </fieldset>

    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            if(isset($_POST["esconder"]) && $_POST["esconder"] == "ej1"){
                
                $dinero= $_POST["dinero"];
                $divisaAct=$_POST["grupo1"];
                $divisaConver=$_POST["grupo2"];
                echo cambiarDivisa ($dinero, $divisaAct, $divisaConver);
            }    
        }
    ?>


    <br><br>
    <!-- Ejercicio 2 -->
    <fieldset>
        <form action="" method="POST">
            <label for="">Numero</label>
            <input type="number" name="numero">
            <br><br>
            <label for="">Elija</label> 
            <select name="tipoCuenta" id="">
                <option value="sumatorio">Sumatorio</option>
                <option value="factorial">Factorial</option>
            </select>
            <br><br>
            <input type="hidden" name="esconder" value="ej2">
            <input type="submit" value="Calcular">
        </form>
    </fieldset>
    <br><br>

    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){     
        if(isset($_POST["esconder"]) && $_POST["esconder"] == "ej2"){  
            $numero = $_POST["numero"];
            if($numero<0){
                echo "No se pueden numeros negativos";
            }
                
            $cuenta = $_POST["tipoCuenta"];
            if($cuenta == "sumatorio"){
                echo sumatorio($numero);
            }elseif($cuenta == "factorial") {
                echo factorial($numero);
            }   
        }        
    }    
    ?>

    <!-- Ejercicio3 -->
    <fieldset>
        
    <form action="" method="POST">
            <h3>Buscar especie</h3> <br><br>
            <label for=""></label>Especie 
            <input type="text" name="especie"> <br><br>
            <input type="hidden" name="esconder" value="ej3">
            <input type="submit" value="Comprobar">
        </form>
    
    
    <table class="mi_tabla" >
        <caption class="mi_caption">Lista de especies</caption>
        <thead>
            <th>Especie</th>
            <th>Clase</th>
            <th>Ejemplares</th>
        </thead>
        <tbody>
            <?php
            $c_especie=array_column($animales,0);
            $c_clase=array_column($animales,1);
            $c_ejemplares=array_column($animales,2);
            foreach($animales as $animal){
                list($especie,$clase,$ejemplares) = $animal;
                echo "<tr>";
                echo "<td> $especie </td>";
                echo "<td>". $clase ." </td>";
                echo "<td> $ejemplares </td>";
                echo "</tr>"; 
            }
            ?>
        
         <?php
            /* if($_SERVER["REQUEST_METHOD"] == "POST"){     
                if(isset($_POST["esconder"]) && $_POST["esconder"] == "ej3"){  
                    $especie = $_POST["especie"];
                    for($i=0;$i<count($animales);$i++){
                        if($especie=="")
                    }
                }        
            }     */
        ?> 
    </tbody>
</table>
</fieldset>
</body>
</html>
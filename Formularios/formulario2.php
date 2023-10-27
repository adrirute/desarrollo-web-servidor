<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="post">
        <label for="">Introduzca primer numero</label>
        <input type="text" name="num1"> <br><br>
        <label for="">Introduzca segundo numero</label>
        <input type="text" name="num2"> <br><br>
        <label for="">Introduzca tercer numero</label>
        <input type="text" name="num3">  <br><br>
        <input type="submit" name="Enviar"> <br><br>
    
        </form>


        <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
        $num1 = (int) $_POST["num1"];
        $num2 = (int) $_POST["num2"];
        $num3 = (int) $_POST["num3"];
        
        /* if($num1>$num2 && $num1>$num3){
            echo "El $num1 es el mayor";
        }elseif($num2>$num3 && $num2>$num1){
            echo "El $num2 es el mayor";
        }elseif($num3>$num1 && $num3>$num2){
            echo "El numero $num3 es el mayor";
        }elseif($num1==$num2 && $num2==$num3){
            echo "Son iguales";
        }else{
            echo "cebolla";
        } */

        /* Regla del candidato */
        if($num1==$num2 && $num2==$num3){
            echo "Son iguales";
        }else{
            $candidato = $num1;
        }
        if($num2>$candidato){
            $candidato=$num2;
        }
        if($num3>$candidato){
            $candidato=$num3;
        }
        echo "El mayor es $candidato";


    }
        ?>
</body>
</html>
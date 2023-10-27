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

            if($num1 > $num2){
                echo "$num1 es mayor que que $num2";
            }elseif ($num1<$num2) {
                echo "$num2 es mayor que que $num1";
            }else{
                echo "Son iguales";
            }
        
        echo "<h3>". $num1 + $num2  ."</h3>";
        }
        ?>
    
</body>
</html>
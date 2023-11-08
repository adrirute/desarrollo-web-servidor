<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        function esPrimo(int $num):bool{
            $primo=true;
            for($i=2;$i<=$num-1;$i++){               
                if($num%$i == 0){
                    $primo=false;
                }
            }
            return $primo;
        }
        if(esPrimo(7)){
            echo "Es primo";
        }else{
            echo "No es primo";
        }

        function NPrimos(int $num){
            for($i=2;$i<=$num;$i++){
                if(esPrimo($i)){
                    echo $i." ";
                }
            }
        }
        //echo NPrimos(13);
        echo "<br>";
        function potencia (int $base, int $exp):int{
            $res=1;
            for($i=1;$i<=$exp;$i++){
                $res*=$base;
            }
            return $res;
        }
        echo potencia(2,3);

    ?>
</body>
</html>
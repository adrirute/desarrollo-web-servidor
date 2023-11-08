<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funciones</title>
</head>
<body>
    <?php
        function sumaDos(int $num1, int $num2) : int{ /* Señalamos que lo que devuelva sea un numero entero */
            return $num1 + $num2;
        }
        //echo sumaDos(2,3); /* Llamos a la funcion dentro de un echo y añadiomos parametros */
        
        function divideDos (int $num1, $num2): float{ /* Si señalamos aqui floar, devuelve numero con decimales */
            return $num1/$num2;
        }
        //echo divideDos(3,2);

        function sumaDos1(int|float $num1, int|float $num2) : int{  /* Si queremos añadir que salga entero o decimal, */
            return $num1 + $num2;
        }
        //echo sumaDos1(2.5,3);

        /* Funcion que reciba como parametro un numero entero y devuelva
        la suma entera de todos los numeros del 1 al numero introducido.
        Ejemplo: 3 --> 1+2+3 */

        function sumatorio( int $numero):int{
            $sumati=0;
            for($i=1;$i<=$numero;$i++){
                $sumati+=$i;
            }
            return $sumati;
        }
            //echo sumatorio(5);
        
            /* function factorial (int $numerito):int{
                $factos=1;
                for($i=1;$i<=$numerito;$i++){a
                    $factos*=$i;
                }
                return $factos;
            } */
            //echo factorial(5);

            /* Funcioesn que reciba un array y que muestre el valor max, min y media */
            function maxx (array $lista):int{
                $valorMAx=$lista[0];
                for($i=0;$i<count($lista);$i++){
                    if($lista[$i]>$valorMAx){
                        $valorMAx=$lista[$i];
                    }
                }
                return $valorMAx;
            }
            
            function minn (array $lista):int{
                $valorMin=$lista[0];
                for($i=0;$i<count($lista);$i++){
                    if($lista[$i]<$valorMin){
                        $valorMin=$lista[$i];
                    }
                }
                return $valorMin;
            }
            
            function media (array $lista):float{
                $total=0;
                for($i=0;$i<count($lista);$i++){
                    $total+=$lista[$i];
                }
                return $total/count($lista);
            }
            echo media([1,2,3]);

    ?>
</body>
</html>

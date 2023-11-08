<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!--Comentario HTML-->
    <?php
    //Hola es un comentario
    #Hola es un comentario
    /** Hola es un comentario */

    #Sacar por pantalla
    echo "<h1>Hola mundo</h1>";
    #echo "<h1 style='color:red' >Hola mundo</h1>"; --Para color pero se usa mejor style css

    $entero = 1; #Declarar variables y darle valor. Se usa signo $. Se pone solo "int"
    $decimal = 1.5; #float
    $exponente = 3e5; #float (3 * 10^5)
    
    $string0 = "mundo";
    $string1 = "Hola $string0"; #String
    $string2 = 'Hola'; #String
    $string3 = 'Hola ' . $string0 . ", Entero: " .$entero; 
    #Para concatenar se usa sobretodo las comillas dobles
    $string4 = "Le dije: 'como te fue la vida'";
    $boleano = true;

    $array1 = [1,2,3];
    $array2 = [1, "dos", 3];

    //var_dump($array2); #te dice que tipo y que valor tiene en el localhost
    
    #Para crear una variable constante:
    define("EDAD" , 25);
    echo "La edad es " .EDAD;
    
    echo "<br>"; #Salto de linea

    $dia = date("d"); #Coge el dia de la fecha del ordenador
    if ($dia <= 15){
        echo "Estamos a principios de mes";
    }else{
        echo "Estamos a finales de mes";
    }

    echo "<br>";

    $fecha = date("j F Y");
    echo $fecha;

    echo "<br>";

    $hora = date("H");
    if($hora < 12){
        echo "Buenos dias";
    }elseif(($hora>= 12) and ($hora <20)) {
        echo "Buenas tardes";
    }else{
        echo "Buenas noches";
    }
    
    echo "<br>";

    $numAlea = rand(1,150);
    if ($numAlea<10){
        echo "El numero es $numAlea y tiene 1 digito";
    }elseif ($numAlea>=10 and $numAlea <100){
        echo "El numero es  $numAlea  y tiene 2 digitos";
    }else{
        echo "El numero es $numAlea  y tiene 3 digitos";
    }

    $randomDec = rand(10, 1000)/100; #Numero aleatorio entre 1 y 10 con 1 decimal.

    echo "<br>";

    //Estructura swtich
    //ejemplo
    $n = rand(1,3);
    switch ($n){
        case 1:
            echo "$n es igual a 1";
            break;
        case 2: 
            echo "$n es igual a 2";
            break;
        case 3: 
            echo "$n es igual a 3";
            break;
    }

    echo "<br>";

    $dia = date("l");
    switch ($dia){
        case "Monday":
        case "Wednesday":
        case "Friday":
            echo "Hoy hay clase de Entorno Servidor";
            break;
        default:
            echo "Hoy NO hay clase de Entorno Servidor";
    }

    echo "<br>";

    /*$dia = date("l");
    switch ($dia){
        case "Monday":
            echo "Hoy es lunes";
            break;
        case "Tuesday":
            echo "Hoy es martes";
            break;
        case "Wednesday":
            echo "Hoy es miercoles";
            break;
        case "Thurday":
            echo "Hoy es jueves";
            break;
        case "Friday":
            echo "Hoy hay clase de Entorno Servidor";
            break;
        case "Saturday":
            echo "Hoy es sabado";
            break;
        default:
            echo "Hoy es domingo";
    }
    */

    $dia = date("l");
    $dia_es = match($dia){
        "Monday" => "Lunes",
        "Tuesday" => "Martes",
        "Wednesday" => "Miercoles",
        "Thursday" => "Jueves",
        "Friday" => "Viernes",
        "Satuday","Sunday" => "Fin de semana"
    };
    echo "Hoy es $dia_es";

    echo "<br>";

    $month = date("n");
    $mes = match($month){
        "1" => "enero",
        "2" => "febrero",
        "3" => "marzo",
        "4" => "abril",
        "5" => "mayo",
        "6" => "junio",
        "7" => "julio",
        "8" => "agosto",
        "9" => "septiembre",
        "10" => "octubre",
        "11" => "noviembre",
        "12" => "diciembre"
    };

    $dia_num = date("j");

    echo "Hoy es $dia_es dia $dia_num de $mes";

//Ejercicios de repaso PHP

echo "<br>";

//1. Genera numero aleatorio del 1 al 10 y muestra si es par o impar
    $num_ale = rand(1,10);
    echo $num_ale;
    if ($num_ale%2==0){
        echo " El numero es par";
    }else{
        echo " El numero es impar";
    }

    echo "<br>";

//2. Genera num aleatorio del -10 al 10 y di si es positivo, negativo o cero.
    $num_ale1 = rand (-10, 10);
    echo $num_ale1;
    if ($num_ale1<0){
        echo " El numero es negativo";
    }elseif ($num_ale1==0){
        echo " El numero es 0"; 
    }else{
        echo " El numero es positivo";
    }

    echo "<br>";

//5. Zona horaria
    $zonaHoraria = date("e");
    echo $zonaHoraria;


    //BLUCLES !!!!!!!!!!!!!

    //BUCLE WHILE
    /*
    $i =1;
    while ($i <=10){
        echo "$i  <br>"; // se añade br para hecer salto de linea
        $i++;
    }*/
    echo "<br><br>";
    //otra forma de bucle while

    $e =10;
    while($e <=20):
        echo "$e  <br>";
        $e++;
    endwhile;
    echo "<br><br>";

    //BUCLE DO WHILE

    $f = 1;
    do{
        echo $f ."<br>";
        $f++;
    }while($f <=10);
    echo "<br><br>";

    //BUCLE FOR !!!!!!!!!!

    for ($a = 1;$a <=10; $a++){
        echo $a;
    }
    echo "<br><br>";

    // forma distinta
    for($j =1; ; $j++){
        if($j > 10){
            break;
        }
        echo $j;
    }

    //forma distinta
    //este muestra los multiplos de 3 del 1 al 50
    for($k=1; $k <=50; $k++):
        if($k % 3 == 0){
            echo $k . "<br>";
        }
    endfor;

    //EJERCICO INTERESANTE
    //Muestre los numeros impares del 1 al 20 en una lista html
    //*RECORDATORIO ul= lista desordenada   li = list item */
    echo "<ul>";
    for($i =1; $i <=20; $i++):
        if($i %2 != 0){
            echo "<li>$i</li>";
        }
    endfor;
    echo "</ul>";

    //Realiza un bucle que imprima por pantalla, en formato array, todos los numeros
    //multiplos de 3 entre 0 y 50. Hazlo con bucle for y bucle while
    //Formato array: [3,6,9,12...]

    //bucle for
    echo "[";
    $max = 50;
    for($i=0; $i <=$max; $i++){
        if($i % 3 == 0){
            echo $i;
            if($i +3 <$max){
                echo ",";
            }
        }
    }
    echo "]";

    echo "<br><br>";

    //obten la suma de numeros pares del 1 al 20
    
    $res =0;
    for($i =1;$i<=20; $i++){
        if($i % 2==0){
            $res += $i;
        }
    }
    echo "la suma total es: ". $res;
    
    echo "<br><br>";

    //DATO***Un numero primo es aquel que da de resto 0 cuando se divide por el mismo y por uno
    //Sacar numeros primos del 1 al 50

    echo "<ul>";
    
    for($i =2; $i <=50; $i++){//se crea un for con los numeros a comprobar
        $primo =true;//se crea un booleano para controlar cual es primo
        for($j =2;$j <= $i-1; $j++){//este for comprueba todos los numeros menos el mismo
            if($i%$j == 0 ){//se divide todos los numeros, comprobando el resultado
                $primo=false;//Si cualquier numero entre otro que no sea el mismo da 0, no es primo
                break;//sale del segundo bucle
            }
        }
        if($primo){//si primo es true
            echo "<li>$i</li>";//imprime los numeros primos
        }
    }
    echo "</ul>";

    //ARRAYS !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    //TODOS LOS ARRAYS EN PHP SON ARRAYS ASOCIATIVOS
    //print_r($array) // imprime el array
    //se pueden quitar las claves personalizadas y se asigna automaticamente de 0,1 ,2 ...

    $array1 = array(//forma 1
        'key1'=>'ps4',
        'key2'=> 'ps5',
        'patata' => 'rute'
    );

    $array2 =[//forma 2 
        'juegos',
        'animals',
        'oceanografic',
        'uwu'
    ];

    $array3 =[/*0*/"patata" ,/*1*/"perro",/*2*/"fumo?"];

    echo $array3[2];//devuelve una parte del array
    echo"<br>";
    print_r($array3);//muestra el array
    echo "<br>";
    print_r($array2);
    
    //EJERCICIO CON ARRAY
    //Crea un array cque tenga como claves los dni de personas y como valor sus nombres

    $personas=[
        "3545687s"=> "Juan",
        "6692165Q"=> "Adrian",
        "1234567z"=> "Rute",
    ];
    print_r($personas);
    echo "<br><br>";
    echo $personas["1234567z"];

    //AÑADIR Y ELIMINAR ELEMENTOS A UN ARRAY
    //Se usa array_push($nombreArray, "elementos") o $nombreArray[]="nuevoElemento";
    //para borrar se usa unset($nombreArray[posicion])
    //$nombreArray = array_values($nombreArray) Reorganiza las claves de 0,1,2,3...
    echo "<br><br>";
    print(count($array3));//cuento los elementos que tiene el array

    //RECORRER UN ARRAY
    // Con bucles for, foreach y whileç
    
    //for each
    ?>
    <ul>
        <?php
    foreach ($personas as $persona){
        echo "<li>$persona</li>";
    }
    ?>
    </ul>

    <ul>
        <?php
    foreach ($personas as $dni => $persona){
        echo "<li> $dni . '=>'. $persona . </li>" .  "<br>";
    }
    ?>
    </ul>

    
    <table class="tabla">
        <tr>
            <caption>Personas</caption>
        </tr>
        <tr>
            <th>Nombre</th>
            <th>DNI</th>
        </tr>
        <?php
            asort($personas);
            foreach ($personas as $dni => $persona){
                echo "<tr>";
                echo "<td> $persona </td>";
                echo "<td>  $dni </td>";
                echo "</tr>";
 
            }
        ?>
    </table>

    <!-- Arrray multidimensionales -->
    <?php
    $juegos=[
                ["COD", "PS4", 60],
                ["Mario", "Nintendo", 40],
                ["Fornite", "PC", 0],
                ["Baldurs", "PC", 70],
            ];
    
    ?>
    
    <br><br>
    
    <!-- Recorres Array Multidimensional -->
    <table class="mi_tabla">
        <caption class="mi_caption" >Juegos</caption>
        <thead>
            <tr>
                <th>Titulo</th>
                <th>Consola</th>
                <th>Precio</th>
            </tr>
        </thead>    
        <tbody>
            <?php
            foreach($juegos as $juego){
                    list($titulo, $consola, $precio) = $juego;
                        echo "<tr>";
                        echo "<td> $titulo </td>";
                        echo "<td>  $consola </td>";
                        echo "<td>". $precio ."€</td>";
                        echo "</tr>";   
                }
            ?>
        </tbody>    
    </table>

     <BR></BR>

    <!-- Ordenar arrays multidimensionales -->
    
    <?php

     $c_consola = array_column($juegos,1);
     $c_titulo = array_column($juegos,0);
     array_multisort($c_consola, SORT_DESC, $c_titulo, SORT_DESC, $juegos);   
    
     /* Insertar filas en arrays mult */       
     $nuevo_juego = ["Baldur's Gate 3", "Xbox", 55];
     array_push($juegos, $nuevo_juego);

     /* Insertar columnas en arrays Columnas */
     for($i = 0; $i<count($juegos);$i++){
        $juegos [$i][count($juegos[$i])] = rand(1,10);
     }

     /* Unset para eliminar */
    ?>
    
    

    <table class="mi_tabla">
        <caption class="mi_caption" >Juegos</caption>
        <thead>
            <tr>
                <th>Titulo</th>
                <th>Consola</th>
                <th>Precio</th>
                <th>Stock</th>
            </tr>
        </thead>    
        <tbody>
            <?php
            foreach($juegos as $juego){
                    list($titulo, $consola, $precio, $stock) = $juego;
                        echo "<tr>";
                        echo "<td> $titulo </td>";
                        echo "<td>  $consola </td>";
                        echo "<td>". $precio ."€</td>";
                        echo "<td>  $stock </td>";
                        echo "</tr>";   
                }
            ?>
        </tbody>    
    </table>    



</body>
</html>
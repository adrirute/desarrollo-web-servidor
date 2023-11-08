<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IRPF</title>
</head>
<body>
    <?php

    function calculoIRPF (int|float $salario): float{
        /* switch ($salario){
            case ($salario <12450):
                $salarioFin=$salario*0.81;
                break;
            case ($salario >=12450 && $salario<20200):
                $salarioFin=$12450*0.81;
                $salarioFin=$salarioFin+($salario*0.76);
                break; 
            case ($salario >=20200 && $salario<35200):
                $salarioFin=$12450*0.81;
                $salarioFin=$salarioFin-($salarioFin*0.76);
                $salarioFin=$salarioFin-($salarioFin*0.70);
                break;
            case ($salario >=35200 && $salario<60000):
                $salarioFin=$salario*0.81;
                $salarioFin=$salarioFin-($salarioFin*0.76);
                $salarioFin=$salarioFin-($salarioFin*0.70);
                $salarioFin=$salarioFin-($salarioFin*0.63);
                break;
            case ($salario >=60000 && $salario<300000):
                $salarioFin=$salario*0.81;
                $salarioFin=$salarioFin-($salarioFin*0.76);
                $salarioFin=$salarioFin-($salarioFin*0.70);
                $salarioFin=$salarioFin-($salarioFin*0.63);
                $salarioFin=$salarioFin-($salarioFin*0.55);                
                break;
            default:
            $salarioFin=$salario*0.81;
            $salarioFin=$salarioFin-($salarioFin*0.76);
            $salarioFin=$salarioFin-($salarioFin*0.70);
            $salarioFin=$salarioFin-($salarioFin*0.63);
            $salarioFin=$salarioFin-($salarioFin*0.55);
            $salarioFin=$salarioFin-($salarioFin*0.53);            
        }
        return $salarioFin; */
    

    /* Con match */
    $tramo1 = 12450 * 0.81;
    $tramo2 = (20200-12450)*0.76;
    $tramo3 = (35200-20200)*0.7;
    $tramo4 = (6000- 35200)*0.63;
    $tramo5 = (300000 - 6000)*0.55;

    $salarioFin = match(true){
        $salario<=12450 => $salario*0.81,
        $salario > 12450 && $salario <= 20200
         => (12450*0.81) + (($salario-12450)*0.76),
         $salario > 20200 && $salario <= 35200
         => (12450*0.81) + ((20200-12450)*0.76) + ($salario - 20200)*0.7,
         $salario >35200 && $salario <= 60000
         => $tramo1+$tramo2+$tramo3+ ($salario - 35200)*0.63,
         $salario >60000 && $salario <= 300000
         => $tramo1+$tramo2+$tramo3+$tramo4 + ($salario - 60000)*0.55,
         $salario > 300000 => $tramo1+$tramo2+$tramo3+$tramo4 + $tramo5 + ($salario - 300000)*0.53
    };
    return $salarioFin;
}
    echo "<h3>" . calculoIRPF(50000) ."</h3>";

    ?>
</body>
</html>
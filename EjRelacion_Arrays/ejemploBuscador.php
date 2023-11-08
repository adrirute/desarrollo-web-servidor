<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $animales = [
        ["Lobo ibérico", "Mamífero", 2500],
        ["Lince ibérico", "Mamífero", 1668],
        ["Quebrantahuesos", "Ave", 2000],
        ["Oso pardo", "Mamífero", 500]
    ];
    ?>

    <form action="" method="post">
        <label>Animal: </label>
        <input type="text" name="especie"><br><br>
        <input type="submit" value="Buscar">
    </form>

    <?php
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $especie = $_POST["especie"];

        foreach($animales as $animal){
            list($l_especie, $l_clase, $l_cantidad)=$animal;
            if($especie == $l_especie){
                echo "<h3>El animal $especie esta en el array</h3>";
                break; /* Opcional para que el bucle deje de ejecutarse cuando lo encuentre */
            }
        }
    }
    ?>
</body>
</html>
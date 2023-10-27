<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <label>Nombre</label>
        <input type="text" name="nombre">
        <label for="">Apellidos</label>
        <input type="text" name="apellidos"><br><br>
        <label for="">Edad</label>
        <input type="text" name="edad"><br><br>
        <input type="submit" name="Enviar">
        


    </form>

    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $nombre = $_POST["nombre"];
        $apellidos = $_POST["apellidos"];
        $edad = (int) $_POST["edad"];
        echo "<h2> $nombre $apellidos $edad</h2>";
    }
    ?>
</body>
</html>
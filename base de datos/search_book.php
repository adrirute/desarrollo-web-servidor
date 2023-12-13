<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libros</title>
    <?php require 'database_conection.php' ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body>
    <?php  

    if($_SERVER["REQUEST_METHOD"] == "POST"){
    $titulo = $_POST["busqTitulo"];
    
    $sql = $conexion -> prepare ("SELECT * FROM libros WHERE titulo='?'");
    $sql -> bind_param("s", $titulo )
    $sql -> execute();
    $result = $sql -> get_result();
    }    
            
    ?>
    <div class="container">
        <table class="table table-striped table-hover">
            <thead class="table table-dark table-striped table-primary">
                <tr>
                    <th>Titulo</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                    while($fila = $result -> fetch_assoc()){
                        echo "<tr>";
                            echo "<td>" . $fila ["titulo"] . "</td>";                           
                        echo "</tr>";
                    }
                    ?>
                </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>
<?php

session_start();

if(!isset($_SESSION['usuario'])){ //si no existe(!isset)

    echo '
    <script>
    alert("Por favor debes iniciar sesion");
    window.location = "index.php";
    </script>
    ';
    
    session_destroy();
    die(); //hace lo mismo que el exit
    
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Benvenida - AlejoPiera</title>
    
</head>
<body>
<h1>Bienvenido a mi pagina</h1>
<a href="php/cerrar_sesion.php">Cerrar sesion</a>
    
</body>
</html>
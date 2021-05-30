<?php

include 'conexion_be.php';

$nombre_completo = $_POST['nombre_completo'];
$correo = $_POST['correo'];
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];
$contrasena = hash('sha512', $contrasena); //encriptando la contrasena

$query = "INSERT INTO usuarios(nombre_completo, correo, usuario, contrasena)            VALUES('$nombre_completo', '$correo', '$usuario', '$contrasena')";

//verifiicar q el correo no se repita en la base de datos
$verificar_correo = mysqli_query($obj_conexion, "SELECT * FROM usuarios WHERE correo='$correo' ");
if(mysqli_num_rows($verificar_correo) > 0){
    echo '
    <script>
    alert("Este correo ya esta registrado, intente con otro");
    window.location = "../index.php";
    </script>
    ';
    exit(); //hace q lo q esta debajo no se ejecute
}
//verificar q el nombre d usuario no se repita
$verificar_usuario = mysqli_query($obj_conexion, "SELECT * FROM usuarios WHERE usuario='$usuario' ");
if(mysqli_num_rows($verificar_usuario) > 0){
    echo '
    <script>
    alert("Este usuario ya esta registrado, intente con otro");
    window.location = "../index.php";
    </script>
    ';
    exit(); 
}





$ejecutar = mysqli_query($obj_conexion, $query);

if($ejecutar){
    echo '
    
    <script>
        alert("Usuario creado exitosamente");
        window.location = "../index.php";
    </script>
    
    ';
}else{
    echo '
    
    <script>
        alert("¡ERROR! No se logro crear el usuario");
        window.location = "../index.php";
    </script>
    
    ';

}
 mysqli_close($obj_conexion);
//}








?>
<?php

    include 'Conexiones.php';

    $dni = $_POST["dni"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $telefono = $_POST["telefono"];
    $Correo = $_POST["Correo"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $password2 = $_POST["password2"];
    $NumeroSS = $_POST["NumeroSS"];

    $query = "INSERT INTO usuarios(dni,nombre,apellidos,telefono,correo,nombre_usuario,contrasena,contrasena2,nro_seguridad_social) VALUES ('$dni','$nombre','$apellido','$telefono','$Correo','$username','$password','$password2','$NumeroSS')";
    
    if ($password2 != $password){
        echo "<script type='text/javascript'>alert('Dato Incorrecto');</script>";
        header("Refresh: 3; url=RegistroFRM.php");
        exit;
}
if (!is_numeric($telefono) && strlen($telefono) != 9){
    echo "<script type='text/javascript'>alert('Dato Incorrecto');</script>";
    header("Refresh: 3; url=RegistroFRM.php");
    exit;
}
if (strpos($email, '@') == false && strpos($email, '.') == false) {
    echo "<script type='text/javascript'>alert('Dato Incorrecto');</script>";
    header("Refresh: 3; url=RegistroFRM.php");
    exit;
}

    $ejecutar = mysqli_query($conexion, $query);

?>
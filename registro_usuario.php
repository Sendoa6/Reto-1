<?php
    session_start();
    include 'Conexiones.php';

    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $telefono = $_POST["telefono"];
    $Correo = $_POST["Correo"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $password2 = $_POST["password2"];
    $password = hash('sha512', $password);
    $password2 = hash('sha512', $password2);
    $NumeroSS = $_POST['NumeroSS'];

    if ($NumeroSS == '') {
        $query = "INSERT INTO usuarios(nombre,apellidos,telefono,correo,nombre_usuario,contrasena,contrasena2) VALUES ('$nombre','$apellido','$telefono','$Correo','$username','$password','$password2')";
    }else{
        $query = "INSERT INTO usuarios(nombre,apellidos,telefono,correo,nombre_usuario,contrasena,contrasena2,NumeroSS) VALUES ('$nombre','$apellido','$telefono','$Correo','$username','$password','$password2','$NumeroSS')";
    }

    if ($password2 != $password){
        echo "<script type='text/javascript'>alert('Error. Las contraseñas no coinciden.');</script>";
        header("Refresh: 0.1; url=RegistroFRM.php");
        exit;
    }
    if (!is_numeric($telefono) && strlen($telefono) != 9){
        echo "<script type='text/javascript'>alert('Error. Número de teléfono inválido.');</script>";
        header("Refresh: 0.1; url=RegistroFRM.php");
        exit;
    }
    if (strpos($Correo, '@') == false && strpos($Correo, '.') == false) {
        echo "<script type='text/javascript'>alert('Error. Correo electrónico inválido.');</script>";
        header("Refresh: 0.1; url=RegistroFRM.php");
        exit;
    }
    if ($NumeroSS != ""){
        if (!is_numeric($NumeroSS) && strlen($NumeroSS) != 12){
            echo "<script type='text/javascript'>alert('Seguridad Social');</script>";
            header("Refresh: 0.1; url=RegistroFRM.php");
            exit;
        }
    }

    $verificar_usuario = mysqli_query($conexion, "SELECT * FROM usuarios WHERE nombre_usuario='$username' ");
    if (mysqli_num_rows($verificar_usuario) > 0){
        echo "<script type='text/javascript'>alert('Este usuario ya está en uso, intenta con uno diferente');</script>";
        header("Refresh: 0.1; url=RegistroFRM.php");
        exit();
    }    
    $verificar_correo = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo='$Correo' ");
    if (mysqli_num_rows($verificar_correo) > 0){
        echo "<script type='text/javascript'>alert('Este correo ya está en uso, intenta con uno diferente');</script>";
        header("Refresh: 0.1; url=RegistroFRM.php");
        exit();
    }   

    
    $ejecutar = mysqli_query($conexion, $query);

    
    if ($ejecutar){
        echo "<script type='text/javascript'>alert('Usuario creado correctamente');</script>";
        header("Refresh: 0.1; url=index.php");
    }

    mysqli_close($conexion);

?>
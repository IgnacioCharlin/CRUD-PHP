<?php
    session_start();
    if (!isset($_SESSION['nombre'])) {
        header('Location: login.php');
    }

    if (!isset($_POST['oculto'])) {
        exit(); //Si no existe valor se detiene
    }

    include 'model/conexion.php';
    $usuario = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];

    $sentencia = $bd->prepare("INSERT INTO usuario (nombre_usuario,contraseña) VALUES (?,?);");
    $resultado = $sentencia->execute([$usuario,$contraseña]);

    if ($resultado) {
        echo "Insertado Correctamente";
        header('Location: index.php');
    }else{
        echo "Ocurrio un error al insertar";
    }
?>
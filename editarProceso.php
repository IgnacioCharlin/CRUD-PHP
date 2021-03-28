<?php
    session_start();
    if (!isset($_SESSION['nombre'])) {
        header('Location: login.php');
    }

     if (!isset($_POST['oculto'])) {
        header('Location: index.php');
    }

    include 'model/conexion.php';
    $id2 = $_POST['id2'];
    $suario2 = $_POST['usuario2'];
    $contraseña2 = $_POST['contraseña2'];

    $sentencia = $bd->prepare("UPDATE usuario SET nombre_usuario = ? , contraseña =? WHERE id = ?");

    $resultado = $sentencia -> execute([$suario2,$contraseña2,$id2]);

    if ($resultado) {
        header('Location: index.php');
    }else{
        echo "Error";
    }

?>    
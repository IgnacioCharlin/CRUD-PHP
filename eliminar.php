<?php
    session_start();
    if (!isset($_SESSION['nombre'])) {
        header('Location: login.php');
    }

if (!isset($_GET['id'])) {
    exit(); //Si no existe valor se detiene
}


    $codigo = $_GET['id'];
    include 'model/conexion.php';


    $sentencia = $bd->prepare("DELETE FROM usuario WHERE id = ?;");

    $resultado = $sentencia->execute([$codigo]);

    if ($resultado){  
        header('Location: index.php');
    }else{
        echo "Error";
    }
?>
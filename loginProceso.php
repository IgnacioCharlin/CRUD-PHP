<?php 
    session_start();

    include_once 'model/conexion.php';
    print_r($_POST);
    $usuario = $_POST['usuario'];
    $contraseña = $_POST['password'];

    $sentencia = $bd ->prepare('SELECT * FROM usuario WHERE nombre_usuario =? AND contraseña =?; ');
    $sentencia->execute([$usuario,$contraseña]);
    $datos = $sentencia->fetch(PDO::FETCH_OBJ);

    
    if($sentencia->rowCount() == 1){
        $_SESSION['nombre'] = $datos -> nombre_usuario;
        header('Location: index.php');
    }else{
        header('Location: login.php');
    }
?>
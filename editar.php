<?php

session_start();
    if (!isset($_SESSION['nombre'])) {
        header('Location: login.php');
    }
    
    if (!isset($_GET['id'])) {
        header('Location: index.php');
    }  
    include 'model/conexion.php';
    $id = $_GET['id'];

    $sentencia = $bd->prepare("SELECT * FROM usuario WHERE id = ?;");
    $resultado = $sentencia->execute([$id]);
    $persona = $sentencia->fetch(PDO::FETCH_OBJ);
    ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <link href="css/estilos.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<body>
    <header>
        <h3 class="bienvenido">Editar Usuario</h3>
        <form method="POST" action="editarProceso.php">
            <table class="table formulario">
                <tr>
                    <td>Nombre Usuario</td>
                    <td><input type='text' name ='usuario2' value="<?php echo $persona->nombre_usuario;?>"></td>
                    <td>Contraseña:</td>
                    <td><input type='text' name ='contraseña2' value="<?php echo $persona->contraseña;?>"></td>
                </tr>
                <tr>
                    <input type="hidden" name="oculto">
                    <input type="hidden" name="id2" value="<?php echo $persona->id;?>">
                    <td colspan="2"><input class="btn btn-warning" type="submit" value="EDITAR USUARIO"></td>
                </tr>
            </table>
        </form>
    </header>
</body>
</html>
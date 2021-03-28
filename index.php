<?php
    session_start();
    //Protegemos el inicio a la pagina index si o si logearse antes
    if (!isset($_SESSION['nombre'])) {
        header('Location: login.php');
    }else{
        include 'model/conexion.php';
        $sentencia = $bd->query("SELECT * FROM usuario;");
        $usuarios = $sentencia->fetchAll(PDO::FETCH_OBJ);
    }
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link href="css/estilos.css" rel="stylesheet">
</head>
<body>
    <header>
        <h1 class="bienvenido">Bienvenido <span> <?php echo $_SESSION['nombre']?> </span> </h1>
        <h3 class="bienvenido">Lista de Usuarios </h3>
    </header>
    <main>
    
    <table class="table table-hover text-center mb-3 table-secondary mt-2">
			<tr>
				<th>Id</td>
				<th>Usuario</td>
				<th>Contraseña</td>
				<th>Editar</td>
				<th>Eliminar</td>
			</tr>
        <?php
            foreach($usuarios as $dato){
        ?>
    <tr>
		<td><?php echo $dato->id; ?></td>
		<td><?php echo $dato->nombre_usuario; ?></td>
		<td><?php echo $dato->contraseña; ?></td>
		<td><a href="editar.php?id=<?php echo $dato->id; ?>"><i class='far fa-edit'></i></a></td>
		<td><a href="eliminar.php?id=<?php echo $dato->id; ?>"><i class='far fa-trash-alt'></i></a></td>
	</tr>
        <?php
            }
            
            ?>

            </tbody>
    </table>
    <!-- Inicio Insert -->
        
        <button class="btn btn-danger mb-3"><a href="cerrarSesion.php">Cerrar Sesion</a></button>
        
        <div clas="container">
        <h3 class="bienvenido">Ingresar Usuario</h3>

        <form class="formulario" method="POST" action="insertar.php">
            <div class="mb-3">
                <label for="usuario" class="form-label">Nombre de usuario:</label>
                <input type="text" class="form-control" id="usuario" name="usuario">
            </div>
            <div class="mb-3">
                <label for="contraseña" class="form-label">Contraseña:</label>
                <input type="password" class="form-control" id="contraseña" name="contraseña">
            </div>
            <input type="hidden" name="oculto" value="1">
            <input type="reset" name="" class="btn btn-warning">
            <input type="submit" value="INGRESAR ALUMNO" class="btn btn-primary">
        </form>
        </div>
       
    <!-- Fin Insert -->
    
    </main>
</body>
</html>
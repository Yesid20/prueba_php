<!DOCTYPE html>
<html>
<head>
	<title>Editar registro</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<h2>Editar registro</h2>
		<?php
		$prueba = pg_connect("host=localhost port=5432 dbname=my_dbprueba user=nuevo password=nuevo2021");
		if (!$prueba) {
		    echo "Error: No se pudo conectar a la base de datos.";
		    exit;
		}
		$id = $_GET['nombre'];
		$query = "SELECT * FROM usuarios WHERE nombre = '$id'";
		$result = pg_query($prueba, $query);
		
		if (!$result) {
		    echo "Error al ejecutar la consulta.";
		    exit;
		}
        
		$row = pg_fetch_assoc($result);
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		    $nombre = $_POST['nombre'];
		    $correo = $_POST['correo'];
		    $cedula = $_POST['cedula'];
		    $fecha_nacimiento = $_POST['fecha_nacimiento'];
		    $mensaje = $_POST['mensaje'];
		
		    $query = "UPDATE usuarios SET nombre = '$nombre', correo = '$correo', cedula = '$cedula', fecha_nacimiento = '$fecha_nacimiento', mensaje = '$mensaje' WHERE nombre = '$id'";
		
		    $result = pg_query($prueba, $query);
		
		    if (!$result) {
		        echo "Error al ejecutar la consulta.";
		        exit;
		    } else {
		        echo "Registro actualizado con éxito.";
		    }
		}
		?>
		<form action="" method="post">
    <div class="form-group">
        <label for="nombre">Nombre:</label>
        <input type="text" class="form-control" id="nombre" placeholder="Ingrese su nombre" name="nombre" value="<?php echo $row['nombre'] ?>" required>
    </div>
    <div class="form-group">
        <label for="correo">Correo electrónico:</label>
        <input type="email" class="form-control" id="correo" placeholder="Ingrese su correo electrónico" name="correo" value="<?php echo $row['correo']; ?>" required>
    </div>
    <div class="form-group">
        <label for="cedula">Cédula:</label>
        <input type="text" class="form-control" id="cedula" placeholder="Ingrese su cédula" name="cedula" value="<?php echo $row['cedula']; ?>" required>
    </div>
    <div class="form-group">
        <label for="fecha_nacimiento">Fecha de nacimiento:</label>
        <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value="<?php echo $row['fecha_nacimiento']; ?>" required>
    </div>
    <div class="form-group">
        <label for="mensaje">Mensaje:</label>
        <textarea class="form-control" id="mensaje" name="mensaje" required><?php echo $row['mensaje']; ?></textarea>
    </div>
    <input type="submit" value="Actualizar" class="btn btn-success">
    <a href="indexx.php" class="btn btn-secondary ml-2">Cancelar</a>

</form>

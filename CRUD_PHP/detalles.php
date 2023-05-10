<!DOCTYPE html>
<html>
<head>
	<title>Detalles del registro</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<h2>Detalles del registro</h2>
		<?php
			// Conexión a la base de datos
			$conn = pg_connect("host=localhost port=5432 dbname=my_dbprueba user=nuevo password=nuevo2021");
			if (!$conn) {
			    echo "Error: No se pudo conectar a la base de datos.";
			    exit;
			}

			// Obtención del ID del registro a mostrar
			$id = $_GET['id'];

			// Consulta a la base de datos para obtener el registro con el ID especificado
			$query = "SELECT * FROM usuarios WHERE nombre = '$id'";
			$result = pg_query($conn, $query);

			// Verificación de que la consulta fue exitosa
			if (!$result) {
			    echo "Error al ejecutar la consulta.";
			    exit;

			// Obtención de los datos del registro y su impresión en la página
			$row = pg_fetch_assoc($result);
			echo "<p><strong>Nombre:</strong> " . $row['nombre'] . "</p>";
			echo "<p><strong>Correo electrónico:</strong> " . $row['correo'] . "</p>";
			echo "<p><strong>Cédula:</strong> " . $row['cedula'] . "</p>";
			echo "<p><strong>Fecha de nacimiento:</strong> " . $row['fecha_nacimiento'] . "</p>";
			echo "<p><strong>Mensaje:</strong> " . $row['mensaje'] . "</p>";
		?>

	<a href="indexx.php" class="btn btn-secondary">Volver</a>
	</div>
</body>
</html>

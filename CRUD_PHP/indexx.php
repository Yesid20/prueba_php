<!DOCTYPE html>
<html>
<head>
	<title>Tabla de registros</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
    table {
        border: 1px solid black;
    }
    th, td {
        border: 1px solid black;
        padding: 10px;
    }
</style>
</head>
<body>
	<div class="container">
		<h2>Tabla de registros</h2>
		<table class="table">
			<thead>
				<tr>
                    <th>id</th>
					<th>Nombre</th>
					<th>Correo</th>
					<th>Cedula</th>
					<th>Fecha_nacimiento</th>
                    <th>Mensaje</th>
                    <th>Acciones</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$conn = pg_connect("host=localhost port=5432 dbname=my_dbprueba user=nuevo password=nuevo2021");
					$query = "SELECT id, nombre, correo, cedula, fecha_nacimiento, mensaje FROM usuarios";
					$result = pg_query($conn, $query);
					while ($row = pg_fetch_assoc($result)) {
						echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
						echo "<td>" . $row['nombre'] . "</td>";
						echo "<td>" . $row['correo'] . "</td>";
						echo "<td>" . $row['cedula'] . "</td>";
                        echo "<td>" . $row['fecha_nacimiento'] . "</td>";
						echo "<td>" . $row['mensaje'] . "</td>";

						echo "<td>";
						echo "<a href='editar.php?id=" . $row['id'] . "' class='btn btn-primary'>Editar</a> ";
						echo "<a href='eliminarr.php?id=" . $row['id'] . "' class='btn btn-danger'>Eliminar</a> ";
						echo "<a href='detalles.php?id=" . $row['id'] . "' class='btn btn-info'>Detalles</a>";
						echo "</td>";
						echo "</tr>";
					}
					pg_close($conn);
				?>
			</tbody>
		</table>
	</div>
    <div class="d-flex justify-content-center">
  <a href='formulario.php' class='btn btn-info'>Agregar</a>
  <button onclick="window.location.reload()">Actualizar</button>
</div>

	<!-- Scripts de Bootstrap -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

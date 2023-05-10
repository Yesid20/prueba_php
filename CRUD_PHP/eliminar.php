<?php
    // Conexión a la base de datos
    $conn = pg_connect("host=localhost port=5432 dbname=my_dbprueba user=nuevo password=nuevo2021");

    // Obtener el ID del registro a eliminar
    $id = $_GET['id'];

    if (isset($_POST['eliminar'])) {
        // Verificar que el valor de 'id' es un número entero válido
        if (!filter_var($id, FILTER_VALIDATE_INT)) {
            echo "ID inválido";
            exit;
        }    
    }
    if (isset($_POST['eliminar'])) {
        // Si el usuario confirmó la eliminación, eliminar el registro
        $query = "DELETE FROM usuarios WHERE id = '$id'";
        $result = pg_query($conn, $query);

        if ($result) {
            // Si se eliminó el registro, redireccionar a la página de la tabla de registros
            header('Location: indexx.php');
            //Actualizar 
            pg_query($conn, "SELECT setval('usuarios_id_seq', (SELECT MAX(id) FROM usuarios)+1);");

        } else {
            echo "Error al eliminar el registro";
        }
    } elseif (isset($_POST['cancelar'])) {
        // Si el usuario canceló la eliminación, redireccionar a la página de la tabla de registros
        header('Location: indexx.php');
    }
    pg_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Eliminar registro</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<h2>Eliminar registro</h2>
		<p>¿Está seguro que desea eliminar este registro?</p>
		<form method="POST">
			<div class="form-group">
				<input type="submit" name="eliminar" value="Eliminar" class="btn btn-danger">
				<input type="submit" name="cancelar" value="Cancelar" class="btn btn-secondary">
			</div>
		</form>
	</div>

	<!-- Scripts de Bootstrap -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>


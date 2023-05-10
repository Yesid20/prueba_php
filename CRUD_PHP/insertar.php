<?php
$host='localhost';
$bd='my_dbprueba';
$user='nuevo';
$password='nuevo2021';

$conexion=pg_connect("host=$host dbname=$bd user=$user password=$password");

$query=("INSERT INTO usuarios(nombre, correo, cedula, fecha_nacimiento, mensaje)
    VALUES('$_REQUEST[nombre]','$_REQUEST[correo]','$_REQUEST[cedula]','$_REQUEST[fecha_nacimiento]','$_REQUEST[mensajes]')");

$consulta=pg_query($conexion,$query);
pg_close();
echo 'Se ha registrado satisfactoriamente';
?>

<a href='indexx.php' class='btn btn-info'>Regresar</a>

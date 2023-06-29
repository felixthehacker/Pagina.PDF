<?php
session_start();
// Datos de conexión a la base de datos
$servidor = "localhost";
$usuario = "root";
$contrasena = "";
$base_de_datos = "pdf";

// Conexión a la base de datos
$conexion = mysqli_connect($servidor, $usuario, $contrasena, $base_de_datos);

// Obtener datos del usuario
$nombre_usuario = $_SESSION['usuario']; // Cambiar por el nombre de la variable de sesión correspondiente
// Obtener el código de libro
$nombre = $_POST["id"];
$url=$_POST["url"];
// Obtener la fecha y hora actual
$fecha = date("Y-m-d");
$hora = date("H:i:s");
echo $nombre;
// Insertar un nuevo registro en la tabla "descargas"

$sql = "INSERT INTO registro(id, nombre, libro, hora, fecha) VALUES  (NULL, '$nombre_usuario','$nombre', '$fecha', '$hora')";
mysqli_query($conexion, $sql);


// Cerrar la conexión a la base de datos
mysqli_close($conexion);

// Descargar el archivo
// ...
header("location:$url")
?>
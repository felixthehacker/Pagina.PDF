<?php
// Configuración
$carpeta = "pdf_files/";
///$portadas = "portadas/";

// Obtener el nombre del archivo y de la portada
$archivo = $_POST['url'];
////$portada = $_GET['portada'];

// Eliminar el archivo y la portada
if (file_exists($archivo)) {
    unlink($archivo);
    ////unlink($portada);
   $msg="El archivo se ha eliminado correctamente.";
} else {
   $msg="El archivo no existe.";
}

/////////

// Datos de conexión
$servidor = "localhost";
$usuario = "root";
$contrasena = "";
$base_de_datos = "pdf";

// Conexión a la base de datos
$conexion = mysqli_connect($servidor, $usuario, $contrasena, $base_de_datos);

// Comprobar la conexión
if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Código de libro a borrar
$codigo_de_libro = $_POST["id"]; // Cambiar por el código de libro que desees borrar

// Consulta para borrar el libro
$sql = "DELETE FROM libros WHERE codigo_de_libro = $codigo_de_libro";

// Ejecutar la consulta
if (mysqli_query($conexion, $sql)) {
    $mensaje = "Se ha borrado el libro correctamente.";
} else {
    $mensaje = "Error al borrar el libro: " . mysqli_error($conexion);
}

// Mostrar mensaje
echo $mensaje;

// Cerrar la conexión a la base de datos
mysqli_close($conexion);


header('Location: pag_admin.php?msg=' . $mensaje.$msg);
?>
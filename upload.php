<?php
// Configuración
$carpeta = "pdf_files/";

// Crear la carpeta de destino si no existe
if (!file_exists($carpeta)) {
    mkdir($carpeta, 0777, true);
}

// Obtener el nombre del archivo y su ruta temporal
$nombre_archivo = $_FILES['archivo']['name'];
$ruta_temporal = $_FILES['archivo']['tmp_name'];

// Mover el archivo al directorio de destino
if (move_uploaded_file($ruta_temporal, $carpeta . $nombre_archivo)) {
   $mensaje="El archivo se ha subido correctamente.";
} else {
   $mensaje="Error al subir el archivo.";
}

///////////////////
$id = time() . mt_rand(1000, 9999);
 

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

// Datos del libro a insertar
$titulo = $_POST["titulo"];
$autor = $_POST["autor"];
$descripcion = $_POST["descripcion"];
$url=$carpeta.$nombre_archivo;
// Consulta para insertar el libro
$sql = "INSERT INTO libros (codigo_de_libro,titulo, autor, descripcion,url) VALUES ($id,'$titulo', '$autor', '$descripcion','$url')";

// Ejecutar la consulta
if (mysqli_query($conexion, $sql)) {
    $msg = "Se ha insertado el libro correctamente.";
} else {
    $msg = "Error al insertar el libro: " . mysqli_error($conexion);
}

// Mostrar mensaje
echo $msg;

// Cerrar la conexión a la base de datos
mysqli_close($conexion);



header('Location: pag_admin.php?msg=' . $mensaje.$msg);
?>
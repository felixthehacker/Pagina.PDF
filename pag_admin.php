<?php 
session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Administrador - Biblioteca Online</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <div class="welcome">
        <h1>Bienvenido, <?php echo $_SESSION['usuario']; ?>!</h1>
        <p>Usted ha iniciado sesión como administrador.</p>
        <a href="logout.php">Cerrar sesión</a>
<br>
<br>
<form action="registro_retiro.php">

    <input type="submit"value="revisar reportes">
</form>

    </div>
    <div class="admin-content">
       <h1>Carga de archivos PDF</h1>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <label>Titulo</label>   
        <input type="text" name="titulo">
        <label>autor</label>   
        <input type="text" name="autor">
        <label>descripcion</label>   
        <input type="text" name="descripcion">
        <br>
        <br>
        <label for="archivo">Archivo PDF:</label>
        <input type="file" id="archivo" name="archivo" accept=".pdf" required>
        <br><br>
        <button type="submit">Cargar archivo</button>
    </form>
    </div>
</body>
</html>
<?php if(isset($_GET['msg'])): ?>
        <p><?php echo $_GET['msg']; ?></p>
    <?php endif; ?>

<?php
// Carpeta donde se guardan los archivos PDF y sus portadas
$carpeta = "pdf_files/";

// Obtener la lista de archivos PDF en la carpeta
$archivos = array_diff(scandir($carpeta), array('..', '.'));




?>


<!DOCTYPE html>
<html>
<head>
    <title>Tabla de Libros</title>
</head>
<body>
    <h1>Tabla de Libros</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Código de Libro</th>
                <th>Título</th>
                <th>Autor</th>
                <th>Descripción</th>
                <th>Acciones</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Datos de conexión a la base de datos
            $servidor = "localhost";
            $usuario = "root";
            $contrasena = "";
            $base_de_datos = "pdf";

            // Conexión a la base de datos
            $conexion = mysqli_connect($servidor, $usuario, $contrasena, $base_de_datos);

            // Consulta a la tabla "libros"
            $sql = "SELECT * FROM libros";
            $resultado = mysqli_query($conexion, $sql);
foreach ($archivos as $archivo) {
    $nombre = pathinfo($archivo, PATHINFO_FILENAME);
    $extension = pathinfo($archivo, PATHINFO_EXTENSION);

   
            // Mostrar los registros en la tabla
            while ($fila = mysqli_fetch_assoc($resultado)) {
                echo "<tr>";
                echo "<td>" . $fila["codigo_de_libro"] . "</td>";
                echo "<td>" . $fila["titulo"] . "</td>";
                echo "<td>" . $fila["autor"] . "</td>";
                echo "<td>" . $fila["descripcion"] . "</td>";
                echo "<td><a href='" . $carpeta . $archivo . "' target='_blank'>Leer o Descargar</a></td>";


                echo "<td><form action='borrar.php' method='post'>
<input type='hidden' name='id' id='id_" . $fila["codigo_de_libro"] . "' value='" . $fila["codigo_de_libro"] . "'>
<input type='hidden' name='url' id='url_" . $fila["codigo_de_libro"] . "' value='" . $fila["url"] . "'>
<input type='submit' value='Eliminar' name='submit_" . $fila["codigo_de_libro"] . "' id='submit_" . $fila["codigo_de_libro"] . "'>
</form></td>";


                echo "</tr>";
            }
            }

            // Cerrar la conexión a la base de datos
            mysqli_close($conexion);
            ?>
        </tbody>
    </table>
</body>
</html>
<?php 
session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8"> 
    <title>Usuario - Biblioteca Online</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div class="welcome">
        <h1>Bienvenido, <?php

         echo $_SESSION['usuario']; 



         ?>!</h1>
        <p>Usted ha iniciado sesión como usuario.</p>
        <a href="logout.php">Cerrar sesión</a>
    </div>
    <div class="user-content">
        <h1>Bienvenido a tu Página de Usuario</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Código de Libro</th>
                <th>Título</th>
                <th>Autor</th>
                <th>Descripción</th>
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

            // Mostrar los registros en la tabla
            while ($fila = mysqli_fetch_assoc($resultado)) {
                echo "<tr>";
                echo "<td>" . $fila["codigo_de_libro"] . "</td>";
                echo "<td>" . $fila["titulo"] . "</td>";
                echo "<td>" . $fila["autor"] . "</td>";
                echo "<td>" . $fila["descripcion"] . "</td>";
           
                echo "<td><form action='envio_registro.php' method='post'>
    <input type='hidden' name='id' value='" . $fila["titulo"] . "'>
    <input type='hidden' name='url' value='" . $fila["url"] . "'>
    <input type='submit' value='leer o descargar'>
  </form></td>";


            }

            // Cerrar la conexión a la base de datos
            mysqli_close($conexion);
            ?>
        </tbody>
    </table>
    </div>
</body>
</html>
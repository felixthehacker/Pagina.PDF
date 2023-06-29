<!DOCTYPE html>
<html>
<head>
	<title>Página de Usuario</title>
</head>
<body>
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
				echo "<td><a href='" . $carpeta . $archivo . "' target='_blank'>Leer o Descargar</a></td>";

				echo "</tr>";
			}

			// Cerrar la conexión a la base de datos
			mysqli_close($conexion);
			?>
		</tbody>
	</table>
</body>
</html>
<?php
ob_start();

  ?>

<!DOCTYPE html>
<html>
<head>
  <title>Mi tabla de registros</title>
  <style>
    /* Estilo para la tabla */
    table {
      border-collapse: collapse;
      width: 100%;
    }
    th, td {
      text-align: left;
      padding: 8px;
    }
    th {
      background-color: #007bff;
      color: #fff;
    }
    tr:nth-child(even) {
      background-color: #f2f2f2;
    }
  </style>
</head>
<body>
<div>
  <a href="libreria/fpdf" target="_blank"></a>
</div>

  <center><h1>Pedidos de Libros</h1></center>
   <center><h2>Tabla de Registros</h2></center>
   <br>
<br>

<br>
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Libro</th>
        <th>Hora</th>
        <th>Fecha</th>
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

    // Consulta los registros de la tabla "registro"
    $sql = "SELECT * FROM registro";
    $resultado = mysqli_query($conexion, $sql);

    // Mostrar los registros en la tabla
    while ($fila = mysqli_fetch_assoc($resultado)) {
      echo "<tr>";
      echo "<td>" . $fila["id"] . "</td>";
      echo "<td>" . $fila["nombre"] . "</td>";
      echo "<td>" . $fila["libro"] . "</td>";
      echo "<td>" . $fila["hora"] . "</td>";
      echo "<td>" . $fila["fecha"] . "</td>";
      echo "</tr>";
    }

    // Cerrar la conexión a la base de datos
    mysqli_close($conexion);
    ?>
    </tbody>
  </table>
</body>
</html>
<?php
///require_once 'dompdf/autoload.inc.php';
///use Dompdf\Dompdf;

// Introducimos HTML de prueba


require_once 'C:/xampp/htdocs/pdf/login/libreria/dompdf/autoload.inc.php';
 $html=ob_get_clean();
 use Dompdf\Dompdf;
$dompdf=new Dompdf();
$dompdf-> loadhtml($html);


 
$dompdf->setPaper('letter');
$dompdf->render();
$dompdf->stream("Registro_.pdf", array("Attachment" => false));

header("location:C:\Users\Eclips\Downloads\Registro_.pdf")
  ?>
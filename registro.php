<?php
session_start();

// Conectar a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "pdf");

// Verificar si se ha enviado el formulario de registro
if (isset($_POST['register'])) {
    $usuario = $_POST['usuario'];
    $clave = $_POST['contraseña'];
    $confirmar_contraseña = $_POST['confirmar-contraseña'];

    // Verificar si el usuario ya existe en la base de datos
    $consulta = "SELECT * FROM usuario WHERE usuario='$usuario'";
    $resultado = mysqli_query($conexion, $consulta);

    if (mysqli_num_rows($resultado) == 0) {
        // Si el usuario no existe, agregarlo a la base de datos
        $consulta = "INSERT INTO usuario (usuario, clave, tipo) VALUES ('$usuario', '$clave', 'usuario')";
        mysqli_query($conexion, $consulta);

        // Crear una sesión para el usuario
        $_SESSION['usuario'] = $usuario;
        $_SESSION['tipo'] = 'usuario';
header("Location:usuario.html");
        // Redirigir al usuario a la página de inicio correspondiente
        ///header('Location: usuario.html');
    } else {
        // Si el usuario ya existe, mostrar un mensaje de error
        echo "<p>El usuario ya existe. Por favor, elija otro.</p>";
    }
}
?>
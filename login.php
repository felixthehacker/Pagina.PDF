<?php
session_start();

// Conectar a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "PDF");

// Verificar si se ha enviado el formulario de login
if (isset($_POST['login'])) {
    $usuario = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];
    $tipo = $_POST['tipo'];

    // Consultar la base de datos para verificar si el usuario y la contraseña son correctos
    $consulta = "SELECT * FROM usuario WHERE usuario='$usuario' AND clave='$contraseña' AND tipo='$tipo'";
    
    $resultado = mysqli_query($conexion, $consulta);
   

    // Si la consulta devuelve un resultado, el usuario y la contraseña son correctos
    if (mysqli_num_rows($resultado) == 1) {
        // Crear una sesión para el usuario
        $_SESSION['usuario'] = $usuario;


        $_SESSION['tipo'] = $tipo;

        // Redirigir al usuario a la página de inicio correspondiente
        if ($tipo == 'administrador') {
            header('Location: pag_admin.php');
        } else {
            header('Location: pag_urser.php');
        }
    } else {
        // Si el usuario o la contraseña son incorrectos, mostrar un mensaje de error
        echo "<p>Usuario o contraseña incorrectos. Por favor, intente de nuevo.</p>";
    }
}
?>
<?php
session_start(); // Inicializa la sesión

// Verifica si las claves "usuario" y "contraseña" existen en $_POST
if (isset($_POST['usuario']) && isset($_POST['contraseña'])) {
    // Nombre de usuario y contraseña a buscar (recibidos desde el formulario)
    $username = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];

    // Conéctate a la base de datos (cambia los valores a los de tu configuración)
    require 'conexion.php';

    // Escapa los valores para prevenir SQL Injection
    $username = mysqli_real_escape_string($conexion, $username);
    $contraseña = mysqli_real_escape_string($conexion, $contraseña);

    // Consulta la base de datos para verificar si el usuario y contraseña coinciden
    $query = "SELECT * FROM usuario WHERE nombre = '$username' AND constraseña = '$contraseña'";
    $result = mysqli_query($conexion, $query);

    if (mysqli_num_rows($result) > 0) {
        // El usuario existe en la base de datos y las credenciales son correctas
        // Obtén el rol del usuario
        $row = mysqli_fetch_assoc($result);
        $rol_usuario = $row['roles_idroles'];

        // Establece la variable de sesión con el nombre de usuario
        $_SESSION['nombre_usuario'] = $username;

        // Redirige al usuario según su rol
        if ($rol_usuario == 1) {
            header('Location: ../startbootstrap-sb-admin-gh-pages/index.php');
            exit(); // Asegura que no se ejecute más código después de la redirección
        } elseif ($rol_usuario == 2) {
            header('Location: ../index.php');
            exit(); // Asegura que no se ejecute más código después de la redirección
        } elseif ($rol_usuario == 3) {
            header('Location: ../paginas/empleado.php');
            exit(); // Asegura que no se ejecute más código después de la redirección
        } else {
            // Maneja otros roles si es necesario
            echo "Rol no reconocido";
        }
    } else {
        // Las credenciales no coinciden o el usuario no existe en la base de datos
        echo "Credenciales incorrectas o usuario no encontrado.";
    }

    // Cierra la conexión a la base de datos
    mysqli_close($conexion);
}
?>

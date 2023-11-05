<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Llama al archivo de conexión
    require 'conexion.php';
    
    // Obtener datos del formulario
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $email = $_POST["email"];
    $contrasenia = $_POST["contrasenia"];
    $identificacion = $_POST["identificacion"];
   

    // Aplicar hash a la contraseña
    $contrasenia_hash = sha1($contrasenia);

    // Preparar la consulta SQL
    $sql = "INSERT INTO usuario (idUsuario, nombre,apellido,email, constraseña, roles_idroles) VALUES ('$identificacion', '$nombre','$apellido','$email', '$contrasenia_hash', 2)";

    if ($conexion->query($sql) === TRUE) {
        header('location: ../paginas/login.php');
    } else {
        echo "Error al registrar: " . $conexion->error;
    }

    // Cerrar la conexión a la base de datos
    $conexion->close();
}
?>

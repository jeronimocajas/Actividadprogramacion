<?php
// Establece la conexión a la base de datos
require 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recopila los datos del formulario
    $vuelo_idvuelo = $_POST["vuelo_idvuelo"];
    $usuario_idUsuario = $_POST["usuario_idUsuario"];
    $asientos_idasientos = $_POST["asientos_idasientos"];
    $fecha_reserva = $_POST["fecha_reserva"];
    $maleta = $_POST["maleta"];

    // Inserta los datos en la tabla "reserva"
    $sql = "INSERT INTO reserva (usuario_idusuario, vuelo_idvuelo, asientos_idasientos, fecha_reserva, maleta)
            VALUES ('$usuario_idUsuario', '$vuelo_idvuelo', '$asientos_idasientos', '$fecha_reserva', '$maleta')";

if ($conexion->query($sql) === TRUE) {
    // Inserción exitosa, redirige a la página de inicio
    header("Location: ../index.php");
    exit; // Asegúrate de terminar el script después de la redirección
} else {
    echo "Error al guardar el registro: " . $conexion->error;
}
}

// Cierra la conexión a la base de datos
$conexion->close();
?>

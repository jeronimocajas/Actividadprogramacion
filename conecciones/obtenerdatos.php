<?php

require 'conexion.php'
// Obtén todos los registros de la tabla 'vuelo'
$vuelo_query = "SELECT * FROM vuelo";
$vuelo_result = mysqli_query($conexion, $vuelo_query);

// Obtén todos los registros de la tabla 'usuario'
$usuario_query = "SELECT * FROM usuario";
$usuario_result = mysqli_query($conexion, $usuario_query);

// Obtén todos los registros de la tabla 'asientos'
$asientos_query = "SELECT * FROM asientos";
$asientos_result = mysqli_query($conexion, $asientos_query);

?>

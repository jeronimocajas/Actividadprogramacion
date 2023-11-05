<?php

require 'conexion.php'
// Obtén datos de la tabla 'vuelo'
$vuelo_query = "SELECT * FROM vuelo";
$vuelo_result = $conn->query($vuelo_query);

// Obtén datos de la tabla 'usuario'
$usuario_query = "SELECT * FROM usuario";
$usuario_result = $conn->query($usuario_query);

// Obtén datos de la tabla 'asientos'
$asientos_query = "SELECT * FROM asientos";
$asientos_result = $conn->query($asientos_query);
?>

<?php
require 'conexion.php';

// Obtén datos de la tabla 'vuelo'
$vuelo_query = "SELECT idvuelo, numero_vuelo FROM vuelo";
$vuelo_result = mysqli_query($conexion, $vuelo_query);

// Obtén datos de la tabla 'asientos'
$asientos_query = "SELECT idasientos FROM asientos";
$asientos_result = mysqli_query($conexion, $asientos_query);
?>

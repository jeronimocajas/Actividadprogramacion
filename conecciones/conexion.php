<?php
 $host = "127.0.0.1:3306";
 $usuario_db = "root"; // Define el usuario de la base de datos
 $contrasena_db = ""; // Define la contraseña de la base de datos
 $nombre_db = "aeropuerto";

 $conexion = mysqli_connect($host, $usuario_db, $contrasena_db, $nombre_db);

 // Verifica la conexión a la base de datos
 if (!$conexion) {
     die("Error al conectar a la base de datos: " . mysqli_connect_error());
 }

?>  
<?php
// Inicia la sesión (asegúrate de hacerlo en todos los archivos que necesiten sesión)
session_start();

// Destruye la sesión actual
session_destroy();

// Redirige al usuario a la página de inicio
header("Location: ../paginas/login.php");
exit;
?>
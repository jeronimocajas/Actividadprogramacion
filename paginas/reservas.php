<?php
// Inicia la sesión para poder acceder a las variables de sesión
session_start();


require '../conecciones/conexion.php'
// Verificar la autenticación del cliente aquí
// ...

// Recuperar el ID de usuario del cliente autenticado
$cliente_id = $_SESSION['cliente_id']; // Suponiendo que almacenaste el ID en la sesión

// Consulta para recuperar las reservas del cliente
$sql = "SELECT c.idcheking, v.numero_vuelo, u.nombre, u.apellido, a.numero_asiento
        FROM cheking c
        JOIN vuelo v ON c.vuelo_idvuelo = v.idvuelo
        JOIN usuario u ON c.usuario_idUsuario = u.idUsuario
        JOIN asientos_has_vuelo a_h_v ON c.vuelo_idvuelo = a_h_v.idvuelo
        JOIN asientos a ON a_h_v.asientos_idasientos = a.idasientos
        WHERE c.usuario_idUsuario = $cliente_id";

// Ejecutar la consulta
// ...

// Mostrar las reservas del cliente en una tabla
?>
<!DOCTYPE html>
<html>
<head>
    <title>Mis Reservas</title>
</head>
<body>
    <h1>Mis Reservas</h1>
    <table>
        <tr>
            <th>ID de Check-In</th>
            <th>Número de Vuelo</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Número de Asiento</th>
        </tr>
        <?php
        // Recorremos los resultados de la consulta y mostramos cada reserva en una fila de la tabla
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["idcheking"] . "</td>";
            echo "<td>" . $row["numero_vuelo"] . "</td>";
            echo "<td>" . $row["nombre"] . "</td>";
            echo "<td>" . $row["apellido"] . "</td>";
            echo "<td>" . $row["numero_asiento"] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>

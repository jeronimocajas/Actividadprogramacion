<!DOCTYPE html>
<html lang="en">
<head>
    <title>Reservas del Usuario</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            margin: 10px 0;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        h2 {
            margin: 20px 0;
        }
    </style>
</head>
<body>
<?php
require 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['idUsuario'])) {
        $id_usuario = $_POST['idUsuario'];

        // Consulta para obtener la información de las reservas del usuario
        $query = "SELECT * FROM reserva WHERE usuario_idUsuario = ?";
        $stmt = $conexion->prepare($query);
        $stmt->bind_param("i", $id_usuario);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "<h2>Reservas del Usuario:</h2>";
            echo "<table>";
            echo "<tr>";
            echo "<th>ID de Reserva</th>";
            echo "<th>ID de Usuario</th>";
            echo "<th>ID de Vuelo</th>";
            echo "<th>ID de Asiento</th>";
            echo "<th>Maleta</th>";
            echo "<th>Fecha de Reserva</th>";
            echo "</tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['idreserva'] . "</td>";
                echo "<td>" . $row['usuario_idUsuario'] . "</td>";
                echo "<td>" . $row['vuelo_idvuelo'] . "</td>";
                echo "<td>" . $row['asientos_idasientos'] . "</td>";
                echo "<td>" . $row['maleta'] . "</td>";
                echo "<td>" . $row['fecha_reserva'] . "</td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "No se encontraron reservas para el usuario con el ID proporcionado.";
        }

        $stmt->close();
    }
}
?>
 <li class="nav-item"><a class="nav-link" href="../conecciones/logout.php">Cerrar Sesión</a></li>
</body>
</html>

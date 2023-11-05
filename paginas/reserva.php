
<?php
require '../conecciones/obtenerdatos.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Registro</title>
    <style>
        /* Tu CSS aquí */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        .container {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 400px;
        }

        .container h2 {
            margin: 0;
            padding: 20px;
            text-align: center;
        }

        .form-group {
            margin: 0 40px 20px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .form-group input[type="text"],
        .form-group input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-group input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .form-group input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Formulario de Registro</h2>
        <form action="../conecciones/obtenerdatos.php" method="post">
            <div class="form-group">
                <label for="vuelo_idvuelo">Vuelo</label>
                <select name="vuelo_idvuelo" id="vuelo_idvuelo">
                    <?php
                    require '../conecciones/obtenerdatos.php'; // Incluye el archivo para obtener datos

                    if (mysqli_num_rows($vuelo_result) > 0) {
                        while ($rowVuelo = mysqli_fetch_assoc($vuelo_result)) {
                            $idVuelo = $rowVuelo['idvuelo'];
                            $nombreVuelo = $rowVuelo['numerovuelo'];
                            echo "<option value='$idVuelo'>$nombreVuelo</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="usuario_idUsuario">ID del Usuario</label>
                <input type="number" name="usuario_idUsuario">
            </div>
            <div class="form-group">
                <label for="asientos_idasientos">ID del Asiento</label>
                <select name="asientos_idasientos" id="asientos_idasientos">
                    <?php
                    if (mysqli_num_rows($asientos_result) > 0) {
                        while ($rowAsiento = mysqli_fetch_assoc($asientos_result)) {
                            $idAsiento = $rowAsiento['idasientos'];
                            
                            echo "<option value='$idAsiento'</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="fecha_reserva">Fecha reserva</label>
                <input type="date" name="fecha_reserva">
            </div>
            <div class="form-group">
                <label for="maleta">Maleta</label>
                <select name="maleta" id="maleta">
                    <option value="SI">SI</option>
                    <option value="NO">NO</option>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" value="Registrar">
            </div>
        </form>
    </div>
</body>
</html>

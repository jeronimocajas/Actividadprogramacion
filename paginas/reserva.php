<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Registro</title>
    <style>
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
        <form action="procesar_registro.php" method="post">
            <div class="form-group">
                <label for="vuelo_idvuelo">Vuelo</label>
                <input type="number" id="vuelo_idvuelo" name="vuelo_idvuelo" required>
            </div>
            <div class="form-group">
                <label for="usuario_idUsuario">ID del Usuario</label>
                <input type="number" id="usuario_idUsuario" name="usuario_idUsuario" required>
            </div>
            <div class="form-group">
                <label for="asientos_idasientos">ID del Asiento</label>
                <input type="number" id="asientos_idasientos" name="asientos_idasientos" required>
            </div>
            <div class="form-group">
                <label for="asientos_idasientos">Maleta</label>
                <label for="si">Sí:</label>
        <input type="checkbox" id="si" name="respuesta" value="si">
        <br>
        <label for="no">No:</label>
        <input type="checkbox" id="no" name="respuesta" value="no">
            </div>
            <div class="form-group">
                <input type="submit" value="Registrar">
            </div>
        </form>
    </div>
</body>
</html>

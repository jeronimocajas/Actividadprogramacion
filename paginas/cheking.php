<!DOCTYPE html>
<html lang="en">
<head>
    <title>Checking</title>
    <!-- Agrega el enlace al archivo CSS de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Agrega un estilo personalizado -->
    <style>
        body {
            background-color: #f7f7f7;
            padding: 20px;
        }

        .container {
            max-width: 400px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin: 0 auto;
            margin-top: 20px;
        }

        h1 {
            color: #333;
            text-align: center;
        }

        form {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mb-4">Checking Page</h1>
        <form action="../conecciones/verificarreserva.php" method="post">
            <div class="mb-3">
                <label for="idUsuario" class="form-label">ID de Usuario:</label>
                <input type="text" class="form-control" name="idUsuario" id="idUsuario">
            </div>
            <button type="submit" class="btn btn-primary">Verificar Reservas</button>
            <li class="nav-item"><a class="nav-link" href="../conecciones/logout.php">Cerrar Sesión</a></li>
        </form>
    </div>
</body>
</html>


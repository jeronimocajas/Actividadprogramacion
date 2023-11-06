<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['usuario'];
    $password = $_POST['contraseña'];

    require '../conecciones/conexion.php';

    $username = mysqli_real_escape_string($conexion, $username);
    $password = mysqli_real_escape_string($conexion, $password);

    $query = "SELECT * FROM usuario WHERE nombre = '$username' AND contraseña = '$password'";
    $result = mysqli_query($conexion, $query);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION['usuario_autenticado'] = true;
        $_SESSION['nombre'] = $username;
        header('Location: ../index.php');
    } else {
        $error_message = "Credenciales incorrectas, intenta nuevamente.";
    }

    mysqli_close($conexion);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<section class="vh-100">
    <div class="container h-100">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-md-6">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <h2 class="card-title text-center">Iniciar Sesión</h2>
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                            <div class="form-group">
                                <label for="usuario">Nombre de usuario</label>
                                <input type="text" id="usuario" class="form-control" name="usuario" required>
                            </div>
                            <div class="form-group">
                                <label for="contraseña">Contraseña</label>
                                <input type="password" id="contraseña" class="form-control" name="contraseña" required>
                            </div>
                            <?php if (isset($error_message)) { ?>
                                <div class="alert alert-danger" role="alert">
                                    <?php echo $error_message; ?>
                                </div>
                            <?php } ?>
                            <div class="text-center">
                                <a href="register.php" class="btn btn-link">Registrarse</a>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block mt-3">Iniciar Sesión</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 d-none d-md-block">
                <img src="../assets/img/LOGIN.jpg" class="img-fluid" alt="Phone image">
            </div>
        </div>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

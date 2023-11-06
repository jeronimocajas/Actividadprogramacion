<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera el nombre de usuario y contraseña del formulario
    $username = $_POST['usuario'];
    $password = $_POST['contraseña'];

    // Conecta a la base de datos (ajusta los valores a tu configuración)
    require '../conecciones/conexion.php';

    // Escapa los valores para evitar inyección SQL
    $username = mysqli_real_escape_string($conexion, $username);
    $password = mysqli_real_escape_string($conexion, $password);

    // Consulta para verificar las credenciales del usuario
    $query = "SELECT * FROM usuario WHERE nombre = '$username' AND constraseña = '$password'";
    $result = mysqli_query($conexion, $query);

    if (mysqli_num_rows($result) == 1) {
        // Las credenciales son correctas, inicia sesión
        $_SESSION['usuario_autenticado'] = true;
        $_SESSION['nombre'] = $username;
        // Opcional: También puedes guardar el ID del usuario en la sesión

        // Redirige al usuario a la página de inicio
        header('Location: ../index.php'); // Ajusta la ubicación a tu página principal
    } else {
        // Las credenciales son incorrectas, muestra un mensaje de error
        $error_message = "Credenciales incorrectas, intenta nuevamente.";
    }

    // Cierra la conexión a la base de datos
    mysqli_close($conexion);
}
?>

<!doctype html>
<html lang="en">
  <head>
    <title>S.S.A</title>
    
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      
  <section class="vh-100">
    <div class="container py-5 h-100">
      <div class="row d-flex align-items-center justify-content-center h-100">
        <div class="col-md-8 col-lg-7 col-xl-6">
          <img src="./imagenes/mejor.png" class="img-fluid" alt="Phone image">
        </div>
        <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
          <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <!-- Nombre de usuario input -->
            <div class="form-outline mb-4">
              <input type="text" id="usuario" class="form-control form-control-lg" name="usuario" />
              <label class="form-label" for="usuario">User name</label>
            </div>
    
            <!-- Contraseña input -->
            <div class="form-outline mb-4">
              <input type="password" id="contraseña" class="form-control form-control-lg" name="contraseña" />
              <label class="form-label" for="contraseña">Password</label>
            </div>

            <!-- Muestra un mensaje de error si las credenciales son incorrectas -->
            <?php if (isset($error_message)) { ?>
              <div class="alert alert-danger" role="alert">
                <?php echo $error_message; ?>
              </div>
            <?php } ?>
    
            <div class="d-flex justify-content-around align-items-center mb-4">
              <!-- Checkbox -->
            </div>
    
            <div>
              <a href="register.php">Register</a><br><br>
              <input type="submit" value="Iniciar sesión">
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>

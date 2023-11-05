<?php
session_start();
require '../conecciones/validar.php'; // Asumiendo que este archivo está en la misma carpeta que tu página de inicio de sesión.
?>
<!doctype html>
<html lang="en">
  <head>
    <title>J-A-C</title>
    <link rel="shortcut icon" href="./imagenes/jj.png" type="image/x-icon">
    
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
          <form action="../conecciones/validar.php" method="post">
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

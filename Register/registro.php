<?php
// register.php
include '../db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $nombre = $_POST['nombre'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $confirm_password = $_POST['confirm_password'];
  $birthday = $_POST['birthday'];
  $address = $_POST['address'];
  $phone = $_POST['phone'];

  // Validar que las contraseñas coinciden
  if ($password !== $confirm_password) {
      echo "<script>
              Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: 'Las contraseñas no coinciden.'
              });
            </script>";
  } else {
      $hashed_password = password_hash($password, PASSWORD_DEFAULT);

      try {
          // Insertar usuario en la base de datos
          $sql = "INSERT INTO usuarios (nombre, email, password, birthday, address, phone) VALUES (:nombre, :email, :password, :birthday, :address, :phone)";
          $stmt = $pdo->prepare($sql);
          $stmt->execute([
              'nombre' => $nombre, 
              'email' => $email, 
              'password' => $hashed_password,
              'birthday' => $birthday,
              'address' => $address,
              'phone' => $phone
          ]);

          // Redirigir a la página de inicio de sesión
          echo "<script>
                  Swal.fire({
                      icon: 'success',
                      title: 'Registro exitoso',
                      text: 'Redirigiendo al inicio de sesión...'
                  }).then((result) => {
                      if (result.isConfirmed) {
                          window.location.href = '../Login/login.php';
                      }
                  });
                </script>";
      } catch (PDOException $e) {
          // Manejar error si el email ya existe
          if ($e->getCode() == 23000) {
              echo "<script>
                      Swal.fire({
                          icon: 'error',
                          title: 'Error',
                          text: 'El email ya está registrado.'
                      });
                    </script>";
          } else {
              echo "<script>
                      Swal.fire({
                          icon: 'error',
                          title: 'Error',
                          text: 'Ocurrió un error al registrarte: " . $e->getMessage() . "'
                      });
                    </script>";
          }
      }
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro</title>
  <link rel="stylesheet" href="/css/bootstrap.css.map">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="icon" type="image/png" href="../img/LogoTECGO_STORE.png">
</head>
<body>

<div class="container d-flex justify-content-center mt-5">
  <div class="card">
    <div class="card-body">
      <h2 class="card-title">Regístrate</h2>
      <form action="registro.php" method="post">
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Contraseña</label>
        <input type="password" class="form-control" id="password" name="password" required>
    </div>
    <div class="mb-3">
        <label for="confirm_password" class="form-label">Confirmar Contraseña</label>
        <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
    </div>
    <div class="mb-3">
        <label for="birthday" class="form-label">Fecha de Nacimiento</label>
        <input type="date" class="form-control" id="birthday" name="birthday" required>
    </div>
    <div class="mb-3">
        <label for="address" class="form-label">Dirección</label>
        <input type="text" class="form-control" id="address" name="address" required>
    </div>
    <div class="mb-3">
        <label for="phone" class="form-label">Teléfono</label>
        <input type="text" class="form-control" id="phone" name="phone" required>
    </div>
    <button type="submit" class="btn btn-primary btn-block btn-sm">Registrar</button>
</form>
    </div>
    <div class="card-footer">
       ¿Ya tienes cuenta? <a href="../Login/login.php">Inicia sesión aquí</a>
    </div>
  </div>
</div>

<script src="../js/registro.js"></script>
</body>
</html>

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
      <form action="../guardar_usuario.php" method="post">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
        <div class="form-group">
          <label for="number" class="form-label">Phone</label>
            <input type="tel" class="form-control" placeholder="Phone Number" 
                   id="phoneNumber" name="phoneNumber"
                   pattern="\d{10}" maxlength="10" minlength="10" required>
            <div class="invalid-feedback">
                Por favor, ingrese un número de teléfono válido de 10 dígitos.
            </div>
        </div>
        <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
        <div class="form-group">
          <input type="password" class="form-control" id="confirm_password" placeholder="Confirm Password" required>
        </div>
        <button type="submit" class="btn btn-primary btn-block btn-sm">Registrar</button>
      </form>
    </div>
    <div class="card-footer">
       ¿Ya tienes cuenta? <a href="../Login/index.php">here</a>
    </div>
  </div>
</div>

<script src="../js/registro.js"></script>
</body>
</html>
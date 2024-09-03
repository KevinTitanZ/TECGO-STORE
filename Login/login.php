<?php
// login.php
include '../db.php'; // Asegúrate de que este archivo tenga la conexión a la base de datos similar a config.php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $sql = "SELECT * FROM usuarios WHERE email = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['email' => $email]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario && password_verify($password, $usuario['password'])) {
            $_SESSION['user_id'] = $usuario['id'];
            $_SESSION['user_name'] = $usuario['nombre'];
            header("Location: ../Inicio/index.php");
            exit;
        } else {
            echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Credenciales incorrectas.'
                });
            </script>";
        }
    } else {
        echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Por favor, introduce un email válido.'
            });
        </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="login-card">
        <img src="../img/logo TecgoStoreConLetras.png" alt="Logo" class="logo">
        <h2>Login</h2>
        <h3>Entra tus credenciales</h3>
        <form class="login-form" action="login.php" method="post">
            <input
                class="control"
                type="text"
                id="email"
                name="email"
                placeholder="Email"
                required />
            <div class="password">
                <input
                    class="control"
                    id="password"
                    name="password"
                    type="password"
                    placeholder="Password"
                    required />
                <button
                    class="toggle"
                    type="button"
                    onclick="togglePassword(this)"></button>
            </div>
            <button class="control" type="submit">LOGIN</button>
            <a href="../Register/registro.php">Registrate</a>
        </form>
    </div>
    <script type="text/javascript" src="../js/main.js"></script>
    <script type="text/javascript">
        function togglePassword(button) {
            const passwordInput = document.getElementById('password');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                button.classList.add('showing');
            } else {
                passwordInput.type = 'password';
                button.classList.remove('showing');
            }
        }
    </script>
</body>

</html>
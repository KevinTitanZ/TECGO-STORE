<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <div class="login-card">
        <img src="../img/logo TecgoStoreConLetras.png" alt="Logo" class="logo">
        <h2>Login</h2>
        <h3>Entra tus credenciales</h3>
        <form class="login-form" action="../procesar_login.php" method="post">
            <input
                class="control"
                type="text"
                id="email"
                name="email"
                placeholder="Email"
                required
            />
            <div class="password">
                <input
                    class="control"
                    id="password"
                    name="password"
                    type="password"
                    placeholder="Password"
                    required
                />
                <button
                    class="toggle"
                    type="button"
                    onclick="togglePassword(this)"
                ></button>
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

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Error!</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    try {
        $sql = "SELECT * FROM usuarios WHERE email = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['email' => $email]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario && password_verify($password, $usuario['password'])) {
            session_start();
            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['nombre'] = $usuario['nombre'];
            header("Location: ../Inicio/index.php");
            exit();
        } else {
            echo "<script>
            Swal.fire({
                   icon: 'error',
                    title: 'Oops...',
                    text: '¡Algo salió mal!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '../Login/index.php';
                }
            });
        </script>";
        }
    } catch (PDOException $e) {
        echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: '¡Contraseña o Usuario Incorrecta!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '../Login/index.php';
                    }
                });
            </script>";
    }
}
?>
</body>
</html>
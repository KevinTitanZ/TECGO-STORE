
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <?php
    require 'db.php';
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        try {
            $sql = "INSERT INTO usuarios (nombre, email, password) VALUES (:nombre, :email, :password)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['nombre' => $nombre, 'email' => $email, 'password' => $password]);
            session_start();
            $_SESSION['user_id'] = $pdo->lastInsertId();
    
            header('Location: ../Perfil/index.php');
            exit();
        } catch (PDOException $e) {
            echo "<script>
            Swal.fire({
                   icon: 'error',
                title: 'Oops...',
                text: '¡Algo Salio Mal!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '../Login/login.php';
                }
            });
        </script>";
        }
    }
    ?>
</body>
</html>



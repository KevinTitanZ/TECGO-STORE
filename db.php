<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$host = 'localhost';
$port = '5432'; // Cambia esto al puerto que estés usando, si es diferente
$dbname = 'tienda';
$user = 'postgres';
$password = '21122002';

try {
    $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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
?>

</body>
</html>
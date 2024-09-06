<?php
session_start();
require '../db.php'; // Asegúrate de que db.php tiene la conexión a la base de datos

if (!isset($_SESSION['user_id'])) {
    header('Location: ../Login/index.php');
    exit();
}

$user_id = $_SESSION['user_id'];

try {
    $sql = "SELECT * FROM usuarios WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $user_id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Usuario no encontrado.'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '../Login/index.php';
                }
            });
        </script>";
        exit();
    }
} catch (PDOException $e) {
    echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Error al obtener los datos del usuario: " . htmlspecialchars($e->getMessage()) . "'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '../Login/index.php';
            }
        });
    </script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuario - Tecgo Store</title>
    <link rel="stylesheet" href="profile.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../Nav/stylee.css">
    <link rel="stylesheet" href="Style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap" rel="stylesheet" />
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <header>
        <div include-html="../Nav/nav.php"></div>
    </header>

    <main>
        <section class="profile-header">
            <h1>Mi Cuenta</h1>
        </section>
        <div class="profile">
        
            <div class="icons">
    <div class="icon" data-tooltip="<?php echo htmlspecialchars($user['nombre']); ?>">
        <i class='bx bx-user'></i>
    </div>
    <div class="icon" data-tooltip="<?php echo htmlspecialchars($user['email']); ?>">
        <i class='bx bxl-gmail'></i>
    </div>
    <div class="icon" data-tooltip="<?php echo htmlspecialchars($user['birthday']); ?>">
        <i class='bx bx-calendar'></i>
    </div>
    <div class="icon" data-tooltip="<?php echo htmlspecialchars($user['address']); ?>">
        <i class='bx bx-map'></i>
    </div>
    <div class="icon" data-tooltip="<?php echo htmlspecialchars($user['phone']); ?>">
        <i class='bx bx-phone'></i>
    </div>
</div>
</div>

        <section class="profile-content">
            <div class="profile-left">
                <div class="account-details">
                    <h2>Detalles de la Cuenta</h2>
                    <p><strong>Nombre:</strong> <?php echo htmlspecialchars($user['nombre']); ?></p>
                    <p><strong>Correo Electrónico:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
                    <p><strong>Fecha de Nacimiento:</strong> <?php echo htmlspecialchars($user['birthday']); ?></p>
                    <p><strong>Dirección:</strong> <?php echo htmlspecialchars($user['address']); ?></p>
                    <p><strong>Teléfono:</strong> <?php echo htmlspecialchars($user['phone']); ?></p>
                </div>

                <div class="address-view">
                    <h2>Ver Direcciones</h2>
                    <a href="#">Administrar Direcciones</a>
                </div>
            </div>

            <div class="order-history">
                <h2>Historial de Pedidos</h2>
                <p class="no-orders">Aún no has realizado ningún pedido.</p>
            </div>
        </section>

        <div class="divider"></div>

        <footer>
            <div class="footer-container">
                <div class="footer-item">
                    <i class='bx bx-cart'></i>
                    <p>Envío gratis</p>
                    <p>En pedidos desde $75</p>
                </div>
                <div class="footer-item">
                    <i class='bx bx-arrow-back'></i>
                    <p>Devolución gratis</p>
                    <p>Devuelve el producto y te reembolsamos. Ver más.</p>
                </div>
                <div class="footer-item">
                    <i class='bx bx-lock'></i>
                    <p>Pago Seguro</p>
                    <p>Paga con tarjeta, transferencia o efectivo. Tú eliges.</p>
                </div>
                <div class="footer-item">
                    <i class='bx bx-heart'></i>
                    <p>Garantía y Soporte</p>
                    <p>Productos con 12 meses de garantía y soporte.</p>
                </div>
            </div>
        </footer>
    </main>

    <script src="../Perfil/script.js"></script>
    <script src="../js/NAV.js"></script>
</body>
</html>

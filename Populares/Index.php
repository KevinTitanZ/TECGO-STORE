<?php
include('../db.php'); // Cambiamos la conexión a db.php

if (!$pdo) {
    die("Error de conexión a la base de datos");
}

// Consultar todos los productos
$query = "SELECT * FROM productos";
try {
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error en la consulta: " . $e->getMessage());
}

// Manejar la solicitud POST para agregar al carrito
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    if ($data) {
        $producto_id = $data['id'];
        $cantidad = 1; // Puedes cambiar la cantidad si necesitas permitir cantidades diferentes

        try {
            // Verificar si el producto ya está en el carrito
            $checkQuery = "SELECT * FROM carrito WHERE producto_id = :producto_id";
            $checkStmt = $pdo->prepare($checkQuery);
            $checkStmt->execute(['producto_id' => $producto_id]);

            if ($checkStmt->rowCount() > 0) {
                // Producto ya está en el carrito
                echo json_encode(['success' => false, 'message' => 'El producto ya está en el carrito.']);
            } else {
                // Insertar el producto en la tabla carrito
                $insertQuery = "INSERT INTO carrito (producto_id, cantidad) VALUES (:producto_id, :cantidad)";
                $insertStmt = $pdo->prepare($insertQuery);
                $insertStmt->execute(['producto_id' => $producto_id, 'cantidad' => $cantidad]);

                echo json_encode(['success' => true, 'message' => 'Producto añadido al carrito.']);
            }
        } catch (PDOException $e) {
            echo json_encode(['success' => false, 'error' => $e->getMessage()]);
        }
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lo más populares</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/png" href="../img/LogoTECGO_STORE.png">
    <link rel="stylesheet" href="../Nav/stylee.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>
<body>
<header>
    <div include-html="../Nav/nav.php"></div>
</header>

<main>
    <section class="offers fade-in-up">
        <h2>Lo más popular</h2>
        <div class="offer-container">
            <?php foreach ($productos as $row) { ?>
                <div class="offer">
                    <!-- Usa la imagen específica para cada producto -->
                    <img src="../img/<?php echo htmlspecialchars($row['imagen']); ?>" alt="<?php echo htmlspecialchars($row['nombre']); ?>" style="max-width: 100%; height: auto;" />
                    <div class="buttons">
                        <button class="details-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo htmlspecialchars($row['id']); ?>" aria-expanded="false" aria-controls="collapse<?php echo htmlspecialchars($row['id']); ?>">
                            Detalles
                        </button>
                        <button class="cart-button" data-id="<?php echo htmlspecialchars($row['id']); ?>" data-nombre="<?php echo htmlspecialchars($row['nombre']); ?>" data-precio="<?php echo htmlspecialchars($row['precio']); ?>" aria-label="Agregar al carrito">
                            <img src="../img/carrito.png" alt="Icono de carrito" />
                        </button>
                    </div>
                    <div id="collapse<?php echo htmlspecialchars($row['id']); ?>" class="accordion-collapse collapse">
                        <div class="accordion-body">
                            <p><?php echo htmlspecialchars($row['descripcion']); ?></p>
                            <p>Precio: $<?php echo htmlspecialchars($row['precio']); ?></p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </section>
</main>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="script.js"></script>
<script src="../js/NAV.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.cart-button').forEach(function(button) {
            button.addEventListener('click', function() {
                let id = this.getAttribute('data-id');
                fetch(window.location.href, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ id: id })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        Swal.fire({
                            title: '¡Producto añadido!',
                            text: data.message,
                            icon: 'success',
                            confirmButtonText: 'OK'
                        });
                    } else {
                        Swal.fire({
                            title: '¡Error!',
                            text: data.message,
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    }
                })
                .catch(error => console.error('Error:', error));
            });
        });
    });
</script>

</body>
</html>

<?php
$pdo = null; // Cerrar la conexión
?>

<?php
include '../conexion.php';
$conn = getConnection();

// Manejar solicitud de eliminación
if (isset($_POST['remove_id'])) {
    $remove_id = intval($_POST['remove_id']);
    $delete_query = "DELETE FROM carrito WHERE producto_id = $1";
    $result = pg_query_params($conn, $delete_query, array($remove_id));

    if (!$result) {
        die("Error al eliminar producto: " . pg_last_error($conn));
    }

    // Redirigir para evitar el reenvío del formulario
    header("Location: carrito.php");
    exit();
}

// Manejar solicitud de actualización de cantidad
if (isset($_POST['update_id']) && isset($_POST['cantidad'])) {
    $update_id = intval($_POST['update_id']);
    $cantidad = intval($_POST['cantidad']);

    // Actualizar la cantidad del producto en el carrito
    if ($cantidad > 0) {
        $update_query = "UPDATE carrito SET cantidad = $1 WHERE producto_id = $2";
        $result = pg_query_params($conn, $update_query, array($cantidad, $update_id));
    } else {
        // Si la cantidad es 0 o menor, eliminar el producto del carrito
        $delete_query = "DELETE FROM carrito WHERE producto_id = $1";
        $result = pg_query_params($conn, $delete_query, array($update_id));
    }

    if (!$result) {
        die("Error al actualizar producto: " . pg_last_error($conn));
    }

    // Redirigir para evitar el reenvío del formulario
    header("Location: carrito.php");
    exit();
}

// Consultar los productos del carrito
$result = pg_query($conn, "
    SELECT p.id, p.nombre, p.imagen, p.precio, c.cantidad
    FROM carrito c
    JOIN productos p ON c.producto_id = p.id
");

if (!$result) {
    die("Error en la consulta: " . pg_last_error($conn));
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../Nav/stylee.css">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/png" href="../img/LogoTECGO_STORE.png">
</head>
<body>
    <header>
        <div id="nav-container"></div>
    </header>
    
    <main>
        <section id="carrito" class="carrito fade-in-up">
            <h2>Carrito de Compras</h2>
            <div id="contenedor-carrito" class="contenedor-carrito">
                <ul id="items-carrito" class="items-carrito">
                    <?php
                    $total = 0;
                    while ($row = pg_fetch_assoc($result)):
                        $subtotal = $row['precio'] * $row['cantidad'];
                        $total += $subtotal;
                    ?>
                    <li class="item-carrito">
                        <img src="<?php echo htmlspecialchars($row['imagen']); ?>" alt="<?php echo htmlspecialchars($row['nombre']); ?>">
                        <span><?php echo htmlspecialchars($row['nombre']); ?></span>
                        <span>US$ <?php echo htmlspecialchars($subtotal); ?></span>
                        <form method="post" style="display:inline;">
                            <input type="hidden" name="update_id" value="<?php echo htmlspecialchars($row['id']); ?>">
                            <input type="number" name="cantidad" value="<?php echo htmlspecialchars($row['cantidad']); ?>" min="1">
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </form>
                        <form method="post" style="display:inline;">
                            <input type="hidden" name="remove_id" value="<?php echo htmlspecialchars($row['id']); ?>">
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </li>
                    <?php endwhile; ?>
                </ul>
                <p id="total-carrito">Total: US$ <?php echo $total; ?></p>
            </div>
        </section>

        <div class="subtotal fade-in-up">
            Subtotal de los productos: <span id="subtotal-carrito">US$ <?php echo $total; ?></span>
        </div>
        <button id="boton-pago" class="fade-in-up">Proceder al pago</button>
        <section><br></section>
    </main>

    <script src="../js/NAV.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            fetch('../Nav/nav.html')
                .then(response => response.text())
                .then(data => {
                    document.getElementById('nav-container').innerHTML = data;
                });
        });
    </script>
</body>
</html>

<?php
pg_close($conn);
?>

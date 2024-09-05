<?php
include('../db.php'); // Cambia la conexión a db.php

if (!$pdo) {
    die("Error de conexión a la base de datos");
}

// Manejar la solicitud POST para agregar al carrito
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    if ($data) {
        $producto_id = intval($data['id']);
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

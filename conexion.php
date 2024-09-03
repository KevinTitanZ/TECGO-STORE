<?php
function getConnection() {
    $conn = pg_connect("host=localhost dbname=tienda user=postgres password=21122002");
    if (!$conn) {
        die("Error de conexión: " . pg_last_error());
    }
    return $conn;
}
?>

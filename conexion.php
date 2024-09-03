<?php
function getConnection() {
    $conn = pg_connect("host=localhost dbname=tienda user=postgres password=jhon12345678");
    if (!$conn) {
        die("Error de conexión: " . pg_last_error());
    }
    return $conn;
}
?>

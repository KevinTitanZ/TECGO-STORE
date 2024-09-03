<?php
// Código de cierre de sesión
session_start();
session_unset();
session_destroy();

// Redirigir a la página de inicio de sesión
header("Location: ../Login/login.php");
exit();
?>
<?php
session_start();
session_destroy(); // Cierra la sesión
echo "<script>alert('Sesión cerrada correctamente.'); window.location='login.php';</script>";
?>

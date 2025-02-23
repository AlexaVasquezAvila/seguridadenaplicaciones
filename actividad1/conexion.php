<?php
// Datos de conexión a la base de datos
$servidor = "localhost"; // Servidor (para XAMPP es "localhost")
$usuario = "root"; // Usuario de MySQL (por defecto en XAMPP es "root")
$contraseña = ""; // Contraseña (por defecto en XAMPP está vacía)
$base_de_datos = "seguridad_web"; // Nombre de la base de datos que creaste

// Crear la conexión
$conn = new mysqli($servidor, $usuario, $contraseña, $base_de_datos);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error en la conexión a MySQL: " . $conn->connect_error);
}

// Mensaje opcional (puedes eliminarlo después)
echo "Conexión exitosa a la base de datos.";

?>

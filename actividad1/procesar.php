<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = trim($_POST['nombre']);
    $email = trim($_POST['email']);
    $contraseña = trim($_POST['contraseña']);

    // Validar que los campos no estén vacíos
    if (empty($nombre) || empty($email) || empty($contraseña)) {
        echo "<script>alert('Todos los campos son obligatorios.'); window.location='index.php';</script>";
        exit();
    }

    // Validar que el nombre solo contenga letras y espacios
    if (!preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑ ]*$/", $nombre)) {
        echo "<script>alert('El nombre solo debe contener letras y espacios.'); window.location='index.php';</script>";
        exit();
    }

    // Validar el formato del email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('El formato del correo es inválido.'); window.location='index.php';</script>";
        exit();
    }

    // Validar que la contraseña tenga al menos 6 caracteres
    if (strlen($contraseña) < 6) {
        echo "<script>alert('La contraseña debe tener al menos 6 caracteres.'); window.location='index.php';</script>";
        exit();
    }

    // Encriptar la contraseña
    $contraseña = password_hash($contraseña, PASSWORD_DEFAULT);

    // Insertar en la base de datos
    $sql = "INSERT INTO usuarios (nombre, email, contraseña) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $nombre, $email, $contraseña);

    if ($stmt->execute()) {
        echo "<script>alert('Registro exitoso.'); window.location='login.php';</script>";
    } else {
        echo "<script>alert('Error en el registro: " . $conn->error . "'); window.location='index.php';</script>";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "<script>alert('Acceso denegado.'); window.location='index.php';</script>";
}
?>

<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $nueva_contraseña = password_hash($_POST['contraseña'], PASSWORD_DEFAULT);

    $sql = "UPDATE usuarios SET contraseña=?, token=NULL, token_expira=NULL WHERE email=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $nueva_contraseña, $email);

    if ($stmt->execute()) {
        echo "<script>alert('Contraseña actualizada.'); window.location='login.php';</script>";
    } else {
        echo "<script>alert('Error al actualizar.'); window.location='restablecer.php';</script>";
    }

    $stmt->close();
    $conn->close();
}
?>

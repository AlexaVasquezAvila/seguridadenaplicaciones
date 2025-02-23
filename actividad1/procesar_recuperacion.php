<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    // Verificar si el correo existe
    $sql = "SELECT id FROM usuarios WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $token = bin2hex(random_bytes(50)); // Generar un token aleatorio
        $expira = date("Y-m-d H:i:s", strtotime("+1 hour"));

        // Guardar el token en la base de datos
        $sql = "UPDATE usuarios SET token=?, token_expira=? WHERE email=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $token, $expira, $email);
        $stmt->execute();

        // Simulación de envío de correo (aquí iría el código real para enviar el correo)
        echo "Haz clic en el siguiente enlace para restablecer tu contraseña: ";
        echo "<a href='restablecer.php?token=$token'>Restablecer Contraseña</a>";
    } else {
        echo "<script>alert('Correo no registrado.'); window.location='recuperar.php';</script>";
    }

    $stmt->close();
    $conn->close();
}
?>

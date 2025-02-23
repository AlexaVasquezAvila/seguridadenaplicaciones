<?php
include 'conexion.php';

if (isset($_GET['token'])) {
    $token = $_GET['token'];

    // Verificar si el token es válido
    $sql = "SELECT email FROM usuarios WHERE token=? AND token_expira > NOW()";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($email);
        $stmt->fetch();
    } else {
        echo "<script>alert('Enlace inválido o expirado.'); window.location='login.php';</script>";
        exit();
    }
} else {
    echo "<script>alert('Acceso denegado.'); window.location='login.php';</script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restablecer Contraseña</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Enlace a tu archivo de estilos personalizados -->
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <h2>Restablecer Contraseña</h2>

    <form action="actualizar_contraseña.php" method="POST">
        <input type="hidden" name="email" value="<?php echo $email; ?>">
        <label for="contraseña">Nueva Contraseña:</label>
        <input type="password" name="contraseña" required>
        <button type="submit">Actualizar</button>
    </form>

</body>
</html>

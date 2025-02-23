<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Contraseña</title>
</head>
<body>

    <h2>Recuperar Contraseña</h2>

    <form action="procesar_recuperacion.php" method="POST">
        <label for="email">Ingresa tu correo:</label>
        <input type="email" name="email" required>
        <button type="submit">Enviar enlace</button>
    </form>

    <p><a href="login.php">Volver al inicio de sesión</a></p>

</body>
</html>

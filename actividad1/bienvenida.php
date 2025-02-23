<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    echo "<script>alert('Debes iniciar sesión primero.'); window.location='login.php';</script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body class="d-flex align-items-center justify-content-center vh-100">

    <div class="container text-center">
        <div class="card shadow p-4">
            <h2>Bienvenido, <?php echo $_SESSION["usuario"]; ?> 🎉</h2>
            <p>Has iniciado sesión correctamente.</p>
            <a href="logout.php" class="btn btn-danger">Cerrar sesión</a>
        </div>
    </div>

</body>
</html>

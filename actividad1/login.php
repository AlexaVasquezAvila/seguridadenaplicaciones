<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body class="d-flex align-items-center justify-content-center vh-100 bg-light">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow p-4">
                    <h2 class="text-center">Iniciar Sesión</h2>

                    <form action="validar.php" method="POST">
                        <div class="mb-3">
                            <label for="email" class="form-label">Correo electrónico:</label>
                            <input type="email" name="email" class="form-control" required value="<?php echo isset($_COOKIE['email']) ? $_COOKIE['email'] : ''; ?>">
                        </div>

                        <div class="mb-3">
                            <label for="contraseña" class="form-label">Contraseña:</label>
                            <input type="password" name="contraseña" class="form-control" required minlength="6">
                        </div>

                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" name="recordar" <?php echo isset($_COOKIE['email']) ? 'checked' : ''; ?>>
                            <label class="form-check-label">Recordar sesión</label>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Ingresar</button>
                    </form>

                    <div class="mt-3 text-center">
                        <p>¿No tienes una cuenta? <a href="index.php">Regístrate aquí</a></p>
                        <p>¿Olvidaste tu contraseña? <a href="recuperar.php">Recupérala aquí</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>

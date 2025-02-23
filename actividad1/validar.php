<?php
session_start(); // Iniciar sesión

include 'conexion.php'; // Conectar con la base de datos

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = trim($_POST['email']);
  $contraseña = trim($_POST['contraseña']);

  // Validar que los campos no estén vacíos
  if (empty($email) || empty($contraseña)) {
      echo "<script>alert('Todos los campos son obligatorios.'); window.location='login.php';</script>";
      exit();
  }

  // Validar que el email sea correcto
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      echo "<script>alert('El formato del correo es inválido.'); window.location='login.php';</script>";
      exit();
  }

  // Consultar la base de datos
  $sql = "SELECT id, nombre, contraseña FROM usuarios WHERE email = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $stmt->store_result();
  
  if ($stmt->num_rows > 0) {
      $stmt->bind_result($id, $nombre, $hash_contraseña);
      $stmt->fetch();

      // Verificar la contraseña
      if (password_verify($contraseña, $hash_contraseña)) {
          $_SESSION["usuario"] = $nombre;
          $_SESSION["id_usuario"] = $id;

          // Guardar la cookie si "Recordar sesión" está marcado
          if (isset($_POST['recordar'])) {
              setcookie("email", $email, time() + (86400 * 30), "/"); 
          } else {
              setcookie("email", "", time() - 3600, "/");
          }

          echo "<script>alert('Inicio de sesión exitoso.'); window.location='bienvenida.php';</script>";
      } else {
          echo "<script>alert('Contraseña incorrecta.'); window.location='login.php';</script>";
      }
  } else {
      echo "<script>alert('Correo no registrado.'); window.location='login.php';</script>";
  }

  $stmt->close();
  $conn->close();
} else {
  echo "<script>alert('Acceso denegado.'); window.location='login.php';</script>";
}

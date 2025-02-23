# Sistema de Registro de Usuarios en PHP

## Descripción del Proyecto

Este proyecto es una aplicación web desarrollada en **PHP** y **MySQL**, cuyo objetivo es gestionar el registro, autenticación y recuperación de contraseñas de usuarios. Se han aplicado técnicas de **validación, filtrado de datos y consultas preparadas** para garantizar la seguridad y protección de la base de datos contra ataques de **SQL Injection**.

## Objetivo del Proyecto

Desarrollar una aplicación web que implemente **escapado, validación y filtrado de datos**, asegurando un correcto comportamiento del servidor al procesar la información y protegiendo la base de datos contra ataques malintencionados.

## Estructura del Proyecto

El proyecto está compuesto por los siguientes archivos y carpetas principales:

### **Archivos principales**

- `index.php` → Formulario de **registro de usuarios**.
- `login.php` → Formulario de **inicio de sesión**.
- `procesar.php` → Procesa el **registro de usuarios**.
- `validar.php` → Valida las credenciales en el **inicio de sesión**.
- `recuperar.php` → Genera un **token** para la recuperación de contraseña.
- `restablecer.php` → Permite cambiar la contraseña con un **token válido**.
- `actualizar_contraseña.php` → Procesa el cambio de **contraseña en la base de datos**.
- `conexion.php` → Archivo de **conexión segura** a MySQL.
- `logout.php` → Permite **cerrar la sesión del usuario**.
- `styles.css` → Archivo de **estilos CSS** para mejorar la interfaz de usuario.

### **📂 Base de datos**

La base de datos se creó en **MySQL** y contiene la tabla `usuarios` con los siguientes campos:

- `id` (INT, PRIMARY KEY, AUTO_INCREMENT)
- `nombre` (VARCHAR)
- `email` (VARCHAR, UNIQUE)
- `contraseña` (VARCHAR, encriptada con `password_hash`)
- `token` (VARCHAR, para recuperación de contraseña)
- `token_expira` (DATETIME, fecha de expiración del token)

## **Funcionalidades Implementadas**

### **1️ Creación de Base de Datos y Preparación del Entorno**

Se configuró **XAMPP** para ejecutar Apache y MySQL.  
Se creó la base de datos `usuarios_db` y la tabla `usuarios`.

### **2️ Desarrollo del Formulario de Registro e Inicio de Sesión**

Se implementaron **campos obligatorios** y **tipos de entrada adecuados** para capturar **nombres, correos electrónicos y contraseñas**.  
Se usó **Bootstrap** para mejorar la apariencia del formulario.  
Se validó en el servidor (PHP) que los **campos no estén vacíos** y cumplan con los requisitos.

### **3️ Validaciones de Seguridad en PHP**

Se validan valores de entrada **evitando caracteres especiales** no permitidos.  
 Se **sanitizan los inputs** con `filter_var()` para evitar ataques XSS.  
 Se implementó el uso de **`password_hash()` y `password_verify()`** para proteger las contraseñas.

### **4️ Protección contra SQL Injection**

Se usaron **consultas preparadas (`prepare()` y `bind_param()`)** en todas las consultas SQL.
Se evitó el uso de `query()` con datos sin sanitizar.

### **5️ Recuperación de Contraseñas**

Se implementó la funcionalidad de **recuperación de contraseña** mediante el envío de un token.  
 Se generaron **tokens únicos** con `bin2hex(random_bytes(50))` y fecha de expiración.  
 Se validó la autenticidad del token antes de restablecer la contraseña.

### **6️ Cierre de Sesión y Manejo de Cookies**

Se implementó el **cierre de sesión seguro (`session_destroy()`).**  
 Se agregó la opción de **“Recordar usuario”** mediante cookies.

## Instalación y Uso

### **1️ Requisitos Previos**

Tener instalado **XAMPP** o cualquier servidor Apache con PHP y MySQL.  
Clonar este repositorio o descargar los archivos manualmente.

### **2️ Configuración de la Base de Datos**

1️ Abrir `phpMyAdmin` y crear una base de datos llamada `usuarios_db`.  
2️ Ejecutar el siguiente SQL en la pestaña **SQL**:

```sql
CREATE TABLE usuarios (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(50),
    email VARCHAR(100) UNIQUE,
    contraseña VARCHAR(255),
    token VARCHAR(255) NULL,
    token_expira DATETIME NULL
);
```

### **3️⃣ Configuración del Archivo de Conexión**

🔹 Editar `conexion.php` y modificar con los datos correctos de la base de datos:

```php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "usuarios_db";
$conn = new mysqli($servername, $username, $password, $dbname);
```

### **4️⃣ Ejecutar el Proyecto**

🔹 Iniciar Apache y MySQL en **XAMPP**.  
🔹 Abrir el navegador y acceder a:

```
http://localhost/registro_usuarios/index.php
```

## Subida del Proyecto a GitHub

Para subir este proyecto a un repositorio público en **GitHub**, sigue estos pasos:

```bash
git init
git add .
git commit -m "Primera versión del sistema de registro de usuarios"
git branch -M main
git remote add origin https://github.com/usuario/nombre-del-repo.git
git push -u origin main
```

🔹 **Importante:** Agregar un archivo **`.gitignore`** para excluir `conexion.php` y evitar exponer datos sensibles.

```plaintext
conexion.php
.env
```

## Buenas Prácticas Aplicadas

✔️ Uso de **Programación Orientada a Objetos (POO)** en la conexión a la base de datos.  
✔️ **Código modular y reutilizable** con funciones organizadas.  
✔️ **Estructura clara y ordenada** en carpetas y archivos.  
✔️ **Diseño responsivo** con Bootstrap para mejorar la experiencia del usuario.

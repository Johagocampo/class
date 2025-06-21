<?php

session_start();

if (!isset($_SESSION['nombre'])) {
    
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h1>Bienvenido, <?php echo $_SESSION['nombre']; ?>!</h1>
    <p>Este es tu panel de usuario.</p>

    <a href="cerrar.php">Cerrar sesión</a>
    

</body>
</html>

<?php

session_start();
if (!isset($_SESSION['nombre'])) {
    header("Location: Login.html");
    exit();
}

include('conexion.php');

$sql = "SELECT * FROM usuarios"; 
$result = $conexion->query($sql);


if ($result->num_rows > 0) {
    
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>nombre</th>
                <th>email</th>
                <th>password</th>
                <th>rol</th>
            </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["id"] . "</td>
                <td>" . $row["nombre"] . "</td>
                <td>" . $row["email"] . "</td>
                <td>" . $row["password"] . "</td>
                <td>" . $row["rol"] . "</td>
                </tr>";
    }
    echo "</table>";
} else {
    echo "No se encontraron registros.";
}


$conexion->close();
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin
    </title>
</head>

<body>
    <h1>Bienvenido, <?php echo $_SESSION['nombre']; ?>!</h1>
    <p>Este es tu panel de Admin.</p>

    <form action="actualizar.php" method="post">
        <p>ingrese el id de la fila:</p>
        <input type="number" name="id" id="id" placeholder="Id"><br>
        <p>ingrese el nombre nuevo:</p>
        <input type="text" name="nombre" id="nombre" placeholder="nombre"><br>
        <p>ingrese el correo nuevo:</p>
        <input type="email" name="correo" id="correo" placeholder="correo"><br>
        <p>ingrese la contraseña nueva:</p>
        <input type="password" name="contraseña" id="contraseña" placeholder="contraseña"><br>
        <p>ingrese Rol nuevo:</p>
        <input type="text" name="rol" id="rol" placeholder="rol"><br>
        
        <br>
        <button type="submit">Actualizar</button>
        <br>

    </form>

    <a href="cerrar.php">Cerrar sesión</a>
</body>
</html>
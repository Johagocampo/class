
<?php

include('conexion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombres = $_POST['nombre'];
    $correo = $_POST['email'];
    $contrasena = password_hash($_POST['password'], PASSWORD_BCRYPT); // Encriptar contraseña
    $Rol = "Usuario";
    
    $sql = "INSERT INTO usuarios (nombre, email, password,rol) VALUES (?, ?, ?, ?)";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("ssss",$nombres, $correo, $contrasena, $Rol );


    if ($stmt->execute()) {
        header("Location: login.html");
    } else {
        echo "Error al registrar: " . $stmt->error;
    }

    $stmt->close();

}

$conexion->close();

?>


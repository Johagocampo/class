<?php
include('conexion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ID = $_POST['id'];
    
    // Obtener los datos actuales del usuario primero
    $sql_select = "SELECT nombre, email, password, rol FROM usuarios WHERE id = ?";
    $stmt_select = $conexion->prepare($sql_select);
    $stmt_select->bind_param("i", $ID);
    $stmt_select->execute();
    $result = $stmt_select->get_result();
    $usuario_actual = $result->fetch_assoc();
    $stmt_select->close();
    
    // Determinar qué campos actualizar
    $nombres = !empty($_POST['nombre']) ? $_POST['nombre'] : $usuario_actual['nombre'];
    $correo = !empty($_POST['correo']) ? $_POST['correo'] : $usuario_actual['email'];
    $contrasena = !empty($_POST['contraseña']) ? password_hash($_POST['contraseña'], PASSWORD_BCRYPT) : $usuario_actual['password'];
    $Rol = !empty($_POST['rol']) ? $_POST['rol'] : $usuario_actual['rol'];
    
    // Preparar la consulta de actualización
    $sql = "UPDATE usuarios SET nombre = ?, email = ?, password = ?, rol = ? WHERE id = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("ssssi", $nombres, $correo, $contrasena, $Rol, $ID);

    if ($stmt->execute()) {
        header("Location: dashAdmin.php");
        exit();
    } else {
        echo "Error al actualizar: " . $stmt->error;
    }

    $stmt->close();
}

$conexion->close();
?>
<?php

session_start();

include('conexion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Preparar la consulta SQL con un marcador de posición
    $sql = "SELECT * FROM usuarios WHERE email = ?";

    $stmt = $conexion->prepare($sql);
    
    $stmt->bind_param('s', $email);  // 's' significa que es un string

    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        $nombre_usuario = $user['nombre'];
        $Rol = $user['rol'];
        $contra =  $user['password'];

       
        if ((password_verify($password, $contra)) && $Rol == "Usuario" ) {
            
            $_SESSION['nombre'] = $nombre_usuario;
            
            header("Location: dashboard.php");

        } elseif ((password_verify($passwor,$contra)) && $Rol == "Admin" ) {

            $_SESSION['nombre'] = $nombre_usuario;
            
            header("Location: dashAdmin.php");
            
        }else {
            header("Location: login.html?error=1");
            exit();
        
        }
    } else {
        header("Location: login.html?error=1");
        exit();
    }


    $stmt->close();
}


$conexion->close();
    
?>

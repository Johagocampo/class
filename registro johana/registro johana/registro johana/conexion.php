<?php

session_start();

$servidor = "localhost:3306"; 
$usuario = "root"; 
$contrasena = "";
$base_datos = "registro"; 

// Crear la conexión 
$conexion = new mysqli($servidor, $usuario, $contrasena, $base_datos);

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
} else {
    echo "Conexión exitosa a la base de datos.<br>";
}

?>
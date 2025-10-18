<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
include(__DIR__ . '/../conexion.php');

// Verificar si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Sanitizar y recibir los datos
    $cedula = mysqli_real_escape_string($conn, $_POST['documento']);
    $nombre = mysqli_real_escape_string($conn, $_POST['nombre']);
    $telefono = mysqli_real_escape_string($conn, $_POST['telefono']);
    $email = mysqli_real_escape_string($conn, $_POST['correo']);
    $ciudad = mysqli_real_escape_string($conn, $_POST['ciudad']);

    // Validar campos obligatorios
    if (empty($cedula) || empty($nombre) || empty($email)) {
        echo "<script>alert('Por favor completa todos los campos obligatorios.'); window.history.back();</script>";
        exit;
    }

    // Validar formato de correo
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('El formato del correo no es válido.'); window.history.back();</script>";
        exit;
    }

    // Validar si el cliente ya existe
    $sql_check = "SELECT * FROM clientes WHERE documento = '$cedula'";
    $resultado = mysqli_query($conn, $sql_check);

    if (mysqli_num_rows($resultado) > 0) {
        echo "<script>alert('Ya existe un cliente con esta cédula.'); window.location.href='nuevo_cliente.php';</script>";
        exit;
    }

    // Insertar en la base de datos
    $sql = "INSERT INTO clientes (nombre, documento, telefono, email, ciudad_origen) 
            VALUES ('$nombre','$cedula','$telefono', '$email', '$ciudad')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Cliente registrado exitosamente.'); window.location.href='../index.html';</script>";
    } else {
        echo "<script>alert('Error al registrar el cliente: " . mysqli_error($conn) . "'); window.history.back();</script>";
    }

    mysqli_close($conn);
} else {
    echo "<script>alert('Método no permitido.'); window.location.href='../index.html';</script>";
}
?>
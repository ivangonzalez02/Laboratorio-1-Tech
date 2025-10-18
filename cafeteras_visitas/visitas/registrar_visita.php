<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include(__DIR__ . '/../conexion.php');

// Capturar los datos del formulario
$id_cliente = $_POST['id_cliente'];
$id_finca = $_POST['id_finca'];
$personas = $_POST['personas'];
$tipo_tour = $_POST['tipo_tour'];
$fecha = $_POST['fecha'];

// Depuración temporal
/*
echo "<pre>";
print_r($_POST);
echo "</pre>";
exit;
*/

// Consulta para insertar
$sql = "INSERT INTO visitas (id_cliente, id_finca, personas, tipo_tour, fecha_visita)
        VALUES ('$id_cliente', '$id_finca', '$personas', '$tipo_tour', '$fecha')";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Visita registrada exitosamente.'); window.location.href='../index.html';</script>";
} else {
    echo "<script>alert('Error al registrar Visita: " . mysqli_error($conn) . "'); window.history.back();</script>";
}

$conn->close();
?>

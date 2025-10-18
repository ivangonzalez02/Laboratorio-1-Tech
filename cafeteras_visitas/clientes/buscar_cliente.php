<?php
include('../conexion.php');

$q = isset($_GET['q']) ? $conn->real_escape_string($_GET['q']) : '';

$sql = "SELECT id_cliente, nombre, documento, telefono, email 
        FROM clientes 
        WHERE nombre LIKE '%$q%' OR documento LIKE '%$q%' 
        LIMIT 10";

$result = $conn->query($sql);

if (!$result) {
    http_response_code(500);
    echo "Error en la consulta SQL: " . $conn->error;
    exit;
}

if ($result->num_rows > 0) {
    echo "<table border='1' width='100%'>";
    echo "<tr><th>Nombre</th><th>Documento</th><th>Teléfono</th><th>Acción</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['nombre']}</td>
                <td>{$row['documento']}</td>
                <td>{$row['telefono']}</td>
                <td><button onclick=\"seleccionarCliente('{$row['id_cliente']}', '{$row['nombre']}')\">Seleccionar</button></td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No se encontraron resultados.";
}
?>


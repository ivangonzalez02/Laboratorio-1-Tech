<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('../conexion.php');

if (!$conn) {
    http_response_code(500);
    echo "❌ Error de conexión a la base de datos.";
    exit;
}

$q = isset($_GET['q']) ? mysqli_real_escape_string($conn, $_GET['q']) : '';

if (empty($q)) {
    echo "<p>Escribe para buscar una finca...</p>";
    exit;
}

$sql = "SELECT id_finca, nombre, ubicacion
        FROM fincas 
        WHERE nombre LIKE '%$q%' OR ubicacion LIKE '%$q%' 
        LIMIT 10";

$resultado = mysqli_query($conn, $sql);

if (!$resultado) {
    http_response_code(500);
    echo "❌ Error en la consulta SQL: " . mysqli_error($conn);
    exit;
}

if (mysqli_num_rows($resultado) > 0) {
    echo "<table class='tabla-resultados'>";
    echo "<tr><th>ID</th><th>Nombre</th><th>Municipio</th><th>Seleccionar</th></tr>";
    while ($fila = mysqli_fetch_assoc($resultado)) {
        echo "<tr>
                <td>{$fila['id_finca']}</td>
                <td>{$fila['nombre']}</td>
                <td>{$fila['ubicacion']}</td>
                <td><button type='button' onclick=\"seleccionarFinca('{$fila['id_finca']}', '{$fila['nombre']}')\">Seleccionar</button></td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "<p>No se encontraron resultados.</p>";
}

mysqli_close($conn);
?>

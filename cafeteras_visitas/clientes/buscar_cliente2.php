<?php
// 🔥 Forzar que se muestren TODOS los errores
error_reporting(E_ALL);
ini_set('display_errors', 1);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// 🚨 Probar conexión manual antes de continuar
echo "<pre>Iniciando depuración buscar_cliente.php...</pre>";

if (!file_exists(__DIR__ . '/../conexion.php')) {
    die("<strong>Error:</strong> No se encontró el archivo de conexión en " . __DIR__ . '/../conexion.php');
}

include(__DIR__ . '/../conexion.php');

if (!isset($conn) || !$conn) {
    die("<strong>Error:</strong> Falló la conexión a la base de datos: " . mysqli_connect_error());
}

echo "<pre>✅ Conexión exitosa a la base de datos.</pre>";

// 🕵️‍♂️ Validar parámetro q
if (!isset($_GET['q'])) {
    die("<strong>Error:</strong> No se recibió el parámetro 'q'.");
}

$q = $_GET['q'];
echo "<pre>Buscando clientes que coincidan con: $q</pre>";

// 🧱 Preparar la consulta
$sql = "SELECT id_cliente, nombre, documento, telefono, email 
        FROM clientes 
        WHERE nombre LIKE '%$q%' OR documento LIKE '%$q%'";

echo "<pre>Consulta generada: $sql</pre>";

$result = mysqli_query($conn, $sql);

if (!$result) {
    die("<strong>Error SQL:</strong> " . mysqli_error($conn));
}

// 🧾 Mostrar resultados
if (mysqli_num_rows($result) > 0) {
    echo "<table border='1' style='width:100%; border-collapse:collapse'>";
    echo "<tr><th>ID</th><th>Nombre</th><th>Documento</th><th>Teléfono</th><th>Email</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        foreach ($row as $value) echo "<td>$value</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<p>No se encontraron clientes.</p>";
}

mysqli_close($conn);
echo "<pre>✅ Proceso finalizado correctamente.</pre>";
?>

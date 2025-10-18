<?php
error_reporting(E_ALL); ini_set('display_errors', 1);
include(__DIR__ . '/../conexion.php');

$q = isset($_GET['q']) ? $conn->real_escape_string($_GET['q']) : '';

$sql = "SELECT id_finca, nombre_finca, municipio, departamento
        FROM fincas
        WHERE nombre_finca LIKE '%$q%' OR municipio LIKE '%$q%'
        LIMIT 20";

$res = $conn->query($sql);
if (!$res) { http_response_code(500); echo "SQL error: ".$conn->error; exit; }

if ($res->num_rows > 0) {
  echo "<table class='tabla-resultados' style='width:100%; border-collapse:collapse;'>";
  echo "<tr><th>Nombre</th><th>Municipio</th><th>Departamento</th><th>Acción</th></tr>";
  while ($r = $res->fetch_assoc()) {
    $safeName = htmlspecialchars($r['nombre_finca'], ENT_QUOTES, 'UTF-8');
    echo "<tr>
            <td>{$safeName}</td>
            <td>{$r['municipio']}</td>
            <td>{$r['departamento']}</td>
            <td><button type='button' onclick=\"seleccionarFinca('{$r['id_finca']}','{$safeName}')\">Seleccionar</button></td>
          </tr>";
  }
  echo "</table>";
} else {
  echo "<p>No se encontraron fincas.</p>";
}
?>


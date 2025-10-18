<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include(__DIR__ . '/../conexion.php'); // Asegúrate de la ruta correcta

// Consulta de visitas con nombres de cliente y finca
$sql = "SELECT 
            v.id_visita, 
            c.nombre AS cliente, 
            f.nombre AS finca, 
            v.personas, 
            v.tipo_tour, 
            v.fecha_visita
        FROM visitas v
        JOIN clientes c ON v.id_cliente = c.id_cliente
        JOIN fincas f ON v.id_finca = f.id_finca
        ORDER BY v.fecha_visita DESC";

$resultado = mysqli_query($conn, $sql);

if (!$resultado) {
    die("Error en la consulta SQL: " . mysqli_error($conn));
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Visitas - Fincas Cafeteras</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <h1>Consultar Visitas Turísticas</h1>
    </header>

    <nav>
        <ul>
            <li>
                <a href="#">Nuevo</a>
                <ul>
                    <li><a href="../clientes/nuevo_cliente.php">Nuevo Cliente</a></li>
                    <li><a href="nueva_visita.php">Nueva Visita</a></li>
                </ul>
            </li>
            <li>
                <a href="#">Consultas</a>
                <ul>
                    <li><a href="../consultas/consultar_clientes.php">Consultar Clientes</a></li>
                    <li><a href="consultar_visitas.php">Consultar Visitas</a></li>
                </ul>
            </li>
            <li><a href="../index.html">Inicio</a></li>
        </ul>
    </nav>

    <section>
        <h2>Lista de Visitas</h2>
        <table class="tabla-datos">
            <thead>
                <tr>
                    <th>ID Visita</th>
                    <th>Cliente</th>
                    <th>Finca</th>
                    <th>Personas</th>
                    <th>Tipo de Tour</th>
                    <th>Fecha Visita</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($resultado)) : ?>
                    <tr>
                        <td><?php echo $row['id_visita']; ?></td>
                        <td><?php echo htmlspecialchars($row['cliente']); ?></td>
                        <td><?php echo htmlspecialchars($row['finca']); ?></td>
                        <td><?php echo $row['personas']; ?></td>
                        <td><?php echo htmlspecialchars($row['tipo_tour']); ?></td>
                        <td><?php echo $row['fecha_visita']; ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </section>

    <footer>
        &copy; 2025 Sistema de Visitas - Proyecto Fincas Cafeteras
    </footer>
</body>
</html>

<?php
mysqli_close($conn);
?>


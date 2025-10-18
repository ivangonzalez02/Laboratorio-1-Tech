<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include(__DIR__ . '/../conexion.php'); // ruta correcta según tu estructura

// Consultar todos los clientes
$query = "SELECT * FROM clientes ORDER BY id_cliente DESC";
$resultado = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Consultar Clientes - Fincas Cafeteras</title>
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>
  <header>
    <h1>Registro de Visitas Turísticas a Fincas Cafeteras</h1>
  </header>

  <nav>
    <ul>
      <li><a href="../index.html">Inicio</a></li>
      <li>
        <a href="#">Nuevo</a>
        <ul>
          <li><a href="../clientes/nuevo_cliente.php">Nuevo Cliente</a></li>
          <li><a href="../visitas/nueva_visita.php">Nueva Visita</a></li>
        </ul>
      </li>
      <li>
        <a href="#">Consultas</a>
        <ul>
          <li><a href="consultar_clientes.php">Consultar Clientes</a></li>
          <li><a href="consultar_visitas.php">Consultar Visitas</a></li>
        </ul>
      </li>
    </ul>
  </nav>

  <section>
    <h2>Listado de Clientes</h2>

    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Documento</th>
          <th>Correo</th>
          <th>Teléfono</th>
          <th>Ciudad</th>
        </tr>
      </thead>
      <tbody>
        <?php if(mysqli_num_rows($resultado) > 0): ?>
          <?php while($fila = mysqli_fetch_assoc($resultado)): ?>
            <tr>
              <td><?= $fila['id_cliente'] ?></td>
              <td><?= htmlspecialchars($fila['nombre']) ?></td>
              <td><?= htmlspecialchars($fila['documento']) ?></td>
              <td><?= htmlspecialchars($fila['email']) ?></td>
              <td><?= htmlspecialchars($fila['telefono']) ?></td>
              <td><?= htmlspecialchars($fila['ciudad_origen']) ?></td>
            </tr>
          <?php endwhile; ?>
        <?php else: ?>
          <tr><td colspan="6">No hay clientes registrados.</td></tr>
        <?php endif; ?>
      </tbody>
    </table>
  </section>

  <footer style="text-align:center; padding:15px; color:#444;">
    &copy; 2025 Sistema de Visitas - Proyecto Fincas Cafeteras
  </footer>
</body>
</html>


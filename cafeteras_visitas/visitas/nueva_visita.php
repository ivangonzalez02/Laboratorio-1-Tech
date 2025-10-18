<?php include(__DIR__ . '/../conexion.php'); ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nueva Visita - Fincas Cafeteras</title>
  <link rel="stylesheet" href="../css/style.css">
  <script src="../js/modal.js" defer></script>
</head>
<body>
  <header>
    <h1>Registro de Visitas Turísticas a Fincas Cafeteras</h1>
  </header>

  <nav>
    <!-- menú (igual que el resto) -->
    <ul>
      <li><a href="../index.html">Inicio</a></li>
      <li><a href="#">Nuevo</a>
        <ul>
          <li><a href="../clientes/nuevo_cliente.php">Nuevo Cliente</a></li>
          <li><a href="nueva_visita.php">Nueva Visita</a></li>
        </ul>
      </li>
      <li><a href="#">Consultas
        <ul>
          <li><a href="../consultas/consultar_clientes.php">Consultar Clientes</a></li>
          <li><a href="../consultas/consultar_visitas.php">Consultar Visitas</a></li>
        </ul>
      </a></li>
    </ul>
  </nav>

  <section>
    <h2>Registrar Nueva Visita</h2>

    <form action="registrar_visita.php" method="POST">

      <!-- CLIENTE (hidden id + visible text) -->
      <label for="cliente">Cliente:</label>
      <div class="busqueda-cliente">
        <input type="hidden" id="id_cliente" name="id_cliente" required>
        <input type="text" id="nombre_cliente" placeholder="Seleccione un cliente" readonly required>
        <button type="button" id="btnBuscarCliente">Buscar Cliente</button>
      </div>

      <!-- FINCA (hidden id + visible text) -->
      <label for="finca">Finca:</label>
      <div class="busqueda-finca">
        <input type="hidden" id="id_finca" name="id_finca" required>
        <input type="text" id="nombre_finca" placeholder="Seleccione una finca" readonly required>
        <button type="button" id="btnBuscarFinca">Buscar Finca</button>
      </div>

      <!-- Personas -->
      <label for="personas">Número de personas:</label>
      <input type="number" id="personas" name="personas" min="1" max="50" required>

      <!-- Tipo de tour -->
      <label for="tipo_tour">Tipo de tour:</label>
      <select id="tipo_tour" name="tipo_tour" required>
        <option value="">Seleccione...</option>
        <option value="Recorrido Cafetero">Recorrido Cafetero</option>
        <option value="Tour Gastronómico">Tour Gastronómico</option>
        <option value="Experiencia Completa">Experiencia Completa</option>
      </select>

      <!-- Fecha -->
      <label for="fecha">Fecha de la visita:</label>
      <input type="date" id="fecha" name="fecha" required>

      <input type="submit" value="Guardar Visita">
    </form>
  </section>

  <!-- Modal Cliente -->
  <div id="modalCliente" class="modal" aria-hidden="true">
    <div class="modal-contenido">
      <button class="cerrar" id="cerrarCliente">&times;</button>
      <h3>Buscar Cliente</h3>
      <input type="text" id="buscarClienteInput" placeholder="Buscar por nombre o cédula...">
      <div id="resultadosCliente"></div>
    </div>
  </div>

  <!-- Modal Finca -->
  <div id="modalFinca" class="modal" aria-hidden="true">
    <div class="modal-contenido">
      <button class="cerrar" id="cerrarFinca">&times;</button>
      <h3>Buscar Finca</h3>
      <input type="text" id="buscarFincaInput" placeholder="Buscar por nombre...">
      <div id="resultadosFinca"></div>
    </div>
  </div>

  <footer>
    &copy; 2025 Sistema de Visitas - Proyecto Fincas Cafeteras
  </footer>
</body>
</html>

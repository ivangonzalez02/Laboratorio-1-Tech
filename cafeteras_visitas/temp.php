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
          <li><a href="../consultas/consultar_visitas.php">Consultar Visitas</a></li>
        </ul>
      </li>
      <li><a href="../index.html">Inicio</a></li>
    </ul>
  </nav>

  <section>
    <h2>Registrar Nueva Visita</h2>

    <form action="registrar_visita.php" method="POST">
      <label for="cliente">Cliente:</label>
      <div class="busqueda-cliente">
        <input type="text" id="id_cliente" name="id_cliente" placeholder="Seleccione un cliente" readonly required>
        <button type="button" onclick="abrirModal()">Buscar Cliente</button>
      </div>

      <label for="finca">Finca:</label>
      <input type="text" id="finca" name="finca" placeholder="Ej: Finca La Esperanza" required>

      <label for="personas">Número de personas:</label>
      <input type="number" id="personas" name="personas" min="1" max="50" required>

      <label for="tipo_tour">Tipo de tour:</label>
      <select id="tipo_tour" name="tipo_tour" required>
        <option value="">Seleccione...</option>
        <option value="Recorrido Cafetero">Recorrido Cafetero</option>
        <option value="Tour Gastronómico">Tour Gastronómico</option>
        <option value="Experiencia Completa">Experiencia Completa</option>
      </select>

      <label for="fecha">Fecha de la visita:</label>
      <input type="date" id="fecha" name="fecha" required>

      <input type="submit" value="Guardar Visita">
    </form>
  </section>

  <!-- 🔍 Modal de búsqueda de clientes -->
  <div id="modalCliente" class="modal">
    <div class="modal-contenido">
      <span class="cerrar" onclick="cerrarModal()">&times;</span>
      <h3>Buscar Cliente</h3>

      <input type="text" id="buscar" placeholder="Buscar por nombre o cédula..." onkeyup="buscarCliente()">

      <div id="resultados"></div>
    </div>
  </div>

  <footer>
    &copy; 2025 Sistema de Visitas - Proyecto Fincas Cafeteras
  </footer>
</body>
</html>
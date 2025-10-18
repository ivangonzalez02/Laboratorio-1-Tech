<?php
// Conexión a la base de datos
include('../conexion.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nuevo Cliente - Fincas Cafeteras</title>
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
          <li><a href="nuevo_cliente.php">Nuevo Cliente</a></li>
          <li><a href="../visitas/nueva_visita.php">Nueva Visita</a></li>
        </ul>
      </li>
      <li>
        <a href="#">Consultas</a>
        <ul>
          <li><a href="../consultas/consultar_clientes.php">Consultar Clientes</a></li>
          <li><a href="../consultas/consultar_visitas.php">Consultar Visitas</a></li>
        </ul>
      </li>
    </ul>
  </nav>

  <section>
    <h2>Registrar Nuevo Cliente</h2>

    <form action="registrar_cliente.php" method="POST">
      <label for="nombre">Nombre completo:</label>
      <input type="text" id="nombre" name="nombre" placeholder="Ej: Juan Pérez" required minlength="3" maxlength="100">

      <label for="documento">Documento de identidad:</label>
      <input type="text" id="documento" name="documento" placeholder="Ej: 1234567890" required pattern="[0-9]{5,15}" title="Solo números (5 a 15 dígitos)">

      <label for="correo">Correo electrónico:</label>
      <input type="email" id="correo" name="correo" placeholder="Ej: juanperez@mail.com" required>

      <label for="telefono">Teléfono:</label>
      <input type="tel" id="telefono" name="telefono" placeholder="Ej: 3101234567" pattern="[0-9]{7,10}" title="Número entre 7 y 10 dígitos" required>

      <label for="ciudad">Ciudad:</label>
      <input type="text" id="ciudad" name="ciudad" placeholder="Ej: Manizales" required maxlength="50">

      <input type="submit" value="Guardar Cliente">
    </form>
  </section>

  <footer style="text-align:center; padding:15px; color:#444;">
    &copy; 2025 Sistema de Visitas - Proyecto Fincas Cafeteras
  </footer>
</body>
</html>

document.addEventListener('DOMContentLoaded', () => {
  // referencias cliente
  const modalCliente = document.getElementById('modalCliente');
  const btnBuscarCliente = document.getElementById('btnBuscarCliente');
  const cerrarCliente = document.getElementById('cerrarCliente');
  const inputBuscarCliente = document.getElementById('buscarClienteInput');
  const resultadosCliente = document.getElementById('resultadosCliente');

  // referencias finca
  const modalFinca = document.getElementById('modalFinca');
  const btnBuscarFinca = document.getElementById('btnBuscarFinca');
  const cerrarFinca = document.getElementById('cerrarFinca');
  const inputBuscarFinca = document.getElementById('buscarFincaInput');
  const resultadosFinca = document.getElementById('resultadosFinca');

  // abrir/cerrar cliente
  if (btnBuscarCliente) {
    btnBuscarCliente.addEventListener('click', () => {
      modalCliente.style.display = 'block';
      inputBuscarCliente.focus();
    });
  }
  if (cerrarCliente) cerrarCliente.addEventListener('click', () => modalCliente.style.display = 'none');

  // abrir/cerrar finca
  if (btnBuscarFinca) {
    btnBuscarFinca.addEventListener('click', () => {
      modalFinca.style.display = 'block';
      inputBuscarFinca.focus();
    });
  }
  if (cerrarFinca) cerrarFinca.addEventListener('click', () => modalFinca.style.display = 'none');

  // cerrar al click fuera
  window.addEventListener('click', (e) => {
    if (e.target === modalCliente) modalCliente.style.display = 'none';
    if (e.target === modalFinca) modalFinca.style.display = 'none';
  });

  // función para seleccionar cliente desde la tabla generada por PHP
  window.seleccionarCliente = function(id, nombre) {
    const idInput = document.getElementById('id_cliente');
    const nombreInput = document.getElementById('nombre_cliente');
    if (idInput) idInput.value = id;
    if (nombreInput) nombreInput.value = nombre;
    modalCliente.style.display = 'none';
  };

  // función para seleccionar finca desde la tabla generada por PHP
  window.seleccionarFinca = function(id, nombre) {
    const idInput = document.getElementById('id_finca');
    const nombreInput = document.getElementById('nombre_finca');
    if (idInput) idInput.value = id;
    if (nombreInput) nombreInput.value = nombre;
    modalFinca.style.display = 'none';
  };

  // BUSCAR CLIENTE (fetch hacia clientes/buscar_cliente.php)
  if (inputBuscarCliente) {
    inputBuscarCliente.addEventListener('keyup', () => {
      const q = inputBuscarCliente.value.trim();
      if (q.length < 2) {
        resultadosCliente.innerHTML = '';
        return;
      }
      fetch(`../clientes/buscar_cliente.php?q=${encodeURIComponent(q)}`)
        .then(r => {
          if (!r.ok) throw new Error(`HTTP ${r.status}`);
          return r.text();
        })
        .then(html => resultadosCliente.innerHTML = html)
        .catch(err => {
          console.error('buscarCliente error:', err);
          resultadosCliente.innerHTML = `<p style="color:red;">Error: ${err.message}</p>`;
        });
    });
  }

  // BUSCAR FINCA (fetch hacia fincas/buscar_finca.php)
  if (inputBuscarFinca) {
    inputBuscarFinca.addEventListener('keyup', () => {
      const q = inputBuscarFinca.value.trim();
      if (q.length < 2) {
        resultadosFinca.innerHTML = '';
        return;
      }
      fetch(`../fincas/buscar_finca.php?q=${encodeURIComponent(q)}`)
        .then(r => {
          if (!r.ok) throw new Error(`HTTP ${r.status}`);
          return r.text();
        })
        .then(html => resultadosFinca.innerHTML = html)
        .catch(err => {
          console.error('buscarFinca error:', err);
          resultadosFinca.innerHTML = `<p style="color:red;">Error: ${err.message}</p>`;
        });
    });
  }
});

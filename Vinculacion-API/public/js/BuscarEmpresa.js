document.getElementById('nombre-empresa').addEventListener('input', function () {
  const query = this.value;

  if (query) {
      fetch(`/buscar-empresas?nombre=${encodeURIComponent(query)}`)
          .then(response => response.json())
          .then(data => {
              const dataList = document.getElementById('lista-empresas');
              dataList.innerHTML = ''; // Limpia las opciones previas del datalist

              // Crea las opciones del datalist y guarda los datos adicionales
              data.forEach(empresa => {
                  const option = document.createElement('option');
                  option.value = empresa.empresa; // Muestra el nombre de la empresa
                  option.dataset.contacto = empresa.contacto_nombre; // Guarda el nombre del contacto
                  option.dataset.cargo = empresa.puesto; // Guarda el cargo del contacto
                  dataList.appendChild(option);
              });
          })
          .catch(error => console.error('Error al buscar empresas:', error));
  }
});

// Al seleccionar una opción, carga automáticamente los datos del contacto y cargo
document.getElementById('nombre-empresa').addEventListener('change', function () {
  const query = this.value;
  const options = document.querySelectorAll('#lista-empresas option');

  // Busca la opción seleccionada en el datalist
  options.forEach(option => {
      if (option.value === query) {
          document.getElementById('nombre-dirigido').value = option.dataset.contacto || '';
          document.getElementById('cargo-dirigido').value = option.dataset.cargo || '';
      }
  });
});

//Funciona para el buscador de Archivo Visitas
// Selecciona el elemento de entrada de texto con el id 'searchInput' y agrega un evento 'input'
document.getElementById('searchInput').addEventListener('input', function (e) {
    const query = e.target.value.toLowerCase();
    const rows = document.querySelectorAll('tbody tr');
    rows.forEach(row => {
        const cells = row.querySelectorAll('td');
        const match = Array.from(cells).some(cell =>
            cell.textContent.toLowerCase().includes(query)
        );
        row.style.display = match ? '' : 'none';
    });
});


// Funciona para el buscador de Información Empresas
// Función para manejar la búsqueda
function buscarItems() {
    const input = document.getElementById('searchInput').value.toLowerCase(); // Obtener el texto del buscador
    const items = document.querySelectorAll('.relative ul li'); // Seleccionar todos los elementos de la lista
  
    items.forEach(item => {
      const text = item.textContent.toLowerCase(); // Obtener el texto del elemento
      if (text.includes(input)) {
        item.style.display = ''; // Mostrar el elemento si coincide
      } else {
        item.style.display = 'none'; // Ocultar el elemento si no coincide
      }
    });
  }
  
  // Evento para activar la búsqueda mientras se escribe
  document.getElementById('searchInput').addEventListener('input', buscarItems);
  


  // Manejo del filtrado dinámico
document.getElementById("searchInput").addEventListener("input", function () {
    const input = this.value.toLowerCase();
    const items = document.querySelectorAll("empresaList");
  
    items.forEach((item) => {
      const text = item.textContent.toLowerCase();
      item.style.display = text.includes(input) ? "" : "none";
    });
  });
  
  // Manejo del clic en una empresa
  document.querySelectorAll("empresaList").forEach((item) => {
    item.addEventListener("click", function () {
      const nombre = this.getAttribute("data-nombre");
      const direccion = this.getAttribute("data-direccion");
      const telefono = this.getAttribute("data-telefono");
      const email = this.getAttribute("data-email");
      const giro = this.getAttribute("data-giro");
  
      // Actualizar el contenido del cuadro de detalles
        document.getElementById("empresaNombre").textContent = nombre;
        document.getElementById("empresaDireccion").textContent = `Dirección: ${direccion}`;
        document.getElementById("empresaTelefono").textContent = `Teléfono: ${telefono}`;
        document.getElementById("empresaEmail").textContent = `Email: ${email}`;
        document.getElementById("empresaGiro").textContent = `Giro: ${giro}`;
  
      // Mostrar el botón con un enlace dinámico
      const button = document.getElementById("empresaButton");
      button.classList.remove("hidden");
      button.textContent = `Más detalles sobre ${nombre}`;
    });
  });  
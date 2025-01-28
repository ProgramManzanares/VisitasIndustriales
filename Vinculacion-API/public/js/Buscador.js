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
  
// Manejo del clic en una empresa
document.querySelectorAll("#empresaList li").forEach((item) => {
  item.addEventListener("click", function () {
    // Obtener los datos de los atributos personalizados
    const nombre = this.getAttribute("data-nombre");
    const direccion = this.getAttribute("data-direccion");
    const telefono = this.getAttribute("data-telefono");
    const email = this.getAttribute("data-email");
    const giro = this.getAttribute("data-giro");

    // Actualizar el contenido del cuadro de detalles en "empresaInfo"
    const empresaInfo = document.getElementById("empresaInfo");
    empresaInfo.querySelector("#empresaNombre").textContent = nombre;
    empresaInfo.querySelector("#empresaDireccion").textContent = `Dirección: ${direccion}`;
    empresaInfo.querySelector("#empresaTelefono").textContent = `Teléfono: ${telefono}`;
    empresaInfo.querySelector("#empresaEmail").textContent = `Email: ${email}`;
    empresaInfo.querySelector("#empresaGiro").textContent = `Giro: ${giro}`;

    // Mostrar y actualizar el botón (si es necesario)
    const button = empresaInfo.querySelector("button");
    button.classList.remove("hidden");
    button.textContent = `Más detalles sobre ${nombre}`;
  });
});
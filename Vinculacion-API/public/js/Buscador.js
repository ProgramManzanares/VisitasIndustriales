//FUNCIONA PARA EL BUSCADOR DE ARCHIVO VISITAS
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

//FUNCIONA PARA EL BUSCADOR DE EVIDENCIAS VISITAS
// Obtener el elemento de la barra de búsqueda por su id
document.getElementById('searchInput').addEventListener('keyup', function() {
  // Obtener el valor de la barra de búsqueda y convertirlo a minúsculas
  const searchQuery = this.value.toLowerCase();

  // Seleccionar todas las tarjetas con la clase 'card'
  const cards = document.querySelectorAll('.card');

  // Iterar sobre cada tarjeta
  cards.forEach(function(card) {
      // Obtener el contenido de texto de la tarjeta y convertirlo a minúsculas
      const cardText = card.textContent.toLowerCase();

      // Comprobar si el texto de la tarjeta incluye la consulta de búsqueda
      if (cardText.includes(searchQuery)) {
          // Si coincide, mostrar la tarjeta
          card.style.display = '';
      } else {
          // Si no coincide, ocultar la tarjeta
          card.style.display = 'none';
      }
  });
});

// FUNCIONA PARA EL BUSCADOR DE INFORMACION EMPRESAS
// Función para manejar la búsqueda
function buscarItems() {
    // Obtener el texto del buscador
    const input = document.getElementById('searchInput').value.toLowerCase();
    // Seleccionar todos los elementos de la lista
    const items = document.querySelectorAll('.relative ul li');
  
    items.forEach(item => {
      // Obtener el texto del elemento
      const text = item.textContent.toLowerCase();
      if (text.includes(input)) {
        // Mostrar el elemento si coincide
        item.style.display = '';
      } else {
        // Ocultar el elemento si no coincide
        item.style.display = 'none';
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
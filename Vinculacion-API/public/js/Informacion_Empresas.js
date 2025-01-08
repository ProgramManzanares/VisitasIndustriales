// Selecciona todos los elementos de la lista de empresas y la sección de detalles
const companyItems = document.querySelectorAll('.company-list ul li');
const companyDetails = document.querySelector('.company-details');

// Función para actualizar la sección de detalles
function updateCompanyDetails(event) {
    const selectedCompany = event.target;

    // Extraer datos del elemento seleccionado
    const name = selectedCompany.getAttribute('data-name');
    const address = selectedCompany.getAttribute('data-address');
    const phone = selectedCompany.getAttribute('data-phone');
    const email = selectedCompany.getAttribute('data-email');
    const giro = selectedCompany.getAttribute('data-giro');

    // Actualizar la sección de detalles con los datos seleccionados
    companyDetails.innerHTML = `
        <h2>${name}</h2>
        <p><strong>Dirección:</strong> ${address}</p>
        <p><strong>Teléfono:</strong> ${phone}</p>
        <p><strong>Email:</strong> ${email}</p>
        <p><strong>Giro:</strong> ${giro}</p>
        <button>Visitar sitio web</button>
    `;
}

// Agregar evento de clic a cada empresa
companyItems.forEach(item => {
    item.addEventListener('click', updateCompanyDetails);
});

//BUSCADOR DE ELEMENTOS
// Selección de elementos
const searchInput = document.querySelector('#searchInput'); // Asegúrate de que el input tenga este id
const companyListItems = document.querySelectorAll('.company-list ul li'); // Selecciona los elementos de la lista

// Función para filtrar empresas
searchInput.addEventListener('input', function () {
    const filter = searchInput.value.toLowerCase(); // Convierte el texto ingresado a minúsculas
    companyListItems.forEach(item => {
        const text = item.textContent.toLowerCase(); // Obtén el texto del elemento
        if (text.includes(filter)) {
            item.style.display = ''; // Muestra el elemento si coincide con el filtro
        } else {
            item.style.display = 'none'; // Oculta el elemento si no coincide
        }
    });
});

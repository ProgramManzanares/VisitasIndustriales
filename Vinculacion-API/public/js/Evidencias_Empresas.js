// Selección de elementos
const searchInput = document.querySelector('#searchInput'); // Input de búsqueda
const cards = document.querySelectorAll('.card'); // Selección de las tarjetas por clase

// Función para filtrar tarjetas
searchInput.addEventListener('input', function () {
    const filter = searchInput.value.toLowerCase(); // Convierte el texto ingresado a minúsculas
    cards.forEach(card => {
        const text = card.textContent.toLowerCase(); // Texto de cada tarjeta
        if (text.includes(filter)) {
            card.style.display = ''; // Muestra la tarjeta si coincide con el filtro
        } else {
            card.style.display = 'none'; // Oculta la tarjeta si no coincide
        }
    });
});

// Funcionalidades de Search Bar Academia

/******************************************************************************/
//               Filtrar cartas en AcademiaEvidencias.blade.php               //
/******************************************************************************/

document.getElementById('searchInput').addEventListener('input', function () {
    const searchTerm = this.value.toLowerCase(); // Obtener el término de búsqueda en minúsculas
    const cards = document.querySelectorAll('.main-container .container .flex-wrap > div'); // Seleccionar cada carta

    cards.forEach(card => {
        const cardText = card.textContent.toLowerCase(); // Extraer el texto dentro de la carta

        // Mostrar u ocultar la carta según el término de búsqueda
        if (cardText.includes(searchTerm)) {
            card.style.display = 'block'; // Mostrar carta si coincide
        } else {
            card.style.display = 'none'; // Ocultar carta si no coincide
        }
    });
});

/******************************************************************************/
//             Filtrar datos de la tabla AcademiaArchivo.blade.php            //
/******************************************************************************/
document.addEventListener('DOMContentLoaded', () => {
    // Selecciona el campo de búsqueda y el botón para limpiar el texto
    const searchInput = document.getElementById('searchInput');
    const clearSearchButton = document.getElementById('clearSearchButton');

    // Escucha el evento 'input' para filtrar las filas de la tabla
    searchInput.addEventListener('input', function () {
        const searchTerm = this.value.toLowerCase(); // Obtiene el término de búsqueda en minúsculas
        const rows = document.querySelectorAll('tbody > tr'); // Selecciona todas las filas de la tabla

        rows.forEach(row => {
            // Obtiene el contenido de todas las celdas de la fila y lo concatena
            const rowText = Array.from(row.querySelectorAll('td'))
                .map(cell => cell.textContent.toLowerCase())
                .join(' ');

            // Muestra u oculta la fila dependiendo de si coincide con el término de búsqueda
            row.style.display = rowText.includes(searchTerm) ? '' : 'none';
        });
    });

    // Limpia el campo de búsqueda y muestra todas las filas
    clearSearchButton.addEventListener('click', function () {
        searchInput.value = ''; // Vacía el input
        const rows = document.querySelectorAll('tbody > tr');
        rows.forEach(row => {
            row.style.display = ''; // Muestra todas las filas
        });
    });
});


/******************************************************************************/
//             Limpiar el campo de búsqueda en Search Bar Academia            //
/******************************************************************************/
document.getElementById('clearSearchButton').addEventListener('click', function () {
    const searchInput = document.getElementById('searchInput');
    searchInput.value = ''; // Limpia el texto del input
    searchInput.focus(); // Vuelve a enfocar el input (opcional)
});
 // Funcionalidad para filtrar la tabla mientras se escribe en el campo de búsqueda
 const searchInput = document.querySelector('input[placeholder="Buscar usuario..."]');
 const tableRows = document.querySelectorAll('table tbody tr');

 searchInput.addEventListener('input', function() {
     const query = searchInput.value.toLowerCase();

     tableRows.forEach(row => {
         const rowText = row.textContent.toLowerCase();
         row.style.display = rowText.includes(query) ? '' : 'none';
     });
 });
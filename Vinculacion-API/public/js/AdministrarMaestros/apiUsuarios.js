document.addEventListener('DOMContentLoaded', function () {
    const tabla = document.getElementById('tablaUsuarios');
  
    fetch('https://localhost:7176/api/maestro')
        .then(response => response.json())
        .then(data => {
            tabla.innerHTML = '';
            data.forEach(maestro => {
                const fila = document.createElement('tr');
                fila.classList.add('transition-colors', 'duration-150', 'hover:bg-gray-50/80');
                fila.innerHTML = `
                    <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">${maestro.id}</td>
                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">${maestro.nombre}</td>
                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">${maestro.apellidoPaterno}</td>
                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">${maestro.apellidoMaterno}</td>
                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">${maestro.clave}</td>
                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">${maestro.correo}</td>
                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">${maestro.telefono}</td>
                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                        <button onclick="eliminarMaestro(${maestro.id})" class="px-2 py-1 text-xs text-white bg-red-500 rounded hover:bg-red-600">Eliminar</button>
                    </td>
                `;
                tabla.appendChild(fila);
            });
        })
        .catch(error => {
            console.error('Error al cargar los maestros:', error);
            tabla.innerHTML = '<tr><td colspan="8" class="py-4 text-center text-red-500">Error al cargar datos</td></tr>';
        });
  });
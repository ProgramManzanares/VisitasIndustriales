// Función para obtener los maestros de la API
function obtenerMaestros() {
    fetch('http://localhost:5096/api/maestro')  // URL de la API de maestros
        .then(response => response.json())
        .then(data => {
            // Procesar la respuesta de la API
            console.log(data);  // Aquí puedes verificar los datos en consola
            actualizarTablaMaestros(data);  // Llamamos a la función para actualizar la tabla
        })
        .catch(error => console.error('Error al obtener maestros:', error));
}

// Función para actualizar la tabla con los datos obtenidos
function actualizarTablaMaestros(maestros) {
    const tabla = document.getElementById('tablaMaestros');  // Asegúrate de tener una tabla con este id
    tabla.innerHTML = '';  // Limpiar la tabla antes de llenarla con los nuevos datos

    maestros.forEach(maestro => {
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
            <td class="px-6 py-4 text-sm font-medium text-gray-500 whitespace-nowrap">
                <!-- Aquí puedes agregar los botones de acción, como "editar" o "eliminar" -->
                <button class="text-blue-600 hover:text-blue-900" onclick="editarMaestro(${maestro.id})">Editar</button>
                <button class="text-red-600 hover:text-red-900" onclick="eliminarMaestro(${maestro.id})">Eliminar</button>
            </td>
        `;
        tabla.appendChild(fila);
    });
}

// Función para editar maestro (aún no implementada)
function editarMaestro(id) {
    alert('Editar maestro con ID: ' + id);
}

// Función para eliminar maestro
function eliminarMaestro(id) {
    if (confirm('¿Estás seguro de que quieres eliminar este maestro?')) {
        fetch(`http://localhost:5096/api/maestro/${id}`, {
            method: 'DELETE',
        })
        .then(response => response.json())
        .then(data => {
            alert('Maestro eliminado correctamente');
            obtenerMaestros();  // Recargar la lista de maestros
        })
        .catch(error => {
            console.error('Error al eliminar el maestro:', error);
            alert('Error al eliminar el maestro');
        });
    }
}

// Llamar a la función para obtener los maestros al cargar la página
document.addEventListener('DOMContentLoaded', function() {
    obtenerMaestros();
});

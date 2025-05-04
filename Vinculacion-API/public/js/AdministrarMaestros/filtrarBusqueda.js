document.addEventListener('DOMContentLoaded', function () {
    const tabla = document.getElementById('tablaUsuarios');
    const buscador = document.getElementById('buscador');

    let usuarios = [];

    fetch('https://localhost:7176/api/maestro')
        .then(response => response.json())
        .then(data => {
            usuarios = data;
            console.log("Usuarios cargados:", usuarios); // Ver qué datos estamos recibiendo
            cargarUsuarios(usuarios);
        })
        .catch(error => {
            console.error('Error al cargar los usuarios:', error);
            tabla.innerHTML = '<tr><td colspan="8" class="py-4 text-center text-red-500">Error al cargar datos</td></tr>';
        });

    // Función para cargar la tabla de usuarios
    function cargarUsuarios(data) {
        tabla.innerHTML = '';
        console.log("Cargando usuarios filtrados:", data); // Ver los usuarios que estamos cargando

        if (data.length === 0) {
            tabla.innerHTML = '<tr><td colspan="8" class="py-4 text-center text-red-500">No se encontraron usuarios.</td></tr>';
        }

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
                <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap space-x-2">
                    <button onclick="eliminarMaestro(${maestro.id})" class="px-2 py-1 text-xs text-white bg-red-500 rounded hover:bg-red-600">Eliminar</button>
                    <label for="modal-modificar" onclick="cargarDatosUsuario(${maestro.id})" class="px-2 py-1 text-xs font-medium text-white bg-yellow-500 rounded hover:bg-yellow-600 cursor-pointer">Modificar</label>
                </td>
            `;
            tabla.appendChild(fila);
        });
    }

    // Evento para filtrar usuarios en tiempo real
    buscador.addEventListener('input', function () {
        const query = buscador.value.toLowerCase();
        console.log("Buscando:", query); // Ver el texto que está buscando el usuario

        // Filtrar usuarios por cualquier campo (id, nombre, apellido, etc.)
        const usuariosFiltrados = usuarios.filter(maestro => {
            const match = maestro.id.toString().includes(query) || 
                          maestro.nombre.toLowerCase().includes(query) || 
                          maestro.apellidoPaterno.toLowerCase().includes(query) ||
                          maestro.apellidoMaterno.toLowerCase().includes(query) ||
                          maestro.clave.toLowerCase().includes(query) ||
                          maestro.correo.toLowerCase().includes(query) ||
                          maestro.telefono.toLowerCase().includes(query);
            console.log(`Coincidencia encontrada: ${match ? 'Sí' : 'No'}`, maestro); // Ver si encontramos coincidencias
            return match;
        });

        cargarUsuarios(usuariosFiltrados);
    });
});

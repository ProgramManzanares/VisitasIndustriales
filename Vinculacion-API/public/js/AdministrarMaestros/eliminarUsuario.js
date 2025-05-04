// apiUsuarios.js

// Función para obtener los usuarios de la API

  
  // Función para actualizar la tabla con los datos obtenidos
  function actualizarTablaUsuarios(usuarios) {
    const tabla = document.getElementById('tablaUsuarios');
    tabla.innerHTML = '';
  
    usuarios.forEach(usuario => {
      const fila = document.createElement('tr');
      fila.classList.add('transition-colors', 'duration-150', 'hover:bg-gray-50/80');
      fila.innerHTML = `
        <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">${usuario.id}</td>
        <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">${usuario.nombre}</td>
        <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">${usuario.apellidoPaterno}</td>
        <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">${usuario.apellidoMaterno}</td>
        <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">${usuario.clave}</td>
        <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">${usuario.correo}</td>
        <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">${usuario.telefono}</td>
        <td class="px-6 py-4 text-sm font-medium text-gray-500 whitespace-nowrap">
          <button class="text-blue-600 hover:text-blue-900 btn-editar" data-id="${usuario.id}">Editar</button>
          <button class="text-red-600 hover:text-red-900 btn-eliminar" data-id="${usuario.id}">Eliminar</button>
        </td>
      `;
      tabla.appendChild(fila);
    });
  
    agregarEventosEliminar();
  }
  
  // Función para agregar eventos a los botones de eliminar
  function agregarEventosEliminar() {
    const botonesEliminar = document.querySelectorAll('.btn-eliminar');
    botonesEliminar.forEach(boton => {
      boton.addEventListener('click', () => {
        const id = boton.getAttribute('data-id');
        if (confirm('¿Estás seguro de que deseas eliminar este usuario?')) {
          eliminarUsuario(id);
        }
      });
    });
  }
  
  // Función para eliminar un usuario por ID
  function eliminarUsuario(id) {
    fetch('/api/maestros/${id}', {
      method: 'DELETE'
    })
      .then(response => {
        if (response.ok) {
          alert('Usuario eliminado correctamente');
          obtenerUsuarios(); // Recargar la lista después de eliminar
        } else {
          alert('No se pudo eliminar el usuario');
        }
      })
      .catch(error => console.error('Error al eliminar usuario:', error));
  }
  
  // Ejecutar al cargar la página
  document.addEventListener('DOMContentLoaded', () => {
    obtenerUsuarios();
  });
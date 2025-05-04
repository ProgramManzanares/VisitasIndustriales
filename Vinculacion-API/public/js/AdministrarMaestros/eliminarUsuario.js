

function eliminarMaestro(id) {
  if (!confirm('¿Estás seguro de que quieres eliminar este maestro?')) return;

  fetch(`https://localhost:7176/api/Maestro/${id}`, {
      method: 'DELETE'
  })
  .then(res => {
      if (res.ok) {
          location.reload();
      } else {
          alert('Error al eliminar');
      }
  })
  .catch(err => console.error('Error al eliminar:', err));
}


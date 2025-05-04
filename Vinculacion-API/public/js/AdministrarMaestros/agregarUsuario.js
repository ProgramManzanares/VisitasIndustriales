document.getElementById('formAgregarUsuario').addEventListener('submit', async (e) => {
    e.preventDefault();

    const nuevoUsuario = {
        nombre: document.getElementById('nombre').value,
        apellidoPaterno: document.getElementById('apellidoPaterno').value,
        apellidoMaterno: document.getElementById('apellidoMaterno').value,
        clave: document.getElementById('clave').value,
        correo: document.getElementById('correo').value,
        telefono: document.getElementById('telefono').value
    };

    try {
        const response = await fetch('/api/maestros', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(nuevoUsuario)
        });

        if (!response.ok) {
            const error = await response.text();
            console.error('Error al crear usuario:', error);
            alert('Error al crear usuario.');
            return;
        }

        // Usuario creado con éxito
        const nuevo = await response.json();
        console.log('Usuario creado:', nuevo);
        alert('Usuario agregado correctamente.');

        // Recargar la página para reflejar los cambios
        location.reload();

    } catch (error) {
        console.error('Error en la petición:', error);
        alert('Hubo un error al comunicarse con el servidor.');
    }
});
// agregarUsuario.js
document.addEventListener('DOMContentLoaded', function () {
    const formAgregar = document.getElementById('formAgregarUsuario');

    formAgregar.addEventListener('submit', async function (e) {
        e.preventDefault();

        const nuevoUsuario = {
            nombre: document.getElementById('nombre').value.trim(),
            apellidoPaterno: document.getElementById('apellidoPaterno').value.trim(),
            apellidoMaterno: document.getElementById('apellidoMaterno').value.trim(),
            claveMaestro: document.getElementById('clave').value.trim(),
            correoElectronico: document.getElementById('correo').value.trim(),
            telefono: document.getElementById('telefono').value.trim()
        };

        try {
            const res = await fetch('https://localhost:7176/api/Maestro', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(nuevoUsuario)
            });

            if (!res.ok) {
                const errorData = await res.json();
                console.error('Error de validación:', errorData);
                alert('Error al agregar el usuario. Verifica los campos obligatorios.');
                return;
            }

            // Cerrar el modal y recargar la página o tabla
            document.getElementById('modal-agregar').checked = false;
            location.reload();
        } catch (error) {
            console.error('Error al agregar usuario:', error);
            alert('Error de conexión al agregar usuario.');
        }
    });
});

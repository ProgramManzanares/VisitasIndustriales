let usuarioIdSeleccionado = null;

function cargarDatosUsuario(id) {
    usuarioIdSeleccionado = id;

    fetch(`https://localhost:7176/api/maestro/${id}`)
        .then(res => res.json())
        .then(data => {
            document.getElementById('mod-nombre').value = data.nombre;
            document.getElementById('mod-apellidoPaterno').value = data.apellidoPaterno;
            document.getElementById('mod-apellidoMaterno').value = data.apellidoMaterno;
            document.getElementById('mod-clave').value = data.claveMaestro;
            document.getElementById('mod-correo').value = data.correoElectronico;
            document.getElementById('mod-telefono').value = data.telefono;
        })
        .catch(err => {
            console.error('Error al cargar datos del usuario:', err);
            alert('Error al cargar los datos del usuario.');
        });
}

document.getElementById('formModificarUsuario').addEventListener('submit', function (e) {
    e.preventDefault();

    const datos = {
        id: usuarioIdSeleccionado,
        nombre: document.getElementById('mod-nombre').value,
        apellidoPaterno: document.getElementById('mod-apellidoPaterno').value,
        apellidoMaterno: document.getElementById('mod-apellidoMaterno').value,
        claveMaestro: document.getElementById('mod-clave').value,
        correoElectronico: document.getElementById('mod-correo').value,
        telefono: document.getElementById('mod-telefono').value
    };

    console.log('Enviando datos:', datos);

    fetch(`https://localhost:7176/api/Maestro/${usuarioIdSeleccionado}`, {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(datos)
    })
    .then(res => {
        if (res.ok) {
            location.reload();
        } else {
            return res.json().then(err => {
                console.error('Error response:', err);
                alert('Error al modificar el usuario.');
            });
        }
    })
    .catch(err => {
        console.error('Error al enviar solicitud:', err);
        alert('Error al modificar el usuario.');
    });
});

window.cargarDatosUsuario = cargarDatosUsuario;

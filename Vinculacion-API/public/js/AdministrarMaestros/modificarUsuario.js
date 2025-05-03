function cargarDatosUsuario(idUsuario) {
    // Esta es solo una implementación de ejemplo
    // Debes reemplazarla con tu lógica real de carga de datos
    
    // Simulamos la carga de datos de un usuario
    const usuarioEjemplo = {
        nombre: "Juan",
        apellidoPaterno: "Pérez",
        apellidoMaterno: "González",
        clave: "ABC123",
        correo: "juan.perez@email.com",
        telefono: "555-1234"
    };

    // Llenamos los campos del formulario
    document.getElementById('mod-nombre').value = usuarioEjemplo.nombre;
    document.getElementById('mod-apellidoPaterno').value = usuarioEjemplo.apellidoPaterno;
    document.getElementById('mod-apellidoMaterno').value = usuarioEjemplo.apellidoMaterno;
    document.getElementById('mod-clave').value = usuarioEjemplo.clave;
    document.getElementById('mod-correo').value = usuarioEjemplo.correo;
    document.getElementById('mod-telefono').value = usuarioEjemplo.telefono;}
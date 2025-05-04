document.addEventListener("DOMContentLoaded", function () {
    const inputBusqueda = document.querySelector("input[placeholder='Buscar usuario...']");
    const tablaUsuarios = document.getElementById("tablaUsuarios");

    inputBusqueda.addEventListener("input", function () {
        const textoBusqueda = inputBusqueda.value.toLowerCase();

        document.querySelectorAll("#tablaUsuarios tr").forEach(fila => {
            const id = fila.children[0]?.textContent.toLowerCase() || "";
            const nombre = fila.children[1]?.textContent.toLowerCase() || "";
            const apellidoPaterno = fila.children[2]?.textContent.toLowerCase() || "";
            const apellidoMaterno = fila.children[3]?.textContent.toLowerCase() || "";
            const claveMaestro = fila.children[4]?.textContent.toLowerCase() || "";
            const correo = fila.children[5]?.textContent.toLowerCase() || "";
            const telefono = fila.children[6]?.textContent.toLowerCase() || "";

            if (id.includes(textoBusqueda) || 
                nombre.includes(textoBusqueda) || 
                apellidoPaterno.includes(textoBusqueda) || 
                apellidoMaterno.includes(textoBusqueda) || 
                claveMaestro.includes(textoBusqueda) || 
                correo.includes(textoBusqueda) || 
                telefono.includes(textoBusqueda)) {
                fila.style.display = "";
            } else {
                fila.style.display = "none";
            }
        });
    });
});
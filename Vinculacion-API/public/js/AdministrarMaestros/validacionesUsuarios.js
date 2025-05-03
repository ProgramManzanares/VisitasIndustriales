// Script para validaciones en tiempo real
function validarNombreApellido(input, mensaje) {
    input.addEventListener("input", () => {
        if (input.value.trim().length > 0) {
            input.classList.add("input-success");
            mensaje.classList.remove("hidden");
        } else {
            input.classList.remove("input-success");
            mensaje.classList.add("hidden");
        }
    });

    input.addEventListener("blur", () => {
        mensaje.classList.add("hidden");
    });

    input.addEventListener("focus", () => {
        if (input.value.trim().length > 0) {
            mensaje.classList.remove("hidden");
        }
    });
}

function validarCampo(input, mensajeError, array, campo) {
    input.addEventListener("input", () => {
        const valor = input.value.trim();
        const existe = array.some(user => user[campo] === valor);

        if (valor.length > 0) {
            input.classList.add("input-success");
        } else {
            input.classList.remove("input-success");
        }

        if (existe) {
            input.classList.add("input-error");
            input.classList.remove("input-success");
            mensajeError.classList.remove("hidden");
        } else {
            mensajeError.classList.add("hidden");
        }
    });
}

// Lista de usuarios simulada
const usuarios = [{ clave: "ABC123", correo: "juan.perez@email.com", telefono: "555-1234" }];

// Validaciones en tiempo real para nombres y apellidos
validarNombreApellido(document.getElementById("nombre"), document.getElementById("validoNombre"));
validarNombreApellido(document.getElementById("apellidoPaterno"), document.getElementById("validoApellidoPaterno"));
validarNombreApellido(document.getElementById("apellidoMaterno"), document.getElementById("validoApellidoMaterno"));

// Validaciones en tiempo real para clave, correo y teléfono
validarCampo(document.getElementById("clave"), document.getElementById("errorClave"), usuarios, "clave");
validarCampo(document.getElementById("correo"), document.getElementById("errorCorreo"), usuarios, "correo");
validarCampo(document.getElementById("telefono"), document.getElementById("errorTelefono"), usuarios, "telefono");
validarCampo(document.getElementById("telefono"), document.getElementById("errorTelefono"), usuarios, "telefono");
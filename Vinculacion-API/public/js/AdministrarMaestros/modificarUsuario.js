document.addEventListener('DOMContentLoaded', function() {
    let activeRow = null; // Variable global para almacenar la fila que se va a modificar

    // Manejo del botón "Modificar"
    document.querySelectorAll('.btn-warning').forEach(button => {
        button.addEventListener('click', function() {
            activeRow = button.closest('tr'); // Guarda la fila activa

            // Extraer valores de la fila y colocarlos en el modal
            document.getElementById('mod-nombre').value = activeRow.cells[1].innerText;
            document.getElementById('mod-apellidoPaterno').value = activeRow.cells[2].innerText;
            document.getElementById('mod-apellidoMaterno').value = activeRow.cells[3].innerText;
            document.getElementById('mod-clave').value = activeRow.cells[4].innerText;
            document.getElementById('mod-correo').value = activeRow.cells[5].innerText;
            document.getElementById('mod-telefono').value = activeRow.cells[6].innerText;

            // Abrir el modal de modificación
            document.getElementById('modal-modificar').checked = true;
        });
    });

    // Manejo del botón "Eliminar"
    document.querySelectorAll('.btn-error').forEach(button => {
        button.addEventListener('click', function() {
            this.closest('tr').remove(); // Encuentra la fila correspondiente y la elimina
        });
    });

    // Guardar cambios en la tabla después de modificar
    document.getElementById('formModificarUsuario').addEventListener('submit', function(event) {
        event.preventDefault(); // Evita recargar la página

        if (activeRow) { // Solo modifica si hay una fila activa
            activeRow.cells[1].innerText = document.getElementById('mod-nombre').value;
            activeRow.cells[2].innerText = document.getElementById('mod-apellidoPaterno').value;
            activeRow.cells[3].innerText = document.getElementById('mod-apellidoMaterno').value;
            activeRow.cells[4].innerText = document.getElementById('mod-clave').value;
            activeRow.cells[5].innerText = document.getElementById('mod-correo').value;
            activeRow.cells[6].innerText = document.getElementById('mod-telefono').value;

            activeRow = null; // Resetea la variable después de guardar los cambios
        }

        document.getElementById('modal-modificar').checked = false; // Cierra el modal
    });
});
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.btn-error').forEach(button => {
        button.addEventListener('click', function() {
            this.closest('tr').remove(); // Encuentra la fila correspondiente y la elimina
        });
    });
});
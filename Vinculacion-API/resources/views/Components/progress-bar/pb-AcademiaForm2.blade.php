<!-- Contenedor para la barra de progreso -->
<div class="max-w-4xl mx-auto mt-12 p-6">
    <div class="flex justify-between mb-1">
        <span class="text-base font-medium text-blue-700 dark:text-white">Formulario</span>
        <span id="progress-text" class="text-sm font-medium text-blue-700 dark:text-white">0%</span>
    </div>
    <div class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
        <div id="progress-bar" class="bg-blue-600 h-2.5 rounded-full" style="width: 0%; transition: width 2s ease;">
        </div>
    </div>
</div>

<!-- Script para manejar la barra de progreso -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const progressBar = document.getElementById("progress-bar");
        const progressText = document.getElementById("progress-text");
        const switchInput = document.getElementById("visita-switch");
        const commentField = document.getElementById("comment");
        const form = document.getElementById("my-form");
        const extraFields = document.querySelectorAll("#formulario-gestionada input"); // Campos extra

        // Iniciar la barra de progreso al 50%
        let progress = 50;
        progressBar.style.width = progress + "%";
        progressText.textContent = progress + "%";

        // Validar el textarea para detectar cambios
        commentField.addEventListener("input", function () {
            commentField.dataset.filled = commentField.value.trim() !== "" ? "true" : "false";
        });

        form.addEventListener("submit", function (event) {
            event.preventDefault(); // Evita el envío automático

            const comentarioLleno = commentField.value.trim() !== "";
            let extraCamposLlenos = true;

            if (switchInput.checked) {
                // Si el switch está en "Sí", validar los campos adicionales
                extraCamposLlenos = Array.from(extraFields).every(input => input.value.trim() !== "");
            }

            if ((!switchInput.checked && comentarioLleno) || (switchInput.checked && extraCamposLlenos)) {
                progress = 100; // Subir barra de progreso
                progressBar.style.transition = "width 1s ease-in-out";
                progressBar.style.width = progress + "%";

                let counter = 50;
                const interval = setInterval(() => {
                    if (counter < 100) {
                        counter++;
                        progressText.textContent = counter + "%";
                    } else {
                        clearInterval(interval);
                    }
                }, 20);
            }

        });
    });
</script>
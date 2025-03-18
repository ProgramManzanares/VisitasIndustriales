<!-- Succes alert -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const progressBar = document.getElementById("progress-bar");
        const progressText = document.getElementById("progress-text");
        const switchInput = document.getElementById("visita-switch");
        const commentField = document.getElementById("comment");
        const form = document.getElementById("my-form");
        const extraFields = document.querySelectorAll("#formulario-gestionada input");
        const alert = document.getElementById("successAlert");

        let progress = 50;
        progressBar.style.width = progress + "%";
        progressText.textContent = progress + "%";

        commentField.addEventListener("input", function () {
            commentField.dataset.filled = commentField.value.trim() !== "" ? "true" : "false";
        });

        form.addEventListener("submit", function (event) {
            event.preventDefault();
            const comentarioLleno = commentField.value.trim() !== "";
            let extraCamposLlenos = true;

            if (switchInput.checked) {
                extraCamposLlenos = Array.from(extraFields).every(input => input.value.trim() !== "");
            }

            if ((!switchInput.checked && comentarioLleno) || (switchInput.checked && extraCamposLlenos)) {
                progress = 100;
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

                alert.classList.remove("hidden");
                alert.style.transition = "transform 0.5s ease-in-out";
                alert.style.transform = "translate(-50%, -100%)";
                setTimeout(() => {
                    alert.style.transform = "translate(-50%, 0)";
                }, 10);
                setTimeout(() => {
                    alert.classList.add("hidden");
                }, 5000);
            } else if (!switchInput.checked && !comentarioLleno) {
                alert("Debes escribir un comentario antes de enviar.");
            } else if (switchInput.checked && !extraCamposLlenos) {
                alert("Debes llenar todos los campos adicionales antes de enviar.");
            }
        });
    });
</script>


<!-- Alerta de éxito -->
<div id="successAlert"
    class="hidden fixed top-0 left-1/2 transform -translate-x-1/2 mt-4 w-11/12 max-w-md p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 flex items-center justify-between"
    role="alert">
    <div class="flex items-center">
        <svg class="shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
            fill="currentColor" viewBox="0 0 20 20">
            <path
                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
        </svg>
        <div class="ms-3 text-sm font-medium">
            El formulario se envió correctamente.
        </div>
    </div>
    <button type="button"
        class="bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"
        data-dismiss-target="#successAlert" aria-label="Close">
        <span class="sr-only">Close</span>
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
            viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
        </svg>
    </button>
</div>
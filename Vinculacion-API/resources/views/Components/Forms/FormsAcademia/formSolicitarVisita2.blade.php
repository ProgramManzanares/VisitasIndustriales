<!-- Formulario -->
<div class="px-4 sm:px-8 md:px-12 lg:px-16">
    <form id="my-form" class="max-w-4xl mx-auto mt-5 p-6 bg-white dark:bg-gray-800 shadow-lg rounded-lg">

        <label for="notas" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white p-1">Notas: </label>
        <div class="w-full mb-4 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600">
            <div class="px-4 py-2 bg-white rounded-t-lg dark:bg-gray-800">
                <label for="comment" class="sr-only">Your comment</label>
                <textarea id="comment" rows="4"
                    class="focus:outline-none w-full px-0 text-sm text-gray-900 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400"
                    placeholder="Deja un comentario..." required></textarea>
            </div>
            <div class="flex items-center justify-between px-3 py-2 border-t dark:border-gray-600 border-gray-200">
                <div class="flex ps-0 space-x-1 rtl:space-x-reverse sm:ps-2">
                    
                </div>
            </div>
        </div>
        <label for="notas" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white p-1">¿Visita
            gestionada? </label>

        <div
            class="w-full mb-4 border border-gray-200 rounded-lg bg-gray-50 p-4 dark:bg-gray-700 dark:border-gray-600">

            <div class="flex items-center">
                <span class="text-sm font-medium text-gray-900 dark:text-white mr-2">No</span>
                <label class="switch">
                    <input type="checkbox" id="visita-switch" onchange="toggleFormulario()">
                    <span class="slider"></span>
                </label>
                <span class="text-sm font-medium text-gray-900 dark:text-white ml-2">Sí</span>
            </div>
        </div>

        <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white mt-5 mb-5">
            Nota: Si ya tiene la visita gestionada seleccione "Sí" para capturar los datos del contacto
        </label>

        <div id="formulario-gestionada" class="mt-4 hidden">
            <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Nombre
            </label>
            <input type="text" id="nombre" placeholder="Nombre del contacto"
                class="block w-full p-2.5 mb-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                autocomplete="off" disabled>

            <label for="correo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Correo
            </label>
            <input type="email" id="correo" placeholder="Correo del contacto"
                class="block w-full p-2.5 mb-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                autocomplete="off" disabled>

            <label for="contacto" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Contacto
            </label>
            <input type="text" id="contacto" placeholder="Número del contacto"
                class="block w-full p-2.5 mb-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                autocomplete="off" disabled pattern="^\d{10}$"
                title="Debe ingresar un número válido de 10 dígitos (solo números)." required>
        </div>

        <div class="flex justify-start mt-4">
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Enviar
            </button>
        </div>

        <!-- Script para mostrar inputs -->
        <script>
            // Selecciona el switch y los campos ocultos
            const switchInput = document.getElementById("visita-switch");
            const camposOcultos = document.getElementById("campos-ocultos");

            // Agrega un evento para mostrar/ocultar los campos
            switchInput.addEventListener("change", function () {
                if (this.checked) {
                    camposOcultos.style.display = "block"; // Muestra los campos
                } else {
                    camposOcultos.style.display = "none"; // Oculta los campos
                }
            });
        </script>

        <script>
            function toggleFormulario() {
                const formulario = document.getElementById("formulario-gestionada");
                const switchElement = document.getElementById("visita-switch");
                const inputs = formulario.querySelectorAll("input");

                if (switchElement.checked) {
                    formulario.classList.remove("hidden");
                    inputs.forEach(input => {
                        input.removeAttribute("disabled");
                        input.setAttribute("required", "required");
                    });
                } else {
                    formulario.classList.add("hidden");
                    inputs.forEach(input => {
                        input.setAttribute("disabled", "disabled");
                        input.removeAttribute("required");
                    });
                }
            }
        </script>

        <style>
            /* Estilo básico para el switch */
            .switch {
                margin-top: 8px;
                --button-width: 2.5em; /* Ancho del botón */
                --button-height: 1.5em; /* Altura del botón */
                --toggle-diameter: 1em; /* Diámetro del toggle */
                --button-toggle-offset: calc((var(--button-height) - var(--toggle-diameter)) / 2);
                --color-grey: #cccccc;
                --color-green: #3B82F6;
            }

            .slider {
                display: inline-block;
                width: var(--button-width);
                height: var(--button-height);
                background-color: var(--color-grey);
                border-radius: calc(var(--button-height) / 2);
                position: relative;
                transition: 0.3s all ease-in-out;
            }

            .slider::after {
                content: "";
                display: inline-block;
                width: var(--toggle-diameter);
                height: var(--toggle-diameter);
                background-color: #fff;
                border-radius: calc(var(--toggle-diameter) / 2);
                position: absolute;
                top: var(--button-toggle-offset);
                transform: translateX(var(--button-toggle-offset));
                transition: 0.3s all ease-in-out;
            }

            .switch input[type="checkbox"]:checked+.slider {
                background-color: var(--color-green);
            }

            .switch input[type="checkbox"]:checked+.slider::after {
                transform: translateX(calc(var(--button-width) - var(--toggle-diameter) - var(--button-toggle-offset)));
            }

            .switch input[type="checkbox"] {
                display: none;
            }
        </style>

    </form>
</div>
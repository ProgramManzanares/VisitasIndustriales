<!-- Formulario -->
<div class="px-4 sm:px-8 md:px-12 lg:px-16">
    <form id="miFormulario" class="max-w-4xl mx-auto mt-5 p-6 bg-white dark:bg-gray-800 shadow-lg rounded-lg"
      onsubmit="return validateForm()">
      <div class="grid grid-cols-3 gap-4 mb-5">
        <div>
          <label for="nombre-solicitante" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
            Nombre del Maestro Solicitante
          </label>
          <input type="text" id="nombre-solicitante"
            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Escriba el nombre del solicitante" required />
        </div>
        <div>
          <label for="correo-maestro" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
            Correo Electrónico del Maestro
          </label>
          <input type="email" id="correo-maestro"
            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Escriba el correo electrónico" required />
        </div>
        <div>
          <label for="telefono-maestro" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
            Teléfono del Maestro
          </label>
          <input type="tel" id="telefono-maestro"
            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Escriba el número de teléfono" pattern="^[0-9]{10}$"
            title="Debe ingresar un número de teléfono válido (10 dígitos)" required />
        </div>
      </div>

      <!-- Separador -->
      <hr class="border-gray-300 dark:border-gray-600 mt-7" />

      <div class="grid grid-cols-3 gap-4 mb-5 mt-5">
        <div>
          <label for="empresa" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
            Nombre de la Empresa
          </label>
          <input type="text" id="nombre-solicitante"
            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Escriba el nombre de la empresa" required />
        </div>
        <div>
          <label for="cargo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
            Modalidad
          </label>
          <select id="cargo"
            class="[appearance:none] shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            required>
            <option value="" disabled selected>Seleccione la modalidad</option>
            <option value="presencial">Presencial</option>
            <option value="virtual">Virtual</option>
          </select>
        </div>
        <div>
          <label for="carreras" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
            Carrera(s)
          </label>

          <!-- Contenedor del Combo Box -->
          <div class="relative">
            <!-- Botón para abrir/cerrar la lista -->
            <button id="dropdownButton" type="button"
              class="w-full text-left shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white flex justify-between items-center">
              <span id="selectedOptions" class="truncate block max-w-[90%] whitespace-nowrap overflow-hidden">
                Seleccione una carrera
              </span>
              <svg class="w-5 h-5 text-gray-500 dark:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
              </svg>
            </button>

            <!-- Lista desplegable con checkboxes -->
            <div id="dropdownList" class="absolute w-full mt-1 bg-white border border-gray-300 rounded-lg shadow-lg dark:bg-gray-700 dark:border-gray-600 hidden">
              <div class="max-h-48 overflow-y-auto p-2 text-gray-900 dark:text-white">
                <label class="checkbox-container">
                  Ingeniería Aeronáutica
                  <input type="checkbox" value="aeronautica" class="custom-checkbox carrera" required>
                  <span class="checkmark"></span>
                </label>
                <label class="checkbox-container">
                  Ingeniería Biomédica
                  <input type="checkbox" value="biomedica" class="custom-checkbox carrera" required>
                  <span class="checkmark"></span>
                </label>
                <label class="checkbox-container">
                  Ingeniería Eléctrica
                  <input type="checkbox" value="electrica" class="custom-checkbox carrera" required>
                  <span class="checkmark"></span>
                </label>
                <label class="checkbox-container">
                  Ingeniería Electrónica
                  <input type="checkbox" value="electronica" class="custom-checkbox carrera" required>
                  <span class="checkmark"></span>
                </label>
                <label class="checkbox-container">
                  Ingeniería en Semiconductores
                  <input type="checkbox" value="semiconductores" class="custom-checkbox carrera" required>
                  <span class="checkmark"></span>
                </label>
                <label class="checkbox-container">
                  Ingeniería Industrial
                  <input type="checkbox" value="industrial" class="custom-checkbox carrera" required>
                  <span class="checkmark"></span>
                </label>
                <label class="checkbox-container">
                  Ingeniería Mecánica
                  <input type="checkbox" value="mecanica" class="custom-checkbox carrera" required>
                  <span class="checkmark"></span>
                </label>
                <label class="checkbox-container">
                  Ingeniería Mecatrónica
                  <input type="checkbox" value="mecatronica" class="custom-checkbox carrera" required>
                  <span class="checkmark"></span>
                </label>
                <label class="checkbox-container">
                  Ingeniería en Sistemas Computacionales
                  <input type="checkbox" value="sistemas" class="custom-checkbox carrera" required>
                  <span class="checkmark"></span>
                </label>
                <label class="checkbox-container">
                  Ingeniería en Informática
                  <input type="checkbox" value="informatica" class="custom-checkbox carrera" required>
                  <span class="checkmark"></span>
                </label>
                <label class="checkbox-container">
                  Ingeniería en Gestión Empresarial
                  <input type="checkbox" value="gestion" class="custom-checkbox carrera" required>
                  <span class="checkmark"></span>
                </label>
                <label class="checkbox-container">
                  Licenciatura en Administración
                  <input type="checkbox" value="administracion" class="custom-checkbox carrera" required>
                  <span class="checkmark"></span>
                </label>
              </div>
            </div>
            

          </div>
        </div>
      </div>

      {{-- Estilos para el checkbox --}}
      <link rel="stylesheet" href="{{ asset('css/checkBox.css') }}">

      <!-- JavaScript para manejar el desplegable y mostrar opciones seleccionadas -->
      <script>
        document.getElementById("dropdownButton").addEventListener("click", function () {
          document.getElementById("dropdownList").classList.toggle("hidden");
        });

        document.querySelectorAll(".carrera").forEach((checkbox) => {
          checkbox.addEventListener("change", function () {
            let selected = [];
            document.querySelectorAll(".carrera:checked").forEach((cb) => {
              selected.push(cb.parentElement.textContent.trim());
            });

            let displayText = "";
            if (selected.length === 0) {
              displayText = "Seleccione una carrera";
            } else if (selected.length <= 3) {
              displayText = selected.join(", ");
            } else {
              displayText = `${selected.slice(0, 2).join(", ")} y ${selected.length - 2} más`;
            }

            document.getElementById("selectedOptions").textContent = displayText;
          });
        });

        // Cerrar el dropdown si se hace clic fuera de él
        document.addEventListener("click", function (event) {
          const dropdown = document.getElementById("dropdownList");
          const button = document.getElementById("dropdownButton");
          if (!dropdown.contains(event.target) && !button.contains(event.target)) {
            dropdown.classList.add("hidden");
          }
        });
      </script>



      <div class="grid grid-cols-3 gap-4 mb-5">
        <div>
          <label for="nombre-grupo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
            Grupo
          </label>
          <input type="text" id="nombre-grupo"
            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Escriba el nombre del grupo" required />
        </div>
        <div>
          <label for="asignatura" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
            Asignatura
          </label>
          <input type="text" id="asignatura"
            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Escriba la asignatura" required />
        </div>
        <div>
          <label for="fecha" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
            Fecha de Visita Propuesta
          </label>
          <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
              <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path
                  d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
              </svg>
            </div>
            <input datepicker id="default-datepicker" type="text"
              class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
              placeholder="Seleccione una fecha" autocomplete="off" required />
          </div>
        </div>
      </div>

      <div class="grid grid-cols-3 gap-4 mb-5">
        <div>
          <label for="numero-estudiantes" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
            Número de Estudiantes
          </label>
          <input type="number" id="numero-estudiantes"
            class="[appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Ingrese el número de estudiantes" min="0" required />
        </div>
        <div>
          <label for="area-observar" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
            Área a Observar
          </label>
          <input type="text" id="area-observar"
            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Escriba el área a observar" required />
        </div>
        <div>
          <label for="objetivo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
            Objetivo de la Visita
          </label>
          <input type="text" id="objetivo"
            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Escriba el objetivo" required />
        </div>
      </div>

      <div class="grid grid-cols-3 gap-4 mb-5">
        <div>
          <label for="turno" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
            Turno
          </label>
          <select id="turno"
            class="[appearance:none] shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            required>
            <option value="" disabled selected>Seleccione un turno</option>
            <option value="morning">Matutino (9:00-11:00 A.M)</option>
            <option value="afternoon">Vespertino (2:00-4:00 P.M)</option>
          </select>
        </div>
      </div>

      <!-- Botón con validación -->
      <button type="button" id="enviarBtn"
        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        Siguiente
      </button>


      <script>
        document.getElementById("enviarBtn").addEventListener("click", function () {
          const requiredFields = document.querySelectorAll("input[required], select[required]");
          let allValid = true;

          // Recorre los campos en orden y detiene la ejecución en el primer campo vacío
          requiredFields.forEach(field => {
            if (!field.value.trim()) {
              if (allValid) {
                field.reportValidity(); // Muestra la alerta del primer campo vacío
                field.focus(); // Hace foco en el campo para mayor accesibilidad
              }
              allValid = false; // Marca como inválido pero no sigue mostrando más alertas
              field.classList.add("border-red-500", "focus:ring-red-500", "focus:border-red-500"); // Resalta en rojo
            } else {
              field.classList.remove("border-red-500", "focus:ring-red-500", "focus:border-red-500"); // Elimina el resaltado si el campo está lleno
            }
          });

          if (allValid) {
            window.location.href = "{{ route('formulario.academia2') }}";
          }
        });
      </script>





      <style>
        /* Estilo para navegadores basados en WebKit (Chrome, Safari, Edge Chromium) */
        #dropdownList::-webkit-scrollbar {
          width: 6px;
        }

        /* Eliminar flechas del scrollbar */
        #dropdownList::-webkit-scrollbar-button {
          display: none;
          /* Este es el ajuste clave */
        }

        /* Estilo para el thumb */
        #dropdownList::-webkit-scrollbar-thumb {
          background-color: #6b7280;
          /* Color de la barra */
          border-radius: 9999px;
        }

        /* Fondo transparente para el track */
        #dropdownList::-webkit-scrollbar-track {
          background-color: transparent;
        }

        /* Firefox: forzar la barra de desplazamiento sin flechas */
        #dropdownList {
          scrollbar-width: thin;
          /* Ajusta la barra a delgada */
          scrollbar-color: #6b7280 transparent;
        }

        #dropdownList {
          z-index: 10;
          /* Asegura que esté por encima de otros elementos */

        }
      </style>

    </form>
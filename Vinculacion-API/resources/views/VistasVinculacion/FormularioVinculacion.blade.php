<!DOCTYPE html>
<html lang="es" class="dark">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Visitas Industriales ITH</title>

    <!-- Librerías externas -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.7.1/jszip.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/docx@7.1.0/build/index.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>

  </head>

  <body class="bg-gray-900">
    <!-- Navegación -->
    <x-navbar />
    <!-- Formulario -->
    <hr class="border-gray-300 dark:border-gray-600" />
    <form
      id="wordForm"
      class="max-w-4xl mx-auto mt-20 p-6 bg-gray-800 shadow-lg rounded-lg"
      onsubmit="return validateForm()"
    >
      <!-- Primera fila -->
      <div class="grid grid-cols-3 gap-4 mb-5">
        <div>
          <label for="num-oficio" class="block mb-2 text-sm font-medium text-white">
            Número de Oficio
          </label>
          <input
            type="text"
            id="num-oficio"
            class="shadow-sm bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
            placeholder="Escriba número de oficio"
            pattern="^\d+$"
            title="Debe ingresar un número de oficio válido (solo números)"
            required
          />
        </div>

        <script>
          // Genera el número de oficio basándose en año, mes, día, hora y minutos
          function generarNumeroOficio() {
            const now = new Date();
            const year = String(now.getFullYear()).slice(-2);
            const month = String(now.getMonth() + 1).padStart(2, '0');
            const day = String(now.getDate()).padStart(2, '0');
            const random = Math.floor(Math.random() * 1000).toString().padStart(3, '0'); // Número de 3 dígitos
            // Concatenamos todas las partes y devolvemos el número de oficio
            return year + month + day + random;
          }

          // Al cargar el DOM, asignamos el número generado al input
          document.addEventListener('DOMContentLoaded', () => {
            const oficioInput = document.getElementById('num-oficio');
            oficioInput.value = generarNumeroOficio();
          });
        </script>
        <div>
  <label for="fecha" class="block mb-2 text-sm font-medium text-white">
    Fecha de Solicitud
  </label>
  <div class="relative">
    <div class="absolute inset-y-0 start-0 flex items-center pl-3 pointer-events-none">
      <svg class="w-4 h-4 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
        <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 1 1 0-2Z"/>
      </svg>
    </div>
    <input
      datepicker
      datepicker-format="dd/mm/yyyy"
      id="fecha"
      type="text"
      class="shadow-sm bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5"
      placeholder="Seleccione la fecha de Solicitud"
      autocomplete="off"
      required
    />
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', () => {
    // Configurar el datepicker
    const fechaInput = document.getElementById('fecha');
    const datepicker = new Datepicker(fechaInput, {
      format: 'dd-mm-yyyy',        // Formato obligatorio
      autohide: true,
    });
    // Asignar fecha actual USANDO LA API DEL DATEPICKER
    const today = new Date();
    datepicker.setDate(today); // <- Método clave ✅
  });
</script>

        <div>
          <label for="fecha-visita" class="block mb-2 text-sm font-medium text-white">
            Fecha de Visita Propuesta
          </label>
          <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center pl-3 pointer-events-none">
              <svg class="w-4 h-4 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 1 1 0-2Z" />
              </svg>
            </div>
            <input
              datepicker
              data-datepicker-placement="top"
              id="fecha-visita"
              type="text"
              class="shadow-sm bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5"
              placeholder="Seleccione la fecha propuesta"
              autocomplete="off"
              required
            />
          </div>
        </div>
      </div>
      <!-- Segunda fila -->
      <div class="grid grid-cols-3 gap-4 mb-5">
      <div>
        <label for="nombre-empresa" class="block mb-2 text-sm font-medium text-white">
          Nombre de la Empresa
        </label>
        <input
          type="text"
          id="nombre-empresa"
          list="lista-empresas"
          autocomplete = "off"
          class="shadow-sm bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
          placeholder="Escriba el nombre de la empresa"
          required
        />
        <datalist id="lista-empresas"></datalist> <!-- Lista dinámica -->
      </div>
      <div>
        <label for="nombre-dirigido" class="block mb-2 text-sm font-medium text-white">
          Nombre del Contacto Solicitante
        </label>
        <input
          type="text"
          id="nombre-dirigido"
          class="shadow-sm bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
          placeholder="Nombre del contacto"
          readonly
        />
      </div>
      <div>
          <label for="cargo-dirigido" class="block mb-2 text-sm font-medium text-white">
            Cargo del Contacto
          </label>
          <input
            type="text"
            id="cargo-dirigido"
            class="shadow-sm bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
            placeholder="Especifique el cargo del contacto"
            required
          />
        </div>
      </div>
      <!-- Tercer fila -->
      <div class="grid grid-cols-3 gap-4 mb-5">
      <div>
          <label for="num-estudiantes" class="block mb-2 text-sm font-medium text-white">
            Número de Estudiantes
          </label>
          <input
            type="number"
            id="num-estudiantes"
            class="[appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none shadow-sm bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
            placeholder="Ingrese el número de estudiantes"
            min="0"
            required
          />
        </div>
        <div>
          <label for="carrera" class="block mb-2 text-sm font-medium text-white">
            Carreras
          </label>
          <select
            id="carrera"
            class="[appearance:none] shadow-sm bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
            required
          >
            <option value="" disabled selected>Seleccione una carrera</option>
            <option value="aeronautica">ING. AERONÁUTICA</option>
            <option value="biomedica">ING. BIOMÉDICA</option>
            <option value="electrica">ING. ELÉCTRICA</option>
            <option value="electronica">ING. ELECTRÓNICA</option>
            <option value="semiconductores">ING. SEMICONDUCTORES</option>
            <option value="industrial">ING. INDUSTRIAL</option>
            <option value="mecanica">ING. MECÁNICA</option>
            <option value="mecatronica">ING. MECATRÓNICA</option>
            <option value="administracion">LIC. ADMINISTRACIÓN</option>
            <option value="sistemas">ING. SISTEMAS COMPUTACIONALES</option>
            <option value="informatica">ING. INFORMÁTICA</option>
            <option value="gestion">ING. GESTIÓN EMPRESARIAL</option>
          </select>
        </div>
        <div>
          <label for="docente" class="block mb-2 text-sm font-medium text-white">
            Docente Responsable
          </label>
          <input
            type="text"
            id="docente"
            class="shadow-sm bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
            placeholder="Escriba el nombre del docente"
            required
          />
        </div>
      </div>
      <!-- Cuarta fila -->
      <div class="grid grid-cols-3 gap-4 mb-5">

      <div>
          <label for="area" class="block mb-2 text-sm font-medium text-white">
            Área a Observar
          </label>
          <input
            type="text"
            id="area"
            class="shadow-sm bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
            placeholder="Escriba el área a observar"
            required
          />
        </div>
        <div>
          <label for="objetivo" class="block mb-2 text-sm font-medium text-white">
            Objetivo de la Visita
          </label>
          <input
            type="text"
            id="objetivo"
            class="shadow-sm bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
            placeholder="Escriba el objetivo"
            required
          />
        </div>
        <div>
          <label for="turno" class="block mb-2 text-sm font-medium text-white">
            Turno
          </label>
          <input
            type="text"
            id="turno"
            name="turno"
            list="lista-turnos"
            placeholder="Seleccione o ingrese un turno"
            class="shadow-sm bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
            required
          />
          <datalist id="lista-turnos">
            <option value="Matutino (7:00 a 9:00 horas)"></option>
            <option value="Matutino (9:00 a 11:00 horas)"></option>
            <option value="Matutino (11:00 a 13:00 horas)"></option>
            <option value="Vespertino (13:00 a 15:00 horas)"></option>
            <option value="Vespertino (15:00 a 17:00 horas)"></option>
            <option value="Vespertino (17:00 a 19:00 horas)"></option>
            <option value="Vespertino (19:00 a 21:00 horas)"></option>
          </datalist>
        </div>
      </div>
      <!-- Quinta fila -->
      <div class="grid grid-cols-2 gap-4 mb-5">
        <div>
          <label for="contacto" class="block mb-2 text-sm font-medium text-white">
            Nombre del contacto
          </label>
          <input
            type="text"
            id="contacto"
            class="shadow-sm bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
            value = "Lorenia Acosta Beltrán"
            readonly
          />
        </div>
        <div>
          <label for="extension" class="block mb-2 text-sm font-medium text-white">
            Extensión telefónica del contacto
          </label>
          <input
            type="text"
            id="extension"
            class="shadow-sm bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
            value = "6622334939"
            readonly
          />
        </div>
      </div>
      <!-- Botón de envío -->
      <button
        type="submit"
        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
      >
        Generar Documentación
      </button>
    </form>

    <script src="{{ asset('js/BuscarEmpresa.js')}}" defer"></script>
    <script src="/js/formatearFecha.js"></script>
    <script src="{{ asset('js/GenerarWord.js') }}" defer></script>
    
  </body>
</html>

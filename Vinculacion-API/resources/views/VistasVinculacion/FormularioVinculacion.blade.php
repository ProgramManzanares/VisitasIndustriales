<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Solicitud de Visitas a Empresas</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.7.1/jszip.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/docx@7.1.0/build/index.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>

    
    
    <title>Visitas Industriales ITH</title>

    <script>
      // JavaScript para manejar el modo oscuro
      var themeToggleDarkIcon = document.getElementById(
        "theme-toggle-dark-icon"
      );
      var themeToggleLightIcon = document.getElementById(
        "theme-toggle-light-icon"
      );

      if (
        localStorage.getItem("color-theme") === "dark" ||
        (!("color-theme" in localStorage) &&
          window.matchMedia("(prefers-color-scheme: dark)").matches)
      ) {
        document.documentElement.classList.add("dark");
        themeToggleLightIcon.classList.remove("hidden");
      } else {
        themeToggleDarkIcon.classList.remove("hidden");
      }

      var themeToggleBtn = document.getElementById("theme-toggle");
      themeToggleBtn.addEventListener("click", function () {
        themeToggleDarkIcon.classList.toggle("hidden");
        themeToggleLightIcon.classList.toggle("hidden");

        if (localStorage.getItem("color-theme")) {
          if (localStorage.getItem("color-theme") === "light") {
            document.documentElement.classList.add("dark");
            localStorage.setItem("color-theme", "dark");
          } else {
            document.documentElement.classList.remove("dark");
            localStorage.setItem("color-theme", "light");
          }
        } else {
          if (document.documentElement.classList.contains("dark")) {
            document.documentElement.classList.remove("dark");
            localStorage.setItem("color-theme", "light");
          } else {
            document.documentElement.classList.add("dark");
            localStorage.setItem("color-theme", "dark");
          }
        }
      });
    </script>
  </head>
  <body class="bg-gray-100 dark:bg-gray-900">
    <nav class="bg-white border-gray-200 dark:bg-gray-900">
      <div
        class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4"
      >
        <a
          href="https://flowbite.com/"
          class="flex items-center space-x-3 rtl:space-x-reverse"
        >
          <img
            src="https://www.cdcuauhtemoc.tecnm.mx/wp-content/uploads/2021/08/cropped-6471adb1-bba1-4dbc-851a-5d6cc64f660a-copia.png"
            class="h-8"
            alt="Instituto Tecnológico Logo"
          />
          <span
            class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white"
          >
            Visitas Industriales
          </span>
        </a>
        <div
          class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse"
        >
          <button
            type="button"
            class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
            id="user-menu-button"
            aria-expanded="false"
            data-dropdown-toggle="user-dropdown"
            data-dropdown-placement="bottom"
          >
            <span class="sr-only">Open user menu</span>
            <img
              class="w-8 h-8 rounded-full"
              src="https://www.w3schools.com/howto/img_avatar.png"
              alt="default user avatar"
            />
          </button>
          <!-- Dropdown menu -->
          <div
            class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600"
            id="user-dropdown"
          >
            <div class="px-4 py-3">
              <span class="block text-sm text-gray-900 dark:text-white"
                >Nombre de usuario</span
              >
              <span
                class="block text-sm text-gray-500 truncate dark:text-gray-400"
                >name@hermosillo.mx</span
              >
            </div>
            <ul class="py-2" aria-labelledby="user-menu-button">
              <li>
                <a
                  href="#"
                  class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"
                  >Dashboard</a
                >
              </li>
              <li>
                <a
                  href="#"
                  class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"
                  >Settings</a
                >
              </li>
              <li>
                <a
                  href="#"
                  class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"
                  >Earnings</a
                >
              </li>
              <li>
                <a
                  href="#"
                  class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"
                  >Sign out</a
                >
              </li>
            </ul>
          </div>
          <button
            data-collapse-toggle="navbar-user"
            type="button"
            class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
            aria-controls="navbar-user"
            aria-expanded="false"
          >
            <span class="sr-only">Open main menu</span>
            <svg
              class="w-5 h-5"
              aria-hidden="true"
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 17 14"
            >
              <path
                stroke="currentColor"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M1 1h15M1 7h15M1 13h15"
              />
            </svg>
          </button>
        </div>
        <div
          class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1"
          id="navbar-user"
        >
          <ul
            class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700"
          >
            <li>
              <a
                href="#"
                class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"
                aria-current="page"
                >Inicio</a
              >
            </li>
            <li>
              <a
                href="#"
                class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500"
                aria-current="page"
                >Solicitar visita</a
              >
            </li>
            <li>
              <a
                href="#"
                class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"
                >Archivo de visita</a
              >
            </li>
            <li>
              <a
                href="#"
                class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"
                >Evidencia de visita</a
              >
            </li>
            <li>
              <a
                href="#"
                class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"
                >Información de empresas</a
              >
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Separador -->
    <hr class="border-gray-300 dark:border-gray-600" />

    <!-- Formulario -->
    <!-- Formulario -->
  <form id="wordForm" class="max-w-4xl mx-auto mt-20 p-6 bg-white dark:bg-gray-800 shadow-lg rounded-lg"
    onsubmit="return validateForm()">

    <!-- Primera fila -->
    <div class="grid grid-cols-3 gap-4 mb-5">
      <div>
        <label for="num-oficio" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Número de
          Oficio</label>
        <input type="text" id="num-oficio"
          class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
          placeholder="Escriba número de oficio" pattern="^\d+$"
          title="Debe ingresar un número de oficio válido (solo números)" required />
      </div>
      <div>
        <label for="fecha" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fecha de
          Solicitud</label>
        <div class="relative">
          <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
              fill="currentColor" viewBox="0 0 20 20">
              <path
                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 1 1 0-2Z" />
            </svg>
          </div>
          <input datepicker id="fecha" type="text"
            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Seleccione una fecha" autocomplete="off" required />
        </div>
      </div>
      <div>
        <label for="nombre-dirigido" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre
          Solicitante</label>
        <input type="text" id="nombre-dirigido"
          class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
          placeholder="Escriba su nombre" required />
      </div>
    </div>

    <!-- Segunda fila -->
    <div class="grid grid-cols-3 gap-4 mb-5">
      <div>
        <label for="cargo-dirigido" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cargo del
          Destinatario</label>
        <input type="text" id="cargo-dirigido"
          class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
          placeholder="Especifique el cargo" required />
      </div>
      <div>
        <label for="empresa" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre de la
          Empresa</label>
        <input type="text" id="empresa"
          class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
          placeholder="Escriba el nombre de la empresa" required />
      </div>
      <div>
        <label for="num-estudiantes" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Número de
          Estudiantes</label>
        <input type="number" id="num-estudiantes"
          class="[appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
          placeholder="Ingrese el número de estudiantes" min="0" required />
      </div>
    </div>

    <!-- Tercer fila -->
    <div class="grid grid-cols-3 gap-4 mb-5">
      <div>
        <label for="carrera" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Carreras</label>
        <select id="carrera"
          class="[appearance:none] shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
          required>
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
        <label for="docente" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Docente
          Responsable</label>
        <input type="text" id="docente"
          class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
          placeholder="Esciba el nombre del docente" required />
      </div>

      <div>
        <label for="area" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Área a
          Observar</label>
        <input type="text" id="area"
          class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
          placeholder="Escriba el área a observar" required />
      </div>
    </div>

    <!-- Cuarta fila -->
    <div class="grid grid-cols-3 gap-4 mb-5">
      <div>
        <label for="objetivo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Objetivo de la
          Visita</label>
        <input type="text" id="objetivo"
          class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
          placeholder="Escriba el objetivo" required />
      </div>

      <div>
        <label for="fecha-visita" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fecha de visita</label>
        <div class="relative">
          <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
              fill="currentColor" viewBox="0 0 20 20">
              <path
                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
            </svg>
          </div>
          <input datepicker id="fecha-visita" type="text"
            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Seleccione una fecha" autocomplete="off" required />
        </div>
      </div>
      <div>
        <label for="turno" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Turno</label>
        <select id="turno"
          class="[appearance:none] shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
          required>
          <option value="" disabled selected>Seleccione un turno</option>
          <option value="morning">MATUTINO (9:00 a 11:00 horas)</option>
          <option value="afternoon">VESPERTINO (4:00 A 6:00 horas)</option>
        </select>
      </div>
    </div>

    <!-- Cuarta fila -->
    <div class="grid grid-cols-3 gap-4 mb-5">
      <div>
        <label for="contacto" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre del
          contacto</label>
        <input type="text" id="contacto"
          class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
          placeholder="Lorenia Acosta Beltrán (662) 2604635" required />
      </div>

      <div>
        <label for="extension" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Extensión
          telefónica del contacto</label>
        <input type="text" id="extension"
          class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
          placeholder="Digite un número telefónico" pattern="^\d{10}$" title="Debe ingresar un número de 10 dígitos"
          required />
      </div>
    </div>

    <!-- Continuar con más filas según sea necesario -->
    <button type="submit"
      class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
      Generar Reporte
    </button>
  </form>

    <button id="theme-toggle" type="button">
      <svg id="theme-toggle-dark-icon" class="hidden w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m8-9h-1M4 12H3m15.364-6.364l-.707.707M6.343 17.657l-.707.707M17.657 17.657l.707.707M6.343 6.343l.707.707"></path>
      </svg>
      <svg id="theme-toggle-light-icon" class="hidden w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12a8 8 0 11-16 0 8 8 0 0116 0z"></path>
      </svg>
    </button>

    <script src="{{ asset('js/GenerarWord.js') }}" defer></script>

  </body>
</html>

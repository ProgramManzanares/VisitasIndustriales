<!DOCTYPE html>
<html lang="en" class="dark">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <link rel="stylesheet" href="styles.css" />
    <title>Formulario con Validación</title>

    <style>
      /* Eliminar fondo y mantener solo la línea del scrollbar */
      ::-webkit-scrollbar {
        width: 8px; /* Ancho del scrollbar */
        height: 8px; /* Alto del scrollbar (si es horizontal) */
      }

      /* Eliminar el fondo del track */
      ::-webkit-scrollbar-track {
        background: transparent; /* Sin fondo */
      }

      /* Personalizar la línea del scrollbar */
      ::-webkit-scrollbar-thumb {
        background-color: #888; /* Color de la línea */
        border-radius: 10px; /* Radio de los bordes de la línea */
      }

      /* Personalizar el hover del scrollbar */
      ::-webkit-scrollbar-thumb:hover {
        background-color: #555; /* Color de la línea cuando se pasa el cursor */
      }

      /* Quitar scroll global */
      html,
      body {
        overflow-x: hidden; /* Elimina el scroll horizontal */
        overflow-y: hidden; /* Elimina el scroll vertical */
      }

      html,
      body {
        height: 100%;
        overflow: hidden;
      }
    </style>

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
            id="user-dropdown">
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
                class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"
                aria-current="page"
                >Solicitar visita</a
              >
            </li>
            <li>
              <a
                href="#"
                class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500"
                aria-current="page"
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
                >Subir evidencia</a
              >
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Separador -->
    <hr class="border-gray-300 dark:border-gray-600" />

    <div
      class="container mx-auto p-4 flex flex-col items-center justify-start min-h-screen mt-8"
    >
      <!-- Contenedor principal -->
      <div
        class="w-full max-w-4xl bg-white dark:bg-gray-800 rounded-lg shadow-lg p-4 space-y-4"
      >
        <!-- Formulario de búsqueda -->
        <form>
          <label for="search" class="sr-only">Buscar</label>
          <div class="relative max-w-md mx-auto">
            <input
              type="search"
              id="search"
              placeholder="Buscar empresa"
              autocomplete="off"
              style="outline: none"
              class="block w-full py-2 pl-4 pr-10 text-sm text-gray-900 dark:text-white border border-gray-300 dark:border-gray-600 rounded-lg bg-gray-50 dark:bg-gray-700 focus:ring-blue-500 focus:border-blue-500"
            />
            <button
              type="submit"
              class="absolute right-2 top-1/2 transform -translate-y-1/2 text-white bg-blue-600 hover:bg-blue-700 px-2 py-1 rounded-lg"
            >
              <svg
                class="w-4 h-4 text-white"
                aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                fill="none"
                viewBox="0 0 24 24"
              >
                <path
                  stroke="currentColor"
                  stroke-linecap="round"
                  stroke-width="2"
                  d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"
                />
              </svg>
            </button>
          </div>
        </form>

        <!-- Tabla con desplazamiento -->
        <div
          class="relative overflow-y-auto max-h-[500px] border-t border-gray-200 dark:border-gray-700"
        >
          <table
            class="w-full text-sm text-left text-gray-500 dark:text-gray-400"
          >
            <thead
              class="bg-gray-100 text-gray-700 dark:bg-gray-700 dark:text-gray-200 uppercase"
            >
              <tr>
                <th class="px-6 py-3">Fecha</th>
                <th class="px-6 py-3">Empresa</th>
                <th class="px-6 py-3">Ubicación</th>
                <th class="px-6 py-3">Participantes</th>
                <th class="px-6 py-3">Detalles</th>
              </tr>
            </thead>
            <tbody>
              <!-- Filas de ejemplo -->
              <tr
                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
              >
                <td class="px-6 py-4">12/12/2024</td>
                <td class="px-6 py-4">Empresa XYZ</td>
                <td class="px-6 py-4">Monterrey, NL</td>
                <td class="px-6 py-4 text-center pl-1">35</td>
                <td
                  class="px-6 py-4 text-blue-600 hover:underline cursor-pointer"
                >
                  Ver más
                </td>
              </tr>
              <tr
                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
              >
                <td class="px-6 py-4">12/12/2024</td>
                <td class="px-6 py-4">Empresa XYZ</td>
                <td class="px-6 py-4">Monterrey, NL</td>
                <td class="px-6 py-4 text-center pl-1">35</td>
                <td
                  class="px-6 py-4 text-blue-600 hover:underline cursor-pointer"
                >
                  Ver más
                </td>
              </tr>
              <tr
                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
              >
                <td class="px-6 py-4">12/12/2024</td>
                <td class="px-6 py-4">Empresa XYZ</td>
                <td class="px-6 py-4">Monterrey, NL</td>
                <td class="px-6 py-4 text-center pl-1">35</td>
                <td
                  class="px-6 py-4 text-blue-600 hover:underline cursor-pointer"
                >
                  Ver más
                </td>
              </tr>
              <tr
                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
              >
                <td class="px-6 py-4">12/12/2024</td>
                <td class="px-6 py-4">Empresa XYZ</td>
                <td class="px-6 py-4">Monterrey, NL</td>
                <td class="px-6 py-4 text-center pl-1">35</td>
                <td
                  class="px-6 py-4 text-blue-600 hover:underline cursor-pointer"
                >
                  Ver más
                </td>
              </tr>
              <tr
                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
              >
                <td class="px-6 py-4">12/12/2024</td>
                <td class="px-6 py-4">Empresa XYZ</td>
                <td class="px-6 py-4">Monterrey, NL</td>
                <td class="px-6 py-4 text-center pl-1">35</td>
                <td
                  class="px-6 py-4 text-blue-600 hover:underline cursor-pointer"
                >
                  Ver más
                </td>
              </tr>
              <tr
                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
              >
                <td class="px-6 py-4">12/12/2024</td>
                <td class="px-6 py-4">Empresa XYZ</td>
                <td class="px-6 py-4">Monterrey, NL</td>
                <td class="px-6 py-4 text-center pl-1">35</td>
                <td
                  class="px-6 py-4 text-blue-600 hover:underline cursor-pointer"
                >
                  Ver más
                </td>
              </tr>
              <tr
                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
              >
                <td class="px-6 py-4">12/12/2024</td>
                <td class="px-6 py-4">Empresa XYZ</td>
                <td class="px-6 py-4">Monterrey, NL</td>
                <td class="px-6 py-4 text-center pl-1">35</td>
                <td
                  class="px-6 py-4 text-blue-600 hover:underline cursor-pointer"
                >
                  Ver más
                </td>
              </tr>
              <tr
                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
              >
                <td class="px-6 py-4">12/12/2024</td>
                <td class="px-6 py-4">Empresa XYZ</td>
                <td class="px-6 py-4">Monterrey, NL</td>
                <td class="px-6 py-4 text-center pl-1">35</td>
                <td
                  class="px-6 py-4 text-blue-600 hover:underline cursor-pointer"
                >
                  Ver más
                </td>
              </tr>
              <tr
                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
              >
                <td class="px-6 py-4">12/12/2024</td>
                <td class="px-6 py-4">Empresa XYZ</td>
                <td class="px-6 py-4">Monterrey, NL</td>
                <td class="px-6 py-4 text-center pl-1">35</td>
                <td
                  class="px-6 py-4 text-blue-600 hover:underline cursor-pointer"
                >
                  Ver más
                </td>
              </tr>
              <tr
                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
              >
                <td class="px-6 py-4">12/12/2024</td>
                <td class="px-6 py-4">Empresa XYZ</td>
                <td class="px-6 py-4">Monterrey, NL</td>
                <td class="px-6 py-4 text-center pl-1">35</td>
                <td
                  class="px-6 py-4 text-blue-600 hover:underline cursor-pointer"
                >
                  Ver más
                </td>
              </tr>
              <tr
                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
              >
                <td class="px-6 py-4">12/12/2024</td>
                <td class="px-6 py-4">Empresa XYZ</td>
                <td class="px-6 py-4">Monterrey, NL</td>
                <td class="px-6 py-4 text-center pl-1">35</td>
                <td
                  class="px-6 py-4 text-blue-600 hover:underline cursor-pointer"
                >
                  Ver más
                </td>
              </tr>
              <!-- Más filas si es necesario -->
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <script>
      function validateForm() {
        // Validación puede ser añadida aquí si es necesario
        return true;
      }
    </script>
  </body>
</html>

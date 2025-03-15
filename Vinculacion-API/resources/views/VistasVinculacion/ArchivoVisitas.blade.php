<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Librerías externas -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <link rel="stylesheet" href="styles.css" />
    <title>Formulario con Validación</title>

    <style>
      /* Personalización del scrollbar */
      ::-webkit-scrollbar {
        width: 8px;
        height: 8px;
      }
      ::-webkit-scrollbar-track {
        background: transparent;
      }
      ::-webkit-scrollbar-thumb {
        background-color: #888;
        border-radius: 10px;
      }
      ::-webkit-scrollbar-thumb:hover {
        background-color: #555;
      }
      
      /* Quitar scroll global */
      html,
      body {
        overflow-x: hidden;
        overflow-y: hidden;
        height: 100%;
      }
    </style>
  </head>
  <body class="bg-gray-100 dark:bg-gray-900">
    
     <!-- Navegación -->


    <!-- Separador -->
    <hr class="border-gray-300 dark:border-gray-600" />

    <div class="container mx-auto p-4 flex flex-col items-center justify-start min-h-screen mt-8">
      <!-- Contenedor principal -->
      <div class="w-full max-w-4xl bg-white dark:bg-gray-800 rounded-lg shadow-lg p-4 space-y-4">
        <!-- Formulario de búsqueda -->
        <form>
          <label for="search" class="sr-only">Buscar</label>
          <div class="relative max-w-md mx-auto">
            <input
              type="search"
              id="searchInput"
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
        <div class="relative overflow-y-auto max-h-[500px] border-t border-gray-200 dark:border-gray-700">
          <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="bg-gray-100 text-gray-700 dark:bg-gray-700 dark:text-gray-200 uppercase">
              <tr>
                <th class="px-6 py-3">Fecha</th>
                <th class="px-6 py-3">Empresa</th>
                <th class="px-6 py-3">Ubicación</th>
                <th class="px-6 py-3">Participantes</th>
                <th class="px-6 py-3">Detalles</th>
              </tr>
            </thead>
            <tbody>
              <!-- Ejemplo de fila -->
              <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="px-6 py-4">12/12/2024</td>
                <td class="px-6 py-4">Empresa XYZ</td>
                <td class="px-6 py-4">Monterrey, NL</td>
                <td class="px-6 py-4 text-center pl-1">35</td>
                <td class="px-6 py-4 text-blue-600 hover:underline cursor-pointer">
                  Ver más
                </td>
              </tr>
              <!-- Más filas según sea necesario -->
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <script>
      function validateForm() {
        // Validación si es necesario
        return true;
      }
    </script>
    <script src="{{ asset('js/Buscador.js') }}"></script>
  </body>
</html>

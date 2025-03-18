<!DOCTYPE html>
<html lang="en" class="dark">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Librerías externas -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}" />
    <title>Visitas Industriales ITH</title>
    
    <style>
      /* TailWind CSS para personalizar el scroll */
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
      
      html, body {
        height: 100%;
      }
    </style>
  </head>

  <body class="bg-gray-100 dark:bg-gray-900">
    <!-- Componente de navegación (navbar) -->
    <x-navbar />

    <!-- Separador -->
    <hr class="border-gray-300 dark:border-gray-600" />

    <!-- Contenedor principal -->
    <div class="w-full flex flex-wrap md:flex-nowrap gap-x-6 mt-12 px-4 justify-center items-start">
      <!-- Sección de búsqueda y lista de empresas -->
      <div class="w-full max-w-xl bg-white dark:bg-gray-800 rounded-lg shadow-lg p-4 space-y-4 mt-12 flex-1">
        <!-- Campo de búsqueda -->
        <form>
          <label for="search" class="sr-only">Buscar</label>
          <div class="relative max-w-xl mx-auto flex items-center">
            <svg class="w-5 h-5 text-gray-900 dark:text-white absolute left-3" aria-hidden="true"
                 xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
              <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                    d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
            </svg>
            <input type="search" id="searchInput" placeholder="Buscar empresa" autocomplete="off"
                   style="outline: none"
                   class="block w-full py-2 pl-10 pr-10 text-sm text-gray-900 dark:text-white border border-gray-300 dark:border-gray-600 rounded-lg bg-gray-50 dark:bg-gray-700 focus:ring-blue-500 focus:border-blue-500" />
            <svg class="w-6 h-6 text-blue-700 hover:text-blue-500 absolute right-2 cursor-pointer" aria-hidden="true"
                 xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
              <path fill-rule="evenodd"
                    d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm7.707-3.707a1 1 0 0 0-1.414 1.414L10.586 12l-2.293 2.293a1 1 0 1 0 1.414 1.414L12 13.414l2.293 2.293a1 1 0 0 0 1.414-1.414L13.414 12l2.293-2.293a1 1 0 0 0-1.414-1.414L12 10.586 9.707 8.293Z"
                    clip-rule="evenodd" />
            </svg>
          </div>
        </form>

        <!-- Lista con desplazamiento para las empresas -->
        <div class="relative overflow-y-auto max-h-[400px] border-t border-gray-200 dark:border-gray-700">
          <ul id="empresaList" class="divide-y divide-gray-200 dark:divide-gray-700">
            <!-- Los elementos de la lista se cargarán de manera dinámica vía JavaScript -->
          </ul>
        </div>
      </div>

      <!-- Carta de información de empresa -->
      <div class="w-full md:w-1/3 bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 space-y-4 mt-12 flex justify-center items-center h-[500px] transition-all duration-500 hover:scale-[0.85] hover:h-[450px] overflow-hidden">
        <div id="empresaInfo"
             class="max-w-xs w-full bg-white dark:bg-gray-800 rounded-lg p-6 space-y-4 transition-all duration-500 hover:bg-[rgba(255,255,255,0.9)] dark:hover:bg-[rgba(224,247,250,0.2)] hover:scale-[1.4] shadow-none border-0">
          <h2 id="empresaNombre" class="text-2xl font-semibold text-gray-900 dark:text-white">
            Datos de la Empresa
          </h2>
          <p id="nombreEmpresa" class="text-gray-900 dark:text-white"><strong>Nombre de la empresa:</strong></p>
          <p id="nombreContacto" class="text-gray-900 dark:text-white"><strong>Nombre del Contacto:</strong></p>
          <p id="contactoCargo" class="text-gray-900 dark:text-white"><strong>Cargo del Contacto:</strong></p>
          <button id="btnUpdate" class="w-full py-2 px-4 text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
            Actualizar Datos
          </button>
        </div>
      </div>
    </div>

     <!-- Actualizar Datos -->
<div id="updateModal" class="fixed inset-0 flex items-center justify-center hidden bg-gray-900 bg-opacity-50">
  <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg w-full max-w-md">
    <h2 class="text-xl font-bold mb-4 text-white">Actualizar Datos de la Empresa</h2>
    <form id="updateForm">
      <!-- Campo oculto para el id de la empresa -->
      <input type="hidden" id="updateCompanyId" name="id">

      <div class="mb-4">
        <label class="block text-gray-700 dark:text-gray-300">Nombre de la empresa</label>
        <input type="text" id="updateEmpresa" name="empresa" class="w-full border rounded p-2" required>
      </div>

      <div class="mb-4">
        <label class="block text-gray-700 dark:text-gray-300">Nombre del Contacto</label>
        <input type="text" id="updateContacto" name="contacto_nombre" class="w-full border rounded p-2" required>
      </div>

      <div class="mb-4">
        <label class="block text-gray-700 dark:text-gray-300">Cargo del Contacto</label>
        <input type="text" id="updateCargo" name="puesto" class="w-full border rounded p-2" required>
      </div>

      <!-- Botones para cancelar y guardar -->
      <div class="flex justify-end">
        <button type="button" id="cancelUpdate" class="mr-2 px-4 py-2 bg-gray-500 text-white rounded">
          Cancelar
        </button>
        <button type="submit" class="px-4 py-2 bg-blue-700 text-white rounded">
          Guardar
        </button>
      </div>
    </form>
  </div>
</div>

     

    <!-- Incluye tu archivo Buscador.js -->
    <script src="{{ asset('js/Buscador.js') }}"></script>
  </body>
</html>

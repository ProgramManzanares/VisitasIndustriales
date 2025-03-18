<div
      class="container mx-auto p-4 flex flex-col items-center justify-start min-h-screen mt-8"
    >
      <!-- Contenedor principal -->
      <div
        class="w-full max-w-4xl bg-white dark:bg-gray-800 rounded-lg shadow-lg p-4 space-y-4"
      >
        
        {{-- Search bar (Traido como componente) --}}
        @include('components.search-bar.sbAcademia')

        <!-- Tabla con desplazamiento -->
        <div
          class="relative overflow-y-auto max-h-[500px] border-t border-gray-200 dark:border-gray-700 custom-scrollbar" 
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
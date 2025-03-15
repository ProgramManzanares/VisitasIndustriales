<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Librerías externas -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <title>Evidencias de Visitas</title>

    <!--Tailwind CSS-->
    <style>
      body {
        background-color: #1e1e2f;
        color: #ffffff;
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
      }

      .main-container {
        padding: 20px;
      }

      .container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
      }

      .card {
        background-color: #2b2b3d;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.5);
        transition: transform 0.2s;
      }

      .card:hover {
        transform: translateY(-10px);
        box-shadow: 0 6px 10px rgba(0, 0, 0, 0.7);
      }

      .card h2 {
        color: #2563EB;
        margin: 10px 0;
      }

      .card p {
        margin: 5px 0;
      }

      .card button {
        margin-top: 10px;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        background-color: #2563EB;
        color: #ffffff;
        cursor: pointer;
      }

      .card button:hover {
        background-color: #15397C;
      }

      .load-more {
        text-align: center;
        margin: 20px 0;
      }

      .load-more button {
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        background-color: #2563EB;
        color: #ffffff;
        cursor: pointer;
      }

      .load-more button:hover {
        background-color: #15397C;
      }

      /* Scrollbar personalizado */
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

      html,
      body {
        height: 100%;
      }
    </style>

  </head>
  <body class="bg-gray-100 dark:bg-gray-900">
    <!-- Se incluye el componente de navegación ya creado -->
    <x-navbar />

    <!-- Separador -->
    <hr class="border-gray-300 dark:border-gray-600" />

    <!-- Formulario de búsqueda -->
    <form>
      <label for="search" class="sr-only">Buscar</label>
      <div class="mt-10 relative max-w-xl mx-auto flex items-center">
        <svg
          class="w-5 h-5 text-gray-900 dark:text-white absolute left-3"
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
        <input
          type="search"
          id="searchInput"
          placeholder="Buscar empresa"
          autocomplete="off"
          style="outline: none"
          class="block w-full py-2 pl-10 pr-10 text-sm text-gray-900 dark:text-white border border-gray-300 dark:border-gray-600 rounded-lg bg-gray-50 dark:bg-gray-700 focus:ring-blue-500 focus:border-blue-500"
        />
        <svg
          class="w-6 h-6 text-blue-700 hover:text-blue-500 absolute right-2 cursor-pointer"
          aria-hidden="true"
          xmlns="http://www.w3.org/2000/svg"
          width="24"
          height="24"
          fill="currentColor"
          viewBox="0 0 24 24"
        >
          <path
            fill-rule="evenodd"
            d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm7.707-3.707a1 1 0 0 0-1.414 1.414L10.586 12l-2.293 2.293a1 1 0 1 0 1.414 1.414L12 13.414l2.293 2.293a1 1 0 0 0 1.414-1.414L13.414 12l2.293-2.293a1 1 0 0 0-1.414-1.414L12 10.586 9.707 8.293Z"
            clip-rule="evenodd"
          />
        </svg>
      </div>
    </form>

    <!-- Contenedor principal con tarjetas -->
    <main class="main-container w-full">
      <div class="container bg-gray-800 p-6 rounded-lg border border-gray-600 shadow-lg max-h-[500px] overflow-y-auto mt-5">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
          <div class="card p-4 rounded-lg shadow-md text-white">
            <p>Evidencias de visita a empresa XYZ</p>
            <h2>EMPRESA XYZ</h2>
            <p>Fecha: 12/12/2024</p>
            <button class="mt-2 px-4 py-2 bg-blue-500 text-white rounded">Ver más detalles</button>
          </div>
          <div class="card p-4 rounded-lg shadow-md text-white">
            <p>Evidencias de visita a empresa ABC</p>
            <h2>EMPRESA ABC</h2>
            <p>Fecha: 15/12/2024</p>
            <button class="mt-2 px-4 py-2 bg-blue-500 text-white rounded">Ver más detalles</button>
          </div>
          <div class="card p-4 rounded-lg shadow-md text-white">
            <p>Evidencias de visita a empresa DEF</p>
            <h2>EMPRESA DEF</h2>
            <p>Fecha: 20/12/2024</p>
            <button class="mt-2 px-4 py-2 bg-blue-500 text-white rounded">Ver más detalles</button>
          </div>
          <div class="card p-4 rounded-lg shadow-md text-white">
            <p>Evidencias de visita a empresa 000</p>
            <h2>EMPRESA 000</h2>
            <p>Fecha: 00/00/0000</p>
            <button class="mt-2 px-4 py-2 bg-blue-500 text-white rounded">Ver más detalles</button>
          </div>
          <!-- Repite más cards según sea necesario para probar el scroll -->
        </div>
      </div>
    </main>

    <div class="load-more">
      <button>Cargar más 🔄</button>
    </div>

    <script src="{{ asset('js/Buscador.js') }}"></script>
  </body>
</html>

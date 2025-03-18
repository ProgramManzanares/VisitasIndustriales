<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.7.1/jszip.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/docx@7.1.0/build/index.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>

<!-- resources/views/components/navbar.blade.php -->
<nav class="bg-gray-800 border-gray-700">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
    <a class="flex items-center space-x-3">
      <img
        src="https://www.cdcuauhtemoc.tecnm.mx/wp-content/uploads/2021/08/cropped-6471adb1-bba1-4dbc-851a-5d6cc64f660a-copia.png"
        class="h-8"
        alt="Instituto Tecnológico Logo"
      />
      <span class="self-center text-2xl font-semibold whitespace-nowrap text-white">
        Visitas Industriales
      </span>
    </a>
    <div class="flex items-center md:order-2 space-x-3">
      <button
        type="button"
        class="flex text-sm bg-gray-700 rounded-full focus:ring-4 focus:ring-gray-600"
        id="user-menu-button"
        aria-expanded="false"
        data-dropdown-toggle="user-dropdown"
        data-dropdown-placement="bottom"
      >
        <span class="sr-only">Abrir menú de usuario</span>
        <img
          class="w-8 h-8 rounded-full"
          src="https://www.w3schools.com/howto/img_avatar.png"
          alt="Avatar de usuario"
        />
      </button>
      <!-- Dropdown menu -->
      <div
        class="z-50 hidden my-4 text-base list-none bg-gray-700 divide-y divide-gray-600 rounded-lg shadow"
        id="user-dropdown"
      >
        <div class="px-4 py-3">
          <span class="block text-sm text-white">Nombre de usuario</span>
          <span class="block text-sm text-gray-300 truncate">name@hermosillo.mx</span>
        </div>
        <ul class="py-2" aria-labelledby="user-menu-button">
          <li>
            <a href="#"
               class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-600">
              Dashboard
            </a>
          </li>
          <li>
            <a href="#"
               class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-600">
              Settings
            </a>
          </li>
          <li>
            <a href="#"
               class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-600">
              Earnings
            </a>
          </li>
          <li>
            <a href="#"
               class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-600">
              Sign out
            </a>
          </li>
        </ul>
      </div>
      <button
        data-collapse-toggle="navbar-user"
        type="button"
        class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-300 rounded-lg md:hidden hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-600"
        aria-controls="navbar-user"
        aria-expanded="false"
      >
        <span class="sr-only">Abrir menú principal</span>
        <svg
          class="w-5 h-5"
          aria-hidden="true"
          xmlns="http://www.w3.org/2000/svg"
          fill="none"
          viewBox="0 0 17 14"
        >
          <path stroke="currentColor"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M1 1h15M1 7h15M1 13h15" />
        </svg>
      </button>
    </div>
    <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
      <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-600 rounded-lg bg-gray-800 md:space-x-8 md:flex-row md:mt-0 md:border-0">
        <li>
          <a href="{{ route('PanelVinculacion') }}"
             class="block py-2 px-3 text-white rounded hover:bg-gray-700"
             aria-current="page">
            Inicio
          </a>
        </li>
        <li>
          <a href="{{ route('formulario.vinculacion') }}"
            class="block py-2 px-3 text-white rounded hover:bg-gray-700">
            Solicitar visita
          </a>
        </li>
        <li>
           <a href="{{ route('archivo.visita') }}"
             class="block py-2 px-3 text-white rounded hover:bg-gray-700">
            Archivo de visita
          </a>
        </li>
        <li>
          <a href="{{ route('evidencia.visita') }}"
             class="block py-2 px-3 text-white rounded hover:bg-gray-700">
            Evidencia de visita
          </a>
        </li>
        <li>
          <a href="{{ route('informacion.empresa') }}"
             class="block py-2 px-3 text-white rounded hover:bg-gray-700">
            Información de empresas
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<hr class="border-gray-600" />

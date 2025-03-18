<!DOCTYPE html>
<html lang="en" class="dark">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Librerías externas -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <link rel="stylesheet" href="styles.css" />
    <title>Formulario con Validación</title>
  </head>
  <body class="bg-gray-100 dark:bg-gray-900">
    
    <!-- Mensaje de Bienvenida -->
    <div class="flex justify-center bg-gray-100 dark:bg-gray-900 py-8 mt-6">
      <div class="text-center">
        <h2 class="text-4xl font-extrabold text-gray-900 dark:text-white mb-4">
          ¡Bienvenido!
        </h2>
        <p class="text-lg font-medium text-gray-700 dark:text-gray-300">
          Nos alegra que estés aquí. ¡Realiza tu visita si no lo has hecho!
        </p>
      </div>
    </div>

    <!-- Contenedor Principal -->
    <div class="flex justify-center bg-gray-100 dark:bg-gray-900 py-16 mt-[-40px]">
      <div
        id="contenedor"
        class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-6 max-w-6xl w-full transition-all duration-500 hover:w-[110%] hover:bg-[rgba(255,255,255,0.7)] dark:hover:bg-[rgba(224,247,250,0.1)] hover:scale-105"
      >
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
          <!-- Tarjeta 1 -->
          <a
            href="{{ route('formulario.vinculacion') }}"
            class="relative flex items-center bg-gray-100 border border-gray-200 rounded-lg shadow md:max-w-xl overflow-hidden group dark:border-gray-600 dark:bg-gray-700"
          >
            <!-- Efecto de rellenado -->
            <span
              class="absolute inset-0 bg-gray-200 dark:bg-gray-600 scale-x-0 origin-left transform transition-transform duration-300 ease-in-out group-hover:scale-x-100 group-hover:duration-300 group-focus:duration-500"
            ></span>

            <!-- Contenido de la tarjeta -->
            <div class="relative z-10 flex flex-row items-center w-full">
              <!-- Contenedor del Icono -->
              <div class="flex justify-center items-center bg-gray-200 w-52 h-48 rounded-lg dark:bg-gray-600">
                <!-- Icono -->
                <svg
                  class="w-16 h-16 text-gray-800 dark:text-gray-400"
                  aria-hidden="true"
                  xmlns="http://www.w3.org/2000/svg"
                  fill="currentColor"
                  viewBox="0 0 24 24"
                >
                  <path
                    fill-rule="evenodd"
                    d="M11.906 1.994a8.002 8.002 0 0 1 8.09 8.421 7.996 7.996 0 0 1-1.297 3.957.996.996 0 0 1-.133.204l-.108.129c-.178.243-.37.477-.573.699l-5.112 6.224a1 1 0 0 1-1.545 0L5.982 15.26l-.002-.002a18.146 18.146 0 0 1-.309-.38l-.133-.163a.999.999 0 0 1-.13-.202 7.995 7.995 0 0 1 6.498-12.518ZM15 9.997a3 3 0 1 1-5.999 0 3 3 0 0 1 5.999 0Z"
                    clip-rule="evenodd"
                  />
                </svg>
              </div>
              <!-- Contenido textual -->
              <div class="flex flex-col justify-center p-4">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-gray-300">
                  Solicitar visita
                </h5>
                <p class="font-normal text-gray-700 dark:text-gray-400">
                  Gestiona la solicitud de una nueva visita a la empresa.
                </p>
              </div>
            </div>
          </a>

          <!-- Tarjeta 2 -->
          <a
            href="{{ route('archivo.visita') }}"
            class="relative flex items-center bg-gray-100 border border-gray-200 rounded-lg shadow md:max-w-xl overflow-hidden group dark:border-gray-600 dark:bg-gray-700"
          >
            <!-- Efecto de rellenado -->
            <span
              class="absolute inset-0 bg-gray-200 dark:bg-gray-600 scale-x-0 origin-left transform transition-transform duration-300 ease-in-out group-hover:scale-x-100 group-hover:duration-300 group-focus:duration-500"
            ></span>

            <!-- Contenido de la tarjeta -->
            <div class="relative z-10 flex flex-row items-center w-full">
              <!-- Contenedor del Icono -->
              <div class="flex justify-center items-center bg-gray-200 w-64 h-48 rounded-lg dark:bg-gray-600">
                <!-- Icono proporcionado -->
                <svg
                  class="w-16 h-16 text-gray-800 dark:text-gray-400"
                  aria-hidden="true"
                  xmlns="http://www.w3.org/2000/svg"
                  width="24"
                  height="24"
                  fill="currentColor"
                  viewBox="0 0 24 24"
                >
                  <path
                    fill-rule="evenodd"
                    d="M9 2.221V7H4.221a2 2 0 0 1 .365-.5L8.5 2.586A2 2 0 0 1 9 2.22ZM11 2v5a2 2 0 0 1-2 2H4v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2h-7Z"
                    clip-rule="evenodd"
                  />
                </svg>
              </div>
              <!-- Contenido textual -->
              <div class="flex flex-col justify-center py-6 px-4">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-gray-300">
                  Ver archivo de visita
                </h5>
                <p class="font-normal text-gray-700 dark:text-gray-400">
                  Accede al archivo relacionado con la visita para más detalles.
                </p>
              </div>
            </div>
          </a>

          <!-- Tarjeta 3 -->
          <a
            href="{{ route('evidencia.visita') }}"
            class="relative flex items-center bg-gray-100 border border-gray-200 rounded-lg shadow md:max-w-xl overflow-hidden group dark:border-gray-600 dark:bg-gray-700"
          >
            <!-- Efecto de rellenado -->
            <span
              class="absolute inset-0 bg-gray-200 dark:bg-gray-600 scale-x-0 origin-left transform transition-transform duration-300 ease-in-out group-hover:scale-x-100 group-hover:duration-300 group-focus:duration-500"
            ></span>

            <!-- Contenido de la tarjeta -->
            <div class="relative z-10 flex flex-row items-center w-full">
              <!-- Contenedor del Icono -->
              <div class="flex justify-center items-center bg-gray-200 w-64 h-48 rounded-lg dark:bg-gray-600">
                <!-- Icono proporcionado -->
                <svg
                  class="w-16 h-16 text-gray-800 dark:text-gray-400"
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
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M21 12a28.076 28.076 0 0 1-1.091 9M7.231 4.37a8.994 8.994 0 0 1 12.88 3.73M2.958 15S3 14.577 3 12a8.949 8.949 0 0 1 1.735-5.307m12.84 3.088A5.98 5.98 0 0 1 18 12a30 30 0 0 1-.464 6.232M6 12a6 6 0 0 1 9.352-4.974M4 21a5.964 5.964 0 0 1 1.01-3.328 5.15 5.15 0 0 0 .786-1.926m8.66 2.486a13.96 13.96 0 0 1-.962 2.683M7.5 19.336C9 17.092 9 14.845 9 12a3 3 0 1 1 6 0c0 .749 0 1.521-.031 2.311M12 12c0 3 0 6-2 9"
                  />
                </svg>
              </div>
              <!-- Contenido textual -->
              <div class="flex flex-col justify-center p-4">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-gray-300">
                  Ver evidencia de visita
                </h5>
                <p class="font-normal text-gray-700 dark:text-gray-400">
                  Accede a la evidencia relacionada con la visita para más detalles.
                </p>
              </div>
            </div>
          </a>

          <!-- Tarjeta 4 -->
          <a
            href="{{ route('informacion.empresa') }}"
            class="relative flex items-center bg-gray-100 border border-gray-200 rounded-lg shadow md:max-w-xl overflow-hidden group dark:border-gray-600 dark:bg-gray-700"
          >
            <!-- Efecto de rellenado -->
            <span
              class="absolute inset-0 bg-gray-200 dark:bg-gray-600 scale-x-0 origin-left transform transition-transform duration-300 ease-in-out group-hover:scale-x-100 group-hover:duration-300 group-focus:duration-500"
            ></span>

            <!-- Contenido de la tarjeta -->
            <div class="relative z-10 flex flex-row items-center w-full">
              <!-- Contenedor del Icono -->
              <div class="flex justify-center items-center bg-gray-200 w-64 h-48 rounded-lg dark:bg-gray-600">
                <!-- Icono proporcionado -->
                <svg
                  class="w-16 h-16 text-gray-800 dark:text-gray-400"
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
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M6 4h12M6 4v16M6 4H5m13 0v16m0-16h1m-1 16H6m12 0h1M6 20H5M9 7h1v1H9V7Zm5 0h1v1h-1V7Zm-5 4h1v1H9v-1Zm5 0h1v1h-1v-1Zm-3 4h2a1 1 0 0 1 1 1v4h-4v-4a1 1 0 0 1 1-1Z"
                  />
                </svg>
              </div>
              <!-- Contenido textual -->
              <div class="flex flex-col justify-center p-4">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-gray-300">
                  Acerca de las empresas
                </h5>
                <p class="font-normal text-gray-700 dark:text-gray-400">
                  Accede a los datos de contacto y detalles de las empresas.
                </p>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>
  </body>
</html>

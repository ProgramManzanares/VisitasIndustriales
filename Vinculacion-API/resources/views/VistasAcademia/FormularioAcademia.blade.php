<!DOCTYPE html>
<html lang="en" class="dark">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <link rel="stylesheet" href="styles.css" />
    <title>Visitas Industriales ITH</title>

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

      /* Habilitar scroll en el contenedor del formulario */
      .form-container {
        overflow-y: auto; /* Habilita el scroll vertical */
        max-height: 80vh; /* Limita la altura del contenedor */
      }

      .form-container::-webkit-scrollbar {
        width: 8px; /* Ancho del scrollbar */
      }

      .form-container::-webkit-scrollbar-track {
        background: transparent; /* Sin fondo */
      }

      .form-container::-webkit-scrollbar-thumb {
        background-color: #888; /* Color de la línea */
        border-radius: 10px; /* Radio de los bordes de la línea */
      }

      .form-container::-webkit-scrollbar-thumb:hover {
        background-color: #555; /* Color de la línea cuando se pasa el cursor */
      }

      .box {
          flex: 1;
          background: white;
          padding: 20px;
          border-radius: 8px;
          box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      }
      .left {
          flex: 2;
      }
      .right {
          flex: 1;
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
      <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a
          href="https://flowbite.com/"
          class="flex items-center space-x-3 rtl:space-x-reverse">
          <img
            src="https://www.cdcuauhtemoc.tecnm.mx/wp-content/uploads/2021/08/cropped-6471adb1-bba1-4dbc-851a-5d6cc64f660a-copia.png"
            class="h-8"
            alt="Instituto Tecnológico Logo"
          />
          <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">
            Visitas Industriales
          </span>
        </a>
        <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
          <button
            type="button"
            class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
            id="user-menu-button"
            aria-expanded="false"
            data-dropdown-toggle="user-dropdown"
            data-dropdown-placement="bottom">
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
              <span class="block text-sm text-gray-900 dark:text-white">
                Nombre de usuario
              </span>
              <span class="block text-sm text-gray-500 truncate dark:text-gray-400">
                name@hermosillo.mx
              </span>
            </div>
            <ul class="py-2" aria-labelledby="user-menu-button">
              <li>
                <a
                  href="#"
                  class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                  Dashboard
                </a>
              </li>
              <li>
                <a
                  href="#"
                  class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                  Settings
                </a>
              </li>
              <li>
                <a
                  href="#"
                  class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                  Earnings
                </a>
              </li>
              <li>
                <a
                  href="#"
                  class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                  Sign out
                </a>
              </li>
            </ul>
          </div>

          <button
            data-collapse-toggle="navbar-user"
            type="button"
            class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
            aria-controls="navbar-user"
            aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg
              class="w-5 h-5"
              aria-hidden="true"
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 17 14">
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
          id="navbar-user">
          <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
            <li>
              <a
                href="#"
                class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"
                aria-current="page">
                Inicio
              </a>
            </li>
            <li>
              <a
                href="#"
                class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500"
                aria-current="page">
                Solicitar visita
              </a>
            </li>
            <li>
              <a
                href="#"
                class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                Archivo de visita
              </a>
            </li>
            <li>
              <a
                href="#"
                class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                Evidencia de visita
              </a>
            </li>
            <li>
              <a
                href="#"
                class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                Subir evidencias
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Separador -->
    <hr class="border-gray-300 dark:border-gray-600"/>

    <!-- Formulario -->
    <div class="form-container">
      <form
        action="" 
        class="max-w-4xl mx-auto mt-16 p-6 bg-white dark:bg-gray-800 shadow-lg rounded-lg"
        onsubmit="return validateForm()">
        @csrf
        <div class="grid grid-cols-2 gap-4 mb-5">
          <div>
            <label
              for="NombreSolicitante"
              class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
              Nombre del Maestro Solicitante
            </label>
            <input
              type="text"
              name="nombre_solicitante"
              id="NombreSolicitante"
              class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
              placeholder="Escriba nombre del maestro"
              required
            />
          </div>

          <div>
            <label
              for="correo-maestro"
              class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
              Correo Electrónico del Maestro
            </label>
            <input
              type="email"
              name="correo_maestro"
              id="correo-maestro"
              class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
              placeholder="Escriba el correo electrónico"
              required
            />
          </div>
        </div>

        <div class="grid grid-cols-2 gap-4 mb-5">
          <div>
              <label for="telefono-maestro" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                  Teléfono del Maestro
              </label>
              <input 
                type="tel"
                name="telefono_maestro" 
                id="telefono-maestro"
                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Escriba el número de teléfono" 
                pattern="^[0-9]{10}$"
                title="Debe ingresar un número de teléfono válido (10 dígitos)" 
                required
              />
          </div>     
          
          <div>
            <label
              for="Cargo"
              class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
              Cargo del maestro
            </label>
            <input
              type="cargo"
              name="cargo_maestro"
              id="Cargo"
              class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
              placeholder="Escriba el cargo del maestro"
              required
            />
          </div>
        </div>

        <!-- Separador -->
        <hr class="border-gray-300 dark:border-gray-600"/>

        <div class="grid grid-cols-2 gap-4 mt-5 mb-5">
          <div>
            <label
              for="nombre-empresa"
              class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
              Nombre de la Empresa a Visitar
            </label>
            <input
              type="text"
              name="nombre_empresa"
              id="nombre-empresa"
              class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
              placeholder="Escriba el nombre de la empresa"
              required
            />
          </div>

          <div>
            <label
              for="cargo"
              class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
              Modalidad
            </label>
            <select
              id="cargo"
              name="modalidad"
              class="[appearance:none] shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
              required>
              <option value="" disabled selected>Seleccione un cargo</option>
              <option value="presencial">Presencial</option>
              <option value="virtual">Virtual</option>
            </select>
          </div>
        </div>

        <script>
          @php
            $carreras = [
                'aeronautica' => 'Ingeniería Aeronáutica',
                'biomedica' => 'Ingeniería Biomédica',
                'electrica' => 'Ingeniería Eléctrica',
                'electronica' => 'Ingeniería Electrónica',
                'semiconductores' => 'Ingeniería en Semiconductores',
                'industrial' => 'Ingeniería Industrial',
                'mecanica' => 'Ingeniería Mecánica',
                'mecatronica' => 'Ingeniería Mecatrónica',
                'sistemas' => 'Ingeniería en Sistemas Computacionales',
                'informatica' => 'Ingeniería en Informática',
                'gestion' => 'Ingeniería en Gestión Empresarial',
                'administracion' => 'Licenciatura en Administración'
            ];
          @endphp
        </script>

        <div class="grid grid-cols-2 gap-4 mb-5">
          <div>
            <label for="carreras" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
              Carrera(s)
            </label>

            <!-- Contenedor del Combo Box -->
            <div class="relative">
                <!-- Botón para abrir/cerrar la lista -->
                <button id="dropdownButton" type="button" class="w-full text-left shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white flex justify-between items-center">
                    <span id="selectedOptions" class="truncate block max-w-[90%] whitespace-nowrap overflow-hidden">
                        Seleccione una carrera
                    </span>
                    <svg class="w-5 h-5 text-gray-500 dark:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>

                <!-- Lista desplegable con checkboxes -->
                <div id="dropdownList" class="absolute w-full mt-1 bg-white border border-gray-300 rounded-lg shadow-lg dark:bg-gray-700 dark:border-gray-600 hidden">
                    <div class="max-h-48 overflow-y-auto p-2"> 
                        @foreach($carreras as $key => $nombre)
                            <label class="flex items-center gap-2">
                                <input type="checkbox" name="carreras[]" value="{{ $key }}" class="checkbox carrera"> {{ $nombre }}
                            </label>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div>
            <label
              for="nombre-grupo"
              class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
              Grupo
            </label>
            <input
              type="text"
              name="grupo"
              id="nombre-grupo"
              class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
              placeholder="Escriba el nombre del grupo"
              required
            />
          </div>
        </div>

          <div class="grid grid-cols-2 gap-4 mb-5">
            <div>
              <label
                for="asignatura"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Asignatura
              </label>
              <input
                type="text"
                name="asignatura"
                id="asignatura"
                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Escriba la asignatura"
                required
              />
            </div>

            <div>
              <label
                for="Fecha"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Fecha de Visita Propuesta
              </label>
              <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                  <svg
                    class="w-4 h-4 text-gray-500 dark:text-gray-400"
                    aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor"
                    viewBox="0 0 20 20">
                    <path
                      d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"
                    />
                  </svg>
                </div>
                <input
                  datepicker
                  id="Fecha"
                  name="fecha_visita"
                  type="text"
                  class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  placeholder="Seleccione una fecha"
                  autocomplete="off"
                  required
                />
              </div>
            </div>
          </div>

          <div class="grid grid-cols-2 gap-4 mb-5">
            <div>
              <label
                for="NumeroEstudiantes"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Número de Estudiantes
              </label>
              <input
                type="number"
                id="NumeroEstudiantes"
                class="[appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Ingrese el número de estudiantes"
                min="0"
                required
              />
            </div>

            <div>
              <label
                for="AreaObservar"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Área a Observar
              </label>
              <input
                type="text"
                id="AreaObservar"
                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Escriba el área a observar"
                required
              />
            </div>
          </div>

          <div class="grid grid-cols-2 gap-4 mb-5">
            <div>
              <label
                for="ObjetivoVisita"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Objetivo de la Visita 
            </label>
            <input
              type="text"
              id="ObjetivoVisita"
              class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
              placeholder="Escriba el objetivo"
              required
            />
          </div>

          <div>
            <label
              for="Turno"
              class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
              Turno
            </label>
            <select
              id="Turno"
              class="[appearance:none] shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
              required>
              <option value="" disabled selected>Seleccione un turno</option>
              <option value="morning">Matutino (9:00-11:00 A.M)</option>
              <option value="afternoon">Vespertino (2:00-4:00 P.M)</option>
            </select>
          </div>
        </div>

        <div class="grid grid-cols-2 gap-4 mb-5">     
          <div class="col-span-2"> 
            <label
              for="notas"
              class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
              Notas:
            </label>
            <textarea
              id="notas"
              rows="5"
              class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
              placeholder="Escriba algunas notas"
              required
            ></textarea>
          </div>
        </div>
            
        <!-- Separador -->
        <hr class="border-gray-300 dark:border-gray-600"/>

        <label
          for="text"
          class="block mb-2 text-sm font-medium text-gray-900 dark:text-white mt-5 mb-5">
          Nota: Si ya tiene la visita gestionada seleccione "Sí" para capturar los datos del contacto
        </label>

        <div class="mt-5 mb-5">
          <label for="visita-gestionada" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
            ¿Visita gestionada?
          </label>
          <div class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg p-2.5 flex items-center dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
            <input type="radio" id="visita-gestionada-si" name="visita-gestionada" required
              class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
              onclick="mostrarFormulario()"
            >
            <label for="visita-gestionada-si" class="ml-2 text-sm font-medium text-gray-900 dark:text-white">
              Sí
            </label>
            <input type="radio" id="visita-gestionada-no" name="visita-gestionada" required
              class="ml-4 w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
              onclick="ocultarFormulario()"
            >     
            <label for="visita-gestionada-no" class="ml-2 text-sm font-medium text-gray-900 dark:text-white">
              No
            </label>
          </div>

          <div id="formulario-gestionada" class="mt-4 hidden">
            <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
              Nombre
            </label>
            <input type="text" id="nombre" placeholder="Nombre del contacto"
              class="block w-full p-2.5 mb-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
              autocomplete="off"
            >

            <label for="correo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
              Correo
            </label>
            <input type="email" id="correo" placeholder="Correo del contacto"
              class="block w-full p-2.5 mb-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
              autocomplete="off"
            >

            <label for="contacto" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
              Contacto
            </label>
            <input type="text" id="contacto" placeholder="Número del contacto"
              class="block w-full p-2.5 mb-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
              autocomplete="off"
            >
          </div>
        </div>
      

        <!-- Separador -->
        <hr class="border-gray-300 dark:border-gray-600"/>
            
        <!-- Contenedor que empuja el botón hacia abajo -->
        <div style="flex-grow: 1;"></div>

        <div class="grid grid-cols-2 gap-4">
          <button
            type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mt-6 mb-6">
            Enviar
          </button>
        </div>
      </form>
    </div>

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

    <script>
      function mostrarFormulario() {
          document.getElementById("formulario-gestionada").classList.remove("hidden");

          // Hacer los campos requeridos
          document.getElementById("nombre").setAttribute("required", "required");
          document.getElementById("correo").setAttribute("required", "required");
          document.getElementById("contacto").setAttribute("required", "required");
      }

      function ocultarFormulario() {
          document.getElementById("formulario-gestionada").classList.add("hidden");

          // Remover el atributo requerido
          document.getElementById("nombre").removeAttribute("required");
          document.getElementById("correo").removeAttribute("required");
          document.getElementById("contacto").removeAttribute("required");
      }
    </script>

    <script>
      function validateForm() {
        // Validación puede ser añadida aquí si es necesario
        return true;
      }
    </script>       
  </body>
</html>

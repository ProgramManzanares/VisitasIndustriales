<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <title>Evidencias de Visitas</title>

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

        /*Esto es lo que hace la animación de las tarjetas de las empresas al pasar el clic*/
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
        
        /* Eliminar fondo y mantener solo la línea del scrollbar */
        ::-webkit-scrollbar {
        width: 8px;
        /* Ancho del scrollbar */
        height: 8px;
        /* Alto del scrollbar (si es horizontal) */
        }

        /* Eliminar el fondo del track */
        ::-webkit-scrollbar-track {
        background: transparent;
        /* Sin fondo */
        }

        /* Personalizar la línea del scrollbar */
        ::-webkit-scrollbar-thumb {
        background-color: #888;
        /* Color de la línea */
        border-radius: 10px;
        /* Radio de los bordes de la línea */
        }

        /* Personalizar el hover del scrollbar */
        ::-webkit-scrollbar-thumb:hover {
        background-color: #555;
        /* Color de la línea cuando se pasa el cursor */
        }

        /* Elimina el scroll horizontal */
        html,
        body {
        height: 100%;
        /* Mantener el 100% de altura */
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
            <a href="https://flowbite.com/" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img
                src="https://www.cdcuauhtemoc.tecnm.mx/wp-content/uploads/2021/08/cropped-6471adb1-bba1-4dbc-851a-5d6cc64f660a-copia.png"
                class="h-8" alt="Instituto Tecnológico Logo" />
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">
                Visitas Industriales
            </span>
            </a>
            <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
            <button type="button"
                class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                data-dropdown-placement="bottom">
                <span class="sr-only">Open user menu</span>
                <img class="w-8 h-8 rounded-full" src="https://www.w3schools.com/howto/img_avatar.png"
                alt="default user avatar" />
            </button>
            <!-- Dropdown menu -->
            <div
                class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600"
                id="user-dropdown">
                <div class="px-4 py-3">
                <span class="block text-sm text-gray-900 dark:text-white">Nombre de usuario</span>
                <span class="block text-sm text-gray-500 truncate dark:text-gray-400">name@hermosillo.mx</span>
                </div>
                <ul class="py-2" aria-labelledby="user-menu-button">
                <li>
                    <a href="#"
                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Dashboard</a>
                </li>
                <li>
                    <a href="#"
                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Settings</a>
                </li>
                <li>
                    <a href="#"
                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Earnings</a>
                </li>
                <li>
                    <a href="#"
                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign
                    out</a>
                </li>
                </ul>
            </div>
            <button data-collapse-toggle="navbar-user" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-user" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
            </div>
            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
            <ul
                class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                <li>
                <a href="#"
                    class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"
                    aria-current="page">Inicio</a>
                </li>
                <li>
                <a href="#"
                    class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"
                    aria-current="page">Solicitar visita</a>
                </li>
                <li>
                <a href="#"
                    class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Archivo
                    de visita</a>
                </li>
                <li>
                <a href="#"
                    class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500">Evidencia
                    de visita</a>
                </li>
                <li>
                <a href="#"
                    class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Información
                    de empresas</a>
                </li>
            </ul>
            </div>
        </div>
    </nav>

    <!-- Separador -->
    <hr class="border-gray-300 dark:border-gray-600" />

    <form>
        <label for="search" class="sr-only">Buscar</label>

        <div class="mt-10 relative max-w-xl mx-auto flex items-center">
            <svg class="w-5 h-5 text-gray-900 dark:text-white absolute left-3" aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
            </svg>
            <input type="search" id="searchInput" placeholder="Buscar empresa" autocomplete="off" style="outline: none"
            class="block w-full py-2 pl-10 pr-10 text-sm text-gray-900 dark:text-white border border-gray-300 dark:border-gray-600 rounded-lg bg-gray-50 dark:bg-gray-700 focus:ring-blue-500 focus:border-blue-500" />
            <svg class="w-6 h-6 text-blue-700 hover:text-blue-500 absolute right-2 cursor-pointer" aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                <path fill-rule="evenodd"
                d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm7.707-3.707a1 1 0 0 0-1.414 1.414L10.586 12l-2.293 2.293a1 1 0 1 0 1.414 1.414L12 13.414l2.293 2.293a1 1 0 0 0 1.414-1.414L13.414 12l2.293-2.293a1 1 0 0 0-1.414-1.414L12 10.586 9.707 8.293Z"
                clip-rule="evenodd" />
            </svg>
        </div>
    </form>

    <!-- Contenedor principal con un recuadro -->
    <main class="main-container w-full">
        <!-- Contenedor de los cards con un borde, padding y scroll -->
        <div class="container bg-gray-800 p-6 rounded-lg border border-gray-600 shadow-lg max-h-[500px] overflow-y-auto mt-5">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                <div class="card bg-#2B2B3D p-4 rounded-lg shadow-md text-white">
                    <p>Evidencias de visita a empresa XYZ</p>
                    <h2>EMPRESA XYZ</h2>
                    <p>Fecha: 12/12/2024</p>
                    <button class="mt-2 px-4 py-2 bg-blue-500 text-white rounded">Ver más detalles</button>
                </div>
                <div class="card bg-#2B2B3D p-4 rounded-lg shadow-md text-white">
                    <p>Evidencias de visita a empresa ABC</p>
                    <h2>EMPRESA ABC</h2>
                    <p>Fecha: 15/12/2024</p>
                    <button class="mt-2 px-4 py-2 bg-blue-500 text-white rounded">Ver más detalles</button>
                </div>
                <div class="card bg-#2B2B3D p-4 rounded-lg shadow-md text-white">
                    <p>Evidencias de visita a empresa DEF</p>
                    <h2>EMPRESA DEF</h2>
                    <p>Fecha: 20/12/2024</p>
                    <button class="mt-2 px-4 py-2 bg-blue-500 text-white rounded">Ver más detalles</button>
                </div>
                <div class="card bg-#2B2B3D p-4 rounded-lg shadow-md text-white">
                    <p>Evidencias de visita a empresa 000</p>
                    <h2>EMPRESA 000</h2>
                    <p>Fecha: 00/00/0000</p>
                    <button class="mt-2 px-4 py-2 bg-blue-500 text-white rounded">Ver más detalles</button>
                </div>
                <!-- Repite más cards para probar el scroll -->
                <div class="card bg-#2B2B3D  p-4 rounded-lg shadow-md text-white">
                    <p>Evidencias de visita a empresa XYZ</p>
                    <h2>EMPRESA XYZ</h2>
                    <p>Fecha: 12/12/2024</p>
                    <button class="mt-2 px-4 py-2 bg-blue-500 text-white rounded">Ver más detalles</button>
                </div>
                <div class="card bg-#2B2B3D p-4 rounded-lg shadow-md text-white">
                    <p>Evidencias de visita a empresa ABC</p>
                    <h2>EMPRESA ABC</h2>
                    <p>Fecha: 15/12/2024</p>
                    <button class="mt-2 px-4 py-2 bg-blue-500 text-white rounded">Ver más detalles</button>
                </div>
                <div class="card bg-#2B2B3D p-4 rounded-lg shadow-md text-white">
                    <p>Evidencias de visita a empresa DEF</p>
                    <h2>EMPRESA DEF</h2>
                    <p>Fecha: 20/12/2024</p>
                    <button class="mt-2 px-4 py-2 bg-blue-500 text-white rounded">Ver más detalles</button>
                </div>
                <div class="card bg-#2B2B3D p-4 rounded-lg shadow-md text-white">
                    <p>Evidencias de visita a empresa 000</p>
                    <h2>EMPRESA 000</h2>
                    <p>Fecha: 00/00/0000</p>
                    <button class="mt-2 px-4 py-2 bg-blue-500 text-white rounded">Ver más detalles</button>
                </div>
                <div class="card bg-#2B2B3D p-4 rounded-lg shadow-md text-white">
                    <p>Evidencias de visita a empresa XYZ</p>
                    <h2>EMPRESA XYZ</h2>
                    <p>Fecha: 12/12/2024</p>
                    <button class="mt-2 px-4 py-2 bg-blue-500 text-white rounded">Ver más detalles</button>
                </div>
                <div class="card bg-#2B2B3D p-4 rounded-lg shadow-md text-white">
                    <p>Evidencias de visita a empresa ABC</p>
                    <h2>EMPRESA ABC</h2>
                    <p>Fecha: 15/12/2024</p>
                    <button class="mt-2 px-4 py-2 bg-blue-500 text-white rounded">Ver más detalles</button>
                </div>
                <div class="card bg-#2B2B3D p-4 rounded-lg shadow-md text-white">
                    <p>Evidencias de visita a empresa DEF</p>
                    <h2>EMPRESA DEF</h2>
                    <p>Fecha: 20/12/2024</p>
                    <button class="mt-2 px-4 py-2 bg-blue-500 text-white rounded">Ver más detalles</button>
                </div>
                <div class="card bg-#2B2B3D p-4 rounded-lg shadow-md text-white">
                    <p>Evidencias de visita a empresa 000</p>
                    <h2>EMPRESA 000</h2>
                    <p>Fecha: 00/00/0000</p>
                    <button class="mt-2 px-4 py-2 bg-blue-500 text-white rounded">Ver más detalles</button>
                </div>
                <!-- Repite más cards para probar el scroll -->
                <div class="card bg-#2B2B3D p-4 rounded-lg shadow-md text-white">
                    <p>Evidencias de visita a empresa XYZ</p>
                    <h2>EMPRESA XYZ</h2>
                    <p>Fecha: 12/12/2024</p>
                    <button class="mt-2 px-4 py-2 bg-blue-500 text-white rounded">Ver más detalles</button>
                </div>
                <div class="card bg-#2B2B3D p-4 rounded-lg shadow-md text-white">
                    <p>Evidencias de visita a empresa ABC</p>
                    <h2>EMPRESA ABC</h2>
                    <p>Fecha: 15/12/2024</p>
                    <button class="mt-2 px-4 py-2 bg-blue-500 text-white rounded">Ver más detalles</button>
                </div>
                <div class="card bg-#2B2B3D p-4 rounded-lg shadow-md text-white">
                    <p>Evidencias de visita a empresa DEF</p>
                    <h2>EMPRESA DEF</h2>
                    <p>Fecha: 20/12/2024</p>
                    <button class="mt-2 px-4 py-2 bg-blue-500 text-white rounded">Ver más detalles</button>
                </div>
                <div class="card bg-#2B2B3D p-4 rounded-lg shadow-md text-white">
                    <p>Evidencias de visita a empresa 000</p>
                    <h2>EMPRESA 000</h2>
                    <p>Fecha: 00/00/0000</p>
                    <button class="mt-2 px-4 py-2 bg-blue-500 text-white rounded">Ver más detalles</button>
                </div>
                <div class="card bg-#2B2B3D p-4 rounded-lg shadow-md text-white">
                    <p>Evidencias de visita a empresa XYZ</p>
                    <h2>EMPRESA XYZ</h2>
                    <p>Fecha: 12/12/2024</p>
                    <button class="mt-2 px-4 py-2 bg-blue-500 text-white rounded">Ver más detalles</button>
                </div>
                <div class="card bg-#2B2B3D p-4 rounded-lg shadow-md text-white">
                    <p>Evidencias de visita a empresa ABC</p>
                    <h2>EMPRESA ABC</h2>
                    <p>Fecha: 15/12/2024</p>
                    <button class="mt-2 px-4 py-2 bg-blue-500 text-white rounded">Ver más detalles</button>
                </div>
                <div class="card bg-#2B2B3D p-4 rounded-lg shadow-md text-white">
                    <p>Evidencias de visita a empresa DEF</p>
                    <h2>EMPRESA DEF</h2>
                    <p>Fecha: 20/12/2024</p>
                    <button class="mt-2 px-4 py-2 bg-blue-500 text-white rounded">Ver más detalles</button>
                </div>
                <div class="card bg-#2B2B3D p-4 rounded-lg shadow-md text-white">
                    <p>Evidencias de visita a empresa 000</p>
                    <h2>EMPRESA 000</h2>
                    <p>Fecha: 00/00/0000</p>
                    <button class="mt-2 px-4 py-2 bg-blue-500 text-white rounded">Ver más detalles</button>
                </div>
                <!-- Repite más cards para probar el scroll -->
                <div class="card bg-#2B2B3D p-4 rounded-lg shadow-md text-white">
                    <p>Evidencias de visita a empresa XYZ</p>
                    <h2>EMPRESA XYZ</h2>
                    <p>Fecha: 12/12/2024</p>
                    <button class="mt-2 px-4 py-2 bg-blue-500 text-white rounded">Ver más detalles</button>
                </div>
                <div class="card bg-#2B2B3D p-4 rounded-lg shadow-md text-white">
                    <p>Evidencias de visita a empresa ABC</p>
                    <h2>EMPRESA ABC</h2>
                    <p>Fecha: 15/12/2024</p>
                    <button class="mt-2 px-4 py-2 bg-blue-500 text-white rounded">Ver más detalles</button>
                </div>
                <div class="card bg-#2B2B3D p-4 rounded-lg shadow-md text-white">
                    <p>Evidencias de visita a empresa DEF</p>
                    <h2>EMPRESA DEF</h2>
                    <p>Fecha: 20/12/2024</p>
                    <button class="mt-2 px-4 py-2 bg-blue-500 text-white rounded">Ver más detalles</button>
                </div>
                <div class="card bg-#2B2B3D p-4 rounded-lg shadow-md text-white">
                    <p>Evidencias de visita a empresa 000</p>
                    <h2>EMPRESA 000</h2>
                    <p>Fecha: 00/00/0000</p>
                    <button class="mt-2 px-4 py-2 bg-blue-500 text-white rounded">Ver más detalles</button>
                </div>
            </div>
        </div>
    </main>  

    <div class="load-more">
        <button>Cargar más 🔄</button>
    </div>

    <script src="{{asset('js/Buscador.js')}}"></script>
</body>
</html>

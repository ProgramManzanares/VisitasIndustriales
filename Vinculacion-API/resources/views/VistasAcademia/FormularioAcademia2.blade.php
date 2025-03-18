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
    </head>

    <body class="bg-gray-100 dark:bg-gray-900">

        {{-- Navbar Component --}}
        @include('components.nav-bar.nbAcademia')

        {{-- Separador --}}
        <hr class="border-gray-300 dark:border-gray-600" />

        {{-- Progress Bar Component --}}
        @include('components.progress-bar.pb-AcademiaForm2', ['progress' => 50])

        {{-- Success Alert Component --}}
        @include('components.alerts.success-alert')

        {{-- Formulario Component --}}
        <div class="px-4 sm:px-8 md:px-12 lg:px-16">
            @include('components.Forms.FormsAcademia.formSolicitarVisita2')
        </div>

    </body>
</html>

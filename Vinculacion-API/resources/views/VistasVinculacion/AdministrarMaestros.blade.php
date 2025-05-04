<!DOCTYPE html>
<html data-theme="light" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Usuarios</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/rippleui@1.12.1/dist/css/styles.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    
</head>
<body class="flex flex-col items-center justify-start min-h-screen py-8 bg-gray-50">

<!-- Botón Volver mejorado (funcionalidad intacta) -->
<div class="absolute top-6 left-6">
    <a href="{{ route('panel.vinculacion') }}" 
       class="flex items-center p-2 pr-1.5 text-gray-500 transition-all duration-300 ease-in-out bg-white rounded-lg shadow-sm hover:bg-gray-50 hover:shadow-md hover:pr-3 hover:text-blue-600 group border border-gray-200">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 transition-transform duration-300 group-hover:-translate-x-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
        </svg>
        <span class="ml-1.5 text-sm font-medium transition-all duration-300 opacity-0 w-0 overflow-hidden group-hover:opacity-100 group-hover:w-auto whitespace-nowrap">
            Volver
        </span>
    </a>
</div>

<!-- Sección del buscador mejorada (funcionalidad intacta) -->
<div class="relative w-full max-w-2xl px-4 mt-8 mb-8">
    <div class="relative">
        <input type="text" 
               class="w-full h-12 pl-4 pr-12 text-gray-700 transition-all duration-200 border border-gray-300 rounded-lg input-focus-effect focus:outline-none focus:ring-2 focus:ring-blue-500/20" 
               placeholder="Buscar usuario..." />
        <div class="absolute inset-y-0 right-0 flex items-center pr-3">
            <svg xmlns="http://www.w3.org/2000/svg" 
                 class="w-6 h-6 text-blue-500 transition-colors duration-200 cursor-pointer hover:text-blue-600" 
                 fill="none" 
                 viewBox="0 0 24 24" 
                 stroke="currentColor" 
                 stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
        </div>
    </div>
</div>

<!-- Sección de la tabla mejorada (con funcionalidad original) -->
<div class="container max-w-6xl px-4 mx-auto mt-4" id="tablaMaestros">
    <div class="overflow-hidden bg-white border border-gray-200 shadow-sm rounded-xl">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">ID</th>
                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Nombre</th>
                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Apellido Paterno</th>
                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Apellido Materno</th>
                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Clave</th>
                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Correo</th>
                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Teléfono</th>
                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                        <div class="flex items-center justify-between">
                            <span>Acciones</span>
                            <label for="modal-agregar" class="px-3 py-1 ml-2 text-xs font-medium text-white transition-all duration-200 bg-blue-500 rounded-md shadow-sm cursor-pointer btn-action hover:bg-blue-600">
                                Añadir
                            </label>
                        </div>
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200" id="tablaUsuarios">
                <tr class="transition-colors duration-150 hover:bg-gray-50/80">
                        <div class="flex justify-center gap-2">

                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal para modificar usuario (con funcionalidad original) -->
<input type="checkbox" id="modal-modificar" class="modal-state" />
<div class="modal">
    <label for="modal-modificar" class="modal-overlay"></label>
    <div class="relative flex flex-col w-full max-w-4xl gap-6 p-8 bg-white rounded-lg modal-content">
        <label for="modal-modificar" class="absolute btn btn-sm btn-circle btn-ghost right-4 top-4 hover:bg-gray-100">✕</label>
        <h2 class="text-2xl font-bold text-center text-gray-800">Modificar usuario</h2>

        <form id="formModificarUsuario" class="grid grid-cols-1 gap-6 md:grid-cols-3">
            <!-- Primera columna -->
            <div class="flex flex-col w-full gap-4">
                <div class="form-field">
                    <label class="block mb-1 text-sm font-medium text-gray-700">Nombre</label>
                    <input type="text" id="mod-nombre" name="nombre" class="w-full input input-focus-effect" required />
                </div>

                <div class="form-field">
                    <label class="block mb-1 text-sm font-medium text-gray-700">Apellido Paterno</label>
                    <input type="text" id="mod-apellidoPaterno" name="apellidoPaterno" class="w-full input input-focus-effect" required />
                </div>
            </div>

            <!-- Segunda columna -->
            <div class="flex flex-col w-full gap-4">
                <div class="form-field">
                    <label class="block mb-1 text-sm font-medium text-gray-700">Apellido Materno</label>
                    <input type="text" id="mod-apellidoMaterno" name="apellidoMaterno"class="w-full input input-focus-effect" required />
                </div>

                <div class="form-field">
                    <label class="block mb-1 text-sm font-medium text-gray-700">Clave</label>
                    <input type="text" id="mod-clave" name="clave" class="w-full input input-focus-effect" required />
                </div>
            </div>

            <!-- Tercera columna -->
            <div class="flex flex-col w-full gap-4">
                <div class="form-field">
                    <label class="block mb-1 text-sm font-medium text-gray-700">Correo Electrónico</label>
                    <input type="email" id="mod-correo" name="correo" class="w-full input input-focus-effect" required />
                </div>

                <div class="form-field">
                    <label class="block mb-1 text-sm font-medium text-gray-700">Teléfono</label>
                    <input type="tel" id="mod-telefono" name="telefono" class="w-full input input-focus-effect" required />
                </div>
            </div>

            <div class="flex justify-center col-span-3 mt-4">
                <button type="submit" class="px-8 py-2.5 text-sm font-medium text-white transition-all duration-200 bg-blue-500 rounded-lg shadow-md btn-action hover:bg-blue-600">
                    Guardar Cambios
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Modal para agregar usuario (funcionalidad intacta) -->
<input type="checkbox" id="modal-agregar" class="modal-state" />
<div class="modal">
    <label for="modal-agregar" class="modal-overlay"></label>
    <div class="relative flex flex-col w-full max-w-4xl gap-6 p-8 bg-white rounded-lg modal-content">
        <label for="modal-agregar" class="absolute btn btn-sm btn-circle btn-ghost right-4 top-4 hover:bg-gray-100">✕</label>
        <h2 class="text-2xl font-bold text-center text-gray-800">Agregar nuevo usuario</h2>

        <form id="formAgregarUsuario" class="grid grid-cols-1 gap-6 md:grid-cols-3">
            <!-- Primera columna -->
            <div class="flex flex-col w-full gap-4">
                <div class="relative form-field">
                    <label class="block mb-1 text-sm font-medium text-gray-700">Nombre</label>
                    <input type="text" id="nombre" name="nombre" class="w-full input input-focus-effect" placeholder="Nombre" required />
                    <span id="validoNombre" class="absolute text-xs text-green-500 top-full">Nombre válido</span>
                </div>

                <div class="relative form-field">
                    <label class="block mb-1 text-sm font-medium text-gray-700">Apellido Paterno</label>
                    <input type="text" id="apellidoPaterno" name="apellidoPaterno" class="w-full input input-focus-effect" placeholder="Apellido Paterno" required />
                    <span id="validoApellidoPaterno" class="absolute text-xs text-green-500 top-full">Apellido válido</span>
                </div>
            </div>

            <!-- Segunda columna -->
            <div class="flex flex-col w-full gap-4">
                <div class="relative form-field">
                    <label class="block mb-1 text-sm font-medium text-gray-700">Apellido Materno</label>
                    <input type="text" id="apellidoMaterno" name="apellidoMaterno" class="w-full input input-focus-effect" placeholder="Apellido Materno" required />
                    <span id="validoApellidoMaterno" class="absolute text-xs text-green-500 top-full">Apellido válido</span>
                </div>

                <div class="relative form-field">
                    <label class="block mb-1 text-sm font-medium text-gray-700">Clave</label>
                    <input type="text" id="clave" name="clave"  class="w-full input input-focus-effect" placeholder="Clave" required />
                    <span id="errorClave" class="absolute text-xs text-red-500 top-full">Debe ser única</span>
                </div>
            </div>

            <!-- Tercera columna -->
            <div class="flex flex-col w-full gap-4">
                <div class="relative form-field">
                    <label class="block mb-1 text-sm font-medium text-gray-700">Correo Electrónico</label>
                    <input type="email" id="correo" name="correo" class="w-full input input-focus-effect" placeholder="Correo Electrónico" required />
                    <span id="errorCorreo" class="absolute text-xs text-red-500 top-full">Correo inválido</span>
                </div>

                <div class="relative form-field">
                    <label class="block mb-1 text-sm font-medium text-gray-700">Teléfono</label>
                    <input type="tel" id="telefono" name="telefono" class="w-full input input-focus-effect" placeholder="Teléfono" required />
                    <span id="errorTelefono" class="absolute text-xs text-red-500 top-full">Teléfono inválido</span>
                </div>
            </div>

            <div class="flex justify-center col-span-3 mt-4">
                <button type="submit" class="px-8 py-2.5 text-sm font-medium text-white transition-all duration-200 bg-green-500 rounded-lg shadow-md btn-action hover:bg-green-600">
                    Guardar Usuario
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Scripts originales (funcionalidad intacta) -->
<script src="{{ asset('js/AdministrarMaestros/validacionesUsuarios.js') }}"></script>
<script src="{{ asset('js/AdministrarMaestros/filtrarBusqueda.js') }}"></script> 
<script src="{{ asset('js/AdministrarMaestros/modificarUsuario.js') }}"></script>
<script src="{{ asset('js/AdministrarMaestros/agregarUsuario.js') }}"></script>
<script src="{{ asset('js/AdministrarMaestros/apiUsuarios.js') }}"></script>
<script src="{{ asset('js/AdministrarMaestros/eliminarUsuario.js') }}"></script>

</body>
</html>
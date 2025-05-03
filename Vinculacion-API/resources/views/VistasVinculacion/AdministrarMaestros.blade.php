<!DOCTYPE html>
<html data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Usuarios</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/rippleui@1.12.1/dist/css/styles.css" />
    <link rel="stylesheet" href="{{ asset('css/stylesAdminMaestros.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex flex-col items-center justify-start min-h-screen py-12">

    <!-- Sección del buscador -->
    <div class="relative mt-6 mb-6">
        <input type="text" class="pr-10 border border-gray-300 input w-80 focus:outline-none focus:ring-0" placeholder="Buscar usuario..." />
        <div class="absolute inset-y-0 right-0 flex items-center pr-3">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 text-blue-600 cursor-pointer hover:text-blue-800">
                <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
            </svg>
        </div>
    </div>

    <!-- Sección de la tabla -->
    <div class="container max-w-4xl px-4 mx-auto mt-6">
        <div class="overflow-x-auto">
            <table class="table w-full">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>Clave</th>
                        <th>Correo</th>
                        <th>Teléfono</th>
                        <th class="flex items-center justify-between">
                            Acciones
                            <label for="modal-agregar" class="ml-2 btn btn-xs btn-success">
                                Añadir
                            </label>
                        </th>
                    </tr>
                </thead>
                <tbody id="tablaUsuarios">
                    <tr>
                        <td>1</td>
                        <td>Juan</td>
                        <td>Pérez</td>
                        <td>González</td>
                        <td>ABC123</td>
                        <td>juan.perez@email.com</td>
                        <td>555-1234</td>
                        <td class="text-center">
                            <div class="flex justify-center gap-1">
                                <!-- Botón que abre el modal -->
                                <button class="transition-all duration-300 ease-in-out btn btn-xs btn-error hover:scale-110 hover:shadow-lg hover:shadow-success/50 ">Eliminar</button>
                                <button class="transition-all duration-300 ease-in-out btn btn-xs btn-warning hover:scale-110 hover:shadow-lg hover:shadow-success/50">Modificar</button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal para eliminar usuario -->
    <input type="checkbox" id="modal-modificar" class="modal-state" />
<div class="modal">
    <label for="modal-modificar" class="modal-overlay"></label>
    <div class="relative flex flex-col max-w-xl gap-6 modal-content">
        <label for="modal-modificar" class="absolute btn btn-sm btn-circle btn-ghost right-2 top-2">✕</label>
        <h2 class="text-xl font-bold text-center">Modificar usuario</h2>

        <form id="formModificarUsuario" class="grid grid-cols-3 gap-6 place-items-start">
            <!-- Primera columna -->
            <div class="flex flex-col w-full gap-4">
                <label class="form-label">Nombre</label>
                <input type="text" id="mod-nombre" class="input" required />

                <label class="form-label">Apellido Paterno</label>
                <input type="text" id="mod-apellidoPaterno" class="input" required />
            </div>

            <!-- Segunda columna -->
            <div class="flex flex-col w-full gap-4">
                <label class="form-label">Apellido Materno</label>
                <input type="text" id="mod-apellidoMaterno" class="input" required />

                <label class="form-label">Clave</label>
                <input type="text" id="mod-clave" class="input" required />
            </div>

            <!-- Tercera columna -->
            <div class="flex flex-col w-full gap-4">
                <label class="form-label">Correo Electrónico</label>
                <input type="email" id="mod-correo" class="input" required />

                <label class="form-label">Teléfono</label>
                <input type="tel" id="mod-telefono" class="input" required />
            </div>

            <div class="flex justify-center col-span-3 mt-6">
                <button type="submit" class="px-6 py-2 text-lg btn btn-warning">Guardar Cambios</button>
            </div>
        </form>
    </div>
</div>
    <!-- Modal para agregar usuario -->
<input type="checkbox" id="modal-agregar" class="modal-state" />
<div class="modal">
    <label for="modal-agregar" class="modal-overlay"></label>
    <div class="relative flex flex-col max-w-xl gap-6 modal-content">
        <label for="modal-agregar" class="absolute btn btn-sm btn-circle btn-ghost right-2 top-2">✕</label>
        <h2 class="text-xl font-bold text-center">Agregar nuevo usuario</h2>

        <form id="formAgregarUsuario" class="grid grid-cols-3 gap-6 place-items-start">
            <!-- Primera columna -->
            <div class="flex flex-col w-full gap-4">
                <div class="relative form-field">
                    <label class="form-label">Nombre</label>
                    <input type="text" id="nombre" class="max-w-full outline-none input ring-0 focus:ring-0" placeholder="Nombre" required />
                    <span id="validoNombre" class="absolute left-0 hidden form-label-alt text-success top-full">Nombre válido</span>
                </div>

                <div class="relative form-field">
                    <label class="form-label">Apellido Paterno</label>
                    <input type="text" id="apellidoPaterno" class="max-w-full outline-none input ring-0 focus:ring-0" placeholder="Apellido Paterno" required />
                    <span id="validoApellidoPaterno" class="absolute left-0 hidden form-label-alt text-success top-full">Apellido Paterno válido</span>
                </div>
            </div>

            <!-- Segunda columna -->
            <div class="flex flex-col w-full gap-4">
                <div class="relative form-field">
                    <label class="form-label">Apellido Materno</label>
                    <input type="text" id="apellidoMaterno" class="max-w-full outline-none input ring-0 focus:ring-0" placeholder="Apellido Materno" required />
                    <span id="validoApellidoMaterno" class="absolute left-0 hidden form-label-alt text-success top-full">Apellido Materno válido</span>
                </div>

                <div class="relative form-field">
                    <label class="form-label">Clave</label>
                    <input type="text" id="clave" class="max-w-full outline-none input ring-0 focus:ring-0" placeholder="Clave" required />
                    <span id="errorClave" class="absolute left-0 hidden form-label-alt text-error top-full">Debe ser única.</span>
                </div>
            </div>

            <!-- Tercera columna -->
            <div class="flex flex-col w-full gap-4">
                <div class="relative form-field">
                    <label class="form-label">Correo Electrónico</label>
                    <input type="email" id="correo" class="max-w-full outline-none input ring-0 focus:ring-0" placeholder="Correo Electrónico" required />
                    <span id="errorCorreo" class="absolute left-0 hidden form-label-alt text-error top-full">Debe ser un correo válido y único.</span>
                </div>

                <div class="relative form-field">
                    <label class="form-label">Teléfono</label>
                    <input type="tel" id="telefono" class="max-w-full outline-none input ring-0 focus:ring-0" placeholder="Teléfono" required />
                    <span id="errorTelefono" class="absolute left-0 hidden form-label-alt text-error top-full">Debe ser un teléfono válido y único.</span>
                </div>
            </div>

            <!-- Botón de guardar -->
            <div class="flex justify-center col-span-3 mt-6">
                <button type="submit" class="px-6 py-2 text-lg btn btn-success">Guardar</button>
            </div>
        </form>
    </div>
</div>


<script src="{{ asset('js/AdministrarMaestros/filtrarBusqueda.js') }}"></script>
<script src="{{ asset('js/AdministrarMaestros/validacionesUsuarios.js') }}"></script>
<script src="{{ asset('js/AdministrarMaestros/eliminarUsuario.js') }}"></script>
<script src="{{ asset('js/AdministrarMaestros/modificarUsuario.js') }}"></script>

</body>
</html>
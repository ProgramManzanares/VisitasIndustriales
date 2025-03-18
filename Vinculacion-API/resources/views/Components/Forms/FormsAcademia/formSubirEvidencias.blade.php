{{-- Subir evidencias --}}
<div class="flex justify-center items-start min-h-screen bg-gray-100 dark:bg-gray-900 pt-16">
    <div class="w-full max-w-4xl bg-white dark:bg-gray-800 rounded-lg shadow-lg p-4 space-y-4">
        <!-- Formulario de carga de imágenes -->
        <form id="form-evidencia" class="space-y-4" enctype="multipart/form-data">
            <label for="notas" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Subir
                Evidencias</label>

            <!-- Dropzone -->
            <div id="dropzone"
                class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-700 dark:border-gray-600 dark:hover:border-gray-500 relative overflow-hidden">

                <!-- Contenido Inicial -->
                <div id="dropzone-text"
                    class="flex flex-col items-center justify-center absolute inset-0 transition-opacity duration-300">
                    <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                    </svg>
                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Arrastra
                            tus imágenes aquí</span></p>
                    <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG o GIF</p>
                </div>

                <!-- Vista previa dentro del dropzone -->
                <div id="previewContainer" class="flex flex-wrap gap-1 p-2 w-full h-full hidden"></div>

                <input id="fileInput" type="file" class="hidden" multiple accept=".svg, .png, .jpg, .jpeg, .gif" />
            </div>

            <!-- Notas -->
            <label for="notas"
                class="block mt-4 mb-2 text-sm font-medium text-gray-900 dark:text-white">Notas:</label>
            <div
                class="w-full mb-4 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600">
                <div class="px-4 py-2 bg-white rounded-t-lg dark:bg-gray-800">
                    <textarea id="comment" rows="4" class="focus:outline-none w-full px-0 text-sm text-gray-900 bg-white border-0 dark:bg-gray-800 
                        focus:ring-0 dark:text-white dark:placeholder-gray-400 resize-none max-h-48 overflow-y-auto"
                        placeholder="Deja un comentario..." required></textarea>
                </div>
            </div>

            <!-- Botón de enviar -->
            <div class="flex justify-center mt-6 mb-6">
                <button type="submit"
                    class="w-80 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-3 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Enviar
                </button>
            </div>

            <div id="successAlert"
                class="hidden fixed top-0 left-1/2 transform -translate-x-1/2 mt-4 w-11/12 max-w-md p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 flex items-center justify-between"
                role="alert">
                <div class="flex items-center">
                    <svg class="shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <div class="ms-3 text-sm font-medium">
                        El formulario se envió correctamente.
                    </div>
                </div>
                <button type="button"
                    class="bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"
                    data-dismiss-target="#successAlert" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Modal para expandir imágenes -->
<div id="modal" class="fixed inset-0 bg-black bg-opacity-75 hidden flex items-center justify-center">
    <img id="modalImg" class="max-w-xs max-h-[70vh] rounded-lg shadow-lg">
</div>
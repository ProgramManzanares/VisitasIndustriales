{{-- Search bar --}}
<form>
    <label for="searchInput" class="sr-only">Buscar</label>

    <div class="mt-10 relative max-w-xl mx-auto flex items-center">
        <!-- Icono de lupa (izquierda) -->
        <svg class="w-5 h-5 text-gray-900 dark:text-white absolute left-3" aria-hidden="true"
            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
        </svg>

        <!-- Input de búsqueda -->
        <input type="text" id="searchInput" placeholder="Buscar empresa" autocomplete="off" style="outline: none"
            class="block w-full py-2 pl-10 pr-10 text-sm text-gray-900 dark:text-white border border-gray-300 dark:border-gray-600 rounded-lg bg-gray-50 dark:bg-gray-700 focus:ring-blue-500 focus:border-blue-500" />

        <!-- Botón "X" que borra el texto -->
        <button type="button" id="clearSearchButton"
            class="absolute right-2 top-1/2 transform -translate-y-1/2 text-blue-700 hover:text-blue-500 cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                <path fill-rule="evenodd"
                    d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm7.707-3.707a1 1 0 0 0-1.414 1.414L10.586 12l-2.293 2.293a1 1 0 1 0 1.414 1.414L12 13.414l2.293 2.293a1 1 0 0 0 1.414-1.414L13.414 12l2.293-2.293a1 1 0 0 0-1.414-1.414L12 10.586 9.707 8.293Z"
                    clip-rule="evenodd" />
            </svg>
        </button>
    </div>

    {{-- Funcionalidades de la barra de búsqueda --}}
    <script src="{{ asset('js/sbAcademia.js') }}"></script>
</form>


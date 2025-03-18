// Selecciona los elementos del DOM
var themeToggleBtn = document.getElementById('theme-toggle');
var themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
var themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

// Verifica el tema almacenado en localStorage o la preferencia del sistema
if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
    // Si el tema es oscuro, muestra el ícono de tema claro
    themeToggleLightIcon.classList.remove('hidden');
} else {
    // Si el tema es claro, muestra el ícono de tema oscuro
    themeToggleDarkIcon.classList.remove('hidden');
}

// Maneja el clic en el botón de alternar temas
themeToggleBtn.addEventListener('click', function() {
    // Alterna los íconos
    themeToggleDarkIcon.classList.toggle('hidden');
    themeToggleLightIcon.classList.toggle('hidden');

    // Si el tema está almacenado en localStorage
    if (localStorage.getItem('color-theme')) {
        if (localStorage.getItem('color-theme') === 'light') {
            // Cambia a tema oscuro
            document.documentElement.classList.add('dark');
            localStorage.setItem('color-theme', 'dark');
        } else {
            // Cambia a tema claro
            document.documentElement.classList.remove('dark');
            localStorage.setItem('color-theme', 'light');
        }
    } else {
        // Si no hay tema almacenado, verifica la clase actual
        if (document.documentElement.classList.contains('dark')) {
            // Cambia a tema claro
            document.documentElement.classList.remove('dark');
            localStorage.setItem('color-theme', 'light');
        } else {
            // Cambia a tema oscuro
            document.documentElement.classList.add('dark');
            localStorage.setItem('color-theme', 'dark');
        }
    }
});
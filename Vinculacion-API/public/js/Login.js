/**
 * Maneja la animación del contenedor al alternar entre login y registro.
 * 
 * - Al hacer clic en "Registrar", se agrega la clase "active" al contenedor.
 * - Al hacer clic en "Iniciar sesión", se quita la clase "active".
 */

// Obtener los elementos del DOM
const container = document.getElementById('container');
const registerBtn = document.getElementById('register');
const loginBtn = document.getElementById('login');

// Evento para mostrar el formulario de registro
registerBtn.addEventListener('click', () => {
    container.classList.add("active"); // Agrega la clase para mostrar el formulario de registro
});

// Evento para volver al formulario de inicio de sesión
loginBtn.addEventListener('click', () => {
    container.classList.remove("active"); // Quita la clase para volver al login
});

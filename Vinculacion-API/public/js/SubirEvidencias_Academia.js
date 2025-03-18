const dropzone = document.getElementById('dropzone');
const fileInput = document.getElementById('fileInput');
const previewContainer = document.getElementById('previewContainer');
const dropzoneText = document.getElementById('dropzone-text');
const modal = document.getElementById('modal');
const modalImg = document.getElementById('modalImg');

// Crear botón de eliminación para el modal
const modalDeleteBtn = document.createElement('button');
modalDeleteBtn.textContent = 'Delete';
modalDeleteBtn.classList.add('absolute', 'top-2', 'right-2', 'bg-gray-700', 'text-gray-300', 'px-2', 'py-1', 'rounded', 'text-sm', 'hover:bg-red-600', 'hover:text-white', 'transition', 'hidden');
modal.appendChild(modalDeleteBtn);

// Evento para abrir el selector de archivos al hacer clic en el dropzone (excepto en imágenes)
dropzone.addEventListener('click', (event) => {
    if (!event.target.classList.contains('preview-image')) {
        fileInput.click();
    }
});

// Evento para manejar archivos seleccionados
fileInput.addEventListener('change', handleFiles);

// Arrastrar y soltar archivos
dropzone.addEventListener('dragover', (e) => {
    e.preventDefault();
    dropzone.classList.add('border-blue-500');
});

dropzone.addEventListener('dragleave', () => {
    dropzone.classList.remove('border-blue-500');
});

dropzone.addEventListener('drop', (e) => {
    e.preventDefault();
    dropzone.classList.remove('border-blue-500');

    const files = e.dataTransfer.files;
    processFiles(files);
});

function handleFiles() {
    const files = fileInput.files;
    processFiles(files);
}

function processFiles(files) {
    if (files.length > 0) {
        dropzoneText.classList.add('hidden');
        previewContainer.classList.remove('hidden');
    }

    for (let file of files) {
        if (!file.type.match('image.*')) continue;

        const reader = new FileReader();
        reader.onload = (event) => {
            // Contenedor de la imagen con botón de eliminación
            const imageWrapper = document.createElement('div');
            imageWrapper.classList.add('relative', 'w-24', 'h-24');

            const img = document.createElement('img');
            img.src = event.target.result;
            img.classList.add('w-full', 'h-full', 'object-cover', 'rounded', 'cursor-pointer', 'hover:scale-105', 'transition', 'preview-image');

            // Botón de eliminar en miniatura
            const deleteBtn = document.createElement('button');
            deleteBtn.innerHTML = `<svg class="w-6 h-6 text-gray-400 hover:text-red-500 transition" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6"/>
            </svg>`;
            deleteBtn.classList.add('absolute', 'top-1', 'right-1', 'bg-gray-800', 'rounded-full', 'p-[2px]');

            // Evento para eliminar imagen de la vista previa
            deleteBtn.addEventListener('click', (e) => {
                e.stopPropagation();
                imageWrapper.remove();
                checkEmptyPreview();
            });

            // Evento para abrir imagen en modal
            img.addEventListener('click', (e) => {
                e.stopPropagation();
                modal.classList.remove('hidden');
                modalImg.src = img.src;
                modalDeleteBtn.dataset.target = imageWrapper; // Guardar referencia a la imagen
                modalDeleteBtn.classList.remove('hidden');
            });

            imageWrapper.appendChild(img);
            imageWrapper.appendChild(deleteBtn);
            previewContainer.appendChild(imageWrapper);
        };
        reader.readAsDataURL(file);
    }
}

// Evento para eliminar imagen desde el modal
modalDeleteBtn.addEventListener('click', () => {
    const targetImageWrapper = modalDeleteBtn.dataset.target;
    if (targetImageWrapper) {
        targetImageWrapper.remove();
        checkEmptyPreview();
        modal.classList.add('hidden');
        modalDeleteBtn.classList.add('hidden');
    }
});

// Cerrar modal al hacer clic fuera de la imagen
modal.addEventListener('click', () => {
    modal.classList.add('hidden');
    modalDeleteBtn.classList.add('hidden');
});

// Verificar si el contenedor está vacío y mostrar el texto del dropzone nuevamente
function checkEmptyPreview() {
    if (previewContainer.children.length === 0) {
        dropzoneText.classList.remove('hidden');
        previewContainer.classList.add('hidden');
    }
}

document.querySelector('form').addEventListener('submit', function(event) {
  event.preventDefault(); // Evitar el envío real del formulario
  const alert = document.getElementById('successAlert');
  alert.classList.remove('hidden');
  
  // Animación para que la alerta baje desde arriba con efecto de barrido
  alert.style.transition = 'transform 0.5s ease-in-out';
  alert.style.transform = 'translate(-50%, -100%)';
  setTimeout(() => {
    alert.style.transform = 'translate(-50%, 0)';
  }, 10); // Espera breve para asegurar que el cambio de transformación se aplique
  
  // Ocultar la alerta después de unos segundos
  setTimeout(() => {
    alert.classList.add('hidden');
  }, 5000); // Oculta la alerta después de 5 segundos
});

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





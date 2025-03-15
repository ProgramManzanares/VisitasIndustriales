/**
 * Se ejecuta cuando el DOM está completamente cargado.
 * Configura los eventos para la zona de arrastrar y soltar, 
 * la previsualización de imágenes y la validación del formulario.
 */
document.addEventListener("DOMContentLoaded", () => {
  /** @type {HTMLElement} Zona donde se pueden soltar o seleccionar archivos */
  const dropZone = document.getElementById("drop-zone");
  
  /** @type {HTMLInputElement} Input de archivos para la selección manual */
  const fileInput = document.getElementById("file-input");

  /** @type {HTMLElement} Contenedor para previsualizar imágenes seleccionadas */
  const previewGallery = document.getElementById("preview-gallery");

  /** @type {HTMLFormElement} Formulario de subida de imágenes */
  const uploadForm = document.getElementById("upload-form");

  /**
   * Maneja el clic en la zona de arrastrar y soltar para abrir el selector de archivos.
   */
  dropZone.addEventListener("click", () => fileInput.click());

  /**
   * Muestra una vista previa de las imágenes seleccionadas en el input de archivos.
   * @param {Event} e Evento de cambio en el input de archivos.
   */
  fileInput.addEventListener("change", (e) => {
      const files = e.target.files;
      previewGallery.innerHTML = ""; // Limpiar vista previa

      for (const file of files) {
          const img = document.createElement("img");
          img.src = URL.createObjectURL(file);
          previewGallery.appendChild(img);
      }
  });

  /**
   * Valida el formulario antes de enviarlo.
   * Evita el envío si no hay archivos seleccionados o si el comentario está vacío.
   * @param {Event} e Evento de envío del formulario.
   */
  uploadForm.addEventListener("submit", (e) => {
      if (!fileInput.files.length) {
          e.preventDefault();
          alert("Por favor, selecciona al menos una imagen.");
      } else if (!document.getElementById("comments").value.trim()) {
          e.preventDefault();
          alert("Por favor, escribe un comentario.");
      }
  });
});

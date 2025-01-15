document.addEventListener("DOMContentLoaded", () => {
    const dropZone = document.getElementById("drop-zone");
    const fileInput = document.getElementById("file-input");
    const previewGallery = document.getElementById("preview-gallery");
    const uploadForm = document.getElementById("upload-form");
  
    // Manejar la selección de archivos
    dropZone.addEventListener("click", () => fileInput.click());
  
    fileInput.addEventListener("change", (e) => {
      const files = e.target.files;
      previewGallery.innerHTML = ""; // Limpiar vista previa
      for (const file of files) {
        const img = document.createElement("img");
        img.src = URL.createObjectURL(file);
        previewGallery.appendChild(img);
      }
    });
  
    // Validación del formulario
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
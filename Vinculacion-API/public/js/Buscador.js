document.addEventListener("DOMContentLoaded", function () {
  const searchInput = document.getElementById("searchInput");
  const empresaList = document.getElementById("empresaList");

  /**
   * Carga las empresas desde el servidor (ruta /buscar-empresas) según el término de búsqueda.
   * Si se envía un query vacío, se muestran todas las empresas.
   *
   * @param {string} query - El término de búsqueda.
   */
  function cargarEmpresas(query) {
    axios
      .get("/buscar-empresas", { params: { nombre: query } })
      .then((response) => {
        const empresas = response.data; // Se espera que cada objeto tenga { id, empresa, contacto_nombre, puesto }
        // Limpiar la lista actual
        empresaList.innerHTML = "";

        // Itera por cada empresa y crea un <li> para mostrarla
        empresas.forEach((empresa) => {
          const li = document.createElement("li");
          li.className =
            "px-4 py-2 text-gray-900 dark:text-white cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-700";
          li.textContent = empresa.empresa;

          // Asignar atributos data para almacenar información adicional
          // Si el campo está vacío, se usará "no definido" (más adelante, al actualizar la carta)
          li.setAttribute("data-nombre", empresa.empresa || "no definido");
          li.setAttribute("data-contacto", empresa.contacto_nombre || "no definido");
          li.setAttribute("data-cargo", empresa.puesto || "no definido");

          // Al hacer clic, se actualiza la sección de información con los datos de la empresa
          li.addEventListener("click", function () {
            // Usamos || para que si alguna propiedad es falsy (por ejemplo, cadena vacía) se muestre "no definido"
            const nombre = this.getAttribute("data-nombre") || "no definido";
            const contacto = this.getAttribute("data-contacto") || "no definido";
            const cargo = this.getAttribute("data-cargo") || "no definido";

            document.getElementById("nombreEmpresa").innerHTML =
              "<strong>Nombre de la empresa:</strong> " + nombre;
            document.getElementById("nombreContacto").innerHTML =
              "<strong>Nombre del Contacto:</strong> " + contacto;
            document.getElementById("contactoCargo").innerHTML =
              "<strong>Cargo del Contacto:</strong> " + cargo;
          });

          empresaList.appendChild(li);
        });

        // Si hay al menos una empresa en la lista, simula un clic en la primera para que se muestre por defecto.
        if (empresaList.firstChild) {
          empresaList.firstChild.click();
        }
      })
      .catch((error) => {
        console.error("Error al cargar empresas:", error);
      });
  }

  // Cargar empresas al iniciar la página (query vacío muestra todas)
  cargarEmpresas("");

  // Escuchar el evento "input" en el campo de búsqueda para actualizar la lista dinámicamente.
  searchInput.addEventListener("input", function () {
    const query = this.value.trim();
    cargarEmpresas(query);
  });
});

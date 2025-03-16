document.addEventListener("DOMContentLoaded", function () {
  const searchInput = document.getElementById("searchInput");
  const empresaList = document.getElementById("empresaList");

  /**
   * Carga las empresas vía AJAX desde la ruta /buscar-empresas.
   * Si query está vacío, se muestran todas.
   * @param {string} query - Término de búsqueda.
   */
  function cargarEmpresas(query) {
    axios
      .get("/buscar-empresas", { params: { nombre: query } })
      .then((response) => {
        const empresas = response.data; // Cada objeto: { id, empresa, contacto_nombre, puesto }
        // Limpiar la lista actual
        empresaList.innerHTML = "";

        if (empresas.length === 0) {
          // Si no se encontró ninguna empresa
          const li = document.createElement("li");
          li.className = "px-4 py-2 text-gray-500";
          li.textContent = "No se encontraron empresas";
          empresaList.appendChild(li);
          return;
        }

        // Crear los elementos <li> para cada empresa
        empresas.forEach((company) => {
          const li = document.createElement("li");
          li.className =
            "px-4 py-2 text-gray-900 dark:text-white cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-700";
          li.textContent = company.empresa;
          // Asignar atributos data; si algún dato está vacío, usar "no definido"
          li.setAttribute("data-id", company.id);
          li.setAttribute("data-nombre", company.empresa || "no definido");
          li.setAttribute("data-contacto", company.contacto_nombre || "no definido");
          li.setAttribute("data-cargo", company.puesto || "no definido");

          // Al hacer clic, se marca como seleccionado y se actualiza la carta.
          li.addEventListener("click", function () {
            // Remover clase selected de todos los elementos de la lista
            document.querySelectorAll("#empresaList li").forEach((item) => {
              item.classList.remove("selected");
            });
            // Agregar la clase selected a este elemento
            this.classList.add("selected");
            updateCompanyInfo(this);
          });

          empresaList.appendChild(li);
        });

        // Seleccionar y mostrar la información del primer elemento por defecto.
        if (empresaList.firstElementChild) {
          empresaList.firstElementChild.classList.add("selected");
          updateCompanyInfo(empresaList.firstElementChild);
        }
      })
      .catch((error) => {
        console.error("Error al cargar empresas:", error);
      });
  }

  /**
   * Actualiza la carta de información en función del elemento seleccionado.
   * @param {HTMLElement} element - El <li> seleccionado.
   */
  function updateCompanyInfo(element) {
    const nombre = element.getAttribute("data-nombre") || "no definido";
    const contacto = element.getAttribute("data-contacto") || "no definido";
    const cargo = element.getAttribute("data-cargo") || "no definido";

    document.getElementById("nombreEmpresa").innerHTML =
      "<strong>Nombre de la empresa:</strong> " + nombre;
    document.getElementById("nombreContacto").innerHTML =
      "<strong>Nombre del Contacto:</strong> " + contacto;
    document.getElementById("contactoCargo").innerHTML =
      "<strong>Cargo del Contacto:</strong> " + cargo;
  }

  // Inicialmente, cargamos todas las empresas.
  cargarEmpresas("");

  // Actualizar la lista dinámicamente conforme se escribe.
  searchInput.addEventListener("input", function () {
    const query = this.value.trim();
    cargarEmpresas(query);
  });

  // --- Lógica para actualizar la empresa a través de un Modal ---
  const updateModal = document.getElementById("updateModal");
  const updateForm = document.getElementById("updateForm");
  const btnUpdate = document.getElementById("btnUpdate");
  const cancelUpdate = document.getElementById("cancelUpdate");

  // Función para mostrar el modal (quita la clase 'hidden')
  function showModal() {
    updateModal.classList.remove("hidden");
  }
  // Función para ocultar el modal (agrega la clase 'hidden')
  function hideModal() {
    updateModal.classList.add("hidden");
  }

  // Al hacer clic en el botón "Actualizar Datos" se abre el modal con los datos de la empresa seleccionada.
  btnUpdate.addEventListener("click", function () {
    const selectedLi = document.querySelector("#empresaList li.selected");
    if (!selectedLi) {
      alert("No se ha seleccionado ninguna empresa");
      return;
    }
    // Extraer la información de la empresa seleccionada.
    const id = selectedLi.getAttribute("data-id") || "";
    const nombre = selectedLi.getAttribute("data-nombre") || "no definido";
    const contacto = selectedLi.getAttribute("data-contacto") || "no definido";
    const cargo = selectedLi.getAttribute("data-cargo") || "no definido";

    // Prellenar los campos del formulario del modal.
    document.getElementById("updateCompanyId").value = id;
    document.getElementById("updateEmpresa").value = nombre;
    document.getElementById("updateContacto").value = contacto;
    document.getElementById("updateCargo").value = cargo;

    showModal();
  });

  // El botón "Cancelar" cierra el modal.
  cancelUpdate.addEventListener("click", function () {
    hideModal();
  });

  // Manejar el envío del formulario de actualización.
  updateForm.addEventListener("submit", function (e) {
    e.preventDefault();
    const formData = new FormData(updateForm);
    const data = Object.fromEntries(formData.entries());
    axios
      .post("/update-empresa", data)
      .then((response) => {
        if (response.data.success) {
          alert("Empresa actualizada correctamente");
          // Actualizar la carta de información con los nuevos datos.
          document.getElementById("nombreEmpresa").innerHTML =
            "<strong>Nombre de la empresa:</strong> " + data.empresa;
          document.getElementById("nombreContacto").innerHTML =
            "<strong>Nombre del Contacto:</strong> " + data.contacto_nombre;
          document.getElementById("contactoCargo").innerHTML =
            "<strong>Cargo del Contacto:</strong> " + data.puesto;
          hideModal();
          // Opcional: refrescar la lista para reflejar los cambios.
          cargarEmpresas(searchInput.value.trim());
        } else {
          alert("Error al actualizar la empresa: " + response.data.message);
        }
      })
      .catch((error) => {
        console.error("Error en la actualización:", error);
        alert("Ocurrió un error al actualizar la empresa");
      });
  });
});

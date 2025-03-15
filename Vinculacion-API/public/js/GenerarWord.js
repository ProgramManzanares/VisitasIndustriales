/**
 * Agrega un evento al formulario para generar un documento Word al enviarlo.
 */
document.getElementById("wordForm").addEventListener("submit", function (event) {
    event.preventDefault();
    generateWordDocument();
});

/**
 * Genera un documento Word a partir de una plantilla y los datos del formulario.
 * Reemplaza los placeholders en la plantilla con los valores ingresados.
 */
async function generateWordDocument() {
    /** @type {Object.<string, string>} */
    const formData = {};

    // Obtiene los valores del formulario y los almacena en formData
    document.querySelectorAll("#wordForm input, #wordForm select").forEach(input => {
        formData[input.id] = input.tagName === "SELECT" 
            ? input.options[input.selectedIndex].text 
            : input.value.trim();
    });

    // Verifica si algún campo está vacío
    if (Object.values(formData).some(value => !value)) {
        alert("Por favor, complete todos los campos.");
        return;
    }

    try {
        // Carga la plantilla de Word
        const response = await fetch("/templates/Plantilla.docx");
        if (!response.ok) throw new Error("No se pudo cargar la plantilla");

        const content = await response.arrayBuffer();
        const zip = new JSZip();
        await zip.loadAsync(content);

        // Obtiene el contenido XML del documento de Word
        const docXml = await zip.file("word/document.xml").async("string");

        /**
         * Mapeo de placeholders en la plantilla con los valores del formulario.
         * @type {Object.<string, string>}
         */
        const placeholders = {
            "{{NumOficio}}": formData["num-oficio"],
            "{{fecha}}": formData["fecha"],
            "{{nombreDirigido}}": formData["nombre-dirigido"],
            "{{cargoDirigido}}": formData["cargo-dirigido"],
            "{{empresa}}": formData["nombre-empresa"],
            "{{numAlumnos}}": formData["num-estudiantes"],
            "{{nombreCarrera}}": formData["carrera"],
            "{{maestroEncargado}}": formData["docente"],
            "{{areaObservar}}": formData["area"],
            "{{objetivoVisita}}": formData["objetivo"],
            "{{fechaVisita}}": formData["fecha-visita"],
            "{{horario}}": formData["turno"],
            "{{contacto}}": formData["contacto"],
            "{{Extension}}": formData["extension"]
        };

        // Reemplaza los placeholders en el XML del documento
        const updatedDocXml = Object.entries(placeholders).reduce(
            (xml, [key, value]) => xml.replace(new RegExp(key, "g"), value),
            docXml
        );

        // Guarda los cambios en el archivo ZIP y genera el nuevo documento
        zip.file("word/document.xml", updatedDocXml);
        const newContent = await zip.generateAsync({ type: "blob" });

        // Descarga el documento generado
        saveAs(newContent, `SolicitudVisita_${formData["num-oficio"]}.docx`);
    } catch (error) {
        console.error("Error al procesar el documento:", error);
        alert("Hubo un problema al generar el documento. Intente de nuevo.");
    }
}

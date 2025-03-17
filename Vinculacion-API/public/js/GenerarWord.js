document.getElementById("wordForm").addEventListener("submit", function (event) {
    event.preventDefault(); // Evita el envío tradicional del formulario
    generateWordDocument(); // Genera el Word y envía los datos a la BD
});

async function generateWordDocument() {
    /** @type {Object.<string, string>} */
    const formData = {};

    // Obtiene los valores del formulario
    document.querySelectorAll("#wordForm input, #wordForm select").forEach(input => {
        formData[input.name] = input.tagName === "SELECT" 
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

        // Envía los datos a la base de datos
        await saveToDatabase(formData);

    } catch (error) {
        console.error("Error al procesar el documento:", error);
        alert("Hubo un problema al generar el documento. Intente de nuevo.");
    }
}

async function saveToDatabase(formData) {
    try {
        const response = await fetch("/solicitudes/store", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify(formData)
        });

        // Verifica si la respuesta es JSON
        const contentType = response.headers.get("content-type");
        if (!contentType || !contentType.includes("application/json")) {
            const text = await response.text();
            throw new Error(`Respuesta no JSON: ${text.substring(0, 100)}...`);
        }

        const result = await response.json();
        
        if (!response.ok) throw new Error(result.message || "Error del servidor");
        
        alert("¡Datos guardados correctamente!");
        window.location.reload();
        
    } catch (error) {
        console.error("Error completo:", error);
        alert(`Error: ${error.message}`);
    }
}
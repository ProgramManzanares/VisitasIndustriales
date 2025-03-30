// Maneja el envío del formulario
document.getElementById("wordForm").addEventListener("submit", async function (event) {
    event.preventDefault(); // Evita el envío tradicional del formulario
    await generateBothWordDocuments(); // Genera ambos documentos de Word
});

async function generateBothWordDocuments() {
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
        // Mapeo de _placeholders_ para la primera plantilla (Plantilla.docx)
        const placeholdersOriginal = {
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

        // Mapeo de _placeholders_ para la nueva plantilla 
        // Nota: Solo se incluyen los _placeholders_ que aparecen en esta plantilla.
        const placeholdersNew = {
            "{{NumOficio}}": formData["num-oficio"],
            "{{nombreDirigido}}": formData["nombre-dirigido"],
            "{{cargoDirigido}}": formData["cargo-dirigido"],
            "{{empresa}}": formData["nombre-empresa"],
            "{{fecha}}": formData["fecha"],
            "{{maestroEncargado}}": formData["docente"],
            "{{numAlumnos}}": formData["num-estudiantes"],
            "{{nombreCarrera}}": formData["carrera"],
            "{{fechaVisita}}": formData["fecha-visita"],
            "{{horario}}": formData["turno"]
        };

        // Genera el primer documento utilizando la plantilla original
        await generateDocument(
            "/templates/Plantilla.docx",
            placeholdersOriginal,
            `SolicitudVisita_${formData["num-oficio"]}.docx`
        );

        // Genera el segundo documento utilizando la nueva plantilla
        await generateDocument(
            "/templates/Plantilla2.docx", // Asegúrate que esta ruta sea la correcta
            placeholdersNew,
            `Carta de Agradecimiento_${formData["num-oficio"]}.docx`
        );

        // Guarda los datos en la base de datos
        await saveToDatabase(formData);

    } catch (error) {
        console.error("Error al procesar los documentos:", error);
        alert("Hubo un problema al generar los documentos. Intente de nuevo.");
    }
}

async function generateDocument(templatePath, placeholders, outputFilename) {
    // Carga la plantilla de Word
    const response = await fetch(templatePath);
    if (!response.ok) throw new Error("No se pudo cargar la plantilla: " + templatePath);

    const content = await response.arrayBuffer();
    const zip = new JSZip();
    await zip.loadAsync(content);

    // Obtiene el contenido XML del documento de Word
    let docXml = await zip.file("word/document.xml").async("string");

    // Reemplaza los _placeholders_ en el XML
    Object.entries(placeholders).forEach(([placeholder, value]) => {
        const regex = new RegExp(placeholder, "g");
        docXml = docXml.replace(regex, value);
    });

    // Escribe el nuevo XML en el ZIP y genera el nuevo documento
    zip.file("word/document.xml", docXml);
    const newContent = await zip.generateAsync({ type: "blob" });

    // Descarga el documento generado
    saveAs(newContent, outputFilename);
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

        // Verifica que la respuesta sea JSON
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
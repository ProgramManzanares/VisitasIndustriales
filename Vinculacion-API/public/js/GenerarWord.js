document.getElementById("wordForm").addEventListener("submit", function (event) {
  event.preventDefault();
  generateWordDocument();
});

async function generateWordDocument() {
  const numOficio = document.getElementById("num-oficio").value;
  const fecha = document.getElementById("fecha").value;
  const nombreDirigido = document.getElementById("nombre-dirigido").value;
  const cargoDirigido = document.getElementById("cargo-dirigido").value;
  const empresa = document.getElementById("empresa").value;
  const numEstudiantes = document.getElementById("num-estudiantes").value;
  const carrera = document.getElementById("carrera").value;
  const docente = document.getElementById("docente").value;
  const area = document.getElementById("area").value;
  const objetivo = document.getElementById("objetivo").value;
  const fechaVisita = document.getElementById("fecha-visita").value;
  const turno = document.getElementById("turno").value;
  const contacto = document.getElementById("contacto").value;
  const extension = document.getElementById("extension").value;

  if (!numOficio || !fecha || !nombreDirigido || !cargoDirigido || !empresa || !numEstudiantes || !carrera || !docente || !area || !objetivo || !fechaVisita || !turno || !contacto || !extension) {
      alert("Por favor, complete todos los campos.");
      return;
  }

  try {
      const response = await fetch("/templates/Plantilla.docx");
      const content = await response.arrayBuffer();
      const zip = new JSZip();
      await zip.loadAsync(content);
      
      const docXml = await zip.file("word/document.xml").async("string");

      let updatedDocXml = docXml
          .replace("{{NumOficio}}", numOficio)
          .replace("{{fecha}}", fecha)
          .replace("{{nombreDirigido}}", nombreDirigido)
          .replace("{{cargoDirigido}}", cargoDirigido)
          .replace("{{empresa}}", empresa)
          .replace("{{numAlumnos}}", numEstudiantes)
          .replace("{{nombreCarrera}}", carrera)
          .replace("{{maestroEncargado}}", docente)
          .replace("{{areaObservar}}", area)
          .replace("{{objetivoVisita}}", objetivo)
          .replace("{{fechaVisita}}", fechaVisita)
          .replace("{{horario}}", turno)
          .replace("{{contacto}}", contacto)
          .replace("{{Extension}}", extension);
      
      zip.file("word/document.xml", updatedDocXml);
      const newContent = await zip.generateAsync({ type: "blob" });
      
      saveAs(newContent, "SolicitudVisita.docx");
  } catch (error) {
      console.error("Error al cargar o generar el documento:", error);
  }
}
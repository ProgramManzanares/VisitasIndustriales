
//Borrar texto con icono en busqueda
document.getElementById("clearSearch").addEventListener("click", function () {
    document.getElementById("searchInput").value = ""; // Borra el texto
    document.getElementById("searchInput").focus(); // Mantiene el foco en el input
});


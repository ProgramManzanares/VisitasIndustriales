<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Subir Evidencias</title>
  <link rel="stylesheet" href="{{ asset('css/styles_Academia_Evidencias.css') }}">
</head>
<body>
  <header class="header">
    <div class="user-info">
      <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="User Photo" class="user-photo">
      <div>
        <h2>Juan Pérez</h2>
        <p>Usuario registrado</p>
      </div>
    </div>
    <div class="image">
      <img src="../Vista_Evidencias/Logo ITH 1.png" alt="Logo ITH" class="logo">
    </div>
  </header>

  <main class="main-content">
    <section class="upload-container">
      <h2>Subir Evidencias</h2>
      <form id="upload-form">
        <!-- Área de arrastre para subir imágenes -->
        <div class="drop-zone" id="drop-zone">
          <p>Arrastra tus imágenes aquí o haz clic para seleccionarlas</p>
          <input type="file" id="file-input" accept="image/*" multiple hidden required>
        </div>
        
        <!-- Vista previa de las imágenes -->
        <div class="preview-container" id="preview-container">
          <h3>Previsualización</h3>
          <div class="preview-gallery" id="preview-gallery"></div>
        </div>

        <!-- Campo de comentarios -->
        <div class="comment-section">
          <label for="comments">Comentarios:</label>
          <textarea id="comments" name="comments" rows="5" placeholder="Escribe aquí tus comentarios" required></textarea>
        </div>

        <!-- Botón de enviar -->
        <button type="submit" class="submit-button">Subir Evidencias</button>
      </form>
    </section>
  </main>

  <script src="script.js"></script>
</body>
</html>

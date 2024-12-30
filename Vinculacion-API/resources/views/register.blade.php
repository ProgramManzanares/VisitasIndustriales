<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <link rel="stylesheet" href="{{ asset('css/registro_academia.css') }}">
</head>

<body>
    <div class="register-container">
        <h1>Registro</h1>
        <form>
            <input type="text" placeholder="Nombre completo" required>
            <input type="email" placeholder="Correo electrónico" required>
            <select required>
                <option value="" disabled selected>Selecciona tu área</option>
                <option value="Ingeniería Biomédica">Ingeniería Biomédica</option>
                <option value="Ingeniería Eléctrica">Ingeniería Eléctrica</option>
                <option value="Ingeniería Electrónica">Ingeniería Electrónica</option>
                <option value="Ingeniería Industrial">Ingeniería Industrial</option>
                <option value="Ingeniería Mecánica">Ingeniería Mecánica</option>
                <option value="Ingeniería Mecatrónica">Ingeniería Mecatrónica</option>
                <option value="Licenciado en Administración">Licenciado en Administración</option>
                <option value="Ingeniería en Sistemas Computacionales">Ingeniería en Sistemas Computacionales</option>
                <option value="Ingeniería Informática">Ingeniería Informática</option>
                <option value="Ingeniería en Gestión Empresarial">Ingeniería en Gestión Empresarial</option>
                <option value="Ingeniería Aeronáutica">Ingeniería Aeronáutica</option>
            </select>
            
            <input type="number" placeholder="Número de Área" required>
            <input type="tel" placeholder="Teléfono" required pattern="[0-9]{10}" title="Ingresa un número de 10 dígitos">
            <input type="text" placeholder="RFC" required>
            <button type="submit">Registrarse</button>
        </form>
        <p>¿Ya tienes una cuenta? <a>Inicia sesión</a></p>
    </div>
</body>

</html>

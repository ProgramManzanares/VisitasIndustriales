<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Iniciar Sesion</title>
</head>

<body>

    <div class="imagenTEC">
        <img src="{{asset('images/TECnm.png')}}" alt="" width="320" height="150">
    </div>

    <div class="container" id="container">
        <div class="form-container sign-up">
            <form>
                <h1>ADMINISTRATIVO</h1>
                
                <input type="text" class="input-rfc" placeholder="RFC">
                <input type="password" class="input-password" placeholder="Contraseña">

                <button>Iniciar Sesión</button>
    
            </form>
        </div>
        <div class="form-container sign-in">
            <form>
                <h1>ACADEMIA</h1>
                    
                <input type="text" class="input-rfc" placeholder="RFC">
                <input type="password" class="input-password" placeholder="Contraseña">
    
                <button>Iniciar Sesión</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>¿Eres de academia?</h1>
                    <p>Inicia sesión como academia aqui</p>
                    <button class="hidden" id="login">Inicia aquí</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>¿Eres administrativo?</h1>
                    <p>Inicia sesión como administrador aqui</p>
                    <button class="hidden" id="register">Inicia aquí</button>
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('js/script.js')}}"></script>
</body>

</html>
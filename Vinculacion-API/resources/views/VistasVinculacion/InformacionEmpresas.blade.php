<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{asset('css/styles_Informacion_Empresas.css')}}" rel="stylesheet">    
    <title>Información de Empresas</title>
</head>
<body>
    <header class="header">
        <button class="button-header" id = "button-header">
            <a href="javascript:history.back()" style="text-decoration: none; color: black; display: flex; align-items: center;">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M15 8a.5.5 0 0 1-.5.5H2.707l3.647 3.646a.5.5 0 0 1-.708.708l-4.5-4.5a.5.5 0 0 1 0-.708l4.5-4.5a.5.5 0 1 1 .708.708L2.707 7.5H14.5A.5.5 0 0 1 15 8z"/>
                </svg>
                <span style="margin-left: 8px;">EVIDENCIAS DE VISITAS</span>
            </a>
            <!--&lt Evidencias de Visitas-->
        </button>
    </header>

    <div class="container">
        <header class="header-tittle">
            <h1>INFORMACION DE EMPRESAS</h1>
        </header>
        <div class="content">
            <aside class="company">
                <div class="search-bar">
                    <input type="text" id="searchInput" placeholder="Type to search...">
                    <button>🔍</button>
                </div>
                <aside class="company-list">
                <ul>
                    <li data-name="Empresa XYZ" data-address="Calle Industria 123, Monterrey, NL" data-phone="+52 81 1234 5678" data-email="contacto@empresaXYZ.com" data-giro="Fabricación de componentes automotrices">EMPRESA XYZ</li>
                    <li data-name="Empresa ABC" data-address="Av. Reforma 456, CDMX" data-phone="+52 55 5678 1234" data-email="contacto@empresaABC.com" data-giro="Consultoría empresarial">EMPRESA ABC</li>
                    <li data-name="Empresa DEF" data-address="Calle Principal 789, Guadalajara, JAL" data-phone="+52 33 8765 4321" data-email="contacto@empresaDEF.com" data-giro="Desarrollo de software">EMPRESA DEF</li>
                    <li data-name="Empresa XYZ" data-address="Calle Industria 123, Monterrey, NL" data-phone="+52 81 1234 5678" data-email="contacto@empresaXYZ.com" data-giro="Fabricación de componentes automotrices">EMPRESA XYZ</li>
                    <li data-name="Empresa ABC" data-address="Av. Reforma 456, CDMX" data-phone="+52 55 5678 1234" data-email="contacto@empresaABC.com" data-giro="Consultoría empresarial">EMPRESA ABC</li>
                    <li data-name="Empresa DEF" data-address="Calle Principal 789, Guadalajara, JAL" data-phone="+52 33 8765 4321" data-email="contacto@empresaDEF.com" data-giro="Desarrollo de software">EMPRESA DEF</li>
                    <li data-name="Empresa XYZ" data-address="Calle Industria 123, Monterrey, NL" data-phone="+52 81 1234 5678" data-email="contacto@empresaXYZ.com" data-giro="Fabricación de componentes automotrices">EMPRESA XYZ</li>
                    <li data-name="Empresa ABC" data-address="Av. Reforma 456, CDMX" data-phone="+52 55 5678 1234" data-email="contacto@empresaABC.com" data-giro="Consultoría empresarial">EMPRESA ABC</li>
                    <li data-name="Empresa DEF" data-address="Calle Principal 789, Guadalajara, JAL" data-phone="+52 33 8765 4321" data-email="contacto@empresaDEF.com" data-giro="Desarrollo de software">EMPRESA DEF</li>
                    <li data-name="Empresa XYZ" data-address="Calle Industria 123, Monterrey, NL" data-phone="+52 81 1234 5678" data-email="contacto@empresaXYZ.com" data-giro="Fabricación de componentes automotrices">EMPRESA XYZ</li>
                    <li data-name="Empresa ABC" data-address="Av. Reforma 456, CDMX" data-phone="+52 55 5678 1234" data-email="contacto@empresaABC.com" data-giro="Consultoría empresarial">EMPRESA ABC</li>
                    <li data-name="Empresa DEF" data-address="Calle Principal 789, Guadalajara, JAL" data-phone="+52 33 8765 4321" data-email="contacto@empresaDEF.com" data-giro="Desarrollo de software">EMPRESA DEF</li>
                </ul>
                </aside>
            </aside>
            <section class="company-details">
                <h2>Empresa XYZ</h2>
                <p><strong>Dirección:</strong> Calle Industria 123, Monterrey, NL</p>
                <p><strong>Teléfono:</strong> +52 81 1234 5678</p>
                <p><strong>Email:</strong> contacto@empresaXYZ.com</p>
                <p><strong>Giro:</strong> Fabricación de componentes automotrices</p>
                <button>Visitar sitio web</button>
            </section>
        </div>
    </div>

    <script src="{{asset('js/Informacion_Empresas.js')}}"></script>
</body>
</html>
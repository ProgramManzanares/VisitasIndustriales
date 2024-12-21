<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/styles_Informacion_Empresas.css">
    <title>INFORMACIÓN DE EMPRESAS</title>
</head>
<body>
    <header class="header">
        <button class="button-header" id = "button-header">
            <a href="javascript:history.back()" style="text-decoration: none; color: black; display: flex; align-items: center;">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M15 8a.5.5 0 0 1-.5.5H2.707l3.647 3.646a.5.5 0 0 1-.708.708l-4.5-4.5a.5.5 0 0 1 0-.708l4.5-4.5a.5.5 0 1 1 .708.708L2.707 7.5H14.5A.5.5 0 0 1 15 8z"/>
                </svg>
                <span style="margin-left: 8px;">INFORMACIÓN DE EMPRESAS</span>
            </a>
            <!--&lt Evidencias de Visitas-->
        </button>
    </header>

    <div class="container-table">
        <table class="table">
        <thead class="encabezado">
            <tr>
                <th>
                    EMPRESAS
                    <div class="search-bar">
                        <input type="text" placeholder="Type to search...">
                        <button>🔍</button>
                    </div>
                </th>
            </tr>
        </thead>
            <tbody>
                <tr>
                    <td>EMPRESA XYZ</td>
                </tr>
                <tr>
                    <td>EMPRESA ABC</td>
                </tr>
                <tr>
                    <td>EMPRESA DEF</td>
                </tr>
                <tr>
                    <td>EMPRESA GHI</td>
                </tr>
                <tr>
                    <td>EMPRESA JKL</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="container-datos">
        <div class="card">
            <h2>EMPRESA XYZ</h2>
            <p><strong>Dirección:</strong> Calle Industria 123, Monterrey, NL</p>
            <p><strong>Teléfono:</strong> +52 81 1234 5678</p>
            <p><strong>Email:</strong> contacto@empresaXYZ.com</p>
            <p><strong>Giro:</strong> Fabricación de componentes automotrices</p>
            <button>Ver más detalles</button>
        </div>
    </div>
</body>
</html>

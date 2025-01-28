<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{asset('css/styles_Evidencias_Visitas.css')}}" rel="stylesheet">
    <title>Evidencias de Visitas</title>
    <style>
        body {
            background-color: #1e1e2f;
            color: #ffffff;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .header {
            display: flex;
            align-items: center;
            padding: 10px 20px;
            background-color: #2b2b3d;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.5);
        }

        .button-header {
            background-color: transparent;
            border: none;
            color: #ffffff;
            font-size: 16px;
            cursor: pointer;
            display: flex;
            align-items: center;
        }

        .button-header:hover {
            color: #f39c12;
        }

        .search-bar {
            display: flex;
            justify-content: center;
            margin: 20px 0;
        }

        .search-bar input {
            width: 300px;
            padding: 10px;
            border: 1px solid #444;
            border-radius: 5px;
            background-color: #2b2b3d;
            color: #ffffff;
        }

        .search-bar button {
            margin-left: 10px;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #f39c12;
            color: #ffffff;
            cursor: pointer;
        }

        .search-bar button:hover {
            background-color: #e67e22;
        }

        .main-container {
            padding: 20px;
        }

        .container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }

        .card {
            background-color: #2b2b3d;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.5);
            transition: transform 0.2s;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.7);
        }

        .card h2 {
            color: #f39c12;
            margin: 10px 0;
        }

        .card p {
            margin: 5px 0;
        }

        .card button {
            margin-top: 10px;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #f39c12;
            color: #ffffff;
            cursor: pointer;
        }

        .card button:hover {
            background-color: #e67e22;
        }

        .load-more {
            text-align: center;
            margin: 20px 0;
        }

        .load-more button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #f39c12;
            color: #ffffff;
            cursor: pointer;
        }

        .load-more button:hover {
            background-color: #e67e22;
        }
    </style>
</head>
<body>
    <header class="header">
        <button class="button-header" id="button-header">
            <a href="javascript:history.back()" style="text-decoration: none; color: inherit; display: flex; align-items: center;">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M15 8a.5.5 0 0 1-.5.5H2.707l3.647 3.646a.5.5 0 0 1-.708.708l-4.5-4.5a.5.5 0 0 1 0-.708l4.5-4.5a.5.5 0 1 1 .708.708L2.707 7.5H14.5A.5.5 0 0 1 15 8z"/>
                </svg>
                <span style="margin-left: 8px;">EVIDENCIAS DE VISITAS</span>
            </a>
        </button>
    </header>

    <div class="search-bar">
        <input type="text" id="searchInput" placeholder="Type to search...">
        <button>🔍</button>
    </div>

    <main class="main-container">
        <div class="container">
            <div class="card">
                <p>Evidencias de visita a empresa XYZ</p>
                <h2>EMPRESA XYZ</h2>
                <p>Fecha: 12/12/2024</p>
                <button>Ver más detalles</button>
            </div>
            <div class="card">
                <p>Evidencias de visita a empresa ABC</p>
                <h2>EMPRESA ABC</h2>
                <p>Fecha: 15/12/2024</p>
                <button>Ver más detalles</button>
            </div>
            <div class="card">
                <p>Evidencias de visita a empresa DEF</p>
                <h2>EMPRESA DEF</h2>
                <p>Fecha: 20/12/2024</p>
                <button>Ver más detalles</button>
            </div>
            <div class="card">
                <p>Evidencias de visita a empresa 000</p>
                <h2>EMPRESA 000</h2>
                <p>Fecha: 00/00/0000</p>
                <button>Ver más detalles</button>
            </div>
        </div>
    </main>

    <div class="load-more">
        <button>Cargar más 🔄</button>
    </div>

    <script src="{{asset('js/Evidencias_Empresas.js')}}"></script>
</body>
</html>

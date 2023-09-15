<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parque de Diversiones</title>
    <!-- Agrega los enlaces a los archivos CSS de Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-success text-white" style="color: rgb(255, 255, 255);">
        <div class="container">
            <a class="navbar-brand" href="/">Parque de Diversiones</a>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/agregaAtraccion">Agregar Atracción</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/listarAtracciones">Listar Atracciones</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/ventasListar">Ver Estadísticas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/registrarTicket">Registrar Compra Ticket</a>
                </li>
            </ul>
        </div>
    </nav>
    
    <div class="container mt-4">
        @yield('content')
    </div>
    
    <!-- Agrega los enlaces a los archivos JavaScript de Bootstrap y jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>

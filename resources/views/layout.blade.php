<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Gestión de Pedidos')</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-blue-100">
    <div class="container mx-auto">
        @yield('content')
    </div>
    <script>
        // Comprobar si la ruta actual es la raíz
        if (window.location.pathname === '/') {
            // Redirigir a /pedidos
            window.location.href = '/pedidos';
        }
    </script>
</body>
</html>

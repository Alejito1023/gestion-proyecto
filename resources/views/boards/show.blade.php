<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $board->title }}</title>
</head>
<body>
    <h1>{{ $board->title }}</h1>
    
    <!-- Mostrar detalles del tablero (puedes personalizar según tus necesidades) -->
    <p>Fecha de Creación: {{ $board->created_at }}</p>
    
    <!-- Enlaces de navegación -->
    <a href="/">Volver a la lista de tableros</a>
</body>
</html>
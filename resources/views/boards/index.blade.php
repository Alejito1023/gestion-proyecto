
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableros</title>
</head>
<body>
    <h1>Tableros</h1>
    
    <!-- Mostrar lista de tableros -->
    <ul>
        @foreach ($boards as $board)
            <li>{{ $board->title }}</li>
        @endforeach
    </ul>
    
    <!-- Formulario para crear un nuevo tablero -->
    <form action="/boards" method="POST">
        @csrf
        <input type="text" name="title" placeholder="Nombre del tablero" required>
        <button type="submit">Crear Tablero</button>
    </form>
</body>
</html>
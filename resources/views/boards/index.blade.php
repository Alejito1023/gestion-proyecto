<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableros - SyncPulse</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #333;
            color: #fff;
            position: relative; /* Añadir posición relativa para el botón Log Out tenga referencia */
        }

        .panel {
            background-color: #007bff; /* Color del panel */
            padding: 10px;
            border-radius: 5px;
            margin: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        h1 {
            text-align: center;
            margin-top: 20px;
            color: #fff;
            padding: 10px;
            border-radius: 5px;
        }

        .container {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        li {
            background-color: #fff;
            padding: 20px;
            margin: 10px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            text-align: center;
        }

        li:hover {
            transform: translateY(-5px);
        }

        .actions {
            display: flex;
            justify-content: center;
            margin-top: 10px;
        }

        form button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        form button[type="submit"] {
            color: #fff;
        }

        form button.edit {
            background-color: #28a745; /* Verde */
        }

        form button.edit:hover {
            background-color: #218838;
        }

        form button.delete {
            background-color: #dc3545; /* Rojo */
        }

        form button.delete:hover {
            background-color: #c82333;
        }

        form input[type="text"] {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            margin-right: 5px;
            width: 200px; /* Ajustar el ancho de la barra Nombre del tablero */
        }

        /* Estilo para los enlaces */
        a {
            text-decoration: none;
            color: #333;
            font-weight: bold; /* Añadir negrita a los enlaces */
        }

        a:hover {
            text-decoration: underline;
        }

        /* Estilo para el botón de Log Out */
        .logout-btn {
            color: #fff;
            cursor: pointer;
        }

        .logout-btn:hover {
            text-decoration: underline;
        }

        /* Estilo para el botón de Profile */
        .profile-btn {
            color: #fff;
            cursor: pointer;
        }

        .profile-btn:hover {
            text-decoration: underline;
        }

        /* Estilo para el título SyncPulse */
        #syncpulse-title {
            font-size: 24px;
            font-weight: bold;
            color: #fff; /* Color inicial */
            animation: changeColor 2s linear infinite alternate; /* Animación para cambiar de color */
        }

        /* Animación para cambiar de color */
        @keyframes changeColor {
            0% { color: #fff; }
            50% { color: #f0ad4e; }
            100% { color: #d9534f; }
        }

        /* Estilo para el nombre del icono */
        .icon-name {
            margin-left: 5px;
            font-size: 14px;
        }

        /* Estilo para el icono de notificaciones */
        .notification-icon {
            position: fixed;
            left: 20px;
            bottom: 20px;
            color: #fff;
            font-size: 24px;
            cursor: pointer;
        }

        /* Estilo para la ventana de notificaciones */
        .notification-window {
            position: fixed;
            bottom: 100px;
            left: 20px;
            width: 200px;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border-radius: 5px;
            display: none;
        }
    </style>
</head>
<body>
    <!-- Icono de notificaciones -->
    <i class="fas fa-bell notification-icon" onclick="toggleNotificationWindow()"></i>

    <!-- Ventana de notificaciones -->
    <div class="notification-window" id="notification-window">
        No tienes notificaciones.
    </div>

    <!-- Panel superior -->
    <div class="panel">
        <!-- Título SyncPulse -->
        <div id="syncpulse-title">SyncPulse</div>
        <!-- Botón de Profile -->
        <a href="{{ route('profile.edit') }}" class="profile-btn"><i class="fas fa-user"></i><span class="icon-name">Profile</span></a>
        <!-- Botón de Log Out -->
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="logout-btn"><i class="fas fa-sign-out-alt"></i><span class="icon-name">Log Out</span></a>
        <!-- Formulario para logout -->
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>

    <h1>Tableros</h1>

    <!-- Contenedor para centrar la barra de nombre del tablero y el botón -->
    <div class="container">
        <!-- Formulario para crear un nuevo tablero -->
        <form action="{{ route('boards.store') }}" method="POST">
            @csrf
            <input type="text" name="title" placeholder="Nombre del tablero" required>
            <button type="submit" style="background-color: #007bff;">Crear Tablero</button>
        </form>
    </div>

    <!-- Mostrar lista de tableros -->
    <ul>
        @foreach ($boards as $board)
            <li>
                <!-- Nombre del tablero como enlace -->
                <a href="{{ route('tasks.index', ['board' => $board->id]) }}">{{ $board->title }}</a> 
                <div class="actions">
                    <form action="{{ route('boards.edit', $board) }}" method="GET">
                        @csrf
                        <button type="submit" class="edit"><i class="fas fa-pencil-alt"></i><span class="icon-name">Editar</span></button>
                    </form>
                    <form action="{{ route('boards.destroy', $board) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete"><i class="fas fa-trash-alt"></i><span class="icon-name">Eliminar</span></button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>

    <script>
        function toggleNotificationWindow() {
            var notificationWindow = document.getElementById('notification-window');
            if (notificationWindow.style.display === 'none') {
                notificationWindow.style.display = 'block';
            } else {
                notificationWindow.style.display = 'none';
            }
        }
    </script>
</body>
</html>


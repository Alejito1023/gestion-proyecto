<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Lista de Tareas</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #333;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            color: #fff;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
        }

        .btn-primary {
            background-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-success {
            background-color: #28a745;
        }

        .btn-success:hover {
            background-color: #218838;
        }

        .btn-danger {
            background-color: #dc3545;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        .btn-upload {
            display: inline-block;
            padding: 10px 20px;
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
        }

        .btn-upload:hover {
            background-color: #218838;
        }

        .task-item {
            margin-bottom: 10px;
            padding: 10px;
            background-color: #f9f9f9;
            border-radius: 5px;
            transition: transform 0.3s ease-in-out; /* Agregamos la transición */
        }

        .task-item:hover {
            transform: translateY(-5px); /* Levantamos la tarea al pasar el cursor */
        }

        .task-title {
            font-size: 18px;
            font-weight: bold;
            color: #333;
            margin-bottom: 5px;
        }

        .task-description {
            font-family: 'Roboto', sans-serif; /* Fuente Roboto */
            font-size: 16px;
            color: #555;
            margin-bottom: 10px;
        }

        .task-file {
            font-size: 14px;
            color: #777;
            margin-bottom: 10px;
        }

        .task-file a {
            color: #007bff;
            text-decoration: none;
        }

        .task-file a:hover {
            text-decoration: underline;
        }

        .task-actions {
            margin-top: 10px;
        }

        /* Estilo para el enlace de volver a la lista de tableros */
        a {
            display: block;
            text-align: center;
            margin-top: 20px;
            text-decoration: none;
            color: #007bff;
        }

        a:hover {
            text-decoration: underline;
        }

        /* Estilo para los iconos */
        .icon {
            margin-right: 5px;
        }

        /* Estilo para el nombre del icono */
        .icon-name {
            font-size: 14px;
        }
    </style>
</head>
<body class="font-sans antialiased">
    <div class="container">
        <h1>Lista de Tareas</h1>
        
        <!-- Botón para crear nueva tarea -->
        <a href="{{ route('tasks.create') }}" class="btn btn-primary">Crear Tarea</a>
        
        <!-- Lista de tareas -->
        <ul>
            @foreach ($tasks as $task)
            <li class="task-item">
                <div class="task-title">{{ $task->title }}</div>
                <div class="task-description">{{ $task->description }}</div>
                @if ($task->archivo)
                    <div class="task-file">
                        Archivo: <a href="{{ asset('storage/' . $task->archivo->ruta) }}" target="_blank">{{ $task->archivo->nombre }}</a>
                    </div>
                @endif
                <div class="task-actions">
                    <a href="{{ route('tasks.edit', $task) }}" class="btn btn-success"><i class="fas fa-pencil-alt icon"></i><span class="icon-name">Editar</span></a>
                   
                    <form action="{{ route('tasks.destroy', $task) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt icon"></i><span class="icon-name">Eliminar</span></button>
                    </form>
                </div>
            </li>
            @endforeach
        </ul>
        
        <!-- Enlace para volver a la lista de tableros -->
        <a href="{{ route('boards.index') }}">Volver a la lista de tableros</a>
    </div>
</body>
</html>

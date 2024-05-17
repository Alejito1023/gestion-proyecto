<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Crear Nueva Tarea</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #333;
            margin: 0;
            padding: 0;
            
        }

        .container {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #fff;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        textarea,
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Crear Nueva Tarea</h1>
    <div class="container">
        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf
            <div>
                <label for="title">Título:</label>
                <input type="text" id="title" name="title" required>
            </div>
            <div>
                <label for="description">Descripción:</label>
                <textarea id="description" name="description" rows="4"></textarea>
            </div>
            <!--<div>
    <label for="file">Archivo:</label>
    <input type="file" id="file" name="file">
</div>-->
            <div>
                <label for="board">Tablero:</label>
                <select id="board" name="board_id" required>
                    <option value="">Seleccionar tablero</option>
                    @foreach ($boards as $board)
                        <option value="{{ $board->id }}">{{ $board->title }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <button type="submit">Crear Tarea</button>
            </div>
        </form>
    </div>
</body>
</html>
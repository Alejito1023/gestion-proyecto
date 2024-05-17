<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Bienvenido</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            text-align: center;
        }

        h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 30px;
        }

        #welcome {
            color: #fff;
        }

        #syncPulse {
            animation: changeColor 5s infinite alternate;
        }

        @keyframes changeColor {
            0% {
                color: #007bff; /* Azul */
            }
            25% {
                color: #28a745; /* Verde */
            }
            50% {
                color: #dc3545; /* Rojo */
            }
            75% {
                color: #ffc107; /* Amarillo */
            }
            100% {
                color: #17a2b8; /* Turquesa */
            }
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            margin-right: 10px;
        }

        .btn:last-child {
            margin-right: 0;
        }

        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1><span id="welcome">Bienvenido a</span> <span id="syncPulse">SyncPulse</span></h1>
        <a href="{{ route('login') }}" class="btn">Iniciar Sesión</a>
        <a href="{{ route('register') }}" class="btn">Registrarse</a>
    </div>

    <script>
        // JavaScript para cambiar aleatoriamente el color del texto "SyncPulse"
        setInterval(function() {
            var colors = ['#007bff', '#28a745', '#dc3545', '#ffc107', '#17a2b8'];
            var randomColor = colors[Math.floor(Math.random() * colors.length)];
            document.getElementById('syncPulse').style.color = randomColor;
        }, 5000); // Cambia cada 5 segundos
    </script>
</body>
</html>

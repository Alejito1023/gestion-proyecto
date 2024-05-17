<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <style>
        /* Estilos personalizados para el perfil */
        .profile-section {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
        }

        .profile-section h3 {
            font-size: 1.5rem;
            font-weight: bold;
            color: #333;
            margin-bottom: 20px;
        }

        .profile-section form {
            margin-top: 20px;
        }

        .profile-section label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
        }

        .profile-section input[type="text"],
        .profile-section input[type="email"],
        .profile-section input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .profile-section button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .profile-section button:hover {
            background-color: #0056b3;
        }
    </style>

    <div class="py-12">
        <div class="max-w-3xl mx-auto">
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                <div class="profile-section">
                    <h3>Actualizar información del perfil</h3>
                    @include('profile.partials.update-profile-information-form')
                </div>

                <div class="profile-section">
                    <h3>Actualizar contraseña</h3>
                    @include('profile.partials.update-password-form')
                </div>

                <div class="profile-section">
                    <h3>Eliminar cuenta</h3>
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
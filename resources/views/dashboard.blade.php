<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-gray-800 dark:text-gray-200 leading-tight">
            ¡Bienvenido al Dashboard!
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex items-center justify-center mb-8">
                        <!-- Eliminamos el SVG -->
                    </div>
                    <p class="text-2xl mb-4">{{ __("¡Bienvenido!") }}</p>
                    <p class="text-lg mb-4">{{ __("Estás en el Dashboard de tu aplicación.") }}</p>
                    <p class="text-lg">{{ __("Desde aquí puedes administrar tus tareas y tableros.") }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Botón para volver al inicio de sesión -->
    <div class="flex justify-center mt-4">
        <a href="{{ route('login') }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            {{ __('Volver al inicio de sesión') }}
        </a>
    </div>
</x-app-layout>
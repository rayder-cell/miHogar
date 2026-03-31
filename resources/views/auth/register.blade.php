<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Nombre -->
        <div>
            <x-input-label for="nombre" :value="__('Nombre')" />
            <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre')" required
                autofocus />
            <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
        </div>

        <!-- DNI -->
        <div class="mt-4">
            <x-input-label for="dni" :value="__('DNI')" />
            <x-text-input id="dni" class="block mt-1 w-full" type="text" name="dni" :value="old('dni')"
                required />
            <x-input-error :messages="$errors->get('dni')" class="mt-2" />
        </div>

        <!-- Correo -->
        <div class="mt-4">
            <x-input-label for="correo" :value="__('Correo electrónico')" />
            <x-text-input id="correo" class="block mt-1 w-full" type="email" name="correo" :value="old('correo')"
                required />
            <x-input-error :messages="$errors->get('correo')" class="mt-2" />
        </div>

        <!-- Contraseña -->
        <div class="mt-4">
            <x-input-label for="contrasena" :value="__('Contraseña')" />
            <x-text-input id="contrasena" class="block mt-1 w-full" type="password" name="contrasena" required />
            <x-input-error :messages="$errors->get('contrasena')" class="mt-2" />
        </div>

        <!-- Confirmar Contraseña -->
        <div class="mt-4">
            <x-input-label for="contrasena_confirmation" :value="__('Confirmar Contraseña')" />
            <x-text-input id="contrasena_confirmation" class="block mt-1 w-full" type="password"
                name="contrasena_confirmation" required />
            <x-input-error :messages="$errors->get('contrasena_confirmation')" class="mt-2" />
        </div>
        
        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>

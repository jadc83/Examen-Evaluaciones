<x-app-layout>

    <form method="post" action="{{ route('alumnos.update', $alumno) }}">
        @csrf
        @method('patch')
            <x-input-label for="nombre" :value="__('Nombre')" />
            <x-text-input id="nombre" class="block mt-1 w-4/12" type="text" name="nombre" :value="old('nombre', $alumno->nombre)" required autofocus autocomplete="nombre" />
            <x-input-error :messages="$errors->get('nombre')" class="mt-2" />

            <x-primary-button>Guardar alumno</x-primary-button>

    </form>
</x-app-layout>

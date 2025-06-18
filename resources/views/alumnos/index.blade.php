<x-app-layout>

    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Nota final</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($alumnos as $alumno)
                <tr>
                    <td>
                        <a href="{{route('alumnos.show', $alumno)}}">
                            {{$alumno->nombre}}
                        </a>
                    </td>
                    <td>
                        {{$alumno->ccee->avg(fn($ce) => $ce->pivot->nota) ?? 'Sin nota'}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <form action="{{route('alumnos.create')}}" method="get">
        <x-primary-button>Nuevo alumno</x-primary-button>
    </form>

</x-app-layout>
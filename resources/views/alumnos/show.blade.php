<x-app-layout>

    <h1>{{$alumno->nombre}}</h1>
    <form action="{{route('alumnos.edit', $alumno)}}" method="get">

        <x-primary-button>Editar</x-primary-button>
    </form>

    <form action="{{route('alumnos.evaluar', $alumno)}}" method="post">
        @csrf
        <select name="criterio_id">
            @foreach ($ccee as $ce)
                <option value="{{$ce->id}}">{{$ce->codigo}}</option>
            @endforeach
        </select>

        <x-input-label>Nota</x-input-label>
        <x-text-input name="nota"/>
        <x-primary-button>Evaluar</x-primary-button>

    </form>

    <table>
        <thead>
            <tr>
                <th>Codigo</th>
                <th>Descripcion</th>
                <th>Nota</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($alumno->ccee as $ce)
                <tr>
                    <td> {{$ce->codigo}}</td>
                    <td>{{$ce->descripcion}}</td>
                    <td>{{$ce->pivot->nota }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</x-app-layout>
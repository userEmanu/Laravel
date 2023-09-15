@extends('app')

@section('content')
    <h1>Listado de Atracciones</h1>

    <table class="table table-striped table-warning">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Tickets Disponibles</th>
                <th>Hora de Inicio</th>
                <th>Hora de Fin</th>
                <th>Costo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($attractions as $attraction)
                <tr>
                    <td>{{ $attraction->nombre }}</td>
                    <td>{{ $attraction->capacidad }}</td>
                    <td>{{ $attraction->horaInicio }}</td>
                    <td>{{ $attraction->horafin }}</td>
                    <td>{{ $attraction->costo }}</td>
                    <td>
                        <a href="{{ route('attractions.edit', $attraction->id) }}" class="btn btn-primary btn-sm">Actualizar</a>
                        <form action="{{ route('attractions.destroy', $attraction->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar esta atracción?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@extends('app')

@section('content')
    <h1>Confirmar Eliminación</h1>

    <p>¿Estás seguro de que deseas eliminar la atracción "{{ $attraction->nombre }}"?</p>

    <form id="deleteAttractionForm" action="{{ route('attractions.destroy', $attraction->id) }}" method="POST">
        @csrf
        @method('DELETE') <!-- Usar método DELETE para eliminar -->

        <button type="submit" class="btn btn-danger">Eliminar</button>
    </form>

    <a href="{{ route('attractions.index') }}" class="btn btn-secondary">Cancelar</a>
@endsection

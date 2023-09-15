@extends('app')

@section('content')
    <h1>Editar Atracción</h1>

    <form id="editAttractionForm" action="{{ route('attractions.update', $attraction->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Usar método PUT para actualizar -->

        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $attraction->nombre }}" required>
        </div>

        <div class="form-group">
            <label for="capacidad">Capacidad:</label>
            <input type="number" class="form-control" id="capacidad" name="capacidad" value="{{ $attraction->capacidad }}" required>
        </div>

        <div class="form-group">
            <label for="horaInicio">Hora de Inicio:</label>
            <input type="time" class="form-control" id="horaInicio" name="horaInicio" value="{{ $attraction->horaInicio }}" required>
        </div>

        <div class="form-group">
            <label for="horafin">Hora de Fin:</label>
            <input type="time" class="form-control" id="horafin" name="horafin" value="{{ $attraction->horafin }}" required>
        </div>

        <div class="form-group">
            <label for="costo">Costo:</label>
            <input type="number" step="0.01" class="form-control" id="costo" name="costo" value="{{ $attraction->costo }}" required>
        </div>

        <br>
        <button type="submit" class="btn btn-primary">Actualizar Atracción</button>
    </form>
@endsection

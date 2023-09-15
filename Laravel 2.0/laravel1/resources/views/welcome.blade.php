@extends('app')

@section('content')
    <h1>Agregar Atracción</h1>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <form id="addAttractionForm">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <div class="form-group">
            <label for="capacidad">Capacidad:</label>
            <input type="number" class="form-control" id="capacidad" name="capacidad" required>
        </div>
        <div class="form-group">
            <label for="horaInicio">Hora de Inicio:</label>
            <input type="time" class="form-control" id="horaInicio" name="horaInicio" required>
        </div>
        <div class="form-group">
            <label for="horafin">Hora de Fin:</label>
            <input type="time" class="form-control" id="horafin" name="horafin" required>
        </div>
        <div class="form-group">
            <label for="costo">Costo:</label>
            <input type="number" step="0.01" class="form-control" id="costo" name="costo" required>
        </div>
        <br>
        <button type="submit" class="btn btn-success" id="submitBtn">Agregar Atracción</button>

    </form>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.getElementById('addAttractionForm');
        const submitBtn = document.getElementById('submitBtn');

        form.addEventListener('submit', function (event) { // Cambia 'submitBtn' a 'submit' aquí
            event.preventDefault(); // Evitar el envío del formulario por defecto.

            // Obtener los valores del formulario.
            const nombre = document.getElementById('nombre').value;
            const capacidad = document.getElementById('capacidad').value;
            const horaInicio = document.getElementById('horaInicio').value;
            const horafin = document.getElementById('horafin').value;
            const costo = document.getElementById('costo').value;

            // Realizar una petición AJAX para guardar la atracción.
            axios.post('{{ route("attractions.store") }}', {
                nombre: nombre,
                capacidad: capacidad,
                horaInicio: horaInicio,
                horafin: horafin,
                costo: costo
            })
            .then(function (response) {
                // La atracción se ha guardado exitosamente.
                alert('Atracción guardada con éxito');
                form.reset(); // Limpiar el formulario.
            })
            .catch(function (error) {
                // Manejar errores en caso de que falle la petición.
                console.error('Error al guardar la atracción:', error);
                alert('Hubo un error al guardar la atracción. Por favor, inténtalo de nuevo.');
            });
        });
    });
</script>


@endsection

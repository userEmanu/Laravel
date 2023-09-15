@extends('app')

@section('content')
    <div class="container">
        <h1>Registrar Venta de Boletos</h1>
        <form method="POST" action="{{ route('ventas.store') }}">
            @csrf
            <div class="form-group">
                <label for="attraction">Atracción:</label>
                <select name="attraction" id="attraction" class="form-control" required>
                    <option value="">Seleccione una atracción</option>
                    @foreach ($availableAttractions as $attraction)
                        <option value="{{ $attraction->id }}">{{ $attraction->nombre }} - {{ $attraction->capacidad }} </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="cantidad">Cantidad de Boletos:</label>
                <input type="number" name="cantidad" id="cantidad" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="precio_total">Valor Total:</label>
                <input type="number" name="precio_total" id="precio_total" class="form-control" reodonly>
            </div>
            <br>
            <button type="submit" class="btn btn-success">Registrar Venta</button>
        </form>
    </div>

    <script>
        // JavaScript para calcular el valor total en función de la cantidad de boletos
        document.getElementById('cantidad').addEventListener('input', function() {
            const attractionId = document.getElementById('attraction').value;
            const cantidad = parseInt(this.value);
            if (!isNaN(cantidad) && attractionId) {
                calcularPrecioTotal(attractionId, cantidad); // Llama a la función calcularPrecioTotal
            }
        });

        // Esta es la función calcularPrecioTotal que proporcionaste
        function calcularPrecioTotal(attractionId, cantidad) {
            const url = `/obtener-atraccion/${attractionId}`;
        
            fetch(url)
                .then(response => response.json())
                .then(data => {
                    if (data && data.precio && data.capacidad) {
                        const precioUnitario = data.precio;
                        const capacidadActual = data.capacidad;
        
                        if (cantidad <= capacidadActual) {
                            const precioTotal = cantidad * precioUnitario;
        
                            // Asigna el valor calculado al campo 'precio_total'.
                            document.getElementById('precio_total').value = precioTotal;
        
                            // Resto del código...
                        } else {
                            alert('No hay suficiente capacidad para la cantidad de boletos seleccionada.');
                            document.getElementById('cantidad').value = '';
                        }
                    }
                })
                .catch(error => {
                    console.error('Error al obtener datos de la atracción:', error);
                });
        }
    </script>
@endsection

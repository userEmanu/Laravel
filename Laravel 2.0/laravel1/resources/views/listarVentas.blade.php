@extends('app')

@section('content')
    <div class="container">
        <h1>Listado de Ventas de Boletos</h1>
        <table class="table table-striped table-success">
            <thead>
                <tr>
                    <th>Atracción</th>
                    <th>Cantidad de Tickets Vendidos</th>
                    <th>Precio Total Vendido</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ventasAgrupadas as $venta)
                    <tr>
                        <td>{{ $venta->attraction->nombre }}</td>
                        <td>{{ $venta->cantidad_total }}</td>
                        <td>{{ $venta->precio_total }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

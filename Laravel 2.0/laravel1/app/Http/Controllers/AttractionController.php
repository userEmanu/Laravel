<?php

namespace App\Http\Controllers;
use App\Models\Attraction;
use App\Models\TicketPurchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class AttractionController extends Controller
{


   
    public function store(Request $request)
    {
        // Validar los datos ingresados por el usuario.
        

        // Crear y guardar la atracción en la base de datos.
        $attraction = new Attraction();
        $attraction->nombre = $request->input('nombre');
        $attraction->capacidad = $request->input('capacidad');
        $attraction->horaInicio = $request->input('horaInicio');
        $attraction->horafin = $request->input('horafin');
        $attraction->costo = $request->input('costo');
        $attraction->save();

        return response()->json(['message' => 'Atracción guardada con éxito']);
    }

    public function listar()
        {
            $attractions = Attraction::all(); // Obtener todas las atracciones desde la base de datos

            return view('attractions', compact('attractions'));
        }


    public function agregar(){
        return view('welcome');
    }
    public function edit($id)
    {
        $attraction = Attraction::findOrFail($id); // Obtener la atracción por ID
        return view('edit', compact('attraction'));
    }

    public function update(Request $request, $id)
    {
        $attraction = Attraction::findOrFail($id);
    
        // Validar los datos actualizados
        
    
        // Actualizar los datos de la atracción
        $attraction->nombre = $request->input('nombre');
        $attraction->capacidad = $request->input('capacidad');
        $attraction->horaInicio = $request->input('horaInicio');
        $attraction->horafin = $request->input('horafin');
        $attraction->costo = $request->input('costo');
        $attraction->save();
    
        return redirect()->route('attractions.index')->with('success', 'Atracción actualizada con éxito');
    }
    

    public function destroy($id)
    {
        $attraction = Attraction::findOrFail($id);
        $attraction->delete();

        return redirect()->route('attractions.index')->with('success', 'Atracción eliminada con éxito');
    }

        public function formCompra()
    {
        $availableAttractions = Attraction::where('capacidad', '>', 0)->get();

        return view('ventas', compact('availableAttractions'));
    }

    public function guardarTicket(Request $request)
    {
        // $request->validate([
        //     'attraction' => 'required|exists:attractions,id',
        //     'cantidad' => 'required|numeric|min:1',
        //     'precio_total' => 'required|numeric|min:0',
        // ]);
    
        $attractionId = $request->input('attraction');
        $cantidad = $request->input('cantidad');
        $precioTotal = $request->input('precio_total');
    
        // Verificar si hay suficiente capacidad en la atracción
        $attraction = Attraction::find($attractionId);
    
        if (!$attraction) {
            return redirect()->back()->with('error', 'Atracción no encontrada');
        }
    
        if ($cantidad > $attraction->capacidad) {
            return redirect()->back()->with('error', 'No hay suficiente capacidad para la cantidad de boletos seleccionada.');
        }
    
        // Crear la venta de boletos
        $ticketPurchase = new TicketPurchase();
        $ticketPurchase->attraction_id = $attractionId;
        $ticketPurchase->cantidad_boletos = $cantidad;
        $ticketPurchase->precio = $precioTotal;
        $ticketPurchase->save();
    
        // Actualizar la capacidad de la atracción
        $attraction->capacidad -= $cantidad;
        $attraction->save();
    
        return redirect()->route('attractions.formCompra')->with('success', 'Venta de boletos registrada con éxito.');
    }

    
    public function obtenerAtraccion($id)
    {
        // Recuperar los datos de la atracción por su ID
        $atraccion = Attraction::findOrFail($id);

        // Devolver los datos en formato JSON
        return response()->json([
            'precio' => $atraccion->costo,
            'capacidad' => $atraccion->capacidad,
        ]);
    }


        public function listarVentas()
    {
        $ventasAgrupadas = TicketPurchase::with('attraction')
            ->select('attraction_id')
            ->selectRaw('SUM(cantidad_boletos) as cantidad_total')
            ->selectRaw('SUM(precio) as precio_total')
            ->groupBy('attraction_id')
            ->get();

        return view('listarVentas', compact('ventasAgrupadas'));
    }


}
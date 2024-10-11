<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
namespace App\Http\Controllers;
use App\Models\Pedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    // Redirección a la pagina principal
    public function index()
    {
        $pedidos = Pedido::all();
        return view('pedidos.index', compact('pedidos'));
    }

    // Redirección a la pagina de creación
    public function create()
    {
        return view('pedidos.create');
    }

    // Almacenamiento de los valores
    public function store(Request $request)
    {
        // Validación del formulario
        $request->validate([
            'medicamento' => 'required|string|max:255',
            'tipo' => 'required|string|max:255',
            'cantidad' => 'required|integer|min:1',
            'distribuidor' => 'required|in:Cofarma,Empsephar,Cemefar',
            'sucursal' => 'required|array|min:1', // Mínimo una sucursal seleccionada
            'sucursal.*' => 'in:Principal,Secundaria', // Cada sucursal seleccionada debe ser válida
        ]);

        // Crear el pedido
        Pedido::create([
            'medicamento' => $request->medicamento,
            'tipo' => $request->tipo,
            'cantidad' => $request->cantidad,
            'distribuidor' => $request->distribuidor,
            'sucursal' => implode(', ', $request->sucursal), // Combinar sucursales en una cadena
        ]);
        // Redirigir a la lista de pedidos
        return redirect()->route('pedidos.index')->with('success', 'Pedido creado exitosamente.');
    }

    public function edit(Pedido $pedido)
    {
        // Convertir la cadena separada por comas en un array
        $pedido->sucursal = array_map('trim', explode(',', $pedido->sucursal));
        return view('pedidos.edit', compact('pedido'));
    }

    public function update(Request $request, Pedido $pedido)
    {
        // Validar los datos
        $request->validate([
            'medicamento' => 'required|string|max:255',
            'tipo' => 'required|string|max:255',
            'cantidad' => 'required|integer|min:1',
            'distribuidor' => 'required|in:Cofarma,Empsephar,Cemefar',
            'sucursal' => 'required|array|min:1',
            'sucursal.*' => 'in:Principal,Secundaria',
        ]);
    
        // Convertir el array de sucursales a una cadena separada por comas
        $pedido->sucursal = implode(', ', $request->sucursal);
    
        // Actualizar los demás campos del pedido
        $pedido->medicamento = $request->medicamento;
        $pedido->tipo = $request->tipo;
        $pedido->cantidad = $request->cantidad;
        $pedido->distribuidor = $request->distribuidor;
    
        // Guardar los cambios
        $pedido->save();
    
        return redirect()->route('pedidos.index')->with('success', 'Pedido actualizado con éxito');
    }
    
    // Eliminar pedido segun el valor que se pase por parametro
    public function destroy(Pedido $pedido)
    {
        $pedido->delete();

        return redirect()->route('pedidos.index')->with('success', 'Pedido eliminado con éxito');
    }
}


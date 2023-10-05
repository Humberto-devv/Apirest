<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pagos;

class PagosController extends Controller
{
    
    public function index()
    {
        $user_id = auth()->user()->id;

        $pagos = Pagos::where("user_id", $user_id)->get();

        $sumaPagado = $pagos->sum('pagar');
        $sumaPorPagar = $pagos->sum('monto') - $sumaPagado;

        return response()->json([
            'pagos' => $pagos,
            'sumaPagado' => $sumaPagado,
            'sumaPorPagar' => $sumaPorPagar
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $user_id = auth()->user()->id;

        $pago = new Pagos();
        $pago -> user_id = $user_id;
        $pago -> concepto = $request -> concepto;
        $pago -> monto = $request -> monto;
        $pago -> pagar = $request -> pagar;
        $pago-> fecha = $request -> fecha;
        $pago -> estatus = $request -> estatus;
        $pago -> fijo = $request -> fijo;
        $pago -> doble = $request -> doble;
        $pago -> frecuencia = $request -> frecuencia;

        $pago -> save();
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $pago = Pagos::findOrFail($request->id);
        
        $pago-> concepto = $request-> concepto;
        $pago-> monto = $request-> monto;
        $pago-> pagar = $request-> pagar;
        $pago-> fecha = $request -> fecha;
        $pago-> estatus = $request-> estatus;
        $pago-> frecuencia = $request-> frecuencia;

        $pago -> save();

        return $pago;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $pago = Pagos::find($request->id);
        if ($pago) {
            $pago->delete();
        }
        return response()->json(['message' => 'Registro eliminado correctamente']);
    }

}

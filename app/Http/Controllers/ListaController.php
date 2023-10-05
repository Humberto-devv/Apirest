<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Lista;

class ListaController extends Controller
{
    public function index()
    {
        $user_id = auth()->user()->id;
        $listas = Lista::where("user_id", $user_id)->get();

        return response()->json([
            'listas' => $listas,
        ]);
    }
    
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $user_id = auth()->user()->id;

        $lista = new Lista();
        
        $lista -> user_id = $user_id;
        $lista -> objeto = $request -> objeto;
        $lista -> costo = $request -> costo;
        $lista -> frequency = $request -> frequency;
        $lista -> fixed = $request -> fixed;
        $lista -> both = $request -> both;
        $lista -> quina = $request -> quina;

        $lista -> save();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $lista = Lista::find($request->id);
        if ($lista) {
            $lista->delete();
        }
        return response()->json(['message' => 'Registro eliminado correctamente']);
    }
}

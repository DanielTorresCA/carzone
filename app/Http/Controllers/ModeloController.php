<?php

namespace App\Http\Controllers;
use App\Models\Auto;
use App\Models\Marca;
use App\Models\Modelo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ModeloController extends Controller
{
    public function index()
    {
        $modelos = Modelo::with('marca')->paginate(10);;
        return view("modelos.index",compact('modelos'));  
    }
    public function create()
    {
        $marcas=Marca::all();
        return view('modelos.create',compact('marcas'));
    }
    public function store(Request $request)
    {
        $validated=$request->validated( [
            'nombre'=>'string',
            'marca_id'=>'required|exists:marcas,id']);
        $modelo::create($validated);
        return redirect()->route('modelos.index')->with('success', 'Modelo creado exitosamente.');    
    }

    public function show(string $id)
    {
        //
    }
    public function edit(Modelo $modelo)
    {
        $marcas::Marca::all()->get();
        return view('modelos.edit', compact('modelo','marcas')); 
    }
    public function update(Request $request, Auto $auto)
    {
        $request->validate([
            'nombre'=>'string',
            'marca_id'=>'required|exists:marcas,id',
]);
        $modelo->update($request->all());
        return redirect()->route('modelos.index')->with('success', 'Modelo actualizado correctamente.');
    }
    public function destroy(string $id)
    {
        $modelo = Modelo::findOrFail($id);
        $modelo->delete();
        return response()->json(['mensaje' => 'Modelo eliminado correctamente']);
    }
}

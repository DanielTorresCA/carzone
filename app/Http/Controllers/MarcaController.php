<?php

namespace App\Http\Controllers;
use App\Models\Auto;
use App\Models\Marca;
use App\Models\Modelo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class MarcaController extends Controller
{
    public function index()
    {
        $marcas = Marca::withCount('modelos')->get();
        $numeromodelos=$marcas->sum('modelos_count');
        return view("marcas.index",compact('marcas','numeromodelos'));  
    }
    public function create()
    {
         return view("marcas.create");
    }
    public function store(Request $request)
    {
        $validated = $request->validate(['nombre' => 'string']);
        $marca = Marca::create($validated);
        return redirect()->route('marcas.index')->with('success', 'marca creado exitosamente.');
    }
    public function show(string $id)
    {
        //
    }
    public function edit(Marca $marca)
    {
        return view('marcas.edit', compact('marca'));
    }
    public function update(Request $request, Marca $marca)
    {
        $request->validate(['nombre' => 'required|string']);
        $marca->update($request->all());
        return redirect()->route('marcas.index')->with('success', 'Marca actualizada correctamente.');
    }
    public function destroy(string $id)
    {
        $marcas = Marca::findOrFail($id);
        $marcas->delete();
        return response()->json(['mensaje' => 'marca eliminado correctamente']);
    }
}

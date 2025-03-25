<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Auto;
use App\Models\Marca;
use App\Models\Modelo;
use Illuminate\Http\Request;
class AutoController extends Controller
{
    public function index()
    {
        $autos=Auto::with(['estado','marca','modelo'])->get();
        return view('autos.index',compact('autos'));
    }
    public function getData()
{
    $autos = Auto::select(['id', 'motor', 'aceleracion', 'combustible', 'transmision', 'precio', 'descripcion']);

    return datatables()->of($autos)
        ->addColumn('acciones', function ($auto) {
            return '
                <a href="'.route('autos.show', $auto->id).'" class="btn btn-info btn-sm">Ver</a>
                <a href="'.route('autos.edit', $auto->id).'" class="btn btn-warning btn-sm">Editar</a>
                <button onclick="eliminarAuto('.$auto->id.')" class="btn btn-danger btn-sm">Eliminar</button>';})->rawColumns(['acciones'])->make(true);
}
    public function create()
    {
        $marcas = Marca::with('modelos')->get();
        $modelosPorMarca =[];
        foreach($marcas as $marca){
            $modelosPorMarca[$marca->id]=$marca->modelos;
        }  
        return view("autos.create",compact('marcas','modelosPorMarca'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'marca_id'    => 'required|exists:marcas,id',
            'modelo_id'   => 'required|exists:modelos,id',
            'motor'       => 'required|string',
            'aceleracion' => 'required|string',
            'combustible' => 'required|string',
            'transmision' => 'required|string',
            'precio'      => 'required|numeric',
            'descripcion' => 'nullable|string',
        ]);
        $auto = Auto::create($validated);
        return redirect()->route('autos.index')->with('success', 'Auto creado exitosamente.');
    }
    public function show(string $id)
    {
        //
    }
    public function edit(Auto $auto)
    {
        return view('autos.edit', compact('auto')); 
    }

    public function update(Request $request, Auto $auto)
    {
        $request->validate([
            'motor' => 'required|string|max:255',
            'aceleracion' => 'required|string|max:255',
            'combustible' => 'required|string|max:255',
            'transmision' => 'required|string|max:255',
            'precio' => 'required|numeric',
            'descripcion' => 'required|string',]);
        $auto->update($request->all());
        return redirect()->route('autos.index')->with('success', 'Vehículo actualizado correctamente.');
    }
    
    public function destroy(string $id)
    {
        $auto = Auto::findOrFail($id);
        $auto->delete();
        return response()->json(['mensaje' => 'Auto eliminado correctamente']);
    }
}

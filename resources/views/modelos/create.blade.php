<style>
    .selectcustom {
        border: 2px solidrgb(83, 96, 110); /* Borde azul */
        border-radius: 5px;       /* Bordes redondeados */
        padding: 6px 12px;        /* Espaciado interno */
        font-size: 14px;          /* Tamaño de fuente */
        color:rgb(134, 144, 155);           /* Color de texto */
        width: 100%;               /* Ocupa todo el contenedor */
        max-width: 100%;           /* Que no exceda el ancho */
    }
    .selectcustom:focus{
        outline: none;
        box-shadow: 0 0 5px rgba(0,123,255,0.5); /* Efecto glow al enfocar */
    }
</style>

@extends('admin')
@section('titulo','Panel De Creacion de Modelos')
@section('contenido')
<div class="container">
    <div class="card">
        <div class="card-header bg-gradient-primary text-white">
            <h4>Crear Nuevo Modelo</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('modelos.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nomrbe" class="form-label">Nombre del modelo</label>
                    <textarea name="nombre" class="form-control" rows="2"></textarea>
                </div>
                <div class="mb-3">
                    <label for="marca_id" class="form-label">Marca del modelo</label>
                    <select class="selectcustom" name="marca_id" id="">
                        @foreach($marcas as $marca){
                            <option value="{{$marca->id}}">{{$marca->nombre}}</option>
                        }
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save"></i> Guardar Modolo
                </button>
            </form>
        </div>
    </div>
</div>
@endsection

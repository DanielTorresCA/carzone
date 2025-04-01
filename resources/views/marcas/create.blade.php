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
@section('titulo','Panel De Creacion de Marca')
@section('contenido')
<div class="container">
    <div class="card">
        <div class="card-header bg-gradient-primary text-white">
            <h4>Crear Nueva Marca</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('marcas.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nomrbe" class="form-label">Nombre de la marca</label>
                    <textarea name="nombre" class="form-control" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save"></i> Guardar marca
                </button>
            </form>
        </div>
    </div>
</div>
@endsection

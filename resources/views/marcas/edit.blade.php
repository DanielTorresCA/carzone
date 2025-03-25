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

@section('titulo', 'Editar Marcas')

@section('contenido')
<div class="card shadow">
    <div class="card-body">
        <form action="{{ route('marcas.update', $marca->id) }}" method="POST">
            @csrf
            @method('PUT')
            <!-- Descripción -->
            <div class="mb-3">
                <label for="nombre" class="form-label">Descripción</label>
                <textarea name="nombre" class="form-control" rows="3" required>{{ old('nombre', $marca->nombre) }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Actualizar marca
            </button>
            <a href="{{ route('marcas.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@endsection

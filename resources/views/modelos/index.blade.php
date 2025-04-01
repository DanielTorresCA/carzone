<style>
    .pagination {
    justify-content: flex-end;
}

.pagination .page-item {
    margin: 0 3px; /* Espacio entre los botones */
}

.text-muted {
    font-size: 14px;
    margin-top: auto;
}
</style>
@extends('admin')
@section('titulo', 'Lista de Modelos')
@section('contenido')
<div class="row col-sm-12 my-2">
<a href="{{ route('modelos.create') }}" class="btn btn-lg btn-primary text-white shadow-lg fw-bold d-flex align-items-center gap-2 px-4 mb-3">
    <i class="fas fa-car fa-lg ">  </i> Crear modelo
</a>
</div>
    <table class="table table-bordered table-striped">
        <thead class="bg-primary text-white">
            <tr>
                <th>ID</th>
                <th>Nombre del Modelo</th>
                <th>Marca</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($modelos as $modelo)
                <tr>
                    <td>{{ $modelo->id }}</td>
                    <td>{{ $modelo->nombre }}</td>
                    <td>{{ $modelo->marca->nombre ?? 'Sin marca' }}</td>
                    <td>
                        <a href="{{ route('modelos.edit', $modelo->id) }}" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('modelos.destroy', $modelo->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro?')">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <!-- Agregar botones de paginación -->
<div class="d-flex justify-content-between align-items-center mt-3">
    <div>
        {{ $modelos->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection

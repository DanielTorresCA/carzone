@extends('admin')

@section('titulo', 'Administración de Usuarios')

@section('contenido')
<div class="container">
    <h2 class="mb-4">Lista de Usuarios</h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="bg-primary text-white">
            <tr class="text-center">
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Roles</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usuarios as $usuario)
            <tr>
                <td class="text-center">{{ $usuario->id }}</td>
                <td>{{ $usuario->name }}</td>
                <td>{{ $usuario->email }}</td>
                <td class="text-center">
                    @foreach ($usuario->roles as $role)
                        <span class="badge bg-info text-dark">{{ $role->name }}</span>
                    @endforeach
                </td>
                <td class="text-center">
                    <!-- Botón para abrir modal de edición de roles -->
                    <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editRolesModal{{ $usuario->id }}">
                        <i class="fas fa-edit"></i> Roles
                    </button>
                    <!-- Puedes agregar aquí botones para eliminar o ver detalles -->
                </td>
            </tr>

            <!-- Modal para editar roles del usuario -->
            <div class="modal fade" id="editRolesModal{{ $usuario->id }}" tabindex="-1" aria-labelledby="editRolesLabel{{ $usuario->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <form action="" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editRolesLabel{{ $usuario->id }}">Editar Roles para {{ $usuario->name }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    @foreach ($roles as $role)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="roles[]" value="{{ $role->name }}"
                                                   id="role{{ $usuario->id }}-{{ $role->id }}"
                                                   {{ $usuario->hasRole($role->name) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="role{{ $usuario->id }}-{{ $role->id }}">
                                                {{ $role->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Guardar cambios</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Fin Modal -->

            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {{ $usuarios->links() }}
    </div>
</div>
@endsection

@section('scripts')
<!-- Asegúrate de que Bootstrap 5 JS esté cargado (esto lo hace el layout admin si usas SB Admin 2) -->
<script>
    // Puedes agregar scripts adicionales si lo deseas
</script>
@endsection

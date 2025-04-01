@extends('admin')
@section('titulo','Panel De Administracion de vehiculos')
@section('contenido')
<div class="row col-sm-12">
<a href="{{ route('autos.create') }}" class="btn btn-lg btn-primary text-white shadow-lg fw-bold d-flex align-items-center gap-2 px-4 mb-3">
    <i class="fas fa-car fa-lg"></i> Crear Vehículo
</a>
</div>

<table class="table table-bordered table-striped">
        <thead class="bg-primary text-white">
            <tr>
                <th>ID</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Motor</th>
                <th>Aceleración</th>
                <th>Combustible</th>
                <th>Transmisión</th>
                <th>Precio</th>
                <th>Descripción</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($autos as $auto)
            <tr>
                <td>{{ $auto->id }}</td>
                <td>{{$auto->marca->nombre ?? 'Error de nombre'}}</td>
                <td>{{$auto->modelo->nombre ?? 'Error de Modelo'}}</td>
                <td>{{ $auto->motor }}</td>
                <td>{{ $auto->aceleracion }}</td>
                <td>{{ $auto->combustible }}</td>
                <td>{{ $auto->transmision }}</td>
                <td>${{ number_format($auto->precio, 2) }}</td>
                <td>{{ $auto->descripcion }}</td>
                <td>
                    <a href="{{ route('autos.show', $auto->id) }}" class="btn btn-info btn-sm">
                        <i class="fas fa-eye"></i>
                    </a>
                    <a href="{{ route('autos.edit', $auto->id) }}" class="btn btn-warning btn-sm">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('autos.destroy', $auto->id) }}" method="POST" class="d-inline delete-form">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm btn-delete">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
<script>
 document.addEventListener('DOMContentLoaded', function() {
        @if(session('success'))
            Swal.fire({
                title: '¡Éxito!',
                text: "{{ session('success') }}",
                icon: 'success',
                confirmButtonText: 'Aceptar'
            });
        @endif
    });


    //Boton de eliminar y las alertas
    document.addEventListener('DOMContentLoaded', function() {
    // Selecciona todos los botones de eliminación
    const deleteButtons = document.querySelectorAll('.btn-delete');

    deleteButtons.forEach(function(button) {
        button.addEventListener('click', function(e) {
            e.preventDefault(); // Evita que se envíe el formulario inmediatamente

            // Obtén el formulario asociado al botón
            const form = this.closest('.delete-form');

            // Muestra la alerta de confirmación
            Swal.fire({
                title: '¿Estás seguro?',
                text: "Esta acción no se puede deshacer",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if(result.isConfirmed) {
                    // Si confirma, envía la petición DELETE mediante fetch
                    fetch(form.action, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': form.querySelector('[name="_token"]').value,
                            'Accept': 'application/json',
                            'Content-Type': 'application/json'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        // Muestra la alerta de éxito
                        Swal.fire({
                            title: 'Eliminado!',
                            text: data.mensaje,
                            icon: 'success',
                            confirmButtonText: 'Aceptar'
                        }).then(() => {
                            // Opcional: recarga la página o elimina la fila de la tabla
                            location.reload();
                        });
                    })
                    .catch(error => {
                        // Si hay error, muestra la alerta de error
                        Swal.fire({
                            title: 'Error!',
                            text: 'No se pudo eliminar el vehículo.',
                            icon: 'error',
                            confirmButtonText: 'Aceptar'
                        });
                    });
                }
            });
        });
    });
});
</script>
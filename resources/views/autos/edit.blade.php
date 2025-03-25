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

@section('titulo', 'Editar Vehículo')

@section('contenido')
<div class="card shadow">
    <div class="card-body">
        <form action="{{ route('autos.update', $auto->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Motor -->
            <div class="mb-3">
                <label for="motor" class="form-label">Motor</label>
                <select id="motor" name="motor" class="form-select selectcustom" required>
                    <option value="">Seleccione una cilindrada para el motor</option>
                    <option value="0.8 cc" {{ old('motor', $auto->motor) == '0.8 cc' ? 'selected' : '' }}>0.8 CC</option>
                    <option value="1.0 cc" {{ old('motor', $auto->motor) == '1.0 cc' ? 'selected' : '' }}>1.0 CC</option>
                    <option value="1.2 cc" {{ old('motor', $auto->motor) == '1.2 cc' ? 'selected' : '' }}>1.2 CC</option>
                    <option value="1.4 cc" {{ old('motor', $auto->motor) == '1.4 cc' ? 'selected' : '' }}>1.4 CC</option>
                    <option value="1.6 cc" {{ old('motor', $auto->motor) == '1.6 cc' ? 'selected' : '' }}>1.6 CC</option>
                    <option value="1.8 cc" {{ old('motor', $auto->motor) == '1.8 cc' ? 'selected' : '' }}>1.8 CC</option>
                    <option value="2.0 cc" {{ old('motor', $auto->motor) == '2.0 cc' ? 'selected' : '' }}>2.0 CC</option>
                    <option value="2.4 cc" {{ old('motor', $auto->motor) == '2.4 cc' ? 'selected' : '' }}>2.4 CC</option>
                    <option value="3.0 cc" {{ old('motor', $auto->motor) == '3.0 cc' ? 'selected' : '' }}>3.0 CC</option>
                    <option value="3.6 cc" {{ old('motor', $auto->motor) == '3.6 cc' ? 'selected' : '' }}>3.6 CC</option>
                    <option value="4.0 cc" {{ old('motor', $auto->motor) == '4.0 cc' ? 'selected' : '' }}>4.0 CC</option>
                    <option value="4.6 cc" {{ old('motor', $auto->motor) == '4.6 cc' ? 'selected' : '' }}>4.6 CC</option>
                    <option value="5.0 cc" {{ old('motor', $auto->motor) == '5.0 cc' ? 'selected' : '' }}>5.0 CC</option>
                </select>
            </div>

            <!-- Aceleración -->
            <div class="mb-3">
                <label for="aceleracion" class="form-label">Aceleración (0-100 km/h)</label>
                <select id="aceleracion" name="aceleracion" class="form-select selectcustom" required>
                    <option value="">Seleccione un valor de aceleración</option>
                    <option value="2.5" {{ old('aceleracion', $auto->aceleracion) == '2.5' ? 'selected' : '' }}>2.5 segundos</option>
                    <option value="3.0" {{ old('aceleracion', $auto->aceleracion) == '3.0' ? 'selected' : '' }}>3.0 segundos</option>
                    <option value="3.5" {{ old('aceleracion', $auto->aceleracion) == '3.5' ? 'selected' : '' }}>3.5 segundos</option>
                    <option value="4.0" {{ old('aceleracion', $auto->aceleracion) == '4.0' ? 'selected' : '' }}>4.0 segundos</option>
                    <option value="4.5" {{ old('aceleracion', $auto->aceleracion) == '4.5' ? 'selected' : '' }}>4.5 segundos</option>
                    <option value="5.0" {{ old('aceleracion', $auto->aceleracion) == '5.0' ? 'selected' : '' }}>5.0 segundos</option>
                    <option value="5.5" {{ old('aceleracion', $auto->aceleracion) == '5.5' ? 'selected' : '' }}>5.5 segundos</option>
                    <option value="6.0" {{ old('aceleracion', $auto->aceleracion) == '6.0' ? 'selected' : '' }}>6.0 segundos</option>
                    <option value="6.5" {{ old('aceleracion', $auto->aceleracion) == '6.5' ? 'selected' : '' }}>6.5 segundos</option>
                    <option value="7.0" {{ old('aceleracion', $auto->aceleracion) == '7.0' ? 'selected' : '' }}>7.0 segundos</option>
                    <option value="7.5" {{ old('aceleracion', $auto->aceleracion) == '7.5' ? 'selected' : '' }}>7.5 segundos</option>
                    <option value="8.0" {{ old('aceleracion', $auto->aceleracion) == '8.0' ? 'selected' : '' }}>8.0 segundos</option>
                    <option value="8.5" {{ old('aceleracion', $auto->aceleracion) == '8.5' ? 'selected' : '' }}>8.5 segundos</option>
                    <option value="9.0" {{ old('aceleracion', $auto->aceleracion) == '9.0' ? 'selected' : '' }}>9.0 segundos</option>
                    <option value="9.5" {{ old('aceleracion', $auto->aceleracion) == '9.5' ? 'selected' : '' }}>9.5 segundos</option>
                    <option value="10.0" {{ old('aceleracion', $auto->aceleracion) == '10.0' ? 'selected' : '' }}>10.0 segundos</option>
                </select>
            </div>

            <!-- Combustible -->
            <div class="mb-3">
                <label for="combustible" class="form-label">Combustible</label>
                <select id="combustible" name="combustible" class="form-select selectcustom" required>
                    <option value="">Seleccione un tipo de combustible</option>
                    <option value="gasolina" {{ old('combustible', $auto->combustible) == 'gasolina' ? 'selected' : '' }}>Gasolina</option>
                    <option value="diesel" {{ old('combustible', $auto->combustible) == 'diesel' ? 'selected' : '' }}>Diésel</option>
                    <option value="electricidad" {{ old('combustible', $auto->combustible) == 'electricidad' ? 'selected' : '' }}>Electricidad</option>
                    <option value="hibrido" {{ old('combustible', $auto->combustible) == 'hibrido' ? 'selected' : '' }}>Híbrido (Gasolina/Electricidad)</option>
                    <option value="gnc" {{ old('combustible', $auto->combustible) == 'gnc' ? 'selected' : '' }}>Gas Natural Comprimido (GNC)</option>
                    <option value="glp" {{ old('combustible', $auto->combustible) == 'glp' ? 'selected' : '' }}>Gas Licuado de Petróleo (GLP)</option>
                    <option value="hidrogeno" {{ old('combustible', $auto->combustible) == 'hidrogeno' ? 'selected' : '' }}>Hidrógeno</option>
                </select>
            </div>

            <!-- Transmisión -->
            <div class="mb-3">
                <label for="transmision" class="form-label">Transmisión</label>
                <select id="transmision" name="transmision" class="form-select selectcustom" required>
                    <option value="">Elija una transmisión</option>
                    <option value="mecanica" {{ old('transmision', $auto->transmision) == 'mecanica' ? 'selected' : '' }}>Mecánica</option>
                    <option value="automatica" {{ old('transmision', $auto->transmision) == 'automatica' ? 'selected' : '' }}>Automática</option>
                    <option value="automatizada manual" {{ old('transmision', $auto->transmision) == 'automatizada manual' ? 'selected' : '' }}>Automatizada Manual</option>
                    <option value="continuamente variable" {{ old('transmision', $auto->transmision) == 'continuamente variable' ? 'selected' : '' }}>Continuamente Variable</option>
                    <option value="doble embrague" {{ old('transmision', $auto->transmision) == 'doble embrague' ? 'selected' : '' }}>Doble Embrague</option>
                </select>
            </div>

            <!-- Precio -->
            <div class="mb-3">
                <label for="precio" class="form-label">Precio</label>
                <input type="number" step="0.01" name="precio" class="form-control" value="{{ old('precio', $auto->precio) }}" required>
            </div>

            <!-- Descripción -->
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea name="descripcion" class="form-control" rows="3" required>{{ old('descripcion', $auto->descripcion) }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Actualizar Vehículo
            </button>
            <a href="{{ route('autos.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@endsection

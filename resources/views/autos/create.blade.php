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
@section('titulo','Panel De Creacion de vehiculos')
@section('contenido')
<div class="container">
    <div class="card">
        <div class="card-header bg-gradient-primary text-white">
            <h4>Crear Nuevo Auto</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('autos.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="marca" class="form-label">Marca</label>
                    <select id="marca_id" name="marca_id" class="form-select selectcustom" required>
                        <option value="">Seleccione una marca</option>
                        @foreach($marcas as $marca)
                            <option value="{{ $marca->id }}">{{ $marca->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="modelo" class="form-label">Modelo</label>
                    <select class="form-label fw-bold selectcustom" id="modelo_id" name="modelo_id" required>
                        <option value="">Seleccione un modelo</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="motor" class="form-label ">Motor</label>
                    <select class="selectcustom" name="motor" id="motor">
                        <option value="">Seleccione una cilindrada para el motor</option>
                        <option value="0.8 cc">0.8 CC</option>
                        <option value="1.0 cc">1.0 CC</option>
                        <option value="1.2 cc">1.2 CC</option>
                        <option value="1.4 cc">1.4 CC</option>
                        <option value="1.6 cc">1.6 CC</option>
                        <option value="1.8 cc">1.8 CC</option>
                        <option value="2.0 cc">2.0 CC</option>
                        <option value="2.4 cc">2.4 CC</option>
                        <option value="3.0 cc">3.0 CC</option>
                        <option value="3.6 cc">3.6 CC</option>
                        <option value="4.0 cc">4.0 CC</option>
                        <option value="4.6 cc">4.6 CC</option>
                        <option value="5.0 cc">5.0 CC</option>
                    </select>
                        
                </div>

                <div class="mb-3">
                    <label for="aceleracion" class="form-label">Aceleración (0-100 km/h)</label>
                    <select class="selectcustom" name="aceleracion" id="aceleracion">
                        <option value="">Seleccione un valor de aceleracion</option>
                        <option value="2.5">2.5 segundos</option>
                        <option value="3.0">3.0 segundos</option>
                        <option value="3.5">3.5 segundos</option>
                        <option value="4.0">4.0 segundos</option>
                        <option value="4.5">4.5 segundos</option>
                        <option value="5.0">5.0 segundos</option>
                        <option value="5.5">5.5 segundos</option>
                        <option value="6.0">6.0 segundos</option>
                        <option value="6.5">6.5 segundos</option>
                        <option value="7.0">7.0 segundos</option>
                        <option value="7.5">7.5 segundos</option>
                        <option value="8.0">8.0 segundos</option>
                        <option value="8.5">8.5 segundos</option>
                        <option value="9.0">9.0 segundos</option>
                        <option value="9.5">9.5 segundos</option>
                        <option value="10.0">10.0 segundos</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="combustible" class="form-label">Combustible</label>
                    <select class="selectcustom" name="combustible" id="combustible">
                        <option value="">Seleccione un tipo de combustible</option>  
                        <option value="gasolina">Gasolina</option>
                        <option value="diesel">Diésel</option>
                        <option value="electricidad">Electricidad</option>
                        <option value="hibrido">Híbrido (Gasolina/Electricidad)</option>
                        <option value="gnc">Gas Natural Comprimido (GNC)</option>
                        <option value="glp">Gas Licuado de Petróleo (GLP)</option>
                        <option value="hidrogeno">Hidrógeno</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="transmision" class="form-label">Transmisión</label>
                    <select class="selectcustom" name="transmision" id="transmision">
                        <option value="">Elija una transmisión</option>
                        <option value="mecanica">Mecanica</option>
                        <option value="automatica">Automática</option>
                        <option value="automatizada manual">Automatizada Manual</option>
                        <option value="continuamente variable">Continuamente Variable</option>
                        <option value="doble embrague">Doble Embrague</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="precio" class="form-label">Precio</label>
                    <input type="number" step="0.01" name="precio" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <textarea name="descripcion" class="form-control" rows="3"></textarea>
                </div>

                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save"></i> Guardar Auto
                </button>
            </form>
        </div>
    </div>
</div>
@endsection


<script>

    const modelosPorMarca = @json($modelosPorMarca);
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('marca_id').addEventListener('change', function() {  
        const marcaId = this.value;
        console.log('valor es',marcaId);
        const modeloSelect = document.getElementById('modelo_id');   
        modeloSelect.innerHTML = '<option value="">Seleccione un modelo</option>';

        if (modelosPorMarca[marcaId]) {
            modelosPorMarca[marcaId].forEach(function(modelo) {
                const option = document.createElement('option');
                option.value = modelo.id;
                option.textContent = modelo.nombre;
                modeloSelect.appendChild(option);  
            });
        }
        else{
            console.log('no hay nah');
        }
       
    });

    document.getElementById('modelo_id').addEventListener('change', function() {  

        console.log(this.value);
    });

});  
</script>
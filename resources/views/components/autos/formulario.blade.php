<form action="{{ $ruta }}" method="POST" class="row">
    @csrf
    @if ($editar)
        @method('PATCH')
    @endif

    <div class="col-lg-4">
        <div class="form-group">
            <label for="idmarca">Seleccione una marca:</label>
            <select name="idmarca" id="idmarca" class="form-control">
                @foreach ($marcas as $marca)
                    <option value="{{ $marca->id }}" @if($marca->id == ($editar ? $auto->idmarca : old('idmarca'))) selected @endif>
                        {{ $marca->nombre }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="form-group">
            <label for="modelo">Modelo:</label>
            <input type="text" id="modelo" name="modelo" class="form-control @error('modelo') is-invalid @enderror"
                value="{{ $editar ? $auto->modelo : old('modelo') }}">
            <div class="invalid-feedback">
                @error('modelo')
                    {{ $message }}
                @enderror
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="form-group">
            <label for="anio">Año:</label>
            <input type="number" id="anio" name="anio" class="form-control @error('anio') is-invalid @enderror"
                value="{{ $editar ? $auto->anio : old('anio') }}">
            <div class="invalid-feedback">
                @error('anio')
                    {{ $message }}
                @enderror
            </div>
        </div>
    </div>

    <div class="col-lg-2 mt-4">
        <button type="submit" class="btn btn-primary">
            {{ $editar ? 'Editar' : 'Registrar' }} auto
        </button>
    </div>
</form>

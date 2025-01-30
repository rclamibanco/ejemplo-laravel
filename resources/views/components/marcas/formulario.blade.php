<form action="{{ $ruta }}" method="POST" class="row">
    @csrf
    @if ($editar) @method('PATCH') @endif
    <div class="col-lg-4">
        <div class="form-group">
            <label for="marca">Marca</label>
            <input type="text" id="marca" name="nombre" 
                class="form-control @error('nombre') is-invalid @enderror"
            value="{{ $editar ? $marca : old('nombre') }}">
            <div class="invalid-feedback">
                @error('nombre')
                    {{ $message }}
                @enderror
            </div>
        </div>
    </div>

    <div class="col-lg-2 mt-4">
        <button type="submit" class="btn btn-primary">
            {{ $editar ? 'Editar' : 'Registrar' }} marca
        </button>
    </div>
</form>

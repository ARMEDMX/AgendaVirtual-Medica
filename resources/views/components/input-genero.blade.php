<div class="mb-3 row">
    <label for="{{ $nombre }}" class="col-4 col-form-label">{{ $nombre }}:</label>
    <div class="col-8">
        @if ($campo === 'genero')
            <select class="form-select" name="{{ $campo }}" id="{{ $campo }}">
                <option value="">Selecciona el género</option>
                <option value="Hombre" @if ($valorcampo === 'Hombre') selected @endif>Hombre</option>
                <option value="Mujer" @if ($valorcampo === 'Mujer') selected @endif>Mujer</option>
            </select>
        @else
            <input type="text" class="form-control" name="{{ $campo }}" value="{{ old($campo, $valorcampo) }}" id="" placeholder="{{ $holder }}">
        @endif

        <div class="error">
            @error($campo)
                <span style="color: brown;">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>

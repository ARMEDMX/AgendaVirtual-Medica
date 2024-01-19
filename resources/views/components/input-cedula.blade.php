<div class="mb-3 row">
    <label for="{{ $nombre }}" class="col-4 col-form-label">{{ $nombre }}:</label>
    <div class="col-8">
        <input type="text" class="form-control" name="{{ $campo }}" value="{{ old($campo, $valorcampo) }}" id="" placeholder="{{ $holder }}" pattern="[0-9]{7,10}" title="Ingresa una cédula profesional válida (entre 7 y 10 dígitos)">
        <div class="error">
            @error($campo)
                <span style="color: brown;">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>

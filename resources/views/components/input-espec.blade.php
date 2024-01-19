<div class="mb-3 row">
    <label for="{{ $nombre }}" class="col-4 col-form-label">{{ $nombre }}:</label>
    <div class="col-8">
        <select class="form-select" name="{{ $campo }}" id="{{ $campo }}">
            <option value="">Selecciona la especialidad</option>
            <option value="Cirugía" @if ($valorcampo === 'Cirugía') selected @endif>Cirugía</option>
    <option value="Cardiología" @if ($valorcampo === 'Cardiología') selected @endif>Cardiología</option>
    <option value="Dermatología" @if ($valorcampo === 'Dermatología') selected @endif>Dermatología</option>
    <option value="Ginecología" @if ($valorcampo === 'Ginecología') selected @endif>Ginecología</option>
    <option value="Neurología" @if ($valorcampo === 'Neurología') selected @endif>Neurología</option>
    <option value="Oftalmología" @if ($valorcampo === 'Oftalmología') selected @endif>Oftalmología</option>
    <option value="Oncología" @if ($valorcampo === 'Oncología') selected @endif>Oncología</option>
    <option value="Pediatría" @if ($valorcampo === 'Pediatría') selected @endif>Pediatría</option>
    <option value="Psiquiatría" @if ($valorcampo === 'Psiquiatría') selected @endif>Psiquiatría</option>
    <option value="Radiología" @if ($valorcampo === 'Radiología') selected @endif>Radiología</option>
        </select>

        <div class="error">
            @error($campo)
                <span style="color: brown;">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>

<div class="mb-3">
    <label for="{{$nombre}}" class="col-4 col-form-label">{{$nombre}}:</label>
    <div class="col-8">
        <select class="form-select form-select-lg " name="{{$campo}}" id="{{$campo}}">
            <option value="Oral" {{ old($campo, $valorcampo) == 'Oral' ? 'selected' : '' }}>Oral</option>
            <option value="Intravenosa" {{ old($campo, $valorcampo) == 'Intravenosa' ? 'selected' : '' }}>Intravenosa</option>
            <option value="Intramuscular" {{ old($campo, $valorcampo) == 'Intramuscular' ? 'selected' : '' }}>Intramuscular</option>
            <!-- Agrega más opciones aquí -->
        </select>
        
        <div class="error">
            @error($campo)
                <span style="color: brown;">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>

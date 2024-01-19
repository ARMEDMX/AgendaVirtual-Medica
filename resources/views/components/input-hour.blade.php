<div class="mb-3 row">
    <label for="{{$nombre}}" class="col-4 col-form-label">{{$nombre}}:</label>
    <div class="col-8">
        <input type="time" class="form-control" name="{{$campo}}" value="{{ old($campo, $valorcampo) }}" id="">
        
        <div class="error">
            @error($campo)
                <span style="color: brown;">{{ $message }}</span>
            @enderror
        </div>

    </div>
</div>
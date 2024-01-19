

<div class="mb-3">
    <label for="{{ $leyenda }}" class="form-label">{{ $nombrelbl }}</label>

    <select class="form-select form-select-lg w-50 " name="{{ $leyenda }}"  id="{{ $leyenda }}">
    <option selected>Seleccionar</option>
            
            @foreach ($arreglos as $arreglo)
            <option value="{{ $arreglo->$pk }}" {{ $arreglo->$pk == $fk ? 'selected' : ''}}>
                {{ $arreglo->$display }}</option>
            @endforeach
    </select>
</div>




@props(['arreglos', 'fk', 'leyenda', 'nombrelbl', 'pk', 'display'])

<div class="mb-3">
    <label>{{ $nombrelbl }}</label>
    @foreach ($arreglos as $arreglo)
        <div class="form-check">
            <input
                type="checkbox"
                name="{{ $leyenda }}[]"
                value="{{ $arreglo->$pk }}"
                @if(is_array($fk) && in_array($arreglo->$pk, $fk))
                    checked
                @endif
            >
            <label>{{ $arreglo->$display }}</label>
        </div>
    @endforeach
</div>


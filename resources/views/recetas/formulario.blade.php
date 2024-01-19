@extends('menu.menu')

@section('contenido1')

{{-- <div class="container" style="margin: 50px;">
    @if (isset($receta->id))
        <h4>Editar</h4>
        <form action="{{ route('receta.update', ['receta' => $receta->id]) }}"
            @method('PUT')
        @else
            <h4>Insertar</h4>
            <form action=" {{ route('receta.store') }} "
                method="POST">
    @endif
    @csrf


    <input type="text" name="citas_id" value="{{ $cita }}">

    
    <x-select2 :arreglos="$medicamentos" fk="{{ $receta->medicamentos_id }}"
        leyenda="medicamentos_id" nombrelbl="Medicamentos: "
        pk="id" display="nombre"></x-select2>

    <x-input1 nombre="Dosis " valorcampo="{{ $receta->dosis }}"
        campo="dosis" holder="Proporcione la Dosis" />

    <x-input1 nombre="Frecuencia "
        valorcampo="{{ $receta->frecuencia }}" campo="frecuencia"
        holder="Proporcione la Frecuencia" />

    <x-input1 nombre="Duracion " valorcampo="{{ $receta->duracion }}"
        campo="duracion"
        holder="Proporcione la Duracion del Tratamiento" />

    <x-select1 nombre="Via de Administración "
        valorcampo="{{ $receta->viaadmin }}" campo="viaadmin"
        holder="Escriba el Tipo de Medicamento" />


    <x-submit1  />
            
        
    </form>
</div> --}}

<div class="container" style="margin: 50px;">
    @if (isset($receta->id))
        <h4>Editar</h4>
        <form action="{{ route('receta.update', ['receta' => $receta->id]) }}" method="POST">
            @method('PUT')
            @csrf

            <input type="hidden" name="citas_id" value="{{ $receta->citas_id }}" readonly>

            <x-select2 :arreglos="$medicamentos" fk="{{ $receta->medicamentos_id }}"
                leyenda="medicamentos_id" nombrelbl="Medicamentos: "
                pk="id" display="nombre"></x-select2>
        
            <x-input1 nombre="Dosis " valorcampo="{{ $receta->dosis }}"
                campo="dosis" holder="Proporcione la Dosis" />
        
            <x-input1 nombre="Frecuencia "
                valorcampo="{{ $receta->frecuencia }}" campo="frecuencia"
                holder="Proporcione la Frecuencia" />
        
            <x-input1 nombre="Duracion " valorcampo="{{ $receta->duracion }}"
                campo="duracion"
                holder="Proporcione la Duracion del Tratamiento" />
        
            <x-select1 nombre="Via de Administración "
                valorcampo="{{ $receta->viaadmin }}" campo="viaadmin"
                holder="Escriba el Tipo de Medicamento" />

            <x-submit1  />
        </form>
    @else
        <h4>Insertar</h4>
        <form action=" {{ route('receta.store') }} " method="POST">
            @csrf

            <input type="hidden" name="citas_id" value="{{ $cita }}" readonly>

            <x-select2 :arreglos="$medicamentos" fk="{{ $receta->medicamentos_id }}"
                leyenda="medicamentos_id" nombrelbl="Medicamentos: "
                pk="id" display="nombre"></x-select2>
        
            <x-input1 nombre="Dosis " valorcampo="{{ $receta->dosis }}"
                campo="dosis" holder="Proporcione la Dosis" />
        
            <x-input1 nombre="Frecuencia "
                valorcampo="{{ $receta->frecuencia }}" campo="frecuencia"
                holder="Proporcione la Frecuencia" />
        
            <x-input1 nombre="Duracion " valorcampo="{{ $receta->duracion }}"
                campo="duracion"
                holder="Proporcione la Duracion del Tratamiento" />
        
            <x-select1 nombre="Via de Administración "
                valorcampo="{{ $receta->viaadmin }}" campo="viaadmin"
                holder="Escriba el Tipo de Medicamento" />

            <x-submit1  />
        </form>
    @endif
</div>
@endsection

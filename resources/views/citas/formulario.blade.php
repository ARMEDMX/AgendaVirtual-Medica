@extends('menu.menu')

@section('contenido1')

<div class="container" style="margin: 50px;">
     @if(isset($cita->id))
        <h1>Editar</h1>
        <form action="{{ route('cita.update', ['cita' => $cita->id] ) }}" method="POST"> 
        @method('PUT')    
    @else
        <h1>Insertar</h1>
        <form action=" {{ route('cita.store') }} " method="POST">
    @endif    
        @csrf
        
        <x-input-date nombre="Fecha de la Cita " valorcampo="{{$cita->fecha}}" campo="fecha" />     

        <x-input-hour nombre="Hora" valorcampo="{{$cita->hora}}" campo="hora" />   
        
        <x-select2 :arreglos="$medico" fk="{{ $cita->medicos_id }}" leyenda="medicos_id" nombrelbl="Medico: " pk="id" display="nombre"></x-select1>

        <x-select2 :arreglos="$paciente" fk="{{ $cita->pacientes_id }}" leyenda="pacientes_id" nombrelbl="Paciente: " pk="id" display="nombre"></x-select1>


        <x-submit1 /> 
        

       

    </form>
</div>
@endsection

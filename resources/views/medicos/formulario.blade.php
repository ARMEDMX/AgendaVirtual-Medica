@extends('menu.menu')

@section('contenido1')

<div class="container" style="margin: 50px;">
     @if(isset($medico->id))
        <h1>Editar</h1>
        <form action="{{ route('medico.update', ['medico' => $medico->id] ) }}" method="POST"> 
        @method('PUT')    
    @else
        <h1>Insertar</h1>
        <form action=" {{ route('medico.store') }} " method="POST">
    @endif    
        @csrf
        
        <input type="hidden" name="users_id" value="{{$user->id }}">

        <x-input1 nombre="Nombre " valorcampo="{{$medico->nombre}}" campo="nombre" holder="Escriba su Nombre"/> 
            
        <x-input1 nombre="Apellido Paterno " valorcampo="{{$medico->apellidop}}" campo="apellidop" holder="Escriba el apellido paterno"/> 
        
        <x-input1 nombre="Apellido Materno " valorcampo="{{$medico->apellidom}}" campo="apellidom" holder="Escriba el apellido materno"/> 
       
        <x-select2 :arreglos="$espec" fk="{{ $medico->especialidades_id }}" leyenda="especialidades_id" nombrelbl="Especialidad: " pk="id" display="especialidad"></x-select1>
            
        

        <x-submit1 /> 
        

        <ul>
            @foreach ($errors->All() as $error)
                <li>{{ $error }}</li>
            @endforeach 
        </ul>

    </form>
</div>
@endsection

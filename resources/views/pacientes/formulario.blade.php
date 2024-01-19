@extends('menu.menu')

@section('contenido1')

<div class="container" style="margin: 50px;">
     @if(isset($paciente->id))
        <h1>Editar</h1>
        <form action="{{ route('paciente.update', ['paciente' => $paciente->id] ) }}" method="POST"> 
        @method('PUT')    
    @else
        <h1>Insertar</h1>
        <form action=" {{ route('paciente.store') }} " method="POST">
    @endif    
        @csrf
        
        <input type="hidden" name="users_id" value="{{$user->id }}">

        <x-input1 nombre="Nombre de Paciente " valorcampo="{{$paciente->nombre}}" campo="nombre" holder="Escriba su Nombre"/> 
            
        <x-input1 nombre="Apellido Paterno " valorcampo="{{$paciente->apellidop}}" campo="apellidop" holder="Escriba el apellido paterno"/> 
        
        <x-input1 nombre="Apellido Materno " valorcampo="{{$paciente->apellidom}}" campo="apellidom" holder="Escriba el apellido materno"/> 
       
        <x-input-genero nombre="Genero " valorcampo="{{$paciente->genero}}" campo="genero" holder="Es Hombre o Mujer?"/> 
            
        <x-input-date nombre="Fecha de Nacimiento " valorcampo="{{$paciente->fechanac}}" campo="fechanac"/> 
        
        <x-input1 nombre="Email " valorcampo="{{$paciente->email}}" campo="email" holder="Escriba su Email"/> 


        <x-submit1 /> 
        

        <ul>
            @foreach ($errors->All() as $error)
                <li>{{ $error }}</li>
            @endforeach 
        </ul>

    </form>
</div>
@endsection

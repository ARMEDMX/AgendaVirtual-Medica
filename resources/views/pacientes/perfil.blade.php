@extends('menu.menu')

@section('contenido1')
<div class="row">
    @if (auth()->user()->paciente)
    <div class="col-md-6">
        <div class="card">
            <div class="card-body text-center">
                <h5 class="card-title mt-3">{{ auth()->user()->paciente->nombre }} {{ auth()->user()->paciente->apellidop }} {{ auth()->user()->paciente->apellidom }}</h5>
                <ul class="list-group">
                    <li class="list-group-item">ID: {{ auth()->user()->paciente->id }}</li>
                    <li class="list-group-item">Genero: {{ auth()->user()->paciente->genero }}</li>
                    <li class="list-group-item">Fecha de Nacimiento: {{ auth()->user()->paciente->fechanac }}</li>
                    <li class="list-group-item">Email: {{ auth()->user()->paciente->email }}</li>
                    <li class="list-group-item">Fecha de Creación: {{ auth()->user()->paciente->created_at }}</li>
                    <li class="list-group-item">Fecha de Actualización: {{ auth()->user()->paciente->updated_at }}</li>
                </ul>
            </div>
        </div>
    </div>
    @else
    <div class="container" style="margin: 50px;">
        @if(isset($paciente->id))
           <h1>Editar Información Personal</h1>
           <form action="{{ route('paciente.update', ['paciente' => $paciente->id] ) }}" method="POST"> 
           @method('PUT')    
       @else
           <h1>Insertar Información Personal</h1>
           <form action="{{ route('paciente.store') }}" method="POST">
       @endif    
           @csrf
           
           <input type="hidden" name="users_id" value="{{ $user->id }}">
   
           <x-input1 nombre="Nombre de Paciente" valorcampo="{{ $paciente->nombre ?? '' }}" campo="nombre" holder="Escriba su Nombre"/> 
           <x-input1 nombre="Apellido Paterno" valorcampo="{{ $paciente->apellidop ?? '' }}" campo="apellidop" holder="Escriba el apellido paterno"/> 
           <x-input1 nombre="Apellido Materno" valorcampo="{{ $paciente->apellidom ?? '' }}" campo="apellidom" holder="Escriba el apellido materno"/> 
           <x-input1 nombre="Genero" valorcampo="{{ $paciente->genero ?? '' }}" campo="genero" holder="Es Hombre o Mujer?"/> 
           <x-input-date nombre="Fecha de Nacimiento" valorcampo="{{ $paciente->fechanac ?? '' }}" campo="fechanac"/> 
           <x-input1 nombre="Email" valorcampo="{{ $paciente->email ?? '' }}" campo="email" holder="Escriba su Email"/> 
   
           <x-submit1 /> 
   
           <ul>
               @foreach ($errors->all() as $error)
                   <li>{{ $error }}</li>
               @endforeach 
           </ul>
       </form>
   </div>
   @endif
</div>





@endsection

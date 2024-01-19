@extends('menu.menu')

@section('contenido1')

<div class="container" style="margin: 50px;">
     @if(isset($recep->id))
        <h1>Editar</h1>
        <form action="{{ route('recep.update', ['recep' => $recep->id] ) }}" method="POST"> 
        @method('PUT')    
    @else
        <h1>Insertar</h1>
        <form action=" {{ route('recep.store')}} " method="POST">
    @endif    
        @csrf
        
        <input type="hidden" name="users_id" value="{{$user->id }}">

        <x-input1 nombre="Nombre " valorcampo="{{$recep->nombre}}" campo="nombre" holder="Escriba el Nombre de la Recep"/> 
            
        <x-input1 nombre="Apellido Paterno " valorcampo="{{$recep->apellidop}}" campo="apellidop" holder="Escriba el Apellido Paterno"/> 
            
        <x-input1 nombre="Apellido Materno " valorcampo="{{$recep->apellidom}}" campo="apellidom" holder="Escriba el Apellido Materno"/> 
         
        <x-submit1 /> 
        

        <ul>
            @foreach ($errors->All() as $error)
                <li>{{ $error }}</li>
            @endforeach 
        </ul>

    </form>
</div>
@endsection

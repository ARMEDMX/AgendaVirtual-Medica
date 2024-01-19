@extends('menu.menu')

@section('contenido1')

<div class="container" style="margin: 50px;">
     @if(isset($medicamento->id))
        <h1>Editar</h1>
        <form action="{{ route('medicamento.update', ['medicamento' => $medicamento->id] ) }}" method="POST"> 
        @method('PUT')    
    @else
        <h1>Insertar</h1>
        <form action=" {{ route('medicamento.store') }} " method="POST">
    @endif    
        @csrf
        
        <x-input1 nombre="Nombre de Medicamento " valorcampo="{{$medicamento->nombre}}" campo="nombre" holder="Escriba el Nombre del Medicamento"/> 
            
        <x-select1 nombre="Via de Administración " valorcampo="{{$medicamento->tipo_medicamento}}" campo="tipo_medicamento" holder="Escriba el Tipo de Medicamento"/> 

        <x-input-date nombre="Fecha de Caducidad " valorcampo="{{$medicamento->fecha_caducidad}}" campo="fecha_caducidad"/> 
        
        <x-submit1 /> 
        

        <ul>
            @foreach ($errors->All() as $error)
                <li>{{ $error }}</li>
            @endforeach 
        </ul>

    </form>
</div>
@endsection

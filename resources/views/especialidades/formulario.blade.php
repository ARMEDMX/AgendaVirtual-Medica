@extends('menu.menu')

@section('contenido1')

<div class="container" style="margin: 50px;">
     @if(isset($espec->id))
        <h1>Editar</h1>
        <form action="{{ route('espec.update', ['espec' => $espec->id] ) }}" method="POST"> 
        @method('PUT')    
    @else
        <h1>Insertar</h1>
        <form action=" {{ route('espec.store') }} " method="POST">
    @endif    
        @csrf
        
        <x-input-espec nombre="Nombre de Especialidad " valorcampo="{{$espec->especialidad}}" campo="especialidad" />     

        <x-submit1 /> 
        

       

    </form>
</div>
@endsection

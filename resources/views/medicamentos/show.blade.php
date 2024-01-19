@extends('menu.menu')

@section('contenido1')
    
<h1 class="display-5">DATOS DE RECEPCIONISTAS: </h1>
<hr>
<ul>
    <li>{{ $medicamento->id }}</li>
    <li>{{ $medicamento->nombre }}</li>
    <li>{{ $medicamento->tipo_medicamento }}</li>
    <li>{{ $medicamento->fecha_caducidad }}</li>
    <li>{{ $medicamento->created_at }}</li>
    <li>{{ $medicamento->updated_at }}</li>
</ul>
<hr>
<a name="" id="" class="btn btn-danger" href="{{-- route('deptos.destroy', ['deptos'=>$deptos->id]) --}}" role="button">Eliminar Alumno</a>

@endsection
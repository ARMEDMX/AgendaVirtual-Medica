@extends('menu.menu')

@section('contenido1')
    
<h1 class="display-5">DATOS DE RECEPCIONISTAS: </h1>
<hr>
<ul>
    <li>{{ $espec->id }}</li>
    <li>{{ $espec->especialidad }}</li>
    <li>{{ $espec->created_at }}</li>
    <li>{{ $espec->updated_at }}</li>
</ul>
<hr>
<a name="" id="" class="btn btn-danger" href="{{-- route('deptos.destroy', ['deptos'=>$deptos->id]) --}}" role="button">Eliminar Alumno</a>

@endsection
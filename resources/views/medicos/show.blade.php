@extends('menu.menu')

@section('contenido1')
    
<h1 class="display-5">DATOS DE MEDICOS: </h1>
<hr>
<ul>
    <li>{{ $medico->id }}</li>
    <li>{{ $medico->nombre }}</li>
    <li>{{ $medico->apellidop }}</li>
    <li>{{ $medico->apellidom }}</li>
    <li>{{ $medico->created_at }}</li>
    <li>{{ $medico->updated_at }}</li>
</ul>
<hr>
<a name="" id="" class="btn btn-danger" href="{{-- route('deptos.destroy', ['deptos'=>$deptos->id]) --}}" role="button">Eliminar Alumno</a>

@endsection
@extends('menu.menu')

@section('contenido1')
    
<h1 class="display-5">DATOS DE PACIENTES: </h1>
<hr>
<ul>
    <li>{{ $paciente->id }}</li>
    <li>{{ $paciente->nombre }}</li>
    <li>{{ $paciente->apellidop }}</li>
    <li>{{ $paciente->apellidom }}</li>
    <li>{{ $paciente->genero }}</li>
    <li>{{ $paciente->fechanac }}</li>
    <li>{{ $paciente->email }}</li>
    <li>{{ $paciente->created_at }}</li>
    <li>{{ $paciente->updated_at }}</li>
</ul>
<hr>
<a name="" id="" class="btn btn-danger" href="{{-- route('deptos.destroy', ['deptos'=>$deptos->id]) --}}" role="button">Eliminar Alumno</a>

@endsection
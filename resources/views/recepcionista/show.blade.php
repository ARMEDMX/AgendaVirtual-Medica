@extends('menu.menu')

@section('contenido1')
    
<h1 class="display-5">DATOS DE RECEPCIONISTAS: </h1>
<hr>
<ul>
    <li>{{ $recep->id }}</li>
    <li>{{ $recep->nombre }}</li>
    <li>{{ $recep->apellidop }}</li>
    <li>{{ $recep->apellidom }}</li>
    <li>{{ $recep->created_at }}</li>
    <li>{{ $recep->updated_at }}</li>
</ul>
<hr>
<a name="" id="" class="btn btn-danger" href="{{-- route('deptos.destroy', ['deptos'=>$deptos->id]) --}}" role="button">Eliminar Alumno</a>

@endsection
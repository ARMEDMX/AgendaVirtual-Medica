@extends('menu.menu')

@section('contenido1')
    <h1 class="display-5">Detalles de Receta </h1>
    <hr>
    <ul>
        <p><strong>Medicamento:</strong> {{ $receta->medicamentos_id }}</p>
        <p><strong>Dosis:</strong> {{ $receta->dosis }}</p>
        <p><strong>Frecuencia:</strong> {{ $receta->frecuencia }}</p>
        <p><strong>Duración:</strong> {{ $receta->duracion }}</p>
        <p><strong>Vía de Administración:</strong> {{ $receta->viaadmin }}</p>
    </ul>
    <hr>
    <a name="" id="" class="btn btn-danger" href="{{-- route('deptos.destroy', ['deptos'=>$deptos->id]) --}}" role="button">Eliminar Alumno</a>
@endsection

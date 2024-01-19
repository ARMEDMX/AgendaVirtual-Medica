@extends('menu.menu')

@section('contenido1')
<div class="card w-50 mx-auto mt-4">
    <div class="card-body text-center">
        <div class="d-flex justify-content-center">
            <img src="{{ asset($examen->foto) }}" alt="Foto del Examen" class="card-img-top img-fluid rounded" style="max-height: 300px; max-width: 300px;">
        </div>
        <h5 class="card-title mt-3">{{ $examen->nombre }} </h5>
        <ul class="list-group">
            <li class="list-group-item">ID: {{ $examen->id }}</li>
            <li class="list-group-item">Fecha de Creación: {{ $examen->created_at }}</li>
            <li class="list-group-item">Fecha de Actualización: {{ $examen->updated_at }}</li>
        </ul>
    </div>
   
</div>
@endsection


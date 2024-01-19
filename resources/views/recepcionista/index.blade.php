@extends('menu.menu')

@section('contenido1')

<div class="card">
    <div class="card-body">
        @if ($recep)
            <h2>Información de Administrador</h2>
            <p>Nombre: {{ $recep->nombre }}</p>
            <p>Apellido Paterno: {{ $recep->apellidop }}</p>
            <p>Apellido Materno: {{ $recep->apellidom }}</p>
            
            
            <a href="{{ route('recep.edit', ['recep' => $recep->id]) }}" class="btn btn-primary">Editar Información</a>

        @else
            <h2>No has ingresado información del Administrador.</h2>
            <a href="{{ route('recep.create') }}" class="btn btn-primary">Ingresar Información</a>
        @endif
    </div>
</div>

@endsection

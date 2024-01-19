@extends('menu.menu')

@section('contenido1')

<div class="card">
    <div class="card-body">
        @if ($medico)
            <h2>Información de Medico</h2>
            <p>Nombre: {{ $medico->nombre }}</p>
            <p>Apellido Paterno: {{ $medico->apellidop }}</p>
            <p>Apellido Materno: {{ $medico->apellidom }}</p>
            <p>Especialidad: {{ $medico->especialidades->especialidad }}</p>
            
            <a href="{{ route('medico.edit', ['medico' => $medico->id]) }}" class="btn btn-primary">Editar Información</a>

        @else
            <h2>No ha ingresado su información de Medico.</h2>
            <a href="{{ route('medico.create') }}" class="btn btn-primary">Ingresar Información</a>
        @endif
    </div>
</div>

@endsection

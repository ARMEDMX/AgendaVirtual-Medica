@extends('menu.menu')

@section('contenido1')

    <div class="card">
        <div class="card-body">
            @if ($paciente)
                <h2>Información del Paciente</h2>
                <p>Nombre: {{ $paciente->nombre }}</p>
                <p>Apellido Paterno: {{ $paciente->apellidop }}</p>
                <p>Apellido Materno: {{ $paciente->apellidom }}</p>
                <p>Genero: {{ $paciente->genero }}</p>
                <p>Fecha de Nacimiento: {{ $paciente->fechanac }}</p>
                <p>Email: {{ $paciente->email }}</p>
                
                <a href="{{ route('paciente.edit', ['paciente' => $paciente->id]) }}" class="btn btn-primary">Editar Información</a>

            @else
                <h2>No has ingresado información del paciente aún.</h2>
                <a href="{{ route('paciente.create') }}" class="btn btn-primary">Ingresar Información</a>
            @endif
        </div>
    </div>
@endsection


@extends('menu.menu')

@section('contenido1')
<form action="{{ route('receta.create')}}" method="GET" >
<hr>
<h1>Consulta Detalle</h1>
<ul>
    <input type="hidden" name="cita_id" value="{{ $cita->id }}"></li>
    <li><strong>Fecha:</strong> {{ date('d/M/Y', strtotime($cita->fecha)) }}</li>
    <li><strong>Hora:</strong> {{ date('h:i A', strtotime($cita->hora)) }}</li>
    <li><strong>Médico:</strong> {{ $cita->medicos->nombre }}</li>
    <li><strong>Paciente:</strong> {{ $cita->pacientes->nombre }}</li>
</ul>
<hr>

@if ($recetas->isNotEmpty())
@include('recetas.index')
@else
<p>No hay recetas asociadas a esta cita.</p>
@endif

</form>
@endsection
@extends('menu.menu')

@section('contenido1')

<div class="container" style="margin: 50px;">
    @if(isset($examen->id))
        <h1>Editar</h1>
        <form action=" {{ route('examen2.update', ['examen' => $examen->id] ) }} " method="POST" enctype="multipart/form-data">
    @method('PUT')   
    @else
        <h1>Insertar</h1>
        <form action=" {{ route('examen2.store')}} " method="POST" enctype="multipart/form-data">
    @endif    
        @csrf
        <x-input1 nombre="Nombre: " valorcampo="{{$examen->nombre}}" campo="nombre" holder="Escriba el Nombre del Alumno"></x-input1> 
        <x-input-foto seleccionArchivos="seleccionArchivos" nombre="Foto" valorcampo="{{$examen->foto}}" campo="foto" holder="Una foto" foto="{{$examen->foto}}"></x-input-foto>

        
        <x-submit1 />


       

        <ul>
            @foreach ($errors->All() as $error)
                <li>{{ $error }}</li>
            @endforeach 
        </ul>

    </form>

   
</div>

<script>
    const $seleccionArchivos = document.querySelector("#seleccionArchivos"),
  $imagenPrevisualizacion = document.querySelector("#imagenPrevisualizacion");
 
// Escuchar cuando cambie
$seleccionArchivos.addEventListener("change", () => {
  // Los archivos seleccionados, pueden ser muchos o uno
  const archivos = $seleccionArchivos.files;
  // Si no hay archivos salimos de la función y quitamos la imagen
  if (!archivos || !archivos.length) {
    $imagenPrevisualizacion.src = "";
    return;
  }
  // Ahora tomamos el primer archivo, el cual vamos a previsualizar
  const primerArchivo = archivos[0];
  // Lo convertimos a un objeto de tipo objectURL
  const objectURL = URL.createObjectURL(primerArchivo);
  // Y a la fuente de la imagen le ponemos el objectURL
  $imagenPrevisualizacion.src = objectURL;
});
</script>
@endsection



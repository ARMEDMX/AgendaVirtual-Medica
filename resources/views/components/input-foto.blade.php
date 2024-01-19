<div class="mb-3 row">
    <label for="{{$nombre}}" class="col-4 col-form-label">{{$nombre}}:</label>
    
    <div class="col-8">
        <input type="file" class="form-control" name="{{$campo}}" value="{{ old($campo, $valorcampo) }}" id="{{ $seleccionArchivos }}" placeholder="{{ $holder }}">
        <img id="imagenPrevisualizacion" src="{{ $foto }}" style="height: 50px; width: 50px;">


        <div class="error">
            @error($campo)
                <span style="color: brown;">{{ $message }}</span>
            @enderror
        </div>

       
       
        

    </div>

    
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

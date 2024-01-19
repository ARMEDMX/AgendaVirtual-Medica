<div class="tools">

    <div class="button_new">
        <input class="btn btn-primary " type="submit" value="Nueva Receta"/>
            
    </div>


    <div class="search">
        <form action=" {{-- route('cita.index') --}} " method="get">
            <input type="text" id="txtcita" name="txtcita">
            <input type="submit" value="Buscar">
        </form>
    </div>
</div>

<div id="tabla" class="table-responsive">
    @if ($recetas->isEmpty())
        <p>No se encontraron datos existentes.</p>
    @else
    <table id="table"
        class="table table-striped 
    table-hover	
    table-borderless
    table-primary
    align-middle">
        <thead class="table-light">
            <caption>Listado de Especialidades</caption>
            <tr>
                <th>ID</th>
                <th>Medicamentos</th>
                <th>Dosis</th>
                <th>Frecuencia</th>
                <th>Duracion</th>
                <th>Via Administracion</th>
                <th>Cita</th>
                <th>Accion</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">

            @foreach ($recetas as $receta)
                @if ($receta->citas_id == $cita->id)
                    <tr class="table-primary">
                        <td>{{ $receta->id }}</td>
                        <td>{{ $receta->medicamentos->nombre }}</td>
                        <td>{{ $receta->dosis }}</td>
                        <td>{{ $receta->frecuencia }}</td>
                        <td>{{ $receta->duracion }}</td>
                        <td>{{ $receta->viaadmin }}</td>
                        <td>{{ $receta->citas_id }}</td>


                        <td class="accion-btn">

                            {{-- <div class="show"> --}}
                            {{-- <a class="btn btn-primary"
                                href="{{ route('espec.show', ['espec' => $espec->id]) }}">Ver</a> --}}
                            {{-- </div> --}}

                            <form method="POST" action="{{ route('receta.destroy', ['receta' => $receta->id]) }}">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="cita_id" value="{{ $cita->id }}">
                                <input class="btn btn-danger " type="submit" value="Eliminar">
                            </form>

                            <a name="" id="" class="btn btn-secondary" role="button"
                                href="{{ route('receta.edit', ['receta' => $receta->id, 'cita' => $cita->id]) }}">Editar</a>
                        

                        </td>

                    </tr>
                @endif
            @endforeach

        </tbody>
        <tfoot>
            <!-- Hoy -->
        </tfoot>
    </table>        
    @endif
</div>

@extends('menu.menu')

@section('contenido1')

    <h1 class="display-3"><i class="fa-solid fa-person-digging fa-shake fa-lg" style="color: #f59b00;"></i>ESPECIALIDADES EN CONSTRUCCIÓN...</h1>
    <hr>

    <div class="tools">
        <div class="button_new">
             <a name="" id="" class="btn btn-primary" href="{{ route('espec.create') }}" role="button">
                Nueva Especialidad
            </a> 
        </div>

        <div class="search">
             <form action=" {{ route('espec.index') }} " method="get">
                <input type="text" id="txtespecialidad" name="txtespecialidad">
                <input type="submit" value="Buscar">
            </form> 
        </div>
    </div>

    <hr>

    <h6 class="display-6">{{ session('mensaje' )}}</h6>

    <div id="tabla" class="table-responsive">
        @if ($especialidades->isEmpty())
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
                    <th>Especialidad</th>
                    <th>Accion</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($especialidades as $espec)
                    <tr class="table-primary">
                        <td>{{ $espec->id }}</td>
                        <td>{{ $espec->especialidad }}</td>
                        
                        <td class="accion-btn">
                           
                            {{-- <div class="show"> --}}
                                <a class="btn btn-primary"
                                    href="{{ route('espec.show', ['espec' => $espec->id]) }}">Ver</a>
                            {{-- </div> --}}

                            {{-- <div class="delete"> --}}
                                <form method="POST" action="{{ route('espec.destroy', ['espec' => $espec->id]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <input class="btn btn-danger " type="submit" value="Eliminar">
                                </form>
                            {{-- </div> --}}

                            {{-- <div class="editar"> --}}
                                <a name="" id="" class="btn btn-secondary" role="button"
                                    href="{{ route('espec.edit', ['espec' => $espec->id]) }}">Editar</a>
                            {{-- </div> --}}

                        </td>

                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <!-- Hoy -->
            </tfoot>
        </table>
    </div>

    <div class="row justify-content-lg-start">
        <div class="col-auto">
            {{-- {{ $alumnos->links() }} --}}
        </div>
    </div>
    @endif
@endsection

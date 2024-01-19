@extends('menu.menu')

@section('contenido1')

    <h1 class="display-3"><i class="fa-solid fa-person-digging fa-shake fa-lg" style="color: #f59b00;"></i>MEDICAMENTOS EN CONSTRUCCIÓN...</h1>
    <hr>

    <div class="tools">
        <div class="button_new">
             <a name="" id="" class="btn btn-primary" href="{{ route('medicamento.create') }}" role="button">
                Nuevo Medicamento
            </a> 
        </div>

        <div class="search">
             <form action=" {{-- route('alumnos.index') --}} " method="get">
                <input type="text" id="txtnombre" name="txtnombre">
                <input type="submit" value="Buscar">
            </form> 
        </div>
    </div>

    <hr>

    <h6 class="display-6">{{ session('mensaje' )}}</h6>

    <div id="tabla" class="table-responsive">
        @if ($medicamentos->isEmpty())
            <p>No se encontraron datos existentes.</p>
        @else
        <table id="table"
            class="table table-striped 
        table-hover	
        table-borderless
        table-primary
        align-middle">
            <thead class="table-light">
                <caption>Listado de Medicamentos</caption>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Tipo de Medicamento</th>
                    <th>Fecha de Caducidad</th>
                    <th>Accion</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($medicamentos as $medicamento)
                    <tr class="table-primary">
                        <td>{{ $medicamento->id }}</td>
                        <td>{{ $medicamento->nombre }}</td>
                        <td>{{ $medicamento->tipo_medicamento }}</td>
                        <td>{{ $medicamento->fecha_caducidad }}</td>
                        
                        <td class="accion-btn">
                           
                            {{-- <div class="show"> --}}
                                <a class="btn btn-primary"
                                    href="{{ route('medicamento.show', ['medicamento' => $medicamento->id]) }}">Ver</a>
                            {{-- </div> --}}

                            {{-- <div class="delete"> --}}
                                <form method="POST" action="{{ route('medicamento.destroy', ['medicamento' => $medicamento->id]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <input class="btn btn-danger " type="submit" value="Eliminar">
                                </form>
                            {{-- </div> --}}

                            {{-- <div class="editar"> --}}
                                <a name="" id="" class="btn btn-secondary" role="button"
                                    href="{{ route('medicamento.edit', ['medicamento' => $medicamento->id]) }}">Editar</a>
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
            {{ $medicamentos->links() }}
        </div>
    </div>
    @endif
@endsection

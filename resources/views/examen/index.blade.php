@extends('menu.menu')

@section('contenido1')
    <h1 class="display-3">CATALOGO DE EXAMEN</h1>
    <hr>

    <div class="tools">
        <div class="button_new">
            <a name="" id="" class="btn btn-primary" href="{{ route('examen2.create') }}" role="button">
                Nuevo
            </a>
        </div>

        <div class="search">
            <form action=" {{ route('examen2.index') }} " method="get">
                <input type="text" id="txtnombre" name="txtnombre">
                <input type="submit" value="Buscar">
            </form>
        </div>
    </div>

    <hr>

    <h6 class="display-6">{{ session('mensaje' )}}</h6>

    <div class="table-responsive">
        <table id="table"
            class="table table-striped 
        table-hover	
        table-borderless
        table-primary
        align-middle">
            <thead class="table-light">
                <caption>Listado de Alumno</caption>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Foto</th>
                    <th>Accion</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($examen2 as $examen)
                    <tr class="table-primary">
                        <td>{{ $examen->id }}</td>
                        <td>
                            <img src="{{ $examen->foto }}" style="width: 50px; height: 50px;" alt="">
                        </td>
                        <td scope="row">{{ $examen->nombre }}</td>
                       
                        <td class="accion-btn">
                            <a class="btn btn-primary" href="{{ route('examen2.show', ['examen' => $examen->id]) }}">Ver</a>

                            <form method="POST" action="{{ route('examen2.destroy', ['examen' => $examen->id]) }}">
                                @csrf
                                @method('DELETE')
                                <input class="btn btn-danger " type="submit" value="Eliminar">
                            </form>

                            <a name="" id="" class="btn btn-secondary" role="button"
                                href="{{ route('examen2.edit', ['examen' => $examen->id]) }}">Editar</a>       
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
            {{ $examen2->links() }}
        </div>
    </div>
@endsection

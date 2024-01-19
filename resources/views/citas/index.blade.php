@extends('menu.menu')

@section('contenido1')
    <h1 class="display-3"><i class="fa-solid fa-person-digging fa-shake fa-lg" style="color: #f59b00;"></i>CITAS EN
        CONSTRUCCIÓN...</h1>
    <hr>

    <div class="tools">
        @auth
            @if (auth()->user()->role === 'admin')
                <div class="button_new">
                    <a name="" id="" class="btn btn-primary" href="{{ route('cita.create') }}" role="button">
                        Nueva Cita
                    </a>
                </div>
            @endif
        @endauth

        <div class="search">
            <form action=" {{ route('cita.index') }} " method="get">
                <input type="text" id="txtpaciente_id" name="txtpaciente_id">
                <input type="submit" value="Buscar">
            </form>
        </div>
    </div>

    <hr>

    <h6 class="display-6">{{ session('mensaje') }}</h6>

    <div id="tabla" class="table-responsive">
        @if ($citas->isEmpty())
            <p>No se encontraron citas existentes.</p>
        @else
            <table id="table"
                class="table table-striped 
        table-hover	
        table-borderless
        table-primary
        align-middle">
                <thead class="table-light">
                    <caption>Listado de Citas</caption>
                    <tr>
                        <th>ID</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Medico</th>
                        <th>Paciente</th>
                        {{-- @auth
                        @if (auth()->user()->role === 'admin' || auth()->user()->role === 'medico') --}}
                        <th>Accion</th>
                        {{-- @endif
                    @endauth --}}
                    </tr>
                </thead>
                <tbody class="table-group-divider">

                    @foreach ($citas as $cita)
                        <tr class="table-primary">
                            <td>{{ $cita->id }}</td>
                            <td>{{ date('d/M/Y', strtotime($cita->fecha)) }}</td>
                            <td>{{ date('h:i A', strtotime($cita->hora)) }}</td>
                            <td>{{ $cita->medicos->nombre }}</td>
                            <td>{{ $cita->pacientes->nombre }}</td>

                            <td class="accion-btn">

                                @auth
                                    @if (auth()->user()->role === 'medico')
                                        <a class="btn btn-primary"
                                            href="{{ route('cita.show', ['cita' => $cita->id]) }}">Ver</a>
                                    @endif
                                @endauth


                                @auth
                                    @if (auth()->user()->role === 'admin')
                                        <form method="POST" action="{{ route('cita.destroy', ['cita' => $cita->id]) }}">
                                            @csrf
                                            @method('DELETE')
                                            <input class="btn btn-danger " type="submit" value="Eliminar">
                                        </form>

                                        <a name="" id="" class="btn btn-secondary" role="button"
                                            href="{{ route('cita.edit', ['cita' => $cita->id]) }}">Editar</a>
                                    @endif
                                @endauth

                                
                                @auth
                                    @if (auth()->user()->role === 'paciente')
                                       
                                        @if ($cita->recetas)
                                            <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                                data-bs-target="#verRecetaModal{{ $cita->id }}">
                                                Ver Receta
                                            </button>
                                        @endif
                                        
                                    @endif
                                @endauth
                            </td>

                           

                            @if ($cita->recetas)
                                <div class="modal fade" id="verRecetaModal{{ $cita->id }}" tabindex="-1"
                                    aria-labelledby="verRecetaModalLabel{{ $cita->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="verRecetaModalLabel{{ $cita->id }}">
                                                    Detalles de la Receta de: {{ $cita->medicos->nombre }}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">


                                                @foreach ($cita->recetas as $receta)
                                                    <ul>
                                                        <p><strong>Medicamento:</strong>
                                                            {{ $receta->medicamentos->nombre }}</p>
                                                        <p><strong>Dosis:</strong> {{ $receta->dosis }}</p>
                                                        <p><strong>Frecuencia:</strong> {{ $receta->frecuencia }}</p>
                                                        <p><strong>Duración:</strong> {{ $receta->duracion }}</p>
                                                        <p><strong>Vía de Administración:</strong> {{ $receta->viaadmin }}
                                                        </p>
                                                    </ul>
                                                    <hr>
                                                @endforeach


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

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
            {{-- {{ $citas->links() }} --}}
        </div>
    </div>
    @endif

    {{-- <script>
        // JavaScript para configurar el ID de la cita antes de abrir el modal
        function configurarIdCita(citaId, nombrePaciente) {
            document.getElementById('cita_id_input').value = citaId;
            document.getElementById('nombre_paciente_h3').innerText = nombrePaciente;
        }
    </script> --}}

    <script>
        function configurarRecetaForm(citaId, nombrePaciente) {
            document.getElementById('cita_id_input').value = citaId;
            document.getElementById('nombre_paciente_h3').innerText = nombrePaciente;
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script>
        $(document).ready(function() {
            let contadorRecetas = 1;

            // Manejar clic en el botón "Agregar Receta"
            $('#agregarRecetaBtn').click(function() {
                // Clonar el primer formulario y cambiar los IDs
                let nuevoFormulario = $('#crearRecetaModal .modal-body form:first').clone();
                nuevoFormulario.find(':input').each(function() {
                    let nuevoId = this.id + contadorRecetas;
                    $(this).attr('id', nuevoId).attr('name', nuevoId).val('');
                });

                // Incrementar el contador para la próxima receta
                contadorRecetas++;

                // Agregar una línea horizontal arriba y debajo del nuevo formulario
                $('#crearRecetaModal .modal-body').append('<hr>').append(nuevoFormulario).append('<hr>');
            });

            // Manejar clic en el botón "Guardar Receta"
            $('#guardarRecetaBtn').click(function() {
                // Aquí puedes agregar la lógica para guardar las recetas
                // Puedes enviar los datos al servidor mediante AJAX o el método que prefieras
            });
        });
    </script>




@endsection

@extends('menu.menu')

@section('contenido1')

<nav class="nav justify-content-center text-center ">
    @auth
    <!-- Mensajes condicionales para usuarios autenticados -->
    @if(auth()->user()->role === 'medico')
        <div class="alert alert-info">
            Bienvenido Médico:{{auth()->user()->id}} tienes acceso a funciones especiales.
        </div>
    @elseif(auth()->user()->role === 'paciente')
        <div class="alert alert-success">
            Bienvenido Paciente: {{auth()->user()->id}} estamos aquí para ayudarte.
        </div>
    @elseif(auth()->user()->role === 'admin')
        <div class="alert alert-primary">
            Bienvenido, Administrador:{{auth()->user()->id}} tienes acceso a funciones especiales.
        </div>
    @endif
@else
    <!-- Mensaje para usuarios no autenticados -->
    <div class="alert alert-warning">
        Bienvenido, inicia sesión para acceder a tu contenido personalizado.
    </div>
@endauth

        

</nav>

    <!-- Contenido de la página -->
<div class="container">
    <section id="intro" class="mb-5">
        <div class="jumbotron">
            <h1 class="text-center display-4 ">Bienvenido a la <span id="text" class="text-primary">AgendaVirtual Medica</span></h1>
            <p class="lead">Somos una empresa dedicada a brindarte soluciones en línea. Nuestro compromiso es proporcionar servicios de alta calidad para satisfacer tus necesidades.</p>
        </div>
    </section>

    <section id="about" class="mb-5">
        <div class="container">
            <h2 class="text-center display-6">Acerca de Nosotros</h2>
            <p>Somos un equipo de profesionales apasionados que se dedican a ofrecer soluciones web innovadoras. Nuestra misión es...</p>
        </div>
    </section>

    <section id="services" class="mb-5">
        <div class="container">
            <h2 class="text-center display-6 display-6">Servicios</h2>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Diseño web personalizado</h5>
                            <p class="card-text">Ofrecemos diseño web a medida para satisfacer tus necesidades específicas.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Desarrollo de aplicaciones web</h5>
                            <p class="card-text">Creamos aplicaciones web a medida para tu negocio.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="contact">
        <div class="container">
            <h2 class="text-center display-6">Contacto</h2>
            <p>¡Estamos aquí para ayudarte! Si tienes alguna pregunta o consulta, no dudes en contactarnos.</p>
            <address>
                <strong>Tu Sitio Web</strong><br>
                Dirección de la empresa<br>
                Ciudad, País<br>
                Teléfono: (123) 456-7890<br>
                Email: info@tusitioweb.com
            </address>
        </div>
    </section>
</div>

    


@endsection

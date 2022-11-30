<!-- STYLES -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('css/app.css') }}">

@section('content')

@section("scripts")
<script src="{{asset("assets/pages/scripts/admin/usuario/crear.js")}}" type="text/javascript"></script>
@endsection


<div class="container-fluid">

    <!-- Banner -->
    <div class="container-fluid mb-4">
        <div class="row img-usuarios-banner">
            <!-- <img src="img/cartas_banner.png" class="banner" alt="Cartas"> -->
            <div class="col-xl-11 col-lg-11 col-md-11 col-sm-11 col-11 d-flex justify-content-end align-items-end pb-4">
                <h1 class="titulo_seccion">Personal List</h1>
            </div>
        </div>
    </div>

    @include('includes.form-error')
    @include('includes.mensaje')

    <div class="d-flex justify-content-center">
        <div class="col-md-4">
            <form action="{{route('guardar_usuario')}}" id="form-general"
                class="form_cliente" method="POST" autocomplete="off">
                @csrf
                <div class="card-body">
                    @include('usuario.form')
                </div>
                <!-- Botones -->
                <div class="row justify-content-center boton_proceso">
                    @include('includes.boton-form-crear')
                </div>
                <div class="row justify-content-center boton_cancelar">
                    <a class="col btn" href="{{route('usuario.index')}}">Volver</a>
                </div>
            </form>
        </div>
    </div>
</div>

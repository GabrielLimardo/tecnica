@extends('adminlte::page')

@section('title', 'Usuarios')

<link rel="stylesheet" href="{{ mix('css/app.css') }}">

@section('content')

<div class="container-fluid">
    <!--
    <div class="card-body">
        <a href="{{route('usuario.create')}}" class="btn btn-primary mb-2">Nuevo</a> -->

    <!-- Banner -->
    <div class="container-fluid mb-4">
        <div class="row img-usuarios-banner">
            <!-- <img src="img/cartas_banner.png" class="banner" alt="Cartas"> -->
            <div class="col-xl-11 col-lg-11 col-md-11 col-sm-11 col-11 d-flex justify-content-end align-items-end pb-4">
                <h1 class="titulo_seccion">Personal List</h1>
            </div>
        {{-- </div> --}}
    </div>

    @include("notificacion")
    <div class="container card">
        <div class="row">
            <div class="col-12">
                <nav class="navbar float-right col-12">
                    <div class="col-md-4">

                    </div>
                    <form class="form-inline">
                        <div class="input-group">
                            <select name="tipo" class="form-control" id="exampleFormControlSelect1">
                                <option value="name">strDrink</option>
                                <option value="email">strDrinkThumb</option>
                                <option value="legajo">idDrink</option>
                                <option value="name">stars</option>
                                <option value="email">note</option>
                                <option value="legajo">difficult</option>

                            </select>
                            <input name="bucarpor" class="form-control my-0 py-1 me-2" type="search" placeholder="Buscar" aria-label="Search">
                            <div class="input-group-append"><button class="btn btn-primary" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button></div>
                        </div>
                    </form>
                </nav>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th colspan="14">
                                    <form class="d-flex m-0" id="formulario-eliminar" method="POST">
                                        @method("delete")
                                        @csrf
                                        <meta name="csrf-token" content="{{ csrf_token() }}">
                                    </form>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>
                                    <div class="form-check">
                                        <input title="Seleccionar todo" class="form-check-input" type="checkbox" value="" id="checkbox-all">
                                    </div>
                                </th>
                                <th scope="col">strDrink</th>
                                <th scope="col">strDrinkThumb</th>
                                <th scope="col">idDrink</th>
                                <th scope="col">stars</th>
                                <th scope="col">note</th>
                                <th scope="col">difficult</th>
                                <th colspan="3"></th>
                            </tr>
                            @foreach ($results as $result)
                            <tr>
                                <td scope="row">{{ $result->strDrink}}</td>
                                <td>{{ $result->strDrinkThumb}}</td>
                                <td>{{ $result->idDrink}}</td>
                                <td scope="row">{{ $result->stars}}</td>
                                <td>{{ $result->note}}</td>
                                <td>{{ $result->difficult}}</td>
                    
                            </tr>
                            @endforeach

                        </tbody>
                    </table>

                    {{ $users->links() }}

                </div>

            </div>
        </div>
    </div>
</div>
@endsection

@section('js')

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if (session('eliminar') == 'ok')
<script>
    Swal.fire(
        'Eliminado!',
        'Registro Eliminado.',
        'success'
    )
</script>
@endif

@if (session('enviado') == 'ok')
<script>
    Swal.fire(
        'Mails enviados!',
        'success'
    )
</script>
@endif


<script>
    $('.mail').submit(function(e) {
        e.preventDefault();

        Swal.fire({
            title: 'Está seguro?',
            text: "Desea enviar mail de bienvenida a todos los usuarios?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, enviar mail'
        }).then((result) => {
            if (result.value) {
                Swal.fire(
                    'Atención!',
                    'Se enviaron mail correctamente'
                )
                this.submit();
            }

        })
    });

    $('.mail-firma').submit(function(e) {
        e.preventDefault();

        Swal.fire({
            title: 'Está seguro?',
            text: "Desea enviar mail de firma pendiente a todos los usuarios?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, enviar mail'
        }).then((result) => {
            if (result.value) {
                Swal.fire(
                    'Atención!',
                    'Se enviaron los mails correctamente'
                )
                this.submit();
            }

        })
    });


    $('.formulario-eliminar').submit(function(e) {
        e.preventDefault();

        Swal.fire({
            title: 'Está seguro?',
            text: "Desea eliminar el Registro!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Eliminar!'
        }).then((result) => {
            if (result.value) {
                Swal.fire(
                    'Atención!',
                    'Registro será eliminado',
                    'success'
                )
                this.submit();
            } else
                Swal.fire(
                    'Cancelado!',
                    'El Registro no fue Eliminado.',
                    'success'
                )

        })
    });
</script>

@endsection

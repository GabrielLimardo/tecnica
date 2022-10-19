@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')

<!-- STYLES -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="{{ mix('css/app.css') }}">

@section('content')

<div class="container-fluid">

    <!-- Banner -->
    <div class="container-fluid mb-4">
        <div class="row img-usuarios-banner">
            <!-- <img src="img/cartas_banner.png" class="banner" alt="Cartas"> -->
            <div class="col-xl-11 col-lg-11 col-md-11 col-sm-11 col-11 d-flex justify-content-end align-items-end pb-4">
                <h1 class="titulo_seccion">Usuarios</h1>
            </div>
        </div>
    </div>

    <div class="col">
        @include('includes.form-error')
        @include('includes.mensaje')
        <!-- <div class="card">
            <div class="card-header">
                <h3 class="card-title">Editar usuario</h3>
            </div> -->
            <div class="d-flex justify-content-center">
                <form action="{{route('actualizar_usuario', ['id' => $data->id])}}" id="form-general" class="form-horizontal col-md-6 form--label-right" method="POST" autocomplete="off">
                    @csrf @method("put")
                    <div class="card-body">
                        @include('usuario.formedit')
                    </div>
                    <!-- BOTONES -->
                    <div class="d-flex justify-content-center col-md-12 boton_proceso">
                        @include('includes.boton-form-editar')
                    </div>
                    <div class="d-flex justify-content-center col-md-12 boton_cancelar">
                        <a href="{{route('usuarios')}}">Volver</a>
                    </div>
                </form>
            <!-- </div>
        </div>
    </div> -->
</div>

@endsection
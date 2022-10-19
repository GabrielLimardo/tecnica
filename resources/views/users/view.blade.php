@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content')

<link rel="stylesheet" href="{{ mix('css/app.css') }}">

<div class="container-fluid">

    <!-- Banner -->
    <div class="container-fluid mb-4">
        <div class="row img-clientes-banner">
            <div class="col-xl-11 col-lg-11 col-md-11 col-sm-11 col-11 d-flex justify-content-end align-items-end pb-4">
                <h1 class="titulo_seccion">Usuarios</h1>
            </div>
        </div>
    </div>

    <div class="container card" style="width: 40em;">
        <div class="row justify-content-between m-5">
            <div class="form-group col-md-5">
                <label class="d-block" for="num_cliente">
                    <h5>Nombre:</h5>
                </label>
                <p></p>
            </div>

            <div class="form-group col-md-5">
                <label class="d-block" for="razon_social">
                    <h5>Email:</h5>
                </label>
                <p></p>
            </div>

            <div class="form-group col-md-5">
                <label class="d-block" for="razon_social">
                    <h5>Sector:</h5>
                </label>
                <p></p>
            </div>

            <div class="d-flex justify-content-center col-md-12 boton_proceso">
                <a href="{{route('clientes.index')}}">Aceptar</a>
            </div>

        </div>

    </div>
</div>

@endsection
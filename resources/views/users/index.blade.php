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
                <h1 class="titulo_seccion">Usuarios</h1>
            </div>
        </div>
    </div>

    @include("notificacion")
    <div class="container card">
        <div class="row">
            <div class="col-12">
                <nav class="navbar float-right col-12">
                    <div class="col-md-4">
                        <a title="Alta individual" href="{{route('usuario.create')}}" class="btn btn-primary mb-2 button-rounded"><i class="fas fa-user"></i><i class="fas fa-plus"></i></a>
                        <a title="Alta masiva" href="{{route('cmfusuarios.importForm')}}" class="btn btn-primary mb-2 button-rounded"><i class="fas fa-users"></i><i class="fas fa-plus"></i></a>
                        <a title="Baja masiva" href="{{route('bmusuarios.baja')}}" class="btn btn-primary mb-2 button-rounded"><i class="fas fa-users"></i><i class="fas fa-minus" style="margin-left: 0.04cm;"></i></a>

                        <form action="{{ route('mailBienvenida') }}" class="d-inline-block mail" method="POST">
                            @csrf
                            <button title="Enviar mail bienvenida" class="btn btn-primary mb-2 button-rounded"><i class="fas fa-envelope"></i></button>
                        </form>
                        <form action="{{ route('mailFirmaPendiente') }}" class="d-inline-block mail-firma" method="POST">
                            @csrf
                            <button title="Enviar email masivo firma pendiente" class="btn btn-primary mb-2 button-rounded"><i class="fas fa-pencil-alt"></i></button>
                        </form>
                        <form action="{{ route('certificadosMasivos') }}" class="d-inline-block mail" method="POST">
                            @csrf
                            <button title="Enviar Certificados Masivos" class="btn btn-primary mb-2 button-rounded"><i class="fas fa-users"></i></button>
                        </form>

                    </div>
                    <form class="form-inline">
                        <div class="input-group">
                            <select name="tipo" class="form-control" id="exampleFormControlSelect1">
                                <option value="name">Nombre</option>
                                <option value="email">Email</option>
                                <option value="legajo">Edad</option>

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
                                        <button class="btn btn-outline-primary" id="boton-eliminar">
                                            Eliminar selección
                                        </button>
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
                                <th scope="col">name</th>
                                <th scope="col">email</th>
                                <th scope="col">age</th>
                                <th colspan="3"></th>
                            </tr>
                            @foreach ($users as $user)
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input checkbox-admin" type="checkbox" value="{{$user->id}}" id="{{$user->id}}">
                                    </div>
                                </td>
                                <td>{{ $user->name}}</td>
                                <td>{{ $user->email}}</td>
                                <td>{{ $user->age}}</td>
                                
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
<script>
    // Lógica checkall

    let checkbox_admin = [];

    $(document).ready(function() {

        if (checkbox_admin.length == 0) {
            $('#boton-eliminar').attr('disabled', true);
        }

        $('#checkbox-all').click(function() {
            if ($(this).is(':checked')) {
                checkbox_admin = [];
                $('.checkbox-admin').each(function() {
                    $(this).prop('checked', true);
                    checkbox_admin.push($(this).val());
                    $(this).parents('tr').css('background', '#f1f1f1');
                });
                $('#boton-eliminar').prop('disabled', false);
            } else {
                $('.checkbox-admin').each(function() {
                    $(this).prop('checked', false);
                    checkbox_admin = [];
                    $(this).parents('tr').css('background', '#fff');
                });
                $('#boton-eliminar').prop('disabled', true);
            }
        });

        $('.checkbox-admin').click(function() {
            if ($(this).is(':checked')) {
                checkbox_admin.push($(this).attr('id'));
                $(this).parents('tr').css('background', '#f1f1f1');
                $('#boton-eliminar').prop('disabled', false);
            } else {
                $(this).parents('tr').css('background', '#fff');
                let index = checkbox_admin.indexOf($(this).attr('id'));
                if (index > -1) {
                    checkbox_admin.splice(index, 1);
                }
                if (checkbox_admin.length == 0) {
                    $('#boton-eliminar').prop('disabled', true);
                }
            }
        });

        $('#formulario-eliminar').submit(function(e) {
            e.preventDefault();

            Swal.fire({
                title: '¿Estás seguro?',
                text: `¿Desea eliminar los ${checkbox_admin.length} usuarios seleccionados?`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Eliminar'
            }).then((result) => {
                if (result.value) {
                    Swal.fire(
                        'Atención!',
                        'Los registros seleccionados serán eliminados',
                        'success'
                    )
                    $.ajax({
                        url: "{{ route('destroyusers')}}",
                        method: "POST",
                        data: {
                            "_token": $("meta[name='csrf-token']").attr("content"),
                            'checkbox': checkbox_admin
                        },
                        success: function(data)

                        {
                            window.location = "/usuario";
                        }
                    })
                } else
                    Swal.fire(
                        'Cancelado!',
                        'El Registro no fue Eliminado.',
                        'success'
                    )

            })
        });
    });
</script>
@endsection

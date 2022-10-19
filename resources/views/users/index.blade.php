<div class="container-fluid">

    <div class="container-fluid mb-4">
        <div class="row img-usuarios-banner">
            <!-- <img src="img/cartas_banner.png" class="banner" alt="Cartas"> -->
            <div class="col-xl-11 col-lg-11 col-md-11 col-sm-11 col-11 d-flex justify-content-end align-items-end pb-4">
                <h1 class="titulo_seccion">Usuarios</h1>
            </div>
        </div>
    </div>

    <div class="container card">
        <div class="row">
            <div class="col-12">
                <nav class="navbar float-right col-12">
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
                </div>

            </div>
        </div>
    </div>
</div>

<div class="row">

    <div class="col-md-6 mb-1 form-floating">
        <input type="text" name="name" id="name" class="col form-control" placeholder="Nombre" value="{{old('name', $data->name ?? '')}}" required />
        <label>Nombre</label>
    </div>

    <div class="col-md-6 mb-1 form-floating">
        <input type="text" name="last_name" id="last_name" class="col form-control" placeholder="last_name" value="{{old('last_name', $data->last_name ?? '')}}" required />
        <label>Apellido</label>
    </div>

    <div class="col-md-12 form-floating mb-1">
        <select name="id_empresa" id="id_empresa" class="col form-select" data-Live-search="true">
            @foreach($empresas as $empresa)
            <option value="{{ $empresa->id }}" {{ old('id_empresa') ? (old('id_empresa') == $empresa->id ? 'selected' : '') : ($empresa->id == $empresa->id ? 'selected' : '') }}>
                {{ $empresa->id }}-{{ $empresa->nombre_legal }}
            </option>
            @endforeach
        </select>
        <label>Empresa</label>
    </div>


    <div class="form-check col-md-6">
        <label class="label mb-1">Tipo Documento</label>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="tipo_documento" id="DNI" value="DNI" {{ (old("tipo_documento") == 'DN') ? "checked" : "" }}>
            <label class="form-check-label">DNI</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="tipo_documento" id="CUIL" value="CUIL" {{ (old("tipo_documento") == 'CUIL') ? "checked" : "" }}>
            <label class="form-check-label">CUIL</label>
        </div>
    </div>

    <div class="col-md-6 mt-1 form-floating ">
        <input type="text" name="nro_documento" id="nro_documento" class="col form-control" placeholder="Nro Documento" value="{{old('nro_documento')}}" required />
        <label>Nro. Documento</label>
    </div>


    <div class="col-md-6 mb-1 form-floating ">
        <input type="text" name="legajo" id="legajo" class="col form-control" placeholder="Nro. Legajo" value="{{old('legajo')}}" required />
        <label>Legajo</label>
    </div>
    <div class="col-md-6 mb-1 form-floating ">
        <input type="text" name="telefono" id="telefono" class="col form-control" placeholder="Nro. telefono" value="{{old('telefono')}}" required />
        <label>Teléfono</label>
    </div>

    <div class="col form-floating mb-1">
        <select name="id_sucursal" id="id_sucursal" class="col form-select" data-Live-search="true">
            @foreach($sucursales as $sucursal)
            <option value="{{ $sucursal->id }}" {{ old('id_sucursal') ? (old('id_sucursal') == $empresa->id ? 'selected' : '') : ($sucursal->id == $sucursal->id ? 'selected' : '') }}>

                {{ $sucursal->id }}-{{ $sucursal->nombre }}
            </option>
            @endforeach
        </select>
        <label>Sucursal</label>
    </div>

    <div class="col-md-6 form-floating mb-1">
        <select name="id_gerencia" id="id_gerencia" class="col form-select" data-Live-search="true">
            @foreach($gerencias as $gerencia)
            <option value="{{ $empresa->id }}" {{ old('id_empresa') ? (old('id_empresa') == $empresa->id ? 'selected' : '') : ($empresa->id == $empresa->id ? 'selected' : '') }}>
                {{ $gerencia->id }}-{{ $gerencia->nombre }}
            </option>
            @endforeach
        </select>
        <label>Gerencia</label>
    </div>

    <div class="col-md-6 mb-1 form-floating ">
        <input type="date" name="fecha_ingreso" id="fecha_ingreso" class="col form-control" placeholder="Fecha de ingreso" value="{{old('fecha_ingreso')}}" required />
        <label>Fecha de ingreso</label>
    </div>

    <div class="form-check col-md-6">
        <label class="label mb-1">Estatus</label>
        <div class="form-check"><input class="form-check-input" type="radio" name="status" id="status" value="activo" {{ (old("status") == 'Activo') ? "checked" : "" }}><label class="form-check-label">Activo</label>
        </div>
        <div class="form-check"><input class="form-check-input" type="radio" name="status" id="status" value="inactivo" {{ (old("status") == 'Inactivo') ? "checked" : "" }}><label class="form-check-label">Inactivo</label>
        </div>
    </div>

    <div class="col-md-6 mb-1 form-floating ">
        <input type="date" name="fecha_egreso" id="fecha_egreso" class="col form-control" placeholder="Fecha de egreso el Empleado" value="{{old('fecha_egreso')}}" />
        <label>Fecha de egreso</label>
    </div>

    <div class="col-md-6 mb-1 form-floating">
        <input type="email" name="email" id="email" class="col form-control" placeholder="E-Mail" value="{{old('email', $data->email ?? '')}}" required />
        <label>Mail</label>
    </div>

    <div class="col-md mb-1 form-floating">
        <select name="rol_id[]" id="rol_id" class="form-input form-select select_width" multiple="multiple" required>
            <option value="">Seleccione el rol</option>
            @foreach($rols as $id => $nombre)
            <option value="{{$id}}" {{is_array(old('rol_id')) ? (in_array($id, old('rol_id')) ? 'selected' : '')  : (isset($data) ? ($data->roles->firstWhere('id', $id) ? 'selected' : '') : '')}}>
                {{$nombre}}
            </option>
            @endforeach
        </select>
        <label>Rol</label>
    </div>


    <div class="form-floating col-md-6">
        <input class="col form-control" type="password" name="password" id="password" placeholder="Contraseña" value="" minlength="5" />
        <label>Contraseña</label>
    </div>

    <div class="form-floating col-md-6">
        <input class="col form-control" type="password" name="re_password" id="re_password" placeholder="Repita Contraseña" value=""  minlength="5" />
        <label>Repetir Contraseña</label>
    </div>

    <div class="form-check col-md-6">
        <label class="label mb-1">Firma Digital</label>
        <div class="form-check"><input class="form-check-input" type="radio" name="firmaDigital" id="firmaDigital" value="Si" {{ (old("firmaDigital") == 'Si') ? "checked" : "" }}><label class="form-check-label">Si</label>
        </div>
        <div class="form-check"><input class="form-check-input" type="radio" name="firmaDigital" id="firmaDigital" value="No" {{ (old("firmaDigital") == 'No') ? "checked" : "" }}><label class="form-check-label">No</label>
        </div>
    </div>
</div>
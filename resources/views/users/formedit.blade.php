<div class="row">
    <div class="col-md-6 mb-1 form-floating ">
        <input type="text" name="name" id="name" class="col form-control" placeholder="Nombre" value="{{old('name', $data->name ?? '')}}" required />
        <label>Nombre</label>
    </div>
    <div class="col-md-6 mb-1 form-floating ">
        <input type="text" name="last_name" id="last_name" class="col form-control" placeholder="Apellido" value="{{old('last_name', $data->last_name?? '')}}" required />
        <label>Apellido</label>
    </div>
    <div class="col form-floating mb-1">
        <select name="id_empresa" id="id_empresa" class="col form-select" data-Live-search="true">
            @foreach($empresas as $empresa)
            <option value="{{$empresa -> id}}" {{$selected== $empresa-> id? 'selected = "selected"': ''}}>
                {{ $empresa->id }}-{{ $empresa->nombre_legal }}
            </option>
            @endforeach
        </select>
        <label>Empresa</label>
    </div>

    <div class="form-check col-md-6">
        <label class="label mb-1">Tipo Documento</label>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="tipo_documento" id="tipo_documento" value="DNI" {{$usuarios->tipo_documento == 'DNI' ? 'checked' : '' }}> DNI
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="tipo_documento" id="tipo_documento" value="CUIL" {{$usuarios->tipo_documento == 'CUIL' ? 'checked' : '' }}> CUIL
        </div>
    </div>

    <div class="col-md-6 mb-1 form-floating ">
        <input type="text" name="nro_documento" id="nro_documento" value="{{$usuarios->nro_documento}}" class="col form-control" placeholder="Nro Documento" value="{{old('nro_documento')}}" required />
        <label>Nro. Documento</label>
    </div>
    <div class="col-md-6 mb-1 form-floating ">
        <input type="text" name="legajo" id="legajo" class="col form-control" value="{{$usuarios->legajo}}" placeholder="Nro. Legajo" value="{{old('legajo')}}" required />
        <label>Legajo</label>
    </div>
    <div class="col-md-6 mb-1 form-floating ">
        <input type="text" name="telefono" id="telefono" value="{{$usuarios->telefono}}" class="col form-control" placeholder="Nro. telefono" value="{{old('telefono')}}" required />
        <label>Teléfono</label>
    </div>

    <div class="col-md-6 mb-1 form-floating ">
        <input type="date" name="fecha_ingreso" id="fecha_ingreso" value="{{$usuarios->fecha_ingreso}}" class="col form-control" placeholder="Fecha de ingreso" value="{{old('fecha_ingreso')}}" required />
        <label>Fecha de ingreso</label>
    </div>

    <div class="form-check col-md-6 ">
        <label class="label mb-1">Estatus</label>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="status" id="status" value="Activo" {{$usuarios->status == 'activo' ? 'checked' : '' || $usuarios->status == 'Activo' ? 'checked' : '' || $usuarios->status == 'ACTIVO' ? 'checked' : ''}}>Activo

        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="status" id="status" value="Inactivo" {{$usuarios->status == 'inactivo' ? 'checked' : '' || $usuarios->status == 'Inactivo' ? 'checked' : '' || $usuarios->status == 'INACTIVO' ? 'checked' : ''}}>Inactivo

        </div>
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
    
    <div class="col-md-6 mb-1 form-floating ">
        <input type="date" name="fecha_egreso" value="{{$usuarios->fecha_egreso}}" id="fecha_egreso" class="col form-control" placeholder="Fecha de egreso el Empleado" value="{{old('fecha_egreso')}}" />
        <label>Fecha de egreso</label>
    </div>

    <div class="col-md-6 form-floating mb-1">
        <select name="id_sucursal" id="id_sucursal" class="col form-select" data-Live-search="true">
            @foreach($sucursales as $sucursal)
            <option value="{{$sucursal -> id}}" {{$selectedsucursal== $sucursal-> id? 'selected = "selected"': ''}}>
                {{ $sucursal->id }}-{{ $sucursal->nombre }}
            </option>
            @endforeach
        </select>
        <label>Sucursal</label>
    </div>

    <div class="col-md-6 form-floating mb-1">
        <select name="id_gerencia" id="id_gerencia" class="col form-select" data-Live-search="true">
            @foreach($gerencias as $gerencia)
            <option value="{{$gerencia -> id}}" {{$selectedgerencia== $gerencia-> id? 'selected = "selected"': ''}}>
                {{ $gerencia->id }}-{{ $gerencia->nombre }}
            </option>
            @endforeach
        </select>
        <label>Gerencia</label>
    </div>

    <div class="col-md-6 mb-1 form-floating">
        <input type="email" name="email" id="email" class="col form-control" placeholder="E-Mail" value="{{old('email', $data->email ?? '')}}" required />
        <label>Mail</label>
    </div>



    <div class="row">
        <div class="col-md-6 mb-1 form-floating">
            <input class="col form-control" type="password" name="password" id="password" placeholder="Contraseña" value=""  minlength="5" />
            <label>Contraseña</label>
        </div>

        <div class="col-md-6 mb-1 form-floating">
            <input class="col form-control" type="password" name="re_password" id="re_password" placeholder="Repita Contraseña" value=""  minlength="5" />
            <label>Repetir Contraseña</label>
        </div>
    </div>

    <div class="form-check col-md-6 ">
        <label class="label">Firma Digital</label>
        <div class="form-check"><input class="form-check-input" type="radio" name="firmaDigital" id="firmaDigital" value="Si" {{$usuarios->firmaDigital == 'Si' ? 'checked' : '' }}>   Si</div>

        <div class="form-check"><input class="form-check-input" type="radio" name="firmaDigital" id="firmaDigital" value="No" {{$usuarios->firmaDigital == 'No' ? 'checked' : '' }}>  No</div>

    </div>



</div>

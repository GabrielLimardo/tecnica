<div class="row">
    <div class="col-md-6 mb-1 form-floating ">
        <input type="text" name="name" id="name" class="col form-control" placeholder="Nombre" value="{{old('name', $data->name ?? '')}}" required />
        <label>Nombre</label>
    </div>
    <div class="col-md-6 mb-1 form-floating ">
        <input type="text" name="Email" id="Email" class="col form-control" placeholder="Email" value="{{old('Email', $data->Email?? '')}}" required />
        <label>Email</label>
    </div>

    <div class="col-md-6 mb-1 form-floating ">
        <input type="text" name="Contry" id="naContryme" class="col form-control" placeholder="Contry" value="{{old('Contry', $data->Contry ?? '')}}" required />
        <label>Contry</label>
    </div>
    <div class="col-md-6 mb-1 form-floating ">
        <input type="text" name="Age" id="Age" class="col form-control" placeholder="Age" value="{{old('Age', $data->Age?? '')}}" required />
        <label>Age</label>
    </div>
    



</div>

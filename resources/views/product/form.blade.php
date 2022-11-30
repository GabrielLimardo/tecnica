<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('hola') }}
            {{ Form::text('hola', $product->hola, ['class' => 'form-control' . ($errors->has('hola') ? ' is-invalid' : ''), 'placeholder' => 'Hola']) }}
            {!! $errors->first('hola', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
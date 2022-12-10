<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('strDrink') }}
            {{ Form::text('strDrink', $personalist->strDrink, ['class' => 'form-control' . ($errors->has('strDrink') ? ' is-invalid' : ''), 'placeholder' => 'Strdrink']) }}
            {!! $errors->first('strDrink', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('strDrinkThumb') }}
            {{ Form::text('strDrinkThumb', $personalist->strDrinkThumb, ['class' => 'form-control' . ($errors->has('strDrinkThumb') ? ' is-invalid' : ''), 'placeholder' => 'Strdrinkthumb']) }}
            {!! $errors->first('strDrinkThumb', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('idDrink') }}
            {{ Form::text('idDrink', $personalist->idDrink, ['class' => 'form-control' . ($errors->has('idDrink') ? ' is-invalid' : ''), 'placeholder' => 'Iddrink']) }}
            {!! $errors->first('idDrink', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('stars') }}
            {{ Form::text('stars', $personalist->stars, ['class' => 'form-control' . ($errors->has('stars') ? ' is-invalid' : ''), 'placeholder' => 'Stars']) }}
            {!! $errors->first('stars', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('note') }}
            {{ Form::text('note', $personalist->note, ['class' => 'form-control' . ($errors->has('note') ? ' is-invalid' : ''), 'placeholder' => 'Note']) }}
            {!! $errors->first('note', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('difficult') }}
            {{ Form::text('difficult', $personalist->difficult, ['class' => 'form-control' . ($errors->has('difficult') ? ' is-invalid' : ''), 'placeholder' => 'Difficult']) }}
            {!! $errors->first('difficult', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
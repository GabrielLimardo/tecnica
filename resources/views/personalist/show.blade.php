@extends('layouts.app')

@section('template_title')
    {{ $personalist->name ?? 'Show Personalist' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Personalist</span>
                        </div>
                        {{-- <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('personalists.index') }}"> Back</a>
                        </div> --}}
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Strdrink:</strong>
                            {{ $personalist->strDrink }}
                        </div>
                        <div class="form-group">
                            <strong>Strdrinkthumb:</strong>
                            {{ $personalist->strDrinkThumb }}
                        </div>
                        <div class="form-group">
                            <strong>Iddrink:</strong>
                            {{ $personalist->idDrink }}
                        </div>
                        <div class="form-group">
                            <strong>Stars:</strong>
                            {{ $personalist->stars }}
                        </div>
                        <div class="form-group">
                            <strong>Note:</strong>
                            {{ $personalist->note }}
                        </div>
                        <div class="form-group">
                            <strong>Difficult:</strong>
                            {{ $personalist->difficult }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

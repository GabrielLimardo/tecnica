@extends('layouts.app')

@section('template_title')
    {{ $product['strDrink'] ?? 'Show Product' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Product</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('product.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>ID:</strong>
                            {{ $product['idDrink'] }}
                        </div>
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $product['strDrink'] }}
                        </div>

                        <div class="form-group">
                           <img src="{{ $product['strDrinkThumb']}}" style="height: 150px;">
                        </div>

                        <div class="form-group">
                            <strong>Category:</strong>
                            {{ $product['strCategory'] }}
                        </div>
                        <div class="form-group">
                            <strong>Intructions:</strong>
                            {{ $product['strInstructions'] }}
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

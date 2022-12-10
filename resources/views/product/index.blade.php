@extends('layouts.app')

@section('template_title')
    Product
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Product') }}
                            </span>
                            <div style="display: flex; justify-content: space-between; align-items: init;">   
                                <input name="bucarpor" class="form-control my-0 py-1 me-2" type="search" placeholder="Buscar" aria-label="Search">
                                <button class="btn btn-primary" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                            </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                  

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>ID</th>
                                        
										<th>Drink</th>

										<th>Picture</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            {{-- {{dd($product);}} --}}
                                            <td>{{ $product['idDrink']}}</td>
											<td>{{ $product['strDrink']}}</td>
                                            <td><img src="{{ $product['strDrinkThumb']}}" style="height: 150px;"> </td>
                                       
                                            </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

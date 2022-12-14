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
                            <form class="row" method="POST" action="{{route('filterProduct')}}" enctype="multipart/form-data">
                                @csrf                            
                                <div style="display: flex; justify-content: space-between; align-items: init;">   
                                    <select id="type" name="type" class="selectpicker show-tick"  style="border-radius: 5px; margin-right: 5px;">
                                        <option value="name"> Name </option>
                                        {{-- <option value="ingredient_name" selected> Ingredients </option>
                                        <option value="category">Category</option> --}}
                                    </select>                                
                                    <input name="name"  id="name" class="form-control my-0 py-1 me-2" type="search" placeholder="Buscar" aria-label="Search">
                                    <button class="btn btn-primary" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                                </div>
                            </form>
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

										<th>Actions</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @if (isset($products))
                                        @foreach ($products as $product)
                                            <tr>
                                                {{-- {{dd($product);}} --}}
                                                <td>{{ $product['idDrink']}}</td>
                                                <td>{{ $product['strDrink']}}</td>
                                                {{-- <td><img src="{{ $product['strDrinkThumb']}}" style="height: 150px;"> </td> --}}
                                                <td> 
                                                    <div class="d-inline-flex">
                                                        <figure>
                                                            <a class="btn" href="{{route('product.show',[$product['idDrink']])}}"><i class="fa fa-eye"></i></a>
                                                            <figcaption> Show </figcaption>
                                                        </figure>
                                                        <figure>
                                                            <a class="btn" href="{{route('add',[$product['idDrink']])}}"><i class="fa-solid fa-plus"></i></a>
                                                            <figcaption> Save </figcaption>
                                                        </figure>
                                                        </div>
                                                </td>

                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

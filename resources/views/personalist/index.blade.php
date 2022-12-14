@extends('layouts.app')

@section('template_title')
    Personalist
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Personalist') }}
                            </span>

                             {{-- <div class="float-right">
                                <a href="{{ route('personalists.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div> --}}
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
                                        <th>Id</th>                               
										<th>Name</th>
										<th>Stars</th>
										<th>Difficult</th>
										<th>Note</th>

                                        <th>Action</th>

                                        {{-- <th></th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (isset($personalists))

                                        @foreach ($personalists as $personalist)

                                            <tr>
                                                <td>{{ $personalist->idDrink }}</td>
                                                <td>{{ $personalist->strDrink }}</td>
                                                <td>{{ $personalist->stars }}</td>
                                                <td>{{ $personalist->difficult }}</td>
                                                <td>{{ $personalist->note }}</td>

                                                {{-- <form class="row" method="POST" action="{{route('list.update', [$personalist->id])}}">
                                                    @method("PUT")
                                                    @csrf --}}
                                                    <td> 
                                                        <a class="btn" href="{{route('list.edit',[$personalist->id])}}"><i class="fa fa-pen"></i></a>

                                                        <form action="{{route('list.destroy', [$personalist->id])}}" class="d-inline-block formulario-eliminar" method="POST">
                                                            @method("delete")
                                                            @csrf
                                                            <button class="btn"><i class="fa fa-trash"></i></button>
                                                        </form>
                                                        {{-- <div style="display: flex; align-items: init;">   
                                                            <figure>
                                                                <a class="btn" href="{{route('list.edit',[$personalist->id])}}"><i class="fa fa-trash"></i></a>
                                                                <figcaption> Delete </figcaption>
                                                            </figure>
                                                            <figure>
                                                                <a class="btn" href="{{route('list.destroy',[$personalist->id])}}"><i class="fa fa-trash"></i></a>
                                                                <figcaption> Delete </figcaption>
                                                            </figure>
                                                        </div> --}}

                                                    </td>
                                                {{-- </form> --}}


                                                {{-- <td> --}}
                                                    {{-- <form action="{{ route('personalists.destroy',$personalist->id) }}" method="POST">
                                                        <a class="btn btn-sm btn-primary " href="{{ route('personalists.show',$personalist->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                        <a class="btn btn-sm btn-success" href="{{ route('personalists.edit',$personalist->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                    </form> --}}
                                                {{-- </td> --}}
                                            </tr>
                                        @endforeach
                                        
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {{-- {!! $personalists->links() !!} --}}
            </div>
        </div>
    </div>
@endsection

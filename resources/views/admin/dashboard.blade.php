@extends('adminlte::page')

@section('title', 'Dashboard')


@section('content_header')
    @if(!isset($queryResult))
        <h1>Dashboard</h1>
    @else
        <h1>Resultados de su búsqueda</h1>
    @endif
@stop

@section('content')
    @if(!isset($queryResult))
        <h2>Panel de administración</h2>
    @endif
    @if(isset($queryResult))
        <div class="row">
            @foreach($queryResult as $product)
                <div class="col-md-4 col-xs-12">
                    <div class="card-block alert-dark" style="width: auto; height: 95%; ">
                        <div class="card-body">
                            <h5 class="card-title col-12">{{$product->getName()}}</h5>
                            <h6 class="card-subtitle col-6 mb-2 text-muted">{{$product->getCode()}}</h6>
                            <p class="card-text">{{$product->getDescription()}}</p>
                            <form action="{{route('stock-report',['product_id' => $product->getId()])}}" method="POST">
                                @csrf
                                <input type="submit" class="btn btn-outline-warning btn-sm d-inline-block" role="button"
                                       value="Detalles">
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
    <div class="row justify-content-md-center">
        @if($errors->any())
            <div class="card col-md-6 alert alert-warning">
                <div class="row justify-content-center" data-dismiss="alert">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
    </div>


@stop

@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <h1>Product Detail</h1>
        <div class="panel pane-primary">
            <div class="panel-body">
                <div class="panel-heading"><h1>{{title_case('Products'.$product->id)}}</h1></div>

                            <ul>
                                <li>Name: {{ $product->name }}</li>
                                <li>Description: {{ $product->description}}</li>
                                <li>Price: {{ $product->price}}</li>
                                <li>Producedon: {{$product->producedon}}</li>
                            </ul>
                </div>

            </div>

            </div>
        </div>
@endsection

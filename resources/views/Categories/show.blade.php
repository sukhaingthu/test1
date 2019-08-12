@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        @if(\Session::has('success'))
        <div class="alert alert-success">
            {{\Session::get('success')}}
        </div>
        @endif
        <h1>Product Lists</h1>
        <div class="panel panel-primary">
            <div class="panel-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Name</td>
                            <td>Category</td>
                            <td>Description</td>
                            <td>Price</td>
                            <td>Producedon</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach( $products as $product )
                            <tr>
                                <td> {{ $product->id}}</td>
                                <td> {{ $product->name}}</td>
                                <td> <a href="{{action('CategoryController@show',$product->category->id)}}">
                                {{$product->category->name}}</a></td>
                                <td>Description : {{ $product->description }}</td>
                                <td>Price : {{ $product->price }} MMK</td>
                                <td>Producedon : {{ $product->producedon }}</td>
                                <td><a href="{{action('ProductController@show',$product->id)}}" class="btn btn-primary">Detail</a></td>
                            </tr>
                        
                            @endforeach
                            {{ $products->links()}}
                            </tbody>
                        </table>
                </div>
            </div>
            <a href="{{action('ProductController@create')}}" class="btn btn-success">Create</a>
        </div>
    </div>
@endsection
    

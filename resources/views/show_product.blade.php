@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-white bg-dark font-weight-bold">{{ __('Product Detail') }}</div>

                <div class="card-body">
                    <div class="d-flex justify-content-around">
                      <div class="">
                        <img src="{{ url('storage/' . $product->image)}}" alt="" width="200px" > 
                </div>
                <div class="">
    <a href="{{ route('create_product') }}">
    <button class="btn btn-outline-primary" type="submit">Create Product</button></a>
    <a href="{{route('index_product')}}"type="submit">
    <button class="btn btn-outline-secondary" >index Product</button></a>
    <div class="">
    <h1>{{$product->name}}</h1>
    <h6>Deskripsi: {{$product->description}}</h6>
    <h3>Harga: Rp{{$product->price}}</h3>
    <hr>
    <p>Stock: {{$product->stock}}</p>
    @if (!Auth::user()->is_admin)
    <form action="{{route('add_to_cart', $product)}}" method="post">
        @csrf
        <div class="input-group mb-3">
        <input type="number" class="form-control" aria-describedby="basic-addon2" name="amount" value=1>
        <div class="input-group-append">
        <button class="btn btn-outline-success" type="submit">Add to Cart</button>
        </div>
        </div>
    </form>
    @else
    <form action="{{route('edit_product',  $product)}}" method="get">
        <button class="btn btn-outline-primary" type="submit">Edit Product</button>
    </form>
    @endif
    
    @if ($errors->any())
    @foreach ($errors->all() as $error)
    <p>{{$error}}</p>
        
    @endforeach 
    @endif
</div>

@endsection

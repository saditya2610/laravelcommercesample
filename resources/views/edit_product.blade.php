@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-white bg-dark font-weight-bold">{{ __('Update Product') }}</div>

    <div class="card-body">
    <form action="{{route('update_product', $product)}}" method="post" enctype="multipart/form-data" >
        @method('patch')
        @csrf
        <div class="form-group">
    <label for="Name">Name :</label>
    <input type="text" name="name" class="form-control" value="{{$product->name}}">
</div>
    <div class="form-group">
    <label for="Description">Description :</label>
    <input type="text" name="description" class="form-control" value="{{$product->description}}">
</div>
    <div class="form-group">
    <label for="Price">Price :</label>
    <input type="number" name="price" class="form-control" value={{$product->price}}>
    </div>
    <div class="form-group">
    <label for="Stock">Stock :</label>
    <input type="number" name="stock" class="form-control" value={{$product->stock}}>
    </div>
    <div class="form-group">
    <label for="Image">Image :</label>
    <input type="file" class="form-control" name="image">
    </div>
    
    <button class="btn btn-outline-success" type="submit">Update data</button>
</form>

@endsection

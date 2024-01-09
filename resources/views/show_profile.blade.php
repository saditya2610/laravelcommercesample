@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-white bg-primary font-weight-bold">{{ __('Profile')}}</div>

    <div class="card-body">
    @if ($errors->any())
    @foreach ($errors->all() as $error)
    <p>{{$error}}</p>
        
    @endforeach 
    @endif

    <p>Name: {{$user->name}}</p>
    <p>Email: {{$user->email}}</p>
    <p>Role: {{$user->is_admin ? 'Admin' : 'Member'}}</p>

    <form action="{{route('edit_profile')}}" method="post">
    @csrf
    <div class="form-group">
    <label>Name</label>
    <input class="form-control" type="text" name="name" value="{{$user->name}}">
</div>
    <div class="form-group">
    <label >Password</label>
    <input class="form-control" type="password" name="password" >
</div>
<div class="form-group">
    <label >Confirm Password</label>
    <input class="form-control" type="password" name="password_confirmation" >
</div>
    <button class="btn btn-primary mt-3" type="submit">submit change profile</button>
    </form>
</div>
</div>
        </div>
    </div>
    </div>
@endsection

@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-white bg-dark font-weight-bold">{{ __('Orders') }}
                </div>

    <div class="card-body m-auto">
    @foreach ($orders as $order)
    <div class="card mb-2" style="width: 30rem;">
    <div class="card-body">
        <a href="{{ route('show_order' , $order)}}">
            <h5 class="card-title">ID: {{$order->id}}</h5>
        </a>
            <h6 class="card-subtitle mb-2 text-muted">User: {{$order->user->name}} </h6>
            <p>Waktu Pesan: {{$order ->created_at}} </p>
   
        @if ($order->is_paid ==true)
        <p class="card-text">Paid</p>
        @else
        <p class="card-text">Unpaid</p>
        @if ($order->payment_receipt)
        <div class="d-flex justify-content-around">
            <a href="{{url('storage/' . $order->payment_receipt)}}" class="btn btn-primary">Show Payment Receipt
            </a>
            @if (Auth::user()->is_admin)
                
            
        <form action="{{route('confirm_payment', $order)}}" method="post">
            @csrf
            <button class="btn btn-success" type="submit">Confirm</button>
            </form>
            @endif
        </div>
        @endif
        @endif

    </div>
    </div>
    @endforeach
    </div>
            </div>
        </div>
        </div>
        </div>
@endsection
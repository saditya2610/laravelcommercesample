@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-white bg-dark font-weight-bold">{{ __('Order Detail') }}
                </div>

        @php
            $total_price = 0;
        @endphp

    <div class="card-body">
    <h5 class="card-title">ID: {{$order->id}} </h5>
    <h6 class="card-subtitle mb-2 text-muted">User: {{$order->user->name}} </h6>
    
    @if ($order->is_paid ==true)
    <p class="card-text">Paid</p>
    @else
    <p class="card-text">Unpaid</p>
    @endif
    <hr>
    @foreach ($order->transactions as $transaction)
        <p class="card-text">Produk: {{$transaction->product->name}} </p>    
        <p class="card-text">Jumlah: {{$transaction->amount}} </p>    
        @php
            $total_price +=$transaction->product->price * $transaction->amount;
        @endphp
        @endforeach
        <hr>
        <p>Total: Rp {{$total_price}}
        </p>
        <hr>
    @if ($order->is_paid == false && $order ->payment_receipt == null && Auth::user()->is_admin)
        <form action="{{route('submit_payment_receipt', $order)}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
        <label for="payment_receipt">Upload Your Payment Receipt</label>
        <input class="form-control" type="file" name="payment_receipt" id="payment_receipt">
        </div>
        <button class="btn btn-outline-success mt-3" type="submit">Terima Pembayaran</button>
    </form>
    @endif
</div>
</div>
</div>
    @endsection
@extends('layouts.main')

@section('container')
    @include('cashier.partials.navbar')

    <div class="container-xxl py-5 bg-dark hero-header mb-5">
        <div class="container text-center my-5 pt-5 pb-4">
            <h1 class="display-3 text-white mb-3 animated slideInDown">MyOrders</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center text-uppercase">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">MyOrder</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="container">
        <h1 class="text-center mb-4">All Orders with Order Items</h1>
        <h2 class="text-center mb-3">Completed Orders:</h2>
        
        <?php
            // Filter orders for today and yesterday using PHP
            $todayOrders = $orders->where('status', 'done')->filter(function ($order) {
                return $order->created_at->format('Y-m-d') === now()->format('Y-m-d');
            });

            $yesterdayOrders = $orders->where('status', 'done')->filter(function ($order) {
                return $order->created_at->format('Y-m-d') === now()->subDay()->format('Y-m-d');
            });
            
            // Calculate total amounts
            $todayTotal = $todayOrders->sum('total_amount');
            $yesterdayTotal = $yesterdayOrders->sum('total_amount');
        ?>

        <h3 class="text-center">Today's Total Amount: {{ number_format($todayTotal, 2) }}</h3>
        <h3 class="text-center">Yesterday's Total Amount: {{ number_format($yesterdayTotal, 2) }}</h3>

        @foreach($orders->where('status', 'done') as $order)
            <div class="card mb-4">
                <div class="card-body">
                    <h3 class="card-title">Order Details</h3>
                    <p class="card-text"><strong>ID Order:</strong> {{ $order->id }}</p>
                    <p class="card-text"><strong>Customer Name:</strong> {{ $order->user->nama }}</p>
                    <p class="card-text"><strong>Table Number:</strong> {{ $order->nomor_meja }}</p>
                    <p class="card-text"><strong>Total Amount:</strong> {{ $order->total_amount }}</p>
                    <p class="card-text"><strong>Status:</strong> {{ $order->status }}</p>
                    <a href="{{ route('kasirorders.showItems', ['orderId' => $order->id]) }}" class="btn btn-primary btn-sm">View Order Items</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection

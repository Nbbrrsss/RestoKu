@extends('dashboard.layouts.main')
@section('container')
    <div class="container">
        <h1>All Orders with Order Items</h1>
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
        <div class="row">
            <div class="col-md-6">
                <h2>Pending Orders:</h2>
                @foreach($orders->where('status', 'unpaid') as $order)
                    <div class="card mb-3">
                        <div class="card-body">
                            <h3 class="card-title">Order Details</h3>
                            <p class="card-text">ID Order: {{ $order->id }}</p>
                            <p class="card-text">Customer Name: {{ $order->user->nama }}</p>
                            <p class="card-text">Table Number: {{ $order->nomor_meja }}</p>
                            <p class="card-text">Total Amount: {{ $order->total_amount }}</p>
                            <p class="card-text">Status: {{ $order->status }}</p>
                            <a href="{{ route('orders.showItems', ['orderId' => $order->id]) }}" class="btn btn-primary">View Order Items</a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-md-6">
                <h2>Completed Orders:</h2>
                @foreach($orders->where('status', 'paid') as $order)
                    <div class="card mb-3">
                        <div class="card-body">
                            <h3 class="card-title">Order Details</h3>
                            <p class="card-text">ID Order: {{ $order->id }}</p>
                            <p class="card-text">Customer Name: {{ $order->user->nama }}</p>
                            <p class="card-text">Table Number: {{ $order->nomor_meja }}</p>
                            <p class="card-text">Total Amount: {{ $order->total_amount }}</p>
                            <p class="card-text">Status: {{ $order->status }}</p>
                            <a href="{{ route('orders.showItems', ['orderId' => $order->id]) }}" class="btn btn-primary">View Order Items</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

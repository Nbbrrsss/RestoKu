@extends('layouts.main')
@section('container')
    <!-- Navbar & Hero Start -->
    @include('partials.navbar')
    <div class="container-xxl py-5 bg-dark hero-header mb-5">
        <div class="container text-center my-5 pt-5 pb-4">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Payment Gateway</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center text-uppercase">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Order</li>
                </ol>
            </nav>
        </div>
    </div>

    
    <div class="container">
        <h1>Order Details</h1>
        <h2>Order Information</h2>
        <p>ID Order: {{ $order->id }}</p>
        <p>Customer Name: {{ $order->user->nama }}</p>
        <p>Table Number: {{ $order->nomor_meja }}</p>
        <p>Total Amount: {{ $order->total_amount }}</p>
        <p>Status: {{ $order->status }}</p>
        <h2>Order Items</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Menu Image</th>
                    <th>Menu Name</th>
                    <th>Quantity</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->orderItems as $orderItem)
                    <tr>
                        <td>{{ $orderItem->id }}</td>
                        <td>
                            <img src="{{ asset('img/menu/' . $orderItem->food->gambar_menu) }}" alt="Gambar Menu" style="max-width: 100px; max-height: 100px;">
                        </td>
                        <td>{{ $orderItem->food->nama_menu }}</td>
                        <td>{{ $orderItem->quantity }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
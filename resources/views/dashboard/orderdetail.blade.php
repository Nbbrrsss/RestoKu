<!-- orderdetail.blade.php -->

@extends('dashboard.layouts.main')
@section('container')
    <div class="container">
        <h1>Order Details</h1>
        <h2>Order Information</h2>
        <p>ID Order: {{ $order->id }}</p>
        <p>Customer Name: {{ $order->user->nama }}</p>
        <p>Table Number: {{ $order->nomor_meja }}</p>
        <p>Total Amount: {{ $order->total_amount }}</p>
        <p>Status: {{ $order->status }}</p>
        <!-- Tambahkan form untuk mengubah status -->
        <form action="{{ route('update.status', $order->id) }}" method="post">
            @csrf
            @method('PUT')
            <label for="status">Change Status:</label>
            <select name="status" id="status">
                <option value="unpaid" {{ $order->status === 'unpaid' ? 'selected' : '' }}>unpaid</option>
                <option value="paid" {{ $order->status === 'paid' ? 'selected' : '' }}>paid</option>
            </select>
            <button type="submit">Update</button>
        </form>
        
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

@extends('layouts.main')
@section('container')

    @include('partials.navbar')
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
        <h1>All Orders with Order Items</h1>

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
                            <a href="{{ route('myorders.showItems', ['orderId' => $order->id]) }}" class="btn btn-primary">View Order Items</a>
                            <button type="submit" class="btn btn-primary" id="bayar-button">Bayar</button>
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
                            <a href="{{ route('myorders.showItems', ['orderId' => $order->id]) }}" class="btn btn-primary">View Order Items</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div id="snap-container"></div>

    <script type="text/javascript">
        // For example trigger on button clicked, or any time you need
        var payButton = document.getElementById('bayar-button');
        payButton.addEventListener('click', function () {
        // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token.
        // Also, use the embedId that you defined in the div above, here.
        window.snap.embed('YOUR_SNAP_TOKEN', {
            embedId: 'snap-container',
            onSuccess: function (result) {
            /* You may add your own implementation here */
            alert("payment success!"); console.log(result);
            },
            onPending: function (result) {
            /* You may add your own implementation here */
            alert("wating your payment!"); console.log(result);
            },
            onError: function (result) {
            /* You may add your own implementation here */
            alert("payment failed!"); console.log(result);
            },
            onClose: function () {
            /* You may add your own implementation here */
            alert('you closed the popup without finishing the payment');
            }
        });
        });
    </script>
@endsection
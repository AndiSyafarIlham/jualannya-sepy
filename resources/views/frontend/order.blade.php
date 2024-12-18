@extends('frontend.main.master')
@section('title', 'Product')
@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4 text-primary">Your Orders</h1>
    <table class="table table-striped table-bordered table-hover bg-light rounded shadow-sm">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Order ID</th>
                <th scope="col">Customer Name</th>
                <th scope="col">Product Image</th>
                <th scope="col">Product Name</th>
                <th scope="col">Shipping</th>
                <th scope="col">Total Price</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr>
                <th scope="row">{{$order->id}}</th>
                <td>{{auth()->user()->name}}</td>
                <td><img src="{{$order->product->getFirstMediaUrl('product_image', 'thumb')}}" alt="{{$order->product->name}} Image" class="img-fluid rounded" style="max-height: 100px; max-width: 100px;"></td>
                <td>{{$order->product->name}}</td>
                <td>{{$order->shipping->name}}</td>
                <td>Rp {{$order->product->price}}</td>
                <td><span class="badge bg-{{$order->status == 'unpaid' ? 'danger' : 'success'}}">{{$order->status}}</span></td>
                <td>
                    <button type="button" id="pay-button-{{$order->id}}" class="btn btn-primary btn-sm pay-now-btn" data-order-id="{{$order->id}}">
                        Pay Now
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>

<script type="text/javascript">
    @foreach($orders as $order)
    document.getElementById('pay-button-{{$order->id}}').addEventListener('click', function () {
        // Use the snapToken passed from the controller
        window.snap.pay("d20c8fe4-9564-44b2-a7ca-77257afae678", {
            onSuccess: function(result) {
                alert("Payment success!");
                console.log(result);
            },
            onPending: function(result) {
                alert("Waiting for your payment!");
                console.log(result);
            },
            onError: function(result) {
                alert("Payment failed!");
                console.log(result);
            },
            onClose: function () {
                alert('You closed the popup without finishing the payment');
            }
        });
    });
    @endforeach
</script>

@endsection

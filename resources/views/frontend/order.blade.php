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
                    @if($order->status == "unpaid")
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#payModal{{$order->id}}">
                        Pay Now
                    </button>
                    @endif
                </td>
            </tr>
            <div class="modal fade" id="payModal{{$order->id}}" tabindex="-1" aria-labelledby="modalLabel{{$order->id}}" aria-hidden="true">
                <div class="modal-dialog">
                    <form class="row g-3" action="{{route('pay')}}" method="post" enctype="multipart/form-data">
                        <div class="modal-content rounded-3">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalLabel{{$order->id}}">Pay for Order: Rp {{$order->price}}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>
                                    Please make payment for the product <b>{{$order->product->name}}</b> and shipping fee <b>Rp.{{$order->price}},00</b> to <b>{{auth()->user()->name}}, DANA: 085291810469</b>
                                </p>
                                @csrf
                                <input type="hidden" name="order_id" value="{{$order->id}}">
                                <div id="preview-container" style="display: none; margin-top: 20px;">
                                    <h4>Payment Proof Preview</h4>
                                    <img id="preview-image" src="#" alt="Preview" class="img-fluid rounded" style="max-width: 100%; max-height: 200px;">
                                </div>
                                <div class="mb-3 mt-3">
                                    <label for="formFile" class="form-label">Upload Payment Proof</label>
                                    <input class="form-control" type="file" id="formFile" name="proof_of_payment">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Submit Payment</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    const fileInput = document.getElementById('formFile');
    const previewContainer = document.getElementById('preview-container');
    const previewImage = document.getElementById('preview-image');

    fileInput.addEventListener('change', (event) => {
        const file = event.target.files[0];
        const reader = new FileReader();

        reader.onload = (event) => {
            previewContainer.style.display = 'block';
            previewImage.src = event.target.result;
        };

        reader.readAsDataURL(file);
    });
</script>
@endsection

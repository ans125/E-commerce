@extends('front.layouts.app')
@section('content')
<section class="section-5 pt-3 pb-3 mb-3 bg-white">
    <div class="container">
        <div class="light-font">
            <ol class="breadcrumb primary-color mb-0" style="padding-top: 2rem !important;">
                <li class="breadcrumb-item"><a class="white-text" href="{{ route('front.home') }}">Home</a></li>
                <li class="breadcrumb-item"><a class="white-text" href="{{ route('front.cart') }}">Shop</a></li>
                <li class="breadcrumb-item">Cart</li>
            </ol>
        </div>
    </div>
</section>

<section class="section-9 pt-4">
    <div class="container">
        <div class="row">
            @if (Session::has('success'))
            <div class="col-md-12">
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    {{ Session::get('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
            @endif

            <div class="col-md-8">
                <div class="table-responsive">
                    <table class="table" id="cart">
                        <thead>
                            <tr>
                                <th>Service</th>
                                <th>Price</th>
                                {{-- <th>Quantity</th> --}}
                                <th>Total</th>
                                <th>Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(!empty($cartContent))
                            @foreach ($cartContent as $item)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center justify-content-center">
                                        {{-- <img src="images/product-1.jpg" width="" height=""> --}}
                                        <h2>{{ $item->name }}</h2>
                                    </div>
                                </td>
                                <td>{{ $item->price }}</td>
                                <td>PKR {{ $item->price * $item->qty }}</td>
                                <td>
                                    <button class="btn btn-sm btn-danger" onclick="deleteItem('{{ $item->rowId }}')"><i class="fa fa-times"></i></button>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card cart-summery">
                    <div class="sub-title">
                        <h2 class="bg-white">Booking Summary</h2>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between pb-2">
                            <div>Subtotal</div>
                            <div>PKR {{ Cart::subtotal() }}</div>
                        </div>
                        <div class="d-flex justify-content-between summery-end">
                            <div>Total</div>
                            <div>PKR {{ Cart::subtotal() }}</div>
                        </div>
                        <div class="pt-5">
                            <a href="{{route('front.checkout') }}" class="btn-dark btn btn-block w-100">Proceed to Checkout</a>
                        </div>
                    </div>
                </div>
                {{-- <div class="input-group apply-coupon mt-4">
                    <input type="text" placeholder="Coupon Code" class="form-control">
                    <button class="btn btn-dark" type="button" id="button-addon2">Apply Coupon</button>
                </div> --}}
            </div>
        </div>
    </div>
</section>

<style>
    table#cart th, table#cart td {
        text-align: center;
        vertical-align: middle;
    }

    table#cart th {
        width: auto;
    }

    table#cart td {
        padding: 15px;
    }

    table#cart td button.btn {
        margin: 0 auto;
    }

    .cart-summery .card-body {
        padding: 20px;
    }
</style>

@endsection

@section('customjs')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Add item quantity
        $('.add').click(function() {
            var qtyElement = $(this).parent().prev(); // Qty Input
            var qtyValue = parseInt(qtyElement.val());
            if (qtyValue < 10) {
                qtyElement.val(qtyValue + 1);
                updateCart($(this).data('id'), qtyElement.val());
            }
        });

        // Subtract item quantity
        $('.sub').click(function() {
            var qtyElement = $(this).parent().next(); // Qty Input
            var qtyValue = parseInt(qtyElement.val());
            if (qtyValue > 1) {
                qtyElement.val(qtyValue - 1);
                updateCart($(this).data('id'), qtyElement.val());
            }
        });

        // Update cart item
        function updateCart(rowId, qty) {
            $.ajax({
                url: '{{ route("front.updateCart") }}',
                type: 'post',
                data: { rowId: rowId, qty: qty },
                dataType: 'json',
                success: function(response) {
                    window.location.href = '{{ route("front.cart") }}';
                },
                error: function(xhr, status, error) {
                    console.error(error);
                    alert('An error occurred. Please try again.');
                }
            });
        }

        // Delete cart item
        deleteItem = function(rowId) {
            if (confirm("Are you sure you want to delete this item?")) {
                $.ajax({
                    url: '{{ route("front.deleteItem.cart") }}',
                    type: 'post',
                    data: {
                        rowId: rowId,
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.status === true) {
                            window.location.href = '{{ route("front.cart") }}';
                        } else {
                            alert(response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                        alert('An error occurred. Please try again.');
                    }
                });
            }
        }
    });
</script>
@endsection

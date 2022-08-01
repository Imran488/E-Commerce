@extends('frontend.master')
@section('contents')
    <br>
    <main class="my-8">
        <div class="container px-6 mx-auto">
            <div class="flex justify-center my-6">
                <div class="flex flex-col w-full p-8 text-gray-800 bg-white shadow-lg pin-r pin-y md:w-4/5 lg:w-4/5">
                    @if ($message = Session::get('success'))
                        <div class="p-4 mb-3 bg-green-400 rounded">
                            <p class="text-green-800">{{ $message }}</p>
                        </div>
                    @endif

                    <div class="button-group mt-2 mb-2">
                        <a href="{{ route('clear.cart') }}" class="btn btn-danger">
                            Clear All
                        </a>
                    </div>

                    <h4 class="text-center text-bold">My Cart List</h4>
                    <div class="d-flex ml-2">
                        @php
                        $sub_total= 0;
                        @endphp
                        <table class="table border">
                            <thead>
                                <th>Product-id</th>
                                <th>Product Name</th>
                                <th>Unit-Price</th>
                                <th>Offers</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Remove</th>
                            </thead>
                            <tbody>
                                @if(!empty($carts))
                                @foreach($carts as $key=>$cart)
                                <tr>
                                    <td>{{ $cart['product_id']}}</td>
                                    <td>{{ $cart['product_name'] }}</td>
                                    <td>{{ $cart['price'] }}</td>
                                    @php
                                    (int)$sub_total += ($cart['price'] * $cart['product_quantity']) - ($cart['price'] * $cart['product_quantity'] * ($cart['offer']/100));
                                    @endphp
                                    <td>{{ $cart['offer'] }} %</td>
                                    <td>{{ $cart['product_quantity'] }}</td>
                                    <td>{{ ($cart['price'] * $cart['product_quantity']) - ($cart['price'] * $cart['product_quantity'] * ($cart['offer']/100)) }}</td>
                                    <td>
                                        <a href="{{ route('user.remove.cart',$key) }}" class="btn btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <p class="text-danger">No product into the cart</p>
                                @endif
                            </tbody>
                        </table>

                    </div>

                </div>
                <div class="sub_total ml-2 p-2 text-center border">
                    <h4 class="border p-2">Order Summary:</h4>
                    <h5 class="border p-2">Total-Product: {{ session()->has('cart') ? count(session()->get('cart')):0 }}</h5>
                    <h5 class="border p-2">Sub-Total: {{ (int)$sub_total }}</h5>
                    <h5 class="border p-2">Shipping Fee: 0</h5>
                    <h5 class="border p-2">Total: {{ (int)$sub_total }} </h5>
                    <a href="{{ route('user.checkout') }}" class="btn btn-success w-100">
                        CheckOut
                    </a>
                </div>
            </div>
        </div>
    </main>
    <br>
@endsection

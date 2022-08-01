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
                    <h4 class="text-center text-bold">My Order List</h4>
                    <div class="d-flex ml-2">
                        @php
                        $grand_total= 0;
                        @endphp
                        <table class="table border">
                            <thead>
                                <th>Product-id</th>
                                <th>Product Name</th>
                                <th>Unit-Price</th>
                                <th>Offer</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Payment</th>
                                <th>Order-Status</th>
                                <th>Remove</th>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                <tr>
                                    <td>{{ $order->product_id }}</td>
                                    <td>{{ $order->product_name }}</td>
                                    <td>{{ $order->price }}</td>
                                    <td>{{ $order->offer }} %</td>
                                    <td>{{ $order->quantity }}</td>
                                    <td>{{ $order->total }}</td>
                                    @php
                                    (int)$grand_total += ($order->price * $order->quantity) - ($order->price * $order->quantity * ($order->offer/100));
                                    @endphp
                                    <td>{{ $order->payment_status }}</td>

                                    @if($order->order_status != 'accepted')
                                    <td>pending</td>
                                    @else
                                    <td class="text-center text-success">Confirmed</td>
                                    @endif
                                    <td>
                                        <a href="{{ route('delete.oders',$order->id) }}" class="btn btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                    <div class="sub_total ml-2 p-2 text-center border">
                        <h4 class="border p-2">Payment Summary:</h4>
                        <h5 class="border p-2">Total-Product: {{ $total_product  }}</h5>
                        <h5 class="border p-2">Sub-Total: {{ (int)$grand_total }}</h5>
                        <h5 class="border p-2">Shipping Fee: 0</h5>
                        <h5 class="border p-2">Total: {{ (int)$grand_total }} </h5>
                        <form action="{{ route('stripe.post') }}" method="post">
                            <button type="submit" class="btn btn-primary mb-2">
                                Proceed to Pay
                            </button>

                            @foreach ($orders as $order)
                                @csrf
                                <div style="display:none;">
                                    <input type="hidden" value="{{ auth()->user()->name }}" name="name">
                                    <input type="hidden" value="{{ (int)$grand_total }}" name="amount">
                                </div>
                            @endforeach
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <br>
@endsection

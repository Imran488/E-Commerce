@extends('admin.master')
@section('contents')
    <!-- table -->
    @php
        $total=0
    @endphp
    <section class="manage_table">
        <div id="divToPrint">
            <div class="report_header p-2">
                <h2 class="text-center">Cortexsof Limited</h2>
            </div>
            <table class="table table-borderless table-hover" id="report_table">
                <thead class="table-primary text-capitalize">
                    <tr class="text-center">
                        <th>customer id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Product id</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Order Status</th>
                        <th>Payment Status</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($orders as $order)
                        <tr class="text-center">
                            <td>{{ $order->customer_id }}</td>
                            <td>{{ $order->name }}</td>
                            <td>{{ $order->email }}</td>
                            <td>{{ $order->phone }}</td>
                            <td>{{ $order->product_id }}</td>
                            <td>{{ $order->product_name }}</td>
                            <td>{{ $order->price }}</td>
                            <td>{{ $order->quantity }}</td>
                            <td>{{ $total = $order['price'] * $order['quantity'] }}</td>
                            <td>{{ $order->order_status }}</td>
                            <td>{{ $order->payment_status }}</td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>



    </section>
    <br><br>
    <!-- button -->
    <section class="print_button">
        <button onclick="printOrder()" class="btn btn-warning text-white w-25 float-end">Print Now</button>
    </section>
    <br><br>
@endsection
<!-- script file -->
<script type="text/javascript">
    function printOrder() {
        var divToPrint = document.getElementById('divToPrint');
        var popupwin = window.open('', '_blank', 'width=1100, height=700');
        popupwin.document.open();
        popupwin.document.write(
            '<html><head><link href="http://127.0.0.1:8000/Backend/css/style.css" rel="stylesheet"></head><body onload="window.print()">' +
            divToPrint.innerHTML + '</html>');
        popupwin.document.close();
    }
</script>

<!-- jquery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
    integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js"
    integrity="sha512-BkpSL20WETFylMrcirBahHfSnY++H2O1W+UnEEO4yNIl+jI2+zowyoGJpbtk6bx97fBXf++WJHSSK2MV4ghPcg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function() {
        $('#report_table').DataTable();
    });
</script>

@extends('admin.master')
@section('contents')
<div class="myform">
    <!-- Validation Error Message -->
    <div class="message">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>

    <form action="{{ route('admin.store.service') }}" method="POST" enctype="multipart/form-data" class="text-capitalize">
        @csrf
        <div class="form-group">
            <label for="c_n1">Service Name</label>
            <input type="text" name="service_name" class="form-control" id="c_n1" placeholder="Enter Service Name" required>
        </div>

        <div class="form-group">
            <label for="c_n1">Service Price</label>
            <input type="text" name="price" class="form-control" id="c_n1" placeholder="Enter Service Price" required>
        </div>

        <div class="form-group">
            <label for="c_n1">Service Offer</label>
            <input type="text" name="offer" class="form-control" id="c_n1" placeholder="Enter Service Offer" required>
        </div>

        <div class="form-group">
            <label for="img1">Service Description</label>
            <input type="text" name="desc"  class="form-control" id="desc" placeholder="Enter Service Description" required>
        </div>


        <div class="form-group">
            <label for="img1">Service Image</label>
            <input type="file" name="image" accept="image/*" class="form-control" id="img1" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit Now</button>
    </form>
</div>
@endsection

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

    <form action="{{ route('admin.store.product') }}" method="POST" enctype="multipart/form-data" class="text-capitalize">
        @csrf
        <div class="form-group">
            <label for="c_n1">Product Name</label>
            <input type="text" name="product_name" class="form-control" id="c_n1" placeholder="Enter Product Name" required>
        </div>

        <div class="form-group">
            <label for="c_n1">Product Price</label>
            <input type="text" name="price" class="form-control" id="c_n1" placeholder="Enter Product Price" required>
        </div>

        <div class="form-group">
            <label for="c_n1">Product Offer</label>
            <input type="text" name="offer" class="form-control" id="c_n1" placeholder="Enter Product Offer" required>
        </div>

        <div class="form-group">
            <label for="img1">Product Description</label>
            <input type="text" name="desc"  class="form-control" id="desc" placeholder="Enter Product Description" required>
        </div>


        <div class="form-group">
            <label for="img1">Product Image</label>
            <input type="file" name="image" accept="image/*" class="form-control" id="img1" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit Now</button>
    </form>
</div>
@endsection

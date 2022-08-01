@extends('admin.master')
@section('contents')
<div class="myform">
    <form action="{{ route('admin.update.product',$product->id) }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="c_n1">Product Name</label>
            <input type="text" name="product_name" value="{{ $product->product_name }}" class="form-control" id="c_n1" placeholder="Enter Product Name" >
        </div>

        <div class="form-group">
            <label for="c_n1">Product Price</label>
            <input type="text" name="price" value="{{ $product->price }}" class="form-control" id="c_n1" placeholder="Enter Product Price" >
        </div>

        <div class="form-group">
            <label for="c_n1">Product Offer</label>
            <input type="text" name="offer" value="{{ $product->offer }}" class="form-control" id="c_n1" placeholder="Enter Product Offer" >
        </div>

        <div class="form-group">
            <label for="img1">Product Description</label>
            <input type="text" name="desc" value="{{ $product->desc }}"  class="form-control" id="desc" placeholder="Enter Product Description" >
        </div>


        <div class="form-group">
            <label for="img1">Product Image</label>
            <input type="file" name="image" value="{{ $product->image }}" accept="image/*" class="form-control" id="img1" >
        </div>
        <button type="submit" class="btn btn-primary">Submit Now</button>
    </form>
</div>
@endsection

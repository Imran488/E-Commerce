@extends('admin.master')
@section('contents')
<div class="myform">
    <form action="{{ route('admin.update.service',$service->id) }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="c_n1">Service Name</label>
            <input type="text" name="service_name" value="{{ $service->service_name }}" class="form-control" id="c_n1" placeholder="Enter Service Name" >
        </div>

        <div class="form-group">
            <label for="c_n1">Service Price</label>
            <input type="text" name="price" value="{{ $service->price }}" class="form-control" id="c_n1" placeholder="Enter Service Price" >
        </div>

        <div class="form-group">
            <label for="c_n1">Service Offer</label>
            <input type="text" name="offer" value="{{ $service->offer }}" class="form-control" id="c_n1" placeholder="Enter Service Offer" >
        </div>

        <div class="form-group">
            <label for="img1">Service Description</label>
            <input type="text" name="desc" value="{{ $service->desc }}"  class="form-control" id="desc" placeholder="Enter Service Description" >
        </div>


        <div class="form-group">
            <label for="img1">Service Image</label>
            <input type="file" name="image" value="{{ $service->image }}" accept="image/*" class="form-control" id="img1">
        </div>
        <button type="submit" class="btn btn-primary">Submit Now</button>
    </form>
</div>
@endsection

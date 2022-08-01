@extends('admin.master')
@section('contents')
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

<div class="myform">
    <form action="{{route('store.blog')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="img1">Blog Description</label>
            <input type="text" name="desc"  class="form-control" id="desc" placeholder="Enter Blog Description" required>
        </div>


        <div class="form-group">
            <label for="img1">Blog Image</label>
            <input type="file" name="image" accept="image/*" class="form-control" id="img1" required>
            <span>Image Should be (980*365)</span>
        </div>

        <div class="form-group">
            <label for="img1">Blog Date</label>
            <input type="date" name="date" id="date" class="form-control" placeholder="Enter Blog Date">
        </div>

        <button type="submit" class="btn btn-primary">Submit Now</button>
    </form>
</div>
@endsection

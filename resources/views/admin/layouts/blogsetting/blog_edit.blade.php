@extends('admin.master')
@section('contents')
<div class="myform">
    <form action="{{ route('update.blog',$blog->id) }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="img1">Blog Description</label>
            <input type="text" name="desc" value="{{ $blog->desc }}"  class="form-control" id="desc" placeholder="Enter blog Description" >
        </div>


        <div class="form-group">
            <label for="img1">Blog Image</label>
            <input type="file" name="image" value="{{ $blog->image }}" accept="image/*" class="form-control" id="img1" >
            <span>Image Should be (980*365)</span>
        </div>

        <div class="form-group">
            <label for="img1">Blog Date</label>
            <input type="date" name="date" value="{{ $blog->date }}" id="date" class="form-control" placeholder="Enter Blog Date">
        </div>

        <button type="submit" class="btn btn-primary">Submit Now</button>
    </form>
</div>
@endsection

@extends('admin.master')
@section('contents')
<div class="myform">
    <form action="{{ route('update.logo',$logo->id) }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="img1">Logo Description</label>
            <input type="text" name="desc" value="{{ $logo->desc }}"  class="form-control" id="desc" placeholder="Enter Logo Description" >
        </div>


        <div class="form-group">
            <label for="img1">Logo Image</label>
            <input type="file" name="image" value="{{ $logo->image }}" accept="image/*" class="form-control" id="img1" >
        </div>
        <button type="submit" class="btn btn-primary">Submit Now</button>
    </form>
</div>
@endsection

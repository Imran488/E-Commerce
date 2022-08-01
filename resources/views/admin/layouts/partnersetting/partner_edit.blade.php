@extends('admin.master')
@section('contents')
<div class="myform">
    <form action="{{ route('update.partner',$partner->id) }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="img1">Company Name</label>
            <input type="text" name="name" value="{{ $partner->name }}"  class="form-control" id="name" placeholder="Enter Company Name" >
        </div>


        <div class="form-group">
            <label for="img1">Company Logo</label>
            <input type="file" name="image" value="{{ $partner->image }}" accept="image/*" class="form-control" id="img1"  >
        </div>
        <button type="submit" class="btn btn-primary">Submit Now</button>
    </form>
</div>
@endsection

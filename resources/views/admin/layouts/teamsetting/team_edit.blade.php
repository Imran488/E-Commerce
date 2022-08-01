@extends('admin.master')
@section('contents')
<div class="myform">
    <form action="{{ route('update.team',$team->id) }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="img1">Team Member Name</label>
            <input type="text" name="name" value="{{ $team->name }}"  class="form-control" id="desc" placeholder="Enter Logo Description" >
        </div>


        <div class="form-group">
            <label for="img1">Team Member Image</label>
            <input type="file" name="image" value="{{ $team->image }}" accept="image/*" class="form-control" id="img1">
        </div>

        <div class="form-group">
            <label for="img1">Team Member Designation</label>
            <input type="text" name="designation" value="{{ $team->designation }}"  class="form-control" id="desc" placeholder="Enter Logo Description" >
        </div>


        <button type="submit" class="btn btn-primary">Submit Now</button>
    </form>
</div>
@endsection

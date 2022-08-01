@extends('admin.master')
@section('contents')

<div class="view m-4">
    <div class="image">
        <img src="{{ asset('/uploads/blog/'.$blog->image ) }}" alt="" class="w-50 h-50">
    </div>
    <div class="image_desc">
        <form action="{{ route('change.blog.image',$blog->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="file" name="image" class="w-25 mt-2 form-control" >
            <span>Image Should be (980*365)</span>
            <button type="submit" class="btn btn-primary mt-2">Change</button>
        </form>
    </div>
</div>
@endsection

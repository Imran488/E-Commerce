@extends('frontend.master')
@section('contents')

<section id="blog" class="blog-area blog-area-three white-bg pb-70">
    <div class="container">
        <div class="section-title">
            <span>Latest News</span>
            <h2>Read The Latest Articles From Us</h2>
        </div>

        <div class="row">
            @foreach ($blogs as $blog)
            <div class="col-lg-4 col-md-6">
                <div class="single-blog">
                    <div class="blog-img">
                        <a href="#">
                            <img src="{{url('uploads/blog/' . $blog->image)}}" alt="Image">
                        </a>
                    </div>

                    <div class="blog-content">
                        <span>{{$blog->date}}</span>
                        <h3><a href="#">{{$blog->desc}}</a></h3>
                    </div>
                </div>
            </div>
            @endforeach
            <div>
                <a style="float: right" href="{{route('blog')}}"><i class="bx bx-chevrons-left"></i> Read More <i class="bx bx-chevrons-right"></i></a>
            </div>

        </div>
    </div>
</section>

@endsection

<section class="banner-area banner-area-three">
    <div class="container-fluid">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1">
                </button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2">
                </button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                    aria-label="Slide 3">
                </button>
            </div>

            <div class="carousel-inner">
                @foreach ($service as $s)
                @if($loop->first)
                <div class="carousel-item active">
                @else
                <div class="carousel-item">
                @endif
                    <img src="{{url('uploads/services/' . $s->image)}}" class="d-block w-100" alt="...">
                    <div class="absolute-div">

                        <div class="carousel-caption">
                           <p class="line-1 anim-typewriter">{{$s->desc}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

        </div>

    </div>
</section>

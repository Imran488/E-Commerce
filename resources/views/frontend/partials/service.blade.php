<section id="service" class="solution-area solution-area-three white-bg pt-100 pb-70">
    <div class="container">
        <div class="section-title">
            <span>Our Services</span>
            <h2>We Offer a Wide Range of Services</h2>
        </div>

        <div class="row">
            @foreach ($service as $s)
            <div class="col-sm-3 d-flex align-items-lg-stretch">
                <div class="single-approach-box overly-one">
                    <div class="overly-two">
                        <div class="icon">
                            <img src="{{url('uploads/services/' . $s->image)}}" alt="Image">
                        </div>
                        <h3 style="color: red">{{$s->service_name}}</h3>
                        <p style="color: black">{{$s->desc}}</p>
                        <div class="approach-shape">
                            <img src="{{url('uploads/services/' . $s->image)}}" alt="Image">
                        </div>
                        <br>
                        <a href="{{route('single-service', $s->slug)}}" class="default-btn">
                            <span>View Details</span>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

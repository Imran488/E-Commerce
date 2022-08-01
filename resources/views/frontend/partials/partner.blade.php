<div class="partner-area bg-color ptb-70">
    <div class="container">
        <div class="section-title">
            <span>Our Partners</span>
            <h2>We Have Wide Range of Partners</h2>
        </div>
        <div class="partner-slider owl-theme owl-carousel">
            @foreach ($partners as $partner)
            <div class="partner-item">
                <a href="#">
                    <img src="{{url('uploads/partner/' . $partner->image)}}" alt="Image">
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>

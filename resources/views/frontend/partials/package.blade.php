<section id="package" class="pricing-area white-bg pt-100 pb-70">
    <div class="container">
        <div class="section-title">
            <span>Our Packages</span>
            <h2>Our Package Plans</h2>
        </div>

        <div class="row">
            @foreach ($packages as $package)


            <div class="col-sm-4">
                <div class="single-pricing overly-one">
                    <div class="overly-two">
                        <div class="pricing-title">
                            <h2>{{$package->title}}</h2>
                            <h3>{{$package->short_details}}</h3>
                        </div>

                       <li class="preserveLines">{{$package->details}}</li>

                        <a href="{{route('single-package',$package->slug)}}" class="default-btn">
                            <span>Read More</span>
                        </a>
                    </div>
                </div>

            </div>
            @endforeach
        </div>
    </div>
</section>

<style>
    .preserveLines {
    white-space: pre-wrap;
    padding: 50px;
}
</style>


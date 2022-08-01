@extends('frontend.master')
@section('contents')

<h2 class="container about-sec shadow" style="color:rgb(1, 133, 45)" class="py-3 text-center fw-bold">MISSION & <span
        style="color:blue">
        VISION</span>
</h2>

<section>
    <div class="container about-sec">
        <div class="row card-body">
            <div class="col-md-6">
                <div class="about-us-content wow fadeInUp shadow p-2">
                    <h1 class="fw-bold">Our Mission</h1>

                    <blockquote>
                        We aim to create different kinds of opportunities for different types of businesses in this
                        digital world & customers’ value so that our next generation and even our present generation can
                        cope with advanced-level difficulties & opportunities.
                    </blockquote>
                </div>
            </div>
            <div class="col-md-6">
                <div class="about-us-content wow fadeInUp shadow p-2" data-wow-delay="0.3s">
                    <h1 class="fw-bold">Our Vision</h1>
                    <blockquote>
                        At CortexSof LTD., We provide the best unique solution to our clients so that they can be
                        satisfied with our service and solution forever. Clients’ satisfaction is the primary factor in
                        our business because we can be remarkable in their hearts.
                    </blockquote>
                </div>
            </div>
        </div>
    </div>

</section>


<style>

    .about-sec img {
        width: 50%;
    }

    .about-sec {
        margin: 2rem auto;
        padding: 3rem;
    }

    .about-sec:nth-child(odd) {
        background-color: aquamarine;
    }

    .about-us-content {
        height: 100%;
    }

    blockquote {
        font-size: 18px;
        width: 100%;
        height: auto;
        margin: 50px auto;
        color: #555555;
        border-left: 8px solid #78C0A8;
        line-height: 1.6;
        position: relative;
        background: #EDEDED;
    }


    blockquote::before {
        font-family: Arial;
        content: "\201C";
        color: #78C0A8;
        font-size: 18px;
        position: absolute;
        left: 10px;
        top: -10px;
    }

    blockquote span {
        display: block;
        color: #333333;
        font-style: normal;
        font-weight: bold;
        margin-top: 1em;
    }

    .about-page {
        backdrop-filter: blur(5px);
        /* background-image: url(../images/facebook-banner1.jpg); */
        background-repeat: no-repeat;
        background-size: cover;
        background-position: absolute 0% 0%;
        background-attachment: fixed;
    }

    h2.container.about-sec.shadow {
        max-width: 500px;
        text-align: center;
    }

    h1.fw-bold {
        text-align: center;
    }

</style>
@endsection

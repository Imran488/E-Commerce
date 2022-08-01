@extends('frontend.master')
@section('contents')

<h2 class="container about-sec shadow" style="color:rgb(1, 133, 45)" class="py-3 text-center fw-bold">AT A <span style="color:blue">
    GLANCE</span>
</h2>

    <section>
        <div class="container about-sec shadow">
            <div class="row ">
                <div class="col-md-6 wow fadeInLeft">
                    <img src="{{ asset('images/logo.png') }}" alt="img">
                </div>
                <div class="col-md-6 wow fadeInRight">
                    <div class="about-us-content">
                        <span>
                            CortexSof Limited will help you grow your business in any case. We have 100+ services that can change your business standard well.
                            <br><br><br>
                            We provide the best IT solution for your business. We work together to make a positive change. We have made a lot of initiatives. We gather vast experience as an IT related services and products provider.

                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <style>

        .about-sec img {
            width: 100%;
            margin-bottom: 2%;
            border-radius: 50%;
        }
        .about-sec {
            margin: 2rem auto;
            padding: 3rem;
        }

        .about-sec:nth-child(odd){
            background-color: aquamarine;
        }

        .about-us-content {
            font-size: 18px;
            margin-top: 150px;
            height: 100%;
        }

        h2.container.about-sec.shadow{
            max-width: 500px;
            text-align: center;
        }
    </style>




@endsection

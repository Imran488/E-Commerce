@extends('frontend.master')
@section('contents')



<h2 class="container about-sec shadow" style="color:rgb(1, 133, 45)" class="py-3 text-center fw-bold">{{$singlePackage->title}}</h2>
 <div class="row text-center"><a href="{{route('home')}}"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i>Back</a></div>
    <section>
        <div class="container about-sec shadow">
            <div class="row ">
                <div class="col-md-6 wow fadeInLeft">
                    <div class="row">

                        <div>
                            <div class="single-pricing overly-one">
                                <div class="overly-two">
                                    <div class="pricing-title">
                                        <h2>{{$singlePackage->title}}</h2>
                                        <h3>{{$singlePackage->short_details}}</h3>
                                    </div>

                                   <li class="preserveLines">{{$singlePackage->details}}</li>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
                <div class="col-md-6 wow fadeInRight">
                    <div class="about-us-content">
                        <span>{{$singlePackage->details}}</span>
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
            margin-top: 85px;
            height: 100%;
            text-align: center;
        }

        h2.container.about-sec.shadow{
            max-width: 500px;
            text-align: center;
            background-color: aquamarine;
        }

        .preserveLines {
            white-space: pre-wrap;
            padding: 10px;
        }
    </style>




@endsection

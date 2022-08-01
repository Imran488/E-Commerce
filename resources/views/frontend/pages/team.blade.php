@extends('frontend.master')
@section('contents')

@if(session()->has('msg'))
<p class="alert alert-success">{{session()->get('msg')}}</p>
@endif

    <section id="#" class="team-area team-area-three white-bg pt-100 pb-70">
        <div class="container">
            <div class="section-title">
                <h2 class="container team-sec shadow" style="color:rgb(1, 133, 45)" class="py-3 text-center fw-bold">Meet Our Excelent <span style="color:blue">
                    Directors & Team Members</span>
                </h2>
            </div>

            <div class="row">
                @foreach ($teams as $t)
                <div class="col-lg-4 col-sm-4">
                    <div class="single-team">
                        <img class="mx-auto rounded-circle" src="{{url('uploads/team/' . $t->image)}}" alt="Image">

                        <div class="team-content">
                            <h3>{{$t->name}}</h3>
                            <span>{{$t->designation}}</span>

                            <ul>
                                <li>
                                    <a href="#" target="_blank">
                                        <i class="bx bxl-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" target="_blank">
                                        <i class="bx bxl-instagram"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" target="_blank">
                                        <i class="bx bxl-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" target="_blank">
                                        <i class="bx bxl-linkedin"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                @endforeach

                {{-- <div class="col-lg-4 col-sm-6">
                    <div class="single-team">
                        <img class="mx-auto rounded-circle" src="{{url('images/logo.png')}}" alt="Image">

                        <div class="team-content">
                            <h3>Md. Selim Hossain</h3>
                            <span>Backend Developer</span>

                            <ul>
                                <li>
                                    <a href="#" target="_blank">
                                        <i class="bx bxl-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" target="_blank">
                                        <i class="bx bxl-instagram"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" target="_blank">
                                        <i class="bx bxl-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" target="_blank">
                                        <i class="bx bxl-linkedin"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-6">
                    <div class="single-team">
                        <img class="mx-auto rounded-circle" src="{{url('images/logo.png')}}" alt="Image">

                        <div class="team-content">
                            <h3>Mst. Sharmin Sultana</h3>
                            <span>Frontend Developer</span>

                            <ul>
                                <li>
                                    <a href="#" target="_blank">
                                        <i class="bx bxl-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" target="_blank">
                                        <i class="bx bxl-instagram"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" target="_blank">
                                        <i class="bx bxl-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" target="_blank">
                                        <i class="bx bxl-linkedin"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>

    <style>
        h2.container.team-sec.shadow{
            max-width: 550px;
            text-align: center;
        }
    </style>
@endsection

<section id="aboutus" class="team-area team-area-three white-bg pt-100 pb-70">
    <div class="container">
        <div class="section-title">
            <span>Professionals</span>
            <h2>Meet our Directors and Offials</h2>
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

            <div>
                <a style="float: right" href="{{route('team')}}"><i class="bx bx-chevrons-left"></i> View More <i class="bx bx-chevrons-right"></i></a>
            </div>


        </div>
    </div>
</section>

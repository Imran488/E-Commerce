<footer class="footer-area pt-100 pb-70 jarallax" data-jarallax='{"speed": 0.3}'>
    <div class="container">
        <div class="row">
            @foreach ($logos as $logo)
            <div class="col-lg-3 col-md-6">
                <div class="single-footer-widget">
                    <a href="#" class="logo">
                        <img src="{{url('uploads/logo/' . $logo->image)}}" alt="Image">
                    </a>

                    <p>"{{$logo->desc}}"</p>

                    <ul class="social-icon">
                        <li>
                            <a href="#">
                                <i class="bx bxl-facebook"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="bx bxl-instagram"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="bx bxl-linkedin-square"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="bx bxl-twitter"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            @endforeach

            <div class="col-lg-3 col-md-6">
                <div class="single-footer-widget">
                    <h3>ADDRESS</h3>

                    <ul class="address">
                        <li class="location">
                            <i class="bx bxs-location-plus"></i>
                            6890 Blvd, The Bronx, NY 1058, New York, USA
                        </li>
                        <li>
                            <i class="bx bxs-envelope"></i>
                            <a href="mailto:support@cortexsof.com">support@cortexsof.com</a>
                        </li>
                        <li>
                            <i class="bx bxs-phone-call"></i>
                            <a href="tel:+1 (845) 244-1680">+1 (845) 244-1680</a>
                        </li>
                    </ul>
                    <br>
                    <ul class="address">
                        <li class="location">
                            <i class="bx bxs-location-plus"></i>
                            House#752, Road#10, Avenue#04, Mirpur DOHS, Dhaka 1216
                        </li>
                        <li>
                            <i class="bx bxs-envelope"></i>
                            <a href="mailto:support@cortexsof.com">support@cortexsof.com</a>
                        </li>
                        <li>
                            <i class="bx bxs-phone-call"></i>
                            <a href="tel:+88 01710-179900">+88 01710-179900</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="single-footer-widget">
                    <h3>SERVICES</h3>

                    <ul class="import-link">
                        @foreach ($service as $s)
                        <li>
                            <a href="{{route('single-service',$s->slug)}}" class="">{{$s->service_name}}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="single-footer-widget">
                    <h3>RESOURCES</h3>

                    <ul class="import-link">
                        <li>
                            <a href="{{route('home')}}">Home</a>
                        </li>

                        <li>
                            <a href="{{route('privacy.policy')}}">Privacy Policy</a>
                        </li>
                        <li>
                            <a href="{{route("terms.conditions")}}">Terms & Condition</a>
                        </li>
                        <li>
                            <a href="{{route("refund.policy")}}">Refund Policy</a>
                        </li>
                        <li>
                            <a href="{{route("team")}}">Team</a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="text-center">
    <p style="color: rgb(5, 5, 5); background-color: rgba(5, 106, 131, 0.199)"><span>&copy;</span>Copyright - {{date('Y')}}
        <br>
        CortexSof Limited® All Rights Reserved.
    </p>
</div>

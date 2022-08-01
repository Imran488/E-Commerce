@extends('frontend.master')
@section('contents')
<br>

<h1 class="container shadow" style="color:rgb(1, 133, 45)" class="py-3 text-center fw-bold">CONTACT <span
        style="color:blue">
        US</span>
</h1>
<br><br>

<section class="mb-4">
    <div class="row ">
        <div class="col-md-9 mb-md-0 mb-5">

            <div class="container">
                @if(Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
                @endif
                <form method="post" action="{{route('contact.us')}}">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label> Name </label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    placeholder="Name" name="name">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label> Email </label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror"
                                    placeholder="Email" name="email">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label> Phone Number </label>
                                <input type="text" class="form-control @error('phone_number') is-invalid @enderror"
                                    placeholder="Phone Number" name="phone_number">
                                @error('phone_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label> Subject </label>
                                <input type="text" class="form-control @error('subject') is-invalid @enderror"
                                    placeholder="Subject" name="subject">
                                @error('subject')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label> Message </label>
                                <textarea class="form-control textarea @error('message') is-invalid @enderror"
                                    placeholder="Message" name="message"></textarea>
                                @error('message')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <br>
                    <center>
                        <div class="row">
                            <div class="update ml-auto mr-auto">
                                <button type="submit" class="btn btn-primary btn-round">Send</button>
                            </div>
                        </div>
                    </center>
                </form>
            </div>
            <br>
        </div>

        <div class="col-md-3 text-center">
            <ul class="list-unstyled mb-0">
                <span style="color: black"><b>#Head Office</b></span>
                <li class="location">
                    <i class="bx bxs-location-plus"></i>
                    6890 Blvd, The Bronx, NY 1058 New York, USA
                </li>
                <li>
                    <i class="bx bxs-envelope"></i>&nbsp;&nbsp; support@cortexsof.com
                </li>
                <li>
                    <i class="bx bxs-phone-call"></i>&nbsp;&nbsp; +1 (514) 312-5678 &nbsp;&nbsp; +1 (514) 312-6677</a>
                </li>
            </ul>
            <ul class="list-unstyled mb-0">
                <span style="color: black"><b>#Branch</b></span>
                <li class="location"><i class="bx bxs-location-plus"></i>
                    House#752, Road#10, Avenue#04, Mirpur DOHS, Dhaka 1216
                </li>

                <li><i class="bx bxs-phone-call">
                    </i>&nbsp;&nbsp;+0081712345678
                </li>

                <li>
                    <i class="bx bxs-envelope"></i>&nbsp;&nbsp;contact@cortexsof.com
                </li>
            </ul>
        </div>

    </div>
    <div class="row ms-4">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12610.52510214121!2d-122.40597587235811!3d37.79868013135094!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8085806800ecb699%3A0xf91d657fb37e68fd!2sSan%20Francisco%2C%20CA%2094126%2C%20USA!5e0!3m2!1sen!2sbd!4v1652676438212!5m2!1sen!2sbd"
            width="50%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </div>

</section>
<style>
    h1.container.shadow {
        max-width: 500px;
        text-align: center;
    }

</style>

@endsection

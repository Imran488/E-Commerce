@extends('frontend.master')
@section('contents')

<h2 class="container about-sec shadow" style="color:rgb(1, 133, 45)" class="py-3 text-center fw-bold">MESSAGE FROM <span
        style="color:blue">
        C.E.O</span>
</h2>

<section>

    <div class="container about-sec shadow">
        <div class="row">
            <div class="col-md-12">
                <div class="ceo wow fadeInDown" data-wow-delay="0.5s"></div>
                <div class="about-us-content pt-2 wow fadeInUp" data-wow-delay="1s">
                    <h1 class="text-center fw-bold">Message From Our Honourable CEO Sir</h1>
                    <blockquote style="color: black">
                        First of all, Thank you for taking the time to read my message. The purpose of this message is
                        to help to build business relations between you & me. All clients are valuable for me, & I want
                        to keep business relations forever. If there is any complaint regarding my service & solution,
                        Kindly feel free to contact me, Although there is a contact support page. Because I want my
                        clients’ satisfaction that is more valuable than anything else. I hope we can maintain our
                        business relationship until death. Thank you again for your valuable time.
                        <br><br>
                        <h5>Tanbir Islam </h5>
                        <h6>MD & C.E.O</h6>
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
        background-image: url('/images/logo.png');
    }


    blockquote::before {
        font-family: Arial;
        content: "\201C";
        color: #78C0A8;
        font-size: 4em;
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

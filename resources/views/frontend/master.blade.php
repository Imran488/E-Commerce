<!doctype html>
<html lang="zxx">
    <head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Links of CSS files -->
		<link rel="stylesheet" href="{{url('frontend/css/bootstrap.min.css')}}">
		<link rel="stylesheet" href="{{url('frontend/css/owl.theme.default.min.css')}}">
		<link rel="stylesheet" href="{{url('frontend/css/owl.carousel.min.css')}}">
		<link rel="stylesheet" href="{{url('frontend/css/animate.min.css')}}">
		<link rel="stylesheet" href="{{url('frontend/css/meanmenu.min.css')}}">
		<link rel="stylesheet" href="{{url('frontend/css/style.css')}}">
		<link rel="stylesheet" href="{{url('frontend/css/responsive.css')}}">

        <!-- font awesome icon -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.0/css/boxicons.min.css" integrity="sha512-pVCM5+SN2+qwj36KonHToF2p1oIvoU3bsqxphdOIWMYmgr4ZqD3t5DjKvvetKhXGc/ZG5REYTT6ltKfExEei/Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		<!-- Favicon -->
		<link rel="icon" type="image/png" href="{{url('images/logo.png')}}">
		<!-- Title -->
		<title>CortexSof Limited</title>
    </head>

    <body class="body-color-three">

		<!-- Start Preloader Area -->
		{{-- <div class="preloader">
            <div class="loader">
                <div class="loader-outter"></div>
                <div class="loader-inner"></div>

                <div class="logo">
                    <img src="{{url('images/logo.png')}}" alt="Logo" style="border-radius: 100%;height: 85px;">
                </div>
            </div>
        </div> --}}
		<!-- End Preloader Area -->

		<!-- Start Header Area -->
		@include('frontend.partials.header')
		<!-- End Header Area -->
        @yield('contents')
		<!-- Start Footer Area -->
		@include('frontend.partials.footer')
		<!-- End Footer Area -->

		<!-- Start Go Top Area -->
		<div class="go-top">
			<i class="bx bx-chevrons-up"></i>
			<i class="bx bx-chevrons-up"></i>
		</div>
		<!-- End Go Top Area -->


       <!-- Links of JS files -->
        <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="{{url('frontend/js/jquery.min.js')}}"></script>
        <script src="{{url('frontend/js/bootstrap.bundle.min.js')}}"></script>
		<script src="{{url('frontend/js/meanmenu.min.js')}}"></script>
		<script src="{{url("frontend/js/owl.carousel.min.js")}}"></script>
		<script src="{{url('frontend/js/nice-select.min.js')}}"></script>
		<script src="{{url('frontend/js/magnific-popup.min.js')}}"></script>
		<script src="{{url('frontend/js/custom.js')}}"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js" integrity="sha512-Tn2m0TIpgVyTzzvmxLNuqbSJH3JP8jm+Cy3hvHrW7ndTDcJ1w5mBiksqDBb8GpE2ksktFvDB/ykZ0mDpsZj20w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.0/dist/boxicons.min.js" integrity="sha512-y8/3lysXD6CUJkBj4RZM7o9U0t35voPBOSRHLvlUZ2zmU+NLQhezEpe/pMeFxfpRJY7RmlTv67DYhphyiyxBRA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </body>
</html>

@extends('frontend.master')
@section('contents')

<div class="text-center">
    @if(session()->has('message'))
    <p class="alert alert-success">{{session()->get('message')}}</p>
     @endif
</div>


@if ($message = Session::get('success'))
                <div class="text-center">
                    <p class="text-green-800">{{ $message }}</p>
                </div>
@endif
<!-- Start Banner Area -->
@include('frontend.partials.banner')
<!-- End Banner Area -->

<!-- Start Our Approach Area -->
@include('frontend.partials.product')
<!-- End Our Approach Area -->

<!-- Start Service Area -->
@include('frontend.partials.service')
<!-- End Service Area -->

<!-- Start Pricing Area -->
@include('frontend.partials.package')
<!-- End Pricing Area -->

<!-- Start Directors Area -->
@include('frontend.partials.directors')
<!-- End Team Area -->

<!-- Start Blog Area -->
@include('frontend.partials.blog')
<!-- End Blog Area -->

<!-- Start Partner Area -->
@include('frontend.partials.partner')
<!-- End Partner Area -->
@endsection

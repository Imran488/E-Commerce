@php

$datas = array(
array(
'title'=>'Basic Package',
'price'=>'249',
'description'=>array(
'Static Website',
'Fully mobile responsive',
'Logo design',
'5 Static pages',
'Static slider',
'Static Image gallery',
'Social page connection link',
'2 Months free maintenance',

),
),
array(
'title'=>'Popular Package',
'price'=>'299',
'description'=>array(
'Web Development with CMS(Content management system)Word press',
'Innovative design',
'Fully mobile responsive',
'Logo design',
'10 Dynamic pages',
'Dynamic slider',
'Dynamic service listings',
'All service page',
'Single service page',
'Social page connection link',
'Notice board download option',
'Contact mail',
'Site location map',
'Admin panel to update content',
'2 Months free maintenance',
),

),

array(
'title' => 'Premium Package',
'price' => '399',
'description' => array(
'Web Development with CMS(Content management system)Word press',
'Innovative design',
'Fully mobile responsive',
'Logo design',
'15 Dynamic pages',
'Dynamic slider',
'Dynamic service listings',
'All service page',
'Single service page',
'Social page connection link',
'Fb page live feed box',
'Live chat application',
'Blog system',
'Notice board download option',
'Customized query mail',
'Site location map',
'Admin panel to update content',
'2 Months free maintenance',
)
),
array(
'title'=>'News Portal or Magazine Portal',
'price'=>'999',
'description'=>array(
'Web Development with CMS(Content management system)Word press',
'Completely Innovative Design',
'Fully mobile responsive',
'Logo design',
'Dynamic slider',
'Dynamic image gallery',
'Unlimited Dynamic pages',
'All post page',
'Single post page',
'Social page connection link',
'Fb page live feed box',
'Live chat application',
'Dynamic Bulletin feed',
'Contact mail',
'Customized query mail',
'Comments system',
'Admin panel to update content',
'2 Months free maintenance',

),
),
array(
'title'=>'E-commerce',
'price'=>'1999',
'description'=>array(
'Web Development with CMS(Content management system)Word press',
'Completely innovative design',
'Fully mobile responsive',
'Logo design',
'Dynamic slider',
'Unlimited dynamic pages',
'Dynamic product listing',
'All product page',
'Singe product page',
'Fb page like box and live feed',
'Blog system',
'Live chat application',
'Cash on delivery system',
'Card payment system (May cause extra charge due to bank agreement)',
'Mobile banking system (May cause extra charge due to commission on transaction)',
'Admin panel to update content',
'2 Months free maintenance',

),
),
array(
'title'=>'Customized',
'price'=>'1999',
'description'=>array(
'Web Development with CMS(Content management system)Word press or other CMS or Framework depending on need',
'Fully mobile responsive',
'Logo Design',
'Completely innovative design',
'Dynamic slider',
'Dynamic image gallery',
'Unlimited Dynamic pages',
'Dynamic service listings',
'All service page',
'Single service page',
'Social page connection link',
'Fb page live feed box',
'Live chat application',
'Blog system',
'Customized query mail',
'Notice board download option',
'Site location map',
'Admin panel to update content',
'2 Months free maintenance',

),
),

)

@endphp
@extends('frontend.master')
@section('contents')

<h2 class="container about-sec shadow" style="color:rgb(1, 133, 45)" class="py-3 text-center fw-bold">{{$singleService->service_name}}</h2>
<div class="row text-center"><a href="{{route('home')}}"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i>Back</a></div>

<section id="terms-and-conditions">
    <div class="container py-5">
        <div class="row">
            @foreach ($datas as $data)
            <div class="col-md-4">
                <div class="card p-2 pkg-item animated slideInUp">
                    <h5 style="font-size: 24px;" class="pkg-title">
                        {{ $data['title'] }}
                    </h5>
                    <h3 class="pkg-price">
                        ${{ $data['price'] }}
                    </h3>
                    <div class="description-area">
                        <ul>
                            @foreach ($data['description'] as $description)
                            <li>{{ $description }}</li>

                            @endforeach
                        </ul>
                    </div>

                    <form action="{{route('stripe.post')}}" method="post">
                        @csrf
                        <div style="display:none;">
                            <input type="text" name="name" value="{{$data['title']}}">
                            <input type="text" name="amount" value="{{$data['price']}}">
                        </div>

                        <br>

                        <button type="submit" class="btn btn-primary mb-2">
                            Buy Now
                        </button>
                    </form>
                </div>
            </div>
            @endforeach

        </div>

    </div>
</section>

<style>
    .pkg-title {
        margin: 0 !important;
        color: rgb(255, 246, 246);
        padding: 0.3rem 0;
        background: hsla(145, 63%, 30%, 1);
        height: 3rem;
    }

    .pkg-item {
        text-align: center;
        padding: 0 !important;
        margin-bottom: 2rem !important;
        border-radius: .3rem;
        overflow: hidden;
        margin: 1rem;
        transition: all .2s ease-in-out;
    }

    .pkg-item:hover {
        margin: 0px;
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.2);
    }

    .pkg-item h3 {
        color: rgb(8, 34, 150);
        background: color:lightblue;
        padding: 1rem 0rem;
    }

    .description-area {
        margin: 0;
        padding: 0;
        color: #2d3436;
    }

    .pkg-item ul {
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .pkg-item ul li {
        font-size: 12px;
        font-weight: bold;
        padding: 0.25rem 0 0.25rem 2rem;
        border-bottom: 1px solid rgb(3, 114, 40);
        text-transform: capitalize;
        text-align: left;
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




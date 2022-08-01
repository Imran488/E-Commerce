<?php

namespace App\Http\Controllers\frontend;

use App\Models\Logo;
use App\Models\Team;
use App\Models\Product;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Offer;

class FooterController extends Controller
{
    public function privacy(){
        $packages = Offer::all();
        $teams = Team::all();
        $logos = Logo::all();
        $product = Product::all();
        $service = Service::all();
        return view('frontend.pages.privacy-policy',compact('packages','teams','logos','product','service'));
    }

    public function terms(){
        $packages = Offer::all();
        $teams = Team::all();
        $logos = Logo::all();
        $product = Product::all();
        $service = Service::all();
        return view('frontend.pages.terms-and-conditions',compact('packages','teams','logos','product','service'));
    }

    public function refund(){
        $packages = Offer::all();
        $teams = Team::all();
        $logos = Logo::all();
        $product = Product::all();
        $service = Service::all();
        return view('frontend.pages.refund-policy',compact('packages','teams','logos','product','service'));
    }
}

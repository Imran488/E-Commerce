<?php

namespace App\Http\Controllers\frontend;

use App\Models\Logo;
use App\Models\Team;
use App\Models\Product;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Offer;

class ServiceController extends Controller
{
    public function singleService( $slug){
        $packages = Offer::all();
        $teams = Team::all();
        $logos = Logo::all();
        $product = Product::all();
        $service = Service::all();
        $singleService = Service::query()
        ->where('slug',$slug)
        ->first();
        return view('frontend.pages.single-service',compact('packages','teams','singleService','logos','product','service'));
    }
}

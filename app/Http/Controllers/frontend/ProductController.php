<?php

namespace App\Http\Controllers\frontend;

use App\Models\Logo;
use App\Models\Team;
use App\Models\Product;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Offer;

class ProductController extends Controller
{
    public function product(){
        $packages = Offer::all();
        $teams = Team::all();
        $logos = Logo::all();
        $product = Product::all();
        $service = Service::all();
        return view('frontend.pages.product-viewdetails',compact('packages','teams','logos','product','service'));
    }
}

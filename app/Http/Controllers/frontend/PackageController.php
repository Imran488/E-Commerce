<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Logo;
use App\Models\Offer;
use App\Models\Product;
use App\Models\Service;
use App\Models\Team;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function singlePackage( $slug){
        $packages = Offer::all();
        $teams = Team::all();
        $logos = Logo::all();
        $product = Product::all();
        $service = Service::all();
        $singlePackage = Offer::query()
        ->where('slug',$slug)
        ->first();
        return view('frontend.pages.single-package',compact('packages','teams','singlePackage','logos','product','service'));
    }
}

<?php

namespace App\Http\Controllers\frontend;

use App\Models\Logo;
use App\Models\Team;
use App\Models\Product;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Partner;
use App\Models\Offer;

class HomeController extends Controller
{
    public function home(){
        $blogs = Blog::paginate(3);
        $packages = Offer::all();
        $partners = Partner::all();
        $teams = Team::paginate(3);
        $logos = Logo::all();
        $product = Product::all();
        $service = Service::all();
        return view ('frontend.pages.home',compact('blogs','packages','partners','teams','logos','product','service'));
    }

    public function teamMember(){
        $packages = Offer::all();
        $teams = Team::all();
        $logos = Logo::all();
        $product = Product::all();
        $service = Service::all();
        return view('frontend.pages.team',compact('packages','teams','logos','product','service'));
    }

    public function blog(){
        $blogs = Blog::all();
        $packages = Offer::all();
        $logos = Logo::all();
        $product = Product::all();
        $service = Service::all();
        return view('frontend.pages.blog',compact('blogs','packages','logos','product','service'));
    }

    public function glance(){
        $packages = Offer::all();
        $logos = Logo::all();
        $product = Product::all();
        $service = Service::all();
        return view('frontend.pages.glance',compact('packages','logos','product','service'));
    }

    public function mandv(){
        $packages = Offer::all();
        $logos = Logo::all();
        $product = Product::all();
        $service = Service::all();
        return view('frontend.pages.missionandvision',compact('packages','logos','product','service'));
    }

    public function mfc(){
        $packages = Offer::all();
        $logos = Logo::all();
        $product = Product::all();
        $service = Service::all();
        return view('frontend.pages.messagefromceo',compact('packages','logos','product','service'));
    }
}

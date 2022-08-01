<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Logo;
use App\Models\Offer;
use App\Models\Order;
use App\Models\Partner;
use App\Models\Product;
use App\Models\Service;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{

    public function delete($id)
    {
        $order = Order::find($id)->delete();
        return redirect()->back()->with('message','Order Delete Succesfully');

    }
    public function profile($id)
    {
        $blogs = Blog::all();
        $packages = Offer::all();
        $partners = Partner::all();
        $teams = Team::all();
        $logos = Logo::all();
        $product = Product::all();
        $service = Service::all();
        $user = User::find($id);
        $carts = session()->get('cart');
        $orders = Order::where('customer_id', '=', $id)->get();
        $total_product = Order::where('customer_id', $id)->count();
        return view('frontend.pages.profile', compact('blogs','packages','partners','teams','logos','product','service','user', 'carts', 'orders','total_product'));
    }

    public function userOrder($id)
    {
        $blogs = Blog::all();
        $packages = Offer::all();
        $partners = Partner::all();
        $teams = Team::all();
        $logos = Logo::all();
        $product = Product::all();
        $service = Service::all();
        $user = User::find($id);
        $carts = session()->get('cart');
        $orders = Order::where('customer_id', '=', $id)->get();
        $total_product = Order::where('customer_id', $id)->count();
        return view('frontend.pages.myorders', compact('blogs','packages','partners','teams','logos','product','service','user', 'carts', 'orders','total_product'));
    }

    public function userCart($id)
    {
        $blogs = Blog::all();
        $packages = Offer::all();
        $partners = Partner::all();
        $teams = Team::all();
        $logos = Logo::all();
        $product = Product::all();
        $service = Service::all();
        $user = User::find($id);
        $carts = session()->get('cart');
        $orders = Order::where('customer_id', '=', $id)->get();
        $total_product = Order::where('customer_id', $id)->count();
        return view('frontend.pages.mycart', compact('blogs','packages','partners','teams','logos','product','service','user', 'carts', 'orders','total_product'));
    }

    public function changeImage($id)
    {
        $user = User::find($id);
        return view('frontend.pages.profile_image_form', compact('user'));
    }
    public function updateProfileImage(Request $request, $id)
    {
        $user = User::find($id);
        $fileName = "";
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $filename = date('Ymdmhs') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/uploads/users'), $filename);
        }
        $user->update([
            "image" => $filename,
        ]);
        return redirect()->route('user.profile', $user->id)->with('message', 'Profile Image Updated');
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('frontend.pages.edit_profile', compact('user'));
    }
    public function updateProfile(Request $request, $id)
    {
        $user = User::find($id);
        $user->update([
            "name" => $request->name,
            "email" => $request->email,
            "address" => $request->address,
            "phone" => $request->phone,
        ]);
        return redirect()->route('user.profile', $user->id)->with('message', 'Profile Updated');
    }

}

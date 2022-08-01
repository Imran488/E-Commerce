<?php

namespace App\Http\Controllers\frontend;

use Stripe;
use App\Models\Logo;
// use Session;
use App\Models\Team;
use App\Models\Product;
use App\Models\Service;
use Illuminate\Http\Request;
use Stripe\Checkout\Session;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Models\Offer;
use App\Models\Payment;
use Illuminate\Support\Facades\Redirect;

class StripeController extends Controller
{

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function Payment($id){
        $packages = Offer::all();
        $teams = Team::all();
        $logos = Logo::all();
        $service = Service::all();
        $product = Product::all();
        $p = Product::find($id);
        if(auth()->user()){
            return view('frontend.pages.payment',compact('packages','teams','logos','service','product','p'));
        }
        return redirect()->route('login')->with('msg','Login First');

    }

    public function paymentStore(Request $request){
        Payment::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->cnumber,
            'address' => $request->address,
            'accountname' => $request->accountname,
            'accountnumber' => $request->accountnumber,
            'amount' => $request->amount,
        ]);
    }

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request, Response $response)
    {
            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            $session = \Stripe\Checkout\Session::create([
                'line_items' => [[
                    'name' => $request->name,
                    'amount' => $request->amount * 100,
                    'currency' => 'USD',
                    'quantity' => 1,
                ]],
                'mode' => 'payment',
                'success_url' => 'http://localhost:8000/',
                'cancel_url' => 'http://localhost:8000/',
            ]);

            if(auth()->user()){
            return Redirect::to($session->url);
        }
        return redirect()->route('login')->with('msg','Login First');
        }
    }





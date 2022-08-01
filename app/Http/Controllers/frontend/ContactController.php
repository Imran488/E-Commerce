<?php

namespace App\Http\Controllers\frontend;

use Mail;
use App\Models\Logo;
use App\Models\Team;
use App\Models\Contact;
use App\Models\Product;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Offer;

class ContactController extends Controller
{
    public function contact() {
        $packages = Offer::all();
        $teams = Team::all();
        $logos = Logo::all();
        $product = Product::all();
        $service = Service::all();
        return view('frontend.pages.contactus',compact('packages','teams','logos','product','service'));
      }

       public function save(Request $request) {

         $this->validate($request, [
             'name' => 'required',
             'email' => 'required|email',
             'subject' => 'required',
             'phone_number' => 'required',
             'message' => 'required'
         ]);

         $contact = new Contact;

         $contact->name = $request->name;
         $contact->email = $request->email;
         $contact->subject = $request->subject;
         $contact->phone_number = $request->phone_number;
         $contact->message = $request->message;

         $contact->save();
         \Mail::send('contact_email',
             array(
                 'name' => $request->get('name'),
                 'email' => $request->get('email'),
                 'subject' => $request->get('subject'),
                 'phone_number' => $request->get('phone_number'),
                 'user_message' => $request->get('message'),
                ),
                function($message) use ($request)
               {
                  $message->from($request->email);
                  $message->to('bgd.imran403@gmail.com');
               });

         return back()->with('success', 'Thank you for contact us! We will reply very soon.');

     }
}

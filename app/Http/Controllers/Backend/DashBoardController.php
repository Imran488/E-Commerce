<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Logo;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class DashBoardController extends Controller
{
    public function dashboard(){
        $total_product = Product::all()->count();
        $total_customer = User::where('role','user')->count();
        $total_order = Order::where('order_status','pending')->count();
        $total_revenue = Payment::where('amount')->sum('amount');
        return view('admin.pages.dashboard',compact('total_product','total_customer','total_order','total_revenue'));
    }

    // Logo

    public function logo(){
        $logos=Logo::all();
        return view('admin.layouts.logosetting.logo_table',compact('logos'));
    }

    public function addLogo(){
        return view('admin.layouts.logosetting.add_logo');
    }

    public function store(Request $request)
    {

        $request->validate([
            'image' => 'required|mimes:jpg,png,jpeg|max:5048',
            'desc' => 'required',
        ]);

        $filename = '';
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $filename = date('Ymdmhs') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/uploads/logo'), $filename);
        }
        Logo::create([
            'image' => $filename,
            'desc' => $request->desc,
        ]);
        return redirect()->route('logo.setting')->with('message', 'Logo added successfully');
    }
    public function edit($id)
    {
        $logo = Logo::find($id);
        return view('admin.layouts.logosetting.logo_edit', compact('logo'));
    }
    public function update(Request $request, $id)
    {
        $logo = Logo::find($id);
        if(!empty($request->image)){
            $imageUrl = str_replace(' ', '-', $request->name) . '-' . time() . '.' . $request->image->extension();
            $request->image->move(public_path('/uploads/logo'), $imageUrl);
            }else
            {
                $imageUrl=  $logo->image;
            }
        $logo->update([
            'image' => $imageUrl,
            'desc' => $request->desc,
        ]);
        return redirect()->route('logo.setting')->with('message', 'Logo updated');
    }
    public function delete($id)
    {
        $logo = Logo::find($id);
        $image = str_replace('\\', '/', public_path('uploads/logo/' . $logo->image));
        unlink($image);
        $logo->delete();
        return redirect()->route('logo.setting')->with('error', 'Logo deleted');

    }

    public function view($id)
    {
        $logo = Logo::find($id);
        return view('admin.layouts.logosetting.logo_view', compact('logo'));
    }
    public function change(Request $request, $id)
    {
        $logo = Logo::find($id);
        if(!empty($request->image)){
            $imageUrl = str_replace(' ', '-', $request->name) . '-' . time() . '.' . $request->image->extension();
            $request->image->move(public_path('/uploads/logo'), $imageUrl);
            }else
            {
                $imageUrl=  $logo->image;
            }
        $logo->update([
            'image' => $imageUrl,
        ]);
        return redirect()->route('logo.setting')->with('message', 'Logo Image Updated');
    }
}

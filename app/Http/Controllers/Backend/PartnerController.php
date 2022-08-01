<?php

namespace App\Http\Controllers\Backend;

use App\Models\Partner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PartnerController extends Controller
{
    public function partner(){
        $partners=Partner::all();
        return view('admin.layouts.partnersetting.partner_table',compact('partners'));
    }

    public function addPartner(){
        return view('admin.layouts.partnersetting.add_partner');
    }

    public function store(Request $request)
    {

        $request->validate([
            'image' => 'required|mimes:jpg,png,jpeg|max:5048',
            'name' => 'required',
        ]);

        $filename = '';
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $filename = date('Ymdmhs') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/uploads/partner'), $filename);
        }
        Partner::create([
            'image' => $filename,
            'name' => $request->name,
        ]);
        return redirect()->route('partner.setting')->with('message', 'partner added successfully');
    }
    public function edit($id)
    {
        $partner = Partner::find($id);
        return view('admin.layouts.partnersetting.partner_edit', compact('partner'));
    }
    public function update(Request $request, $id)
    {
        $partner = Partner::find($id);
        $image = str_replace('\\', '/', public_path('uploads/partner/' . $partner->image));
        unlink($image);
        if(!empty($request->image)){
            $imageUrl = str_replace(' ', '-', $request->name) . '-' . time() . '.' . $request->image->extension();
            $request->image->move(public_path('/uploads/partner'), $imageUrl);
            }else
            {
                $imageUrl=  $partner->image;
            }
        $partner->update([
            'image' => $imageUrl,
            'name' => $request->name,
        ]);
        return redirect()->route('partner.setting')->with('message', 'partner updated');
    }
    public function delete($id)
    {
        $partner = Partner::find($id);
        $image = str_replace('\\', '/', public_path('uploads/partner/' . $partner->image));
        unlink($image);
        $partner->delete();
        return redirect()->route('partner.setting')->with('error', 'partner deleted');

    }

    public function view($id)
    {
        $partner = Partner::find($id);
        return view('admin.layouts.partnersetting.partner_view', compact('partner'));
    }
    public function change(Request $request, $id)
    {
        $partner = Partner::find($id);
        $image = str_replace('\\', '/', public_path('uploads/partner/' . $partner->image));
        unlink($image);
        if(!empty($request->image)){
            $imageUrl = str_replace(' ', '-', $request->name) . '-' . time() . '.' . $request->image->extension();
            $request->image->move(public_path('/uploads/partner'), $imageUrl);
            }else
            {
                $imageUrl=  $partner->image;
            }
        $partner->update([
            'image' => $imageUrl,
        ]);
        return redirect()->route('partner.setting')->with('message', 'partner Image Updated');
    }
}

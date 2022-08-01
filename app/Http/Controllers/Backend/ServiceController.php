<?php

namespace App\Http\Controllers\Backend;

use App\Models\Service;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    public function manageService()
    {
        $services = Service::all();
        return view('admin.layouts.service.service_table',compact('services'));
    }
    public function add()
    {
        return view('admin.layouts.service.add_service');
    }
    public function store(Request $request)
    {
        $request->validate([
            'service_name' => 'required|unique:services',
            // 'slug'=> 'required|unique',
            'price' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg|max:5048',
            'offer' => 'required',
            'desc' => 'required',
        ]);



        $filename = '';
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $filename = date('Ymdmhs') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/uploads/services'), $filename);
        }
        Service::create([
            'service_name' => $request->service_name,
            'slug'=> Str::slug($request->service_name),
            'price' => $request->price,
            'image' => $filename,
            'offer' => $request->offer,
            'desc' => $request->desc,
        ]);
        return redirect()->route('admin.manage.service')->with('message', 'Service added successfully');
    }
    public function edit($id)
    {
        $service = Service::find($id);
        return view('admin.layouts.service.edit_service', compact('service'));
    }
    public function update(Request $request, $id)
    {
        $service = Service::find($id);
        if(!empty($request->image)){
            $imageUrl = str_replace(' ', '-', $request->name) . '-' . time() . '.' . $request->image->extension();
            $request->image->move(public_path('/uploads/services'), $imageUrl);
            }else
            {
                $imageUrl=  $service->image;
            }
        $service->update([
            'service_name' => $request->service_name,
            'slug'=> Str::slug($request->service_name),
            'price' => $request->price,
            'image' => $imageUrl,
            'offer' => $request->offer,
            'desc' => $request->desc,
        ]);
        return redirect()->route('admin.manage.service')->with('message', 'Service updated');
    }
    public function delete($id)
    {
        $service = Service::find($id);
        $image = str_replace('\\', '/', public_path('uploads/services/' . $service->image));
        unlink($image);
        $service->delete();
        return redirect()->route('admin.manage.service')->with('error', 'Service deleted');

    }

    public function view($id)
    {
        $service = Service::find($id);
        return view('admin.layouts.service.view_service', compact('service'));
    }
    public function change(Request $request, $id)
    {
        $service = Service::find($id);
        if(!empty($request->image)){
            $imageUrl = str_replace(' ', '-', $request->name) . '-' . time() . '.' . $request->image->extension();
            $request->image->move(public_path('/uploads/services'), $imageUrl);
            }else
            {
                $imageUrl=  $service->image;
            }
        $service->update([
            'image' => $imageUrl,
        ]);
        return redirect()->route('admin.manage.service')->with('message', 'Service Image Updated');
    }
}

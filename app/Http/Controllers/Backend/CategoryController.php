<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function manageCategory()
    {
        $category=Category::all()->sortByDesc('id')->values();
        return view('admin.layouts.category.category_table',compact('category'));
    }
    public function addCategory()
    {
        return view('admin.layouts.category.add_category');
    }
    public function store(Request $request){
        $request->validate([
            'category_name'=>'required|unique:categories',
            'desc'=>'required',
            'image'=>'required',
        ]);
            $filename = '';
            if ($request->hasfile('image')) {
                $file = $request->file('image');
                $filename = date('Ymdmhs') . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('/uploads/category'), $filename);
            }
            Category::create([
                'category_name'=>$request->category_name,
                'desc'=>$request->desc,
                'image'=>$filename,
            ]);
            return redirect()->route('admin.manage.category')->with('message','Category Added Successfully');
    }
    public function editCategory($id)
    {
        $category=Category::find($id);
        return view('admin.layouts.category.edit_category',compact('category'));
    }
    public function update(Request $request,$id){
        $category=Category::find($id);
        if(!empty($request->image)){
            $imageUrl = str_replace(' ', '-', $request->name) . '-' . time() . '.' . $request->image->extension();
            $request->image->move(public_path('/uploads/categoty'), $imageUrl);
            }else
            {
                $imageUrl=  $category->image;
            }
        $category->update([
            'category_name'=>$request->category_name,
            'desc'=>$request->desc,
            'image'=>$imageUrl,
        ]);
        return redirect()->route('admin.manage.category')->with('message','Category Updated');
    }
    public function delete($id)
    {
        $category=Category::find($id);
        $image = str_replace('\\','/',public_path('uploads/category/'.$category->image));
        unlink($image);
        $category->delete();
        return redirect()->route('admin.manage.category')->with('error','Category deleted');
    }
    public function view($id)
    {
        $category=Category::find($id);
        return view('admin.layouts.category.view_category',compact('category'));
    }
    public function change(Request $request,$id){
        $category=Category::find($id);
        if(!empty($request->image)){
            $imageUrl = str_replace(' ', '-', $request->name) . '-' . time() . '.' . $request->image->extension();
            $request->image->move(public_path('/uploads/categoty'), $imageUrl);
            }else
            {
                $imageUrl=  $category->image;
            }
        $category->update([
            'image'=>$imageUrl,
        ]);
        return redirect()->route('admin.manage.category')->with('message','Category Image Updated');
    }
}

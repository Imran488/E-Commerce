<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function manageProduct()
    {
        $products = Product::with('subCategory')->orderBy('id','desc')->get();
        return view('admin.layouts.product.product_table', compact('products'));
    }
    public function add()
    {
        $products = Subcategory::with('product')->get();
        return view('admin.layouts.product.add_product', compact('products'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required|unique:products',
            'price' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg|max:5048',
            'offer' => 'required',
            'desc' => 'required',
        ]);

        $filename = '';
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $filename = date('Ymdmhs') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/uploads/products'), $filename);
        }
        Product::create([
            'product_name' => $request->product_name,
            'price' => $request->price,
            'image' => $filename,
            'offer' => $request->offer,
            'desc' => $request->desc,
        ]);
        return redirect()->route('admin.manage.product')->with('message', 'Product added successfully');
    }
    public function edit($id)
    {
        $product = Product::find($id);
        return view('admin.layouts.product.edit_product', compact('product'));
    }
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        if(!empty($request->image)){
            $imageUrl = str_replace(' ', '-', $request->name) . '-' . time() . '.' . $request->image->extension();
            $request->image->move(public_path('/uploads/products'), $imageUrl);
            }else
            {
                $imageUrl=  $product->image;
            }
        $product->update([
            'product_name' => $request->product_name,
            'price' => $request->price,
            'image' => $imageUrl,
            'offer' => $request->offer,
            'desc' => $request->desc,
        ]);
        return redirect()->route('admin.manage.product')->with('message', 'Product updated');
    }
    public function delete($id)
    {
        $product = Product::find($id);
        $image = str_replace('\\', '/', public_path('uploads/products/' . $product->image));
        unlink($image);
        $product->delete();
        return redirect()->route('admin.manage.product')->with('error', 'Product deleted');

    }

    public function view($id)
    {
        $product = Product::find($id);
        return view('admin.layouts.product.view_product', compact('product'));
    }
    public function change(Request $request, $id)
    {
        $product = Product::find($id);
        if(!empty($request->image)){
            $imageUrl = str_replace(' ', '-', $request->name) . '-' . time() . '.' . $request->image->extension();
            $request->image->move(public_path('/uploads/products'), $imageUrl);
            }else
            {
                $imageUrl=  $product->image;
            }
        $product->update([
            'image' => $imageUrl,
        ]);
        return redirect()->route('admin.manage.product')->with('message', 'Product Image Updated');
    }
}

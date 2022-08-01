<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function blog(){
        $blogs=Blog::all();
        return view('admin.layouts.blogsetting.blog_table',compact('blogs'));
    }

    public function addBlog(){
        return view('admin.layouts.blogsetting.add_blog');
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
            $file->move(public_path('/uploads/blog'), $filename);
        }
        Blog::create([
            'image' => $filename,
            'desc' => $request->desc,
            'date' => $request->date,
        ]);
        return redirect()->route('blog.setting')->with('message', 'Blog added successfully');
    }
    public function edit($id)
    {
        $blog = Blog::find($id);
        return view('admin.layouts.blogsetting.blog_edit', compact('blog'));
    }
    public function update(Request $request, $id)
    {
        $blog = Blog::find($id);
        if(!empty($request->image)){
            $imageUrl = str_replace(' ', '-', $request->name) . '-' . time() . '.' . $request->image->extension();
            $request->image->move(public_path('/uploads/blog'), $imageUrl);
            }else
            {
                $imageUrl=  $blog->image;
            }
        $blog->update([
            'image' => $imageUrl,
            'desc' => $request->desc,
            'date' => $request->date,
        ]);
        return redirect()->route('blog.setting')->with('message', 'Blog updated');
    }
    public function delete($id)
    {
        $blog = Blog::find($id);
        $image = str_replace('\\', '/', public_path('uploads/blog/' . $blog->image));
        unlink($image);
        $blog->delete();
        return redirect()->route('blog.setting')->with('error', 'Blog deleted');

    }

    public function view($id)
    {
        $blog = Blog::find($id);
        return view('admin.layouts.blogsetting.blog_view', compact('blog'));
    }
    public function change(Request $request, $id)
    {
        $blog = Blog::find($id);
        if(!empty($request->image)){
            $imageUrl = str_replace(' ', '-', $request->name) . '-' . time() . '.' . $request->image->extension();
            $request->image->move(public_path('/uploads/blog'), $imageUrl);
            }else
            {
                $imageUrl=  $blog->image;
            }
        $blog->update([
            'image' => $imageUrl,
        ]);
        return redirect()->route('blog.setting')->with('message', 'Blog Image Updated');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Blog\BlogStoreRequest;
use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::orderBy('created_at','DESC')->paginate(5);
        return view('Admin.blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd($request->all());
        $blog = $request->only('author','title','content');
        $blog['created_at'] = now();
        $blog['updated_at'] = now();

        //tạo tên file
        $fileName = $request->author . '.' . rand(1,1000) . time() . '.' . $request->file('imgBlog')->extension();
        //lưu trữ vào storage
        $request->file('imgBlog')->storeAs('public/blog', $fileName);
        //tạo đường dẫn lưu vào db
        $imgPath = 'storage/blog/' . $fileName;
        $blog['imgBlog']=$imgPath;
        // dd($blog);
        if (Blog::create($blog)) {
            return redirect()->route('blogs.index')->with('success','Đăng Blog thành công');
        }
        return redirect()->back()->with('error','Đăng Blog thất bại');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

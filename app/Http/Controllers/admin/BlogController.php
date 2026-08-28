<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Blog;

class BlogController extends Controller
{
    protected $blog;

    public function __construct()
    {
        $this->blog = new Blog();
    }
    public function index()
    {
        $blogs = $this->blog->orderBy('id', 'desc')->paginate(config('constants.pagination_limit'));;
        return view('admin.blog.index', compact('blogs'));
    }
    public function add()
    {
        return view('admin.blog.add');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('blogs'), $imageName);

        $blog = $this->blog;;
        $blog->name = $request->name;
        $blog->description = $request->description;
        $blog->image = 'blogs/' . $imageName;
        $blog->save();

        return redirect()->back()->with('success', 'Blog added successfully!');
    }

    public function edit($id)
    {
        $blog = $this->blog->find($id);
        if (!$blog) {
            return redirect()->back()->with('error', 'Record not found!');
        }
        return view('admin.blog.edit', compact('blog'));
    }
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $blog = Blog::findOrFail($request->id);

        $blog->name = $request->name;
        $blog->description = $request->description;

        if ($request->hasFile('image')) {

            if ($blog->image && file_exists(public_path($blog->image))) {
                unlink(public_path($blog->image));
            }

            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('blogs'), $imageName);

            $blog->image = 'blogs/' . $imageName;
        }

        $blog->save();

        return redirect()->back()->with('success', 'Blog updated successfully!');
    }
    public function delete($id)
    {
        try {
            $blog = $this->blog->find($id);
            $blog->delete();

            return response()->json(['status' => 'success']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'exceptionError', 'error' => $e->getMessage()]);
        }
    }
}

<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Article;

class ArticleController extends Controller
{
    protected $article;

    public function __construct()
    {
        $this->article = new Article();
    }
    public function index()
    {
        $articles = $this->article->orderBy('id', 'desc')->paginate(config('constants.pagination_limit'));;
        return view('admin.article.index', compact('articles'));
    }
    public function add()
    {
        return view('admin.article.add');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpg,jpeg,png',
        ]);

        $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('article'), $imageName);

        $article = $this->article;
        $article->name = $request->name;
        $article->description = $request->description;
        $article->image = 'article/' . $imageName;
        $article->save();

        return redirect()->back()->with('success', 'Article added successfully!');
    }

    public function edit($id)
    {
        $article = $this->article->find($id);
        if (!$article) {
            return redirect()->back()->with('error', 'Record not found!');
        }
        return view('admin.article.edit', compact('article'));
    }
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png',
        ]);

        $article = article::findOrFail($request->id);

        $article->name = $request->name;
        $article->description = $request->description;

        if ($request->hasFile('image')) {

            if ($article->image && file_exists(public_path($article->image))) {
                unlink(public_path($article->image));
            }

            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('article'), $imageName);

            $article->image = 'article/' . $imageName;
        }

        $article->save();

        return redirect()->back()->with('success', 'Article updated successfully!');
    }
    public function delete($id)
    {
        try {
            $article = $this->article->find($id);
            $article->delete();

            return response()->json(['status' => 'success']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'exceptionError', 'error' => $e->getMessage()]);
        }
    }
}

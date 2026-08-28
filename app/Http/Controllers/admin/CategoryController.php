<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Category;

class CategoryController extends Controller
{
    public function index(){
        $categoreis = Category::orderBy('id', 'desc')->paginate(config('constans.pagination_limit'));
        return view('admin.category.index', compact('categoreis'));
    }
    public function add(){
        return view('admin.category.add');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|unique:categories,name',
            'icon' => 'required'
        ]);

        Category::create([
            'name' => $validated['name'],
            'icon' => $validated['icon'],
        ]);

        return redirect()->back()->with('success', 'Added successfully.');
    }
    public function edit($id)
    {
        $category = Category::find($id);
        if (!$category) {
            return redirect()->back()->with('error', 'No record found!');
        }
        return view('admin.category.edit', compact('category'));
    }
    public function update(Request $request)
    {
        $validated = $request->validate([
            'id'   => 'required|exists:categories,id',
            'name' => 'required|string|unique:categories,name,' . $request->id,
            'icon' => 'required'
        ]);

        $category = Category::findOrFail($validated['id']);

        $category->update([
            'name' => $validated['name'],
            'icon' => $validated['icon'],
        ]);

        return redirect()->back()->with('success', 'Updated successfully.');
    }
    public function delete($id)
    {
        try {
            $category = Category::findOrFail($id);
            $category->delete();

            return response()->json(['status' => 'success']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'exceptionError', 'error' => $e->getMessage()]);
        }
    }
}

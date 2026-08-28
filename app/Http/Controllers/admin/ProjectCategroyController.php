<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\ProjectCategory;

class ProjectCategroyController extends Controller
{
    protected $category;

    public function __construct()
    {
        $this->category = new ProjectCategory();
    }

    public function index(){
        $categoreis = $this->category->orderBy('id', 'desc')->paginate(config('constans.pagination_limit'));
        return view('admin.project.category.index', compact('categoreis'));
    }
    public function add(){
        return view('admin.project.category.add');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|unique:project_category,name',
        ]);

        $data = [
            'name' => $request->name,
            'title' => $request->title,
            'icon' => $request->icon
        ];

        $this->category->create($data);

        return redirect()->back()->with('success', 'Added successfully.');
    }
    public function edit($id){
        $category = $this->category->find($id);
        if (!$category) {
            return redirect()->back()->with('error', 'No record found!');
        }
        return view('admin.project.category.edit', compact('category'));
    }
    public function update(Request $request){
        $validated = $request->validate([
            'id'   => 'required|exists:categories,id',
            'name' => 'required|string|unique:project_category,name,' . $request->id,
        ]);

        $category = $this->category->findOrFail($validated['id']);

        $category->update([
            'name' => $validated['name'],
            'title' => $request->title,
        ]);

        return redirect()->back()->with('success', 'Updated successfully.');
    }
    public function delete($id)
    {
        try {
            $category = $this->category->findOrFail($id);
            $category->delete();

            return response()->json(['status' => 'success']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'exceptionError', 'error' => $e->getMessage()]);
        }
    }
}

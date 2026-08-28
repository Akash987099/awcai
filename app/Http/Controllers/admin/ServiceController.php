<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Service;
use App\Models\admin\Category;

class ServiceController extends Controller
{
    public function index(){
        $services = Service::with('category')->orderBy('id', 'desc')->paginate(config('constans.pagination_limit'));
        return view('admin.service.index', compact('services'));
    }
    public function add($id){
        $category = Category::find($id);
        return view('admin.service.add', compact('category'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|unique:services,name',
            'category_id' => 'required',
        ]);

        Service::create([
            'name' => $validated['name'],
            'category_id' => $validated['category_id'],
        ]);

        return redirect()->back()->with('success', 'Added successfully.');
    }
    public function delete($id)
    {
        try {
            $service = Service::findOrFail($id);
            $service->delete();

            return response()->json(['status' => 'success']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'exceptionError', 'error' => $e->getMessage()]);
        }
    }
}

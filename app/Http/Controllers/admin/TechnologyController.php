<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Technology;

class TechnologyController extends Controller
{
    protected $technolgy;

    public function __construct()
    {
        $this->technolgy = new Technology();
    }

    public function index(){
        $technolgies = $this->technolgy->orderBy('id', 'desc')->paginate(config('constants.pagination_limit'));
        return view('admin.technology.index', compact('technolgies'));
    }

    public function add()
    {
        return view('admin.technology.add');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|unique:technologies,name',
        ]);

        $data = [
            'name' => $request->name,
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'icon' => $request->icon
        ];

        $this->technolgy->create($data);

        return redirect()->back()->with('success', 'Added successfully.');
    }

    public function edit($id) {
        $technolgy = $this->technolgy->find($id);
        if (!$technolgy) {
            return redirect()->back()->with('error', 'No record found!');
        }
        return view('admin.technology.edit', compact('technolgy'));
    }

    public function update(Request $request) {
        $validated = $request->validate([
            'id'   => 'required|exists:technologies,id',
            'name' => 'required|string|unique:technologies,name,' . $request->id,
        ]);

        $technologies = $this->technolgy->findOrFail($validated['id']);

        $technologies->update([
            'name' => $request->name,
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'icon' => $request->icon
        ]);

        return redirect()->back()->with('success', 'Updated successfully.');
    }
    public function delete($id)
    {
        try {
            $technolgies = $this->technolgy->findOrFail($id);
            $technolgies->delete();

            return response()->json(['status' => 'success']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'exceptionError', 'error' => $e->getMessage()]);
        }
    }
}

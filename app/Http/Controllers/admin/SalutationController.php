<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Salutation;

class SalutationController extends Controller
{
    protected $salutaion;

    public function __construct()
    {
        $this->salutaion = new Salutation();
    }

    public function index()
    {
        $salutation = $this->salutaion->orderBy('id', 'desc')->paginate(config('constants.pagination_limit'));
        return view('admin.salutation.index', compact('salutation'));
    }
    public function add()
    {
        return view('admin.salutation.add');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:salutation,name',
        ]);
        $this->salutaion->create(['name' => $request->name]);
        return redirect()->back()->with('success', 'Success!');
    }
    public function edit($id)
    {
        $salutation = $this->salutaion->find($id);
        if ($salutation) {
            return view('admin.salutation.edit', compact('salutation'));
        }
        return redirect()->back()->with('error', 'no record found!');
    }

    public function update(Request $request)
    {
        $salutation = $this->salutaion->find($request->id);

        if (!$salutation) {
            return redirect()->back()->with('error', 'Record not found.');
        }

        $request->validate([
            'name' => 'required|unique:salutation,name,' . $salutation->id,
        ], [
            'name.required' => 'Salutation name is required.',
            'name.unique'   => 'This salutation already exists.',
        ]);

        $salutation->update(['name' => $request->name]);

        return redirect()->back()->with('success', 'Salutation updated successfully!');
    }

    public function delete($id)
    {
        try {
            $salutaion = $this->salutaion->findOrFail($id);
            $salutaion->delete();

            return response()->json(['status' => 'success']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'exceptionError', 'error' => $e->getMessage()]);
        }
    }

}

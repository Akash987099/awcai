<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Role;

class RoleController extends Controller
{
    public function index(){
        $roles = Role::orderBy('id', 'desc')->paginate(config('constans.pagination_limit'));
        return view('admin.role.index', compact('roles'));
    }
    public function add(){
        return view('admin.role.add');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|unique:roles,name',
        ]);

        Role::create([
            'name' => $validated['name'],
        ]);

        return redirect()->back()->with('success', 'Added successfully.');
    }
    public function edit($id)
    {
        $role = Role::find($id);
        if (!$role) {
            return redirect()->back()->with('error', 'No record found!');
        }
        return view('admin.role.edit', compact('role'));
    }
    public function update(Request $request)
    {
        $validated = $request->validate([
            'id'   => 'required|exists:roles,id',
            'name' => 'required|string|unique:roles,name,' . $request->id,
        ]);

        $role = Role::findOrFail($validated['id']);

        $role->update([
            'name' => $validated['name'],
        ]);

        return redirect()->back()->with('success', 'Updated successfully.');
    }
    public function delete($id)
    {
        try {
            $role = Role::findOrFail($id);
            $role->delete();

            return response()->json(['status' => 'success']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'exceptionError', 'error' => $e->getMessage()]);
        }
    }
}

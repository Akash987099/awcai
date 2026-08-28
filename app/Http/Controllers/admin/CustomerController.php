<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\admin\Role;
use App\Models\admin\Category;
use App\Models\admin\Charge;
use App\Models\admin\Service;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::with('role')
            ->orderBy('id', 'desc')
            ->paginate(config('constants.pagination_limit'));
        return view('admin.customer.index', compact('customers'));
    }
    public function add()
    {
        $roles = Role::all();
        $categories = Category::all();
        return view('admin.customer.add', compact('roles', 'categories'));
    }
    public function fetchservice(Request $request)
    {
        $services = Service::where('category_id', $request->id)->get();
        if (!$services) {
            return response()->json(['status' => 'error', 'message' => 'No record Found']);
        }
        return response()->json(['status' => 'success', 'data' => $services]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'role'        => 'required|integer',
            'name'        => 'required|string|max:255',
            'username'    => 'required|string|max:255|unique:customers,user_name',
            'mobile'      => 'required|string|max:15|unique:customers,mobile',
            'telephone'   => 'nullable|string|max:15',
            'email'       => 'required|email|max:255|unique:customers,email',
            'password'    => 'required|string|min:6',
            'shop_name'   => 'nullable|string|max:255',
            'shop_address' => 'nullable|string|max:500',
            'shop_pincode' => 'nullable|string|max:10',
            'shop_city'   => 'nullable|string|max:255',
            'category'    => 'required|integer',
            'service'     => 'required|integer'
        ]);

        Customer::create([
            'role_id'      => $request->role,
            'name'         => $request->name,
            'user_name'    => $request->username,
            'mobile'       => $request->mobile,
            'telephone'    => $request->telephone,
            'email'        => $request->email,
            'password'     => Hash::make($request->password),
            'shop_name'    => $request->shop_name,
            'shop_address' => $request->shop_address,
            'shop_pincode' => $request->shop_pincode,
            'shop_city'    => $request->shop_city,
            'category'     => $request->category,
            'sub_category' => $request->service
        ]);

        return redirect()->back()->with('success', 'Customer created successfully!');
    }
    public function charge()
    {
        $charges = Charge::with('role')->paginate(config('constants.pagination_limit'));
        return view('admin.customer.charge', compact('charges'));
    }
    public function chargeAdd()
    {
        $roles = Role::all();
        return view('admin.customer.charge-add', compact('roles'));
    }
    public function chargeStore(Request $request)
    {
        $validated = $request->validate([
            'role'  => 'required|integer|exists:roles,id',
            'price' => 'required|numeric|min:0',
        ]);

        Charge::updateOrCreate(
            ['role_id' => $validated['role']],
            ['price' => $validated['price']]
        );

        return redirect()->back()->with('success', 'Charge saved successfully!');
    }
}

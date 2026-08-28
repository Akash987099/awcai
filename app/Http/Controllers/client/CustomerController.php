<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\admin\Account;
use Illuminate\Http\Request;
use App\Models\admin\CustToken;
use App\Models\Customer;
use App\Models\admin\Txn;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\admin\Category;
use App\Models\admin\Charge;
use App\Models\admin\Service;
use App\Models\admin\Role;
use Illuminate\Support\Str;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::where('created_by', Auth::guard('client')->user()->id)->orderBy('id', 'desc')->paginate(config('constants.pagination_limit'));
        // dd($customers);
        return view('panel.client.customer.index', compact('customers'));
    }
    public function add($id)
    {
        $token = CustToken::with('token')->where('id', $id)->first();
        return view('panel.client.customer.add', compact('token'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'token'        => 'required|integer',
            'name'        => 'required|string|max:255',
            'username'    => 'required|string|max:255|unique:customers,user_name',
            'mobile'      => 'required|string|max:15|unique:customers,mobile',
            'email'       => 'required|email|max:255|unique:customers,email',
            'password'    => 'required|string|min:6',
            'address' => 'nullable|string|max:500',
            'pincode' => 'nullable|string|max:10',
            'city'   => 'nullable|string|max:255',
        ]);

        Customer::create([
            'name'         => $request->name,
            'user_name'    => $request->username,
            'mobile'       => $request->mobile,
            'email'        => $request->email,
            'password'     => Hash::make($request->password),
            'address'      => $request->address,
            'pincode'      => $request->pincode,
            'city'         => $request->city,
            'role_id'      => 1,
            'status'       => 0,
            'created_by'   => Auth::guard('client')->user()->id,
        ]);

        return redirect()->back()->with('success', 'Customer created successfully!');
    }
    public function pay($id)
    {
        $customer = Customer::find($id);
        $charge = Charge::where('role_id', $customer->role_id)->first();
        $account = Account::first();
        return view('panel.client.customer.pay', compact('customer', 'charge', 'account'));
    }
    public function payAmount(Request $request)
    {
        $request->validate([
            'id'        => 'required',
            'txn'        => 'required|',
            'pay_by'        => 'required',
        ]);

        $txn = Txn::create([
            'customer_id' => $request->id,
            'txn' => $request->txn,
            'pay_by' => $request->pay_by,
            'status' => 'Creadit',
            'amount' => $request->amount,
        ]);

        Customer::where('id', $request->id)->update(['pay_status' => 1]);

        return redirect()->route('panel.customer.index')->with('success' , 'success!');
    }

    public function fetchservice(Request $request)
    {
        $services = Service::where('category_id', $request->id)->get();
        if (!$services) {
            return response()->json(['status' => 'error', 'message' => 'No record Found']);
        }
        return response()->json(['status' => 'success', 'data' => $services]);
    }

    public function addUser(){
        $roles = Role::all();
        $categories = Category::all();
        return view('panel.client.customer.add-from', compact('roles', 'categories'));
    }

    public function userStore(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'name'        => 'required|string|max:255',
            'username'    => 'required|string|max:255|unique:customers,user_name',
            'mobile'      => 'required|string|max:15|unique:customers,mobile',
            'email'       => 'required|email|max:255|unique:customers,email',
            'password'    => 'required|string|min:6',
            'address' => 'required|string|max:500',
            'pincode' => 'required|string|max:10',
            'city'   => 'required|string|max:255',
            'shop_name'   => 'required|string|max:255',
            'shop_address'   => 'required|string|max:255',
            'shop_pincode'   => 'required|string|max:255',
            'category'   => 'required|string|max:255',
        ]);

        Customer::create([
            'name'         => $request->name,
            'user_name'    => $request->username,
            'mobile'       => $request->mobile,
            'email'        => $request->email,
            'password'     => Hash::make($request->password),
            'address'      => $request->address,
            'pincode'      => $request->pincode,
            'city'         => $request->city,
            'shop_name'         => $request->shop_name,
            'shop_address'         => $request->shop_address,
            'shop_pincode'         => $request->shop_pincode,
            'shop_city'         => $request->shop_city,
            'category'         => $request->category,
            'service'         => $request->shop_city,
            'role_id'      => 2,
            'status'       => 0,
            'created_by'   => Auth::guard('client')->user()->id,
            'api_key'      => trim(Str::random(16))
        ]);

        return redirect()->back()->with('success', 'Customer created successfully!');
    }
}

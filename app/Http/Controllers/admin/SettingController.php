<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Account;

class SettingController extends Controller
{
    public function index()
    {
        return view('admin.settings');
    }
    public function account()
    {
        return view('admin.accounts');
    }
    public function accountStore(Request $request)
    {
        $request->validate([
            'name'           => 'required|string|max:255',
            'bank'           => 'required|string|max:255',
            'acount_number'  => 'required|string|max:50',
            'ifsc'           => 'required|string|max:20',
            'upi'            => 'nullable|string|max:100',
        ]);

        $account = Account::updateOrCreate(
            ['account_number' => $request->acount_number],
            [
                'holder_name'    => $request->name,
                'bank_name'      => $request->bank,
                'account_number' => $request->acount_number,
                'ifsc_code'      => $request->ifsc,
                'upi'            => $request->upi,
            ]
        );

        return redirect()->back()->with('success', 'Account saved successfully!');
    }
}

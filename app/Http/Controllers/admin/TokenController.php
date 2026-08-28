<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\admin\Token;
use App\Models\admin\CustToken;
use App\Models\Customer;
use DB;

class TokenController extends Controller
{
    public function index()
    {
        $tokens = Token::orderBy('id', 'desc')->paginate(config('pagination_limit'));
        return view('admin.token.index', compact('tokens'));
    }
    public function add()
    {
        return view('admin.token.add');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|unique:tokens,name',
        ]);

        $code = str_pad(mt_rand(0, 9999), 4, '0', STR_PAD_LEFT);

        Token::create([
            'name' => $validated['name'],
            'code' => $code,
            'status' => 0
        ]);

        return redirect()->back()->with('success', 'Added successfully.');
    }
    public function edit($id)
    {
        $token = Token::find($id);
        if (!$token) {
            return redirect()->back()->with('error', 'no record found!');
        }
        return view('admin.token.edit', compact('token'));
    }
    public function update(Request $request)
    {
        $validated = $request->validate([
            'id'   => 'required|exists:tokens,id',
        ]);

        $token = Token::findOrFail($validated['id']);

        $token->update([
            'name' => $request->name,
        ]);

        return redirect()->back()->with('success', 'Updated successfully.');
    }
    public function delete($id)
    {
        try {
            $token = Token::findOrFail($id);
            $token->delete();

            return response()->json(['status' => 'success']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'exceptionError', 'error' => $e->getMessage()]);
        }
    }
    public function transfer()
    {
        return view('admin.token.transfer');
    }
    public function transferStore(Request $request)
    {
        $validated = $request->validate([
            'name'   => 'required|exists:customers,user_name',
        ]);

        $cust = Customer::where('user_name', $request->name)->first();
        $tokens = Token::where('status', 0)->limit(5)->pluck('id');

        foreach ($tokens as $tokenId) {
            CustToken::create([
                'customer_id' => $cust->id,
                'token_id'    => $tokenId,
                'status'      => 0,
                'created_at'  => now(),
                'updated_at'  => now(),
            ]);
        Token::where('id', $tokenId)->update(['status' => 1]);
        }

        return redirect()->back()->with('success', 'Tokens assigned successfully.');
    }
    public function transferDetails(){
        $tokens = CustToken::with(['customer', 'token'])
        ->orderBy('id', 'desc')
       ->paginate(config('constants.pagination_limit'));
        return view('admin.token.transfer-details', compact('tokens'));
    }
}

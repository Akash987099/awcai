<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Token;
use App\Models\admin\CustToken;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function index(){
        return view('panel.client.index');
    }
    public function tokens(){
        $tokens = CustToken::with('token')->where('status' , 0)->where('customer_id', Auth::guard('client')->user()->id)->paginate(config('constants.pagination_limit'));
        return view('panel.client.tokens', compact('tokens'));
    }
}

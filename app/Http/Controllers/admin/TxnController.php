<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Txn;

class TxnController extends Controller
{
    public function index(){
        $txns = Txn::with('customer')->orderBy('id', 'desc')->paginate(config('constants.pagination_limit'));
        return view('admin.reports.index', compact('txns'));
    }
}

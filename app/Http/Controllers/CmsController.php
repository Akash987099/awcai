<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CMS;

class CmsController extends Controller
{
    protected $cms;

    public function __construct()
    {
        $this->cms = new CMS();
    }

    public function index(){
        $cms = $this->cms->select('id', 'name')->paginate(config('constants.pagination_limit'));
        return view('admin.cms.index', compact('cms'));
    }

    public function add(){
        return view('admin.cms.add');
    }

    public function store(Request $request){
        // dd($request->all());
        $data = [
            'name' => $request->name,
            'description' => $request->description
        ];

        $this->cms->create($data);
        return redirect()->back()->with('success', 'Success!');
    }

    public function edit($id){
        if(!$id){
            return redirect()->back()->with('error', 'id is required');
        }
        $cms = $this->cms->find($id);
        return view('admin.cms.edit', compact('cms'));
    }

    public function update(Request $request){
        $data = [
            'name' => $request->name,
            'description' => $request->description
        ];

        $this->cms->where('id', $request->id)->update($data);
        return redirect()->back()->with('success', 'Success!');
    }

    // Front  

    public function cms($id){
        if(!$id){
            return redirect()->back()->with('error', 'id is required');
        }
        $cms = $this->cms->find($id);
        return view('cms', compact('cms'));
    }

}
